<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class WeddingPlanningController extends Controller
{
    public function createPreferencesForm() {
        return view('wedding_planning-preferences_form');
    }

    public function getMinBudget(Request $request) {
       
        // get all the services from db
        $services = Service::with('vendor')->get();

        foreach ($services as $service) {
            $vendor_info = json_decode($service->vendor->user_info);
            $service->vendor->state =  $vendor_info->state;
            $service->vendor->business_category =  $vendor_info->business_category;
        }

        // filter the services based on the preferences and requirement entered by user (state, guest count)
        // calculate the minimum budget needed based on preferences and requirement entered by user
        $min_budget = 0;


        // Venue Filter
        $venue_min_budget = 
            $services
            ->where('vendor.business_category', 'venue')
            ->where('vendor.state', $request->input('state'))
            ->where('service_guest_count', '>=', $request->input('guest_count'))
            ->sortBy('service_price')
            ->first();

        if ($venue_min_budget) 
            $min_budget += $venue_min_budget->service_price;
            

        // Wedding Rentals Filter
        $wedding_rentals_min_budget = 
            $services
            ->where('vendor.business_category', 'wedding_rentals')
            ->where('vendor.state', $request->input('state'))
            ->where('service_guest_count', '>=', $request->input('guest_count'))
            ->sortBy('service_price')
            ->first();

        if ($wedding_rentals_min_budget) 
            $min_budget += $wedding_rentals_min_budget->service_price;


        // Catering Filter
        $catering_min_budget = 
            $services
            ->where('vendor.business_category', 'catering')
            ->where('vendor.state', $request->input('state'))
            ->sortBy('service_price')
            ->first();
        $guest_count_per_table = 10;

        if ($catering_min_budget) 
            $min_budget += ceil($request->input('guest_count') / $guest_count_per_table) * $catering_min_budget->service_price;


        // Stylist Filter
        $stylist_min_budget = 
            $services
            ->where('vendor.business_category', 'stylist')
            ->where('vendor.state', $request->input('state'))
            ->sortBy('service_price')
            ->first();

        if ($stylist_min_budget) 
            $min_budget += $request->input('num_of_pax_requiring_stylist') * $stylist_min_budget->service_price;


        // Photo & Videography Filter
        $photography_min_budget = 
            $services
            ->where('vendor.business_category', 'photography_and_videography')
            ->where('vendor.state', $request->input('state'))
            ->sortBy('service_price')
            ->first();

        if ($photography_min_budget) 
            $min_budget += $photography_min_budget->service_price;


        return view('wedding_planning-budget_form', ['preferences' => $request->all(), 'min_budget' => number_format($min_budget, 2, '.', '')]);
    }

    public function getRecommendations(Request $request) {

        /* INITIALIZATION */
        // initialize the budget allocation percentage for each service category
        $budget_allocation = array(
            'venue' => 30,
            'wedding_rentals' => 15,
            'catering' => 30,
            'stylist' => 15,
            'photography_and_videography' => 10
        );
        $additional_allocation_for_priority = 10;
        $guest_count_per_table = 10;

        // increase budget allocation for highest priority, deduct the budget allocation other category
        foreach ($budget_allocation as $category => $allocation) {
            if ($category == $request->input('highest_priority')) {
                $budget_allocation[$category] += $additional_allocation_for_priority;
            }
            else {
                $budget_allocation[$category] -= ($additional_allocation_for_priority / (count($budget_allocation) - 1));
            }
        }


        /* GET ALL SERVICES */
        // get all the services from db
        $services = Service::with('vendor')->get();

        foreach ($services as $service) {
            $vendor_info = json_decode($service->vendor->user_info);
            $service->vendor->state =  $vendor_info->state;
            $service->vendor->business_category =  $vendor_info->business_category;
        }


        /* FILTER SERVICE */
        // get 2 choices for each services based on the preferences and requirement entered by user (state, guest count, budget)
        $budget = $request->input('budget');

        $recommendation['venue'] = $this->getRecommendation($services, 'venue', $request->input('state'), $request->input('guest_count'), 
                            $budget * $budget_allocation['venue'] / 100);

        $recommendation['wedding_rentals'] = $this->getRecommendation($services, 'wedding_rentals', $request->input('state'), $request->input('guest_count'), 
                            $budget * $budget_allocation['wedding_rentals'] / 100);

        $recommendation['catering'] = $this->getRecommendation($services, 'catering', $request->input('state'), '', 
                            ($budget * $budget_allocation['catering'] / 100) / ceil($request->input('guest_count') / $guest_count_per_table)); // convert to price per table

        $recommendation['stylist'] = $this->getRecommendation($services, 'stylist', $request->input('state'), '', 
                            ($budget * $budget_allocation['stylist'] / 100) / $request->input('num_of_pax_requiring_stylist')); // convert to price per pax

        $recommendation['photography_and_videography'] = $this->getRecommendation($services, 'photography_and_videography', $request->input('state'), '', 
                            $budget * $budget_allocation['photography_and_videography'] / 100);

        $recommendations = 
            $recommendation['venue']
            ->concat($recommendation['wedding_rentals'])
            ->concat($recommendation['catering'])
            ->concat($recommendation['stylist'])
            ->concat($recommendation['photography_and_videography']);

        // return $recommendations;
        return view('wedding_planning-recommendation_result', ['recommendations' => $recommendations, 'wedding_date' => $request->input('wedding_date')]);
 

        // $service_id = array(15, 17, 18, 19, 20, 21, 22, 23, 24, 25);
        
        // $services = Service::whereIn('id', $service_id)
        //             ->with('vendor')
        //             ->get();

        // foreach ($services as $service) {
        //     $service->vendor->business_category = json_decode($service->vendor->user_info)->business_category;
        // }

        // return view('wedding_planning-recommendation_result', ['services' => $services]);

        // return dd($request);
    }

    private function getRecommendation($services, $category, $state, $guest_count, $budget) {
        // filter service category, state, budget
        $result = 
            $services
            ->where('vendor.business_category', $category)
            ->where('vendor.state', $state)
            ->where('service_price', '<=', $budget);

        // filter guest count for venue and wedding_rentals
        if ($category == 'venue' || $category == 'wedding_rentals') {
            $result = $result->where('service_guest_count', '>=', $guest_count);
        }

        $result = 
            $result
            ->sortByDesc('service_price')
            ->take(2);

        return collect($result);
    }

    // public function store(Request $request) {

    //     return dd($request->all());
    // }
}
