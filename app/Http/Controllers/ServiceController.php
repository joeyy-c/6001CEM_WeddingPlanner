<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    public function index() {
        $user = Auth::user();
        $services = Service::where('vendor_id', $user->id)->get();

        return view('vendor.services.index', ['services' => $services]);
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
        return redirect()->route('services.index')->with('message', 'Service has been successfully added.');
    }
}
