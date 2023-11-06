<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function vendorDashboard() {

        // Select the total sales of vendor for current year, group by month
        $currentYear = date('Y'); 
        $chart_result = DB::table('project_services')
            ->join('projects', 'project_services.project_id', '=', 'projects.id')
            ->join('services', 'project_services.service_id', '=', 'services.id')
            ->join('users', 'services.vendor_id', '=', 'users.id')
            ->select(
                DB::raw('SUM(services.service_price) as sales'),
                DB::raw('MONTH(project_services.start_date) as month')
            )
            ->where('services.vendor_id', auth()->id())
            ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
            ->whereYear('project_services.start_date', $currentYear)
            ->groupBy('month')
            ->get()
            ->toArray();

            $myfile = fopen("test888.txt", "w") or die("Unable to open file!");
            fwrite($myfile,print_r($chart_result, true));
            fclose($myfile);


        $line_chart_data = array_fill(1, 12, 0); // create array from index 1 to 12, default value fill with 0
        foreach ($chart_result as $monthly_data) {
            $line_chart_data[$monthly_data->month] = (double)$monthly_data->sales; // fill array value with sales amount
        }

        $total_sales = 0;
        $total_sales = array_sum($line_chart_data); // total sales of current year
        $line_chart_data = array_values($line_chart_data); // remove the key of array

        $donut_chart_data = $this->getDonutChartData();

        // die(print_r($line_chart_data));

        return view('vendor.dashboard', ['line_chart_data' => $line_chart_data, 'total_sales' => $total_sales, 'donut_chart_data' => $donut_chart_data]);
    }

    public function adminDashboard() {

        return view('admin.dashboard', []);
    }

    private function getTotalSales() {

    }

    private function getTotalIncomingProject() {

    }

    private function getTotalProjectConfirmed() {
        
    }

    private function getTotalProjectDeclinedAndCancelled() {
        
    }

    private function getTopServicesSales() {

    }

    private function getDonutChartData() {
        $currentYear = date('Y'); 

        // Query to select the top 3 services based on the count of valid service records
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

                        
    
        // Calculate the total count of all valid services
        $totalServiceCount = DB::table('project_services')
                            ->join('services', 'project_services.service_id', '=', 'services.id')
                            ->where('vendor_id', auth()->id())
                            ->whereNotIn('project_services.status', ['Declined', 'Cancelled', 'Waiting for Vendor\'s Confirmation', 'Deposit Payment'])
                            ->whereYear('project_services.start_date', $currentYear)
                            ->count();
    
        // Initialize arrays to store the top 3 services and the count of others
        $donut_chart_data = [];
        $othersCount = 0;
    
        // Loop through the top services to calculate percentages
        foreach ($top3Services as $service) {
            $percentage = ($service->service_count / $totalServiceCount) * 100;
            $donut_chart_data[] = [
                'service_name' => $service->service_name,
                'percentage' => $percentage,
            ];
        }
    
        // Query to calculate the count of "Others" services
        $othersCount = $totalServiceCount - $top3Services->sum('service_count');
    
        // Add "Others" category to the top services data
        if ($othersCount > 0) {
            $percentage = ($othersCount / $totalServiceCount) * 100;
            $donut_chart_data[] = [
                'service_name' => 'Others',
                'percentage' => $percentage,
            ];
        }
    
        // Create the chart data
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

    }
}
