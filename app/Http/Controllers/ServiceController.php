<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    public function index() {
        $user = Auth::user();

        if ($user->role->role_name == 'Vendor') {
            $services = Service::where('vendor_id', $user->id)->get();

            return view('vendor.services.index', ['services' => $services]);
        }
        else if ($user->role->role_name == 'Admin') {
            $services = Service::with('vendor')->get();

            // return $services;
            return view('admin.services.index', ['services' => $services]);
        }

    }

    public function create() {
        return view('vendor.services.create');
    }

    public function store(Request $request) {

        $user = Auth::user();
        // $user->user_info = json_decode($user->user_info, true);
        // $service_info = array();
       
        // switch ($user->user_info['business_category']) {
        //     case 'venue':
        //         $service_info['max_guest_capacity'] = $request->input('max_guest_capacity');
        //         break;

        //     case 'wedding_rentals':
        //         $service_info['count_of_guest'] = $request->input('count_of_guest');
        //         break;

        //     // case 'catering':
                
        //     // case 'stylist':

        //     case 'photography_and_videography':
        //         $service_info['photography_and_videography_duration'] = $request->input('photography_and_videography_duration');
        //         break;

        //     default:
        //         break;
        // };

        $service = Service::create([
            'service_enable' => 1,
            'service_name' => $request->input('name'),
            'service_desc' => $request->input('description'),
            'service_guest_count' => $request->input('guest_count'),
            'service_price' => $request->input('price'),
            'vendor_id' => $user->id,
        ]);

        // return redirect(route('service.create'));
        return redirect()->route('vendor.services.index')->with('success', 'Service #' . $service->id . ' has been successfully added.');
    }

    // public function show(string $id) {
    //     $service = Service::with('vendor')->findOrFail($id);
    //     $service->vendor->user_info = json_decode($service->vendor->user_info, true);
        
    //     return $service;
    //     // return view('vendor.services.show', ['service' => Service::findOrFail($id)]);
    // }

    public function disableService(Request $request) {
        if (empty($request->input('disable'))) {
            return redirect()->route('vendor.services.index')->with('warning', 'Please select at least one checkbox.');
        }
        else {
            Service::whereIn('id', $request->input('disable'))
            ->update(['service_enable' => $request->input('service_enable')]);

            if ($request->input('service_enable')) 
                return redirect()->route('vendor.services.index')->with('success', 'Services has been disabled successfully.');
            else 
                return redirect()->route('vendor.services.index')->with('success', 'Services has been disabled successfully.');
        }
    }

    public function edit(Service $service) {
        $user = Auth::user();

        $service->load('vendor');
        $service->vendor->user_info = json_decode($service->vendor->user_info);
        
        // return $service;

        if ($user->role->role_name == 'Vendor') {
            return view('vendor.services.edit', ['service' => $service]);
        }
        else if ($user->role->role_name == 'Admin') {
            return view('admin.services.edit', ['service' => $service]);
        }
    }

    public function update(Service $service, Request $request) {
        $result = $service->update([
            'service_enable' => $request->input('service_enable')
        ]);

        if ($result) {
            return redirect()->route('vendor.services.index')->with('success', 'Service #' . $service->id . ' has been successfully updated.');
        } else {
            return redirect()->route('vendor.services.index')->with('error', 'Failed to update service #' . $service->id . '.');
        }
    }
}
