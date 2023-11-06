<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectService;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function vendorDashboard() {

        $line_chart_data_and_total_sales = $this->getLineChartData();
        $donut_chart_data = $this->getDonutChartData();
        $top_services_sales = $this->getTopServicesSales();
        $latest_projects = $this->getLatestProjects();

        return view('vendor.dashboard', [
            'line_chart_data' => $line_chart_data_and_total_sales['line_chart_data'], 
            'total_sales' => $line_chart_data_and_total_sales['total_sales'],
            'donut_chart_data' => $donut_chart_data,
            'top_services_sales' => $top_services_sales,
            'latest_projects' => $latest_projects 
        ]);
    }

    public function adminDashboard() {

        return view('admin.dashboard', []);
    }

    public function getLineChartData() {
        // Select the total sales of vendor for current year, group by month
        $currentYear = date('Y'); 
        $chart_result = DB::table('project_services')
                        ->join('projects', 'project_services.project_id', '=', 'projects.id')
                        ->join('services', 'project_services.service_id', '=', 'services.id')
                        ->join('users', 'services.vendor_id', '=', 'users.id')
                        ->select(
                            DB::raw('SUM(CASE 
                                WHEN JSON_VALUE(users.user_info,"$.business_category") = "catering" THEN services.service_price * (JSON_VALUE(projects.project_details,"$.guest_count") / 10)
                                WHEN JSON_VALUE(users.user_info,"$.business_category") = "stylist" THEN services.service_price * JSON_VALUE(projects.project_details,"$.num_of_pax_requiring_stylist")
                                ELSE services.service_price
                            END) as sales'),
                            DB::raw('MONTH(project_services.start_date) as month')
                        )
                        ->where('services.vendor_id', auth()->id())
                        ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
                        ->whereYear('project_services.start_date', $currentYear)
                        ->groupBy('month')
                        ->get()
                        ->toArray();

        $line_chart_data = array_fill(1, 12, 0); // create array from index 1 to 12, default value fill with 0
        foreach ($chart_result as $monthly_data) {
            $line_chart_data[$monthly_data->month] = (double)$monthly_data->sales; // fill array value with sales amount
        }

        $total_sales = 0;
        $total_sales = array_sum($line_chart_data); // total sales of current year
        $line_chart_data = array_values($line_chart_data); // remove the key of array

        return array('line_chart_data' => $line_chart_data, 'total_sales' => number_format($total_sales, 2));
    }

    private function getTotalIncomingProject() {

    }

    private function getTotalProjectConfirmed() {
        
    }

    private function getTotalProjectDeclinedAndCancelled() {
        
    }

    private function getTopServicesSales() {
        $currentYear = date('Y'); 

        // Select the top 7 services sold
        $topServicesSales = DB::table('project_services')
                        ->join('projects', 'project_services.project_id', '=', 'projects.id')
                        ->join('services', 'project_services.service_id', '=', 'services.id')
                        ->join('users', 'services.vendor_id', '=', 'users.id')
                        ->select('service_name', 
                            DB::raw('SUM(CASE 
                                WHEN JSON_VALUE(users.user_info,"$.business_category") = "catering" THEN services.service_price * (JSON_VALUE(projects.project_details,"$.guest_count") / 10)
                                WHEN JSON_VALUE(users.user_info,"$.business_category") = "stylist" THEN services.service_price * JSON_VALUE(projects.project_details,"$.num_of_pax_requiring_stylist")
                                ELSE services.service_price
                            END) as sales')
                        )
                        ->where('vendor_id', auth()->id())
                        ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
                        ->whereYear('project_services.start_date', $currentYear)
                        ->groupBy('service_name')
                        ->orderByDesc('sales')
                        ->take(7)
                        ->get();

        return $topServicesSales;
    }

    private function getDonutChartData() {
        $currentYear = date('Y'); 

        // Select the top 3 services sold
        $top3Services = DB::table('project_services')
                        ->join('services', 'project_services.service_id', '=', 'services.id')
                        ->select('service_name', DB::raw('COUNT(*) as service_count'))
                        ->where('vendor_id', auth()->id())
                        ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
                        ->whereYear('project_services.start_date', $currentYear)
                        ->groupBy('service_name')
                        ->orderByDesc('service_count')
                        ->take(3)
                        ->get();

        // Get the total count of services sold
        $totalServiceCount = DB::table('project_services')
                            ->join('services', 'project_services.service_id', '=', 'services.id')
                            ->where('vendor_id', auth()->id())
                            ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
                            ->whereYear('project_services.start_date', $currentYear)
                            ->count();
    
        $donut_chart_data = [];
        $othersCount = 0;
    
        // Calculate percentages for top 3 services
        foreach ($top3Services as $service) {
            $percentage = ($service->service_count / $totalServiceCount) * 100;
            $donut_chart_data[] = [
                'service_name' => $service->service_name,
                'percentage' => $percentage,
            ];
        }
    
        // Calculate count of "Others" services
        $othersCount = $totalServiceCount - $top3Services->sum('service_count');
    
        // Calculate percentages for "others" services
        if ($othersCount > 0) {
            $percentage = ($othersCount / $totalServiceCount) * 100;
            $donut_chart_data[] = [
                'service_name' => 'Others',
                'percentage' => $percentage,
            ];
        }
    
        // Format Donut Chart Data
        $labels = [];
        $data = [];
        foreach ($donut_chart_data as $service) {
            $labels[] = $service['service_name'];
            $data[] = (double)$service['percentage'];
        }
        $donut_chart_data = array("labels" => array_map('html_entity_decode', $labels), "data" => $data);

        return $donut_chart_data;
    }

    private function getLatestProjects() {
        $userId = auth()->id();

        $projects = ProjectService::whereHas('service', function ($query) use ($userId) {
            $query->where('vendor_id', $userId);
        })->with('service', 'project', 'project.cust')->take(10)->get();

        return $projects;
    }
}
