<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index() {
        // $user = Auth::user();
        // $project = Project::where('cust_id', $user->id)->first();

        // return view('dashboard', ['project' => $project]);
    }

    public function store(Request $request) {

        $user = Auth::user();

        $project = Project::create([
            'project_name' => '',
            'project_details' => '',
            'project_remark' => $request->input('remark'),
            'project_status' => 'Waiting for Vendors\' Confirmation',
            'project_start_date' => null,
            'project_end_date' => null,
            'wedding_date' => $request->input('wedding_date'),
            'cust_id' => $user->id
        ]);
        
        // Insert project_service record for every category of service
        foreach ($request->all() as $key => $value) {
            if ($key != '_token' && $key != 'remark' && $key != 'wedding_date') {
                ProjectService::create([
                    'project_id' => $project->id,
                    'service_id' => $value,
                    'status' => 'Waiting for Vendor\'s Confirmation'
                ]);
            }
        }

        return redirect()->route('dashboard')->with('message', 'Package has been successfully confirmed.');
    }
}
