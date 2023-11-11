<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectStatusNotification;

class ProjectServiceController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userId = $user->id;

        $projects = ProjectService::whereHas('service', function ($query) use ($userId) {
            $query->where('vendor_id', $userId);
        })->with('service', 'project', 'project.cust')->get();

        // return $projects;

        return view('vendor.projects.index', ['projects' => $projects]);
    }

    public function edit(ProjectService $project_service) {
        $project_service->load('service', 'project', 'project.cust');
        $project_service->project->cust->user_info = json_decode( $project_service->project->cust->user_info);

        if ($project_service->service->vendor_id != Auth::user()->id)
            return back();

        // return $project_service;

        return view('vendor.projects.edit', ['project' => $project_service]);
    }

    public function update(ProjectService $project_service, Request $request) {
        $data = array('status' => $request->input('status'));

        // update start date and end date
        if ($request->input('status') == 'Project Confirmed')
            $data['start_date'] = date("Y-m-d");
        else if ($request->input('status') == 'Completed')
            $data['end_date'] = date("Y-m-d");

        $result = $project_service->update($data);

        // send email to customer
        $mail_data = [
            'project_id' => $project_service->project->id,
            'project_service_id' => $project_service->id,
            'project_name' => $project_service->project->project_name,
            'service_id' => $project_service->service_id,
            'service_name' => $project_service->service->service_name,
            'service_category' => ucwords(str_replace('_', ' ', json_decode($project_service->service->vendor->user_info)->business_category)),
            'status' => $request->input('status')
        ];
        Mail::to('chengxinye@gmail.com')->send(new ProjectStatusNotification($mail_data));


        if ($result) {
            return redirect()->route('vendor.projects.index')->with('success', 'Project has been successfully updated.');
        } else {
            return redirect()->route('vendor.projects.index')->with('error', 'Failed to update project.');
        }
    }
}
