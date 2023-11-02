<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Support\Facades\Auth;

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

        // return $project_service;

        return view('vendor.projects.edit', ['project' => $project_service]);
    }

    public function update(ProjectService $project_service, Request $request) {
        $result = $project_service->update([
            'status' => $request->input('status')
        ]);

        if ($result) {
            return redirect()->route('vendor.projects.index')->with('success', 'Project has been successfully updated.');
        } else {
            return redirect()->route('vendor.projects.index')->with('error', 'Failed to update project.');
        }
    }
}
