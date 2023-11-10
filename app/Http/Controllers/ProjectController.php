<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function userDashboard() {
        $user = Auth::user();
        $userId = $user->id;

        $project = Project::where('cust_id', $user->id)->with('projectServices.service.vendor')->first();
        $projectDetails = [];

        if ($project) {
            $projectServices = $project->projectServices->map(function ($projectService) {
                // $projectService->service->vendor->user_info =  json_decode($projectService->service->vendor->user_info);
                $projectService->service->vendor->user_info_decoded =  json_decode($projectService->service->vendor->user_info);
                return $projectService;
            });

            $projectDetails = (object) [
                'project_id' => $project->id,
                'project_name' => $project->project_name,
                'project_details' => json_decode($project->project_details),
                'project_remark' => $project->project_remark,
                'wedding_date' => $project->wedding_date,
                'cust_name' => $project->cust->name,
                'services' => $projectServices,
            ];            
        }

        // return $projectDetails[0];
        return view('dashboard', ['project' => $projectDetails]);
    }

    public function index() {
        $projects = Project::with('projectServices.service')->get();

        $projectsDetails = [];

        foreach ($projects as $project) {
            $projectServices = $project->projectServices->map(function ($projectService) {
                return [
                    'service_id' => $projectService->service->id,
                    'service_name' => $projectService->service->service_name,
                    'service_status' => $projectService->status,
                    'vendor_category' => ucwords(str_replace('_', ' ', json_decode($projectService->service->vendor->user_info)->business_category)),
                ];
            });

            $projectsDetails[] = (object) [
                'project_id'    => $project->id,
                'project_name'    => $project->project_name,
                'wedding_date' => $project->wedding_date,
                'budget' => json_decode($project->project_details)->budget,
                'cust_name' => $project->cust->name,
                'services' => $projectServices,
            ];            
        }

        // return $projectsDetails;
        return view('admin.projects.index', ['projectsDetails' => $projectsDetails]);
    }

    public function store(Request $request) {

        $user = Auth::user();

        // Not to insert project when user is changing vendor because of vendor decline, since the project has been inserted before
        // Only insert project only when user is confirming new project
        if (!$request->has('decline')) {
            $project = Project::create([
                'project_name' => $request->input('project_name'),
                'project_details' => $request->project_details ? json_encode($request->project_details) : '{}',
                'project_remark' => $request->input('remark') ? $request->input('remark') : '',
                'project_status' => 'Waiting for Vendors\' Confirmation',
                'project_start_date' => null,
                'project_end_date' => null,
                'wedding_date' => $request->input('wedding_date'),
                'cust_id' => $user->id
            ]);
        }
        
        // Insert project_service record for every category of service
        // foreach ($request->except(['_token', 'remark', 'wedding_date', 'project_details', 'project_name', 'declined']) as $key => $value) {
        //     ProjectService::create([
        //         'project_id' => $request->has('project_id') ? $request->input('project_id') : $project->id,
        //         'service_id' => $value,
        //         'status' => 'Waiting for Vendor\'s Confirmation'
        //     ]);
        // }

        $business_categories = ['venue', 'wedding_rentals', 'catering', 'stylist', 'photography_and_videography'];

        foreach ($request->all() as $key => $value) {
            if (in_array($key, $business_categories)) {
                ProjectService::create([
                    'project_id' => $request->has('project_id') ? $request->input('project_id') : $project->id,
                    'service_id' => $value,
                    'status' => 'Waiting for Vendor\'s Confirmation'
                ]);
            }
        }

        return redirect()->route('dashboard')->with('message', 'Package has been successfully confirmed. The status of all your services is currently waiting for vendor\'s confirmation. You can always keep track on the progress for each services in your dashboard.');
    }

    public function show(string $id) {
        $user = Auth::user();
        $userId = $user->id;

         $project = Project::with('projectServices.service.vendor')->findOrFail($id);

        if ($project) {
            $projectServices = $project->projectServices->map(function ($projectService) {
                $projectService->service->vendor->user_info = json_decode($projectService->service->vendor->user_info);
                return $projectService;
            });

            $projectDetails = (object) [
                'project_id'    => $project->id,
                'project_name'    => $project->project_name,
                'project_remark'    => $project->project_remark,
                'wedding_date' => $project->wedding_date,
                'budget' => json_decode($project->project_details)->budget,
                'cust_name' => $project->cust->name,
                'services' => $projectServices,
            ];            
        }

        // return $projectDetails;
        return view('admin.projects.show', ['project' => $projectDetails]);
    }
}
