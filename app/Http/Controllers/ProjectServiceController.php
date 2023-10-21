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

        $project = Project::where('cust_id', $user->id);

        $project_services = ProjectService::whereHas('project', function ($query) use ($userId) {
            $query->where('cust_id', $userId);
        })->with('service.vendor')->get();

        foreach ($project_services as $ps) {
            $ps->service->vendor->user_info = json_decode($ps->service->vendor->user_info);
        }

        // return $project_services;

        return view('dashboard', ['project_services' => $project_services]);
    }
}
