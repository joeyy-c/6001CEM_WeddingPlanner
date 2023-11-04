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
        $services = Service::with('vendor')->where('service_enable', 1)->get();

        foreach ($services as $service) {
            $vendor_info = json_decode($service->vendor->user_info);
            $service->vendor->state =  $vendor_info->state;
            $service->vendor->business_category =  $vendor_info->business_category;
        }

        // filter the services based on the preferences and requirement entered by user (state, guest count)
        // calculate the minimum budget needed based on preferences and requirement entered by user
        $min_budget = 0;

        // /* INITIALIZATION */
        // // initialize the budget allocation percentage for each service category
        // $budget_allocation = array(
        //     'venue' => 30,
        //     'wedding_rentals' => 15,
        //     'catering' => 30,
        //     'stylist' => 15,
        //     'photography_and_videography' => 10
        // );
        // $additional_allocation_for_priority = 10;
        $guest_count_per_table = 10;

        // // increase budget allocation for highest priority, deduct the budget allocation other category
        // foreach ($budget_allocation as $category => $allocation) {
        //     if ($category == $request->input('highest_priority')) {
        //         $budget_allocation[$category] += $additional_allocation_for_priority;
        //     }
        //     else {
        //         $budget_allocation[$category] -= ($additional_allocation_for_priority / (count($budget_allocation) - 1));
        //     }
        // }


        // /* GET ALL SERVICES */
        // // get all the services that is enabled from db
        // $services = Service::with('vendor')->where('service_enable', 1)->get();

        // foreach ($services as $service) {
        //     $vendor_info = json_decode($service->vendor->user_info);
        //     $service->vendor->state =  $vendor_info->state;
        //     $service->vendor->business_category =  $vendor_info->business_category;
        // }


        // /* FILTER SERVICE */
        // // get 2 choices for each services based on the preferences and requirement entered by user (state, guest count, budget)
        // $budget = $request->input('budget');

        // $venue_min_budget = $this->getRecommendation(
        //     $services, 
        //     'venue', 
        //     $request->input('state'), 
        //     $request->input('guest_count'), 
        //     $budget * $budget_allocation['venue'] / 100,
        //     $request->input('venue')
        // );

        $business_category = array("venue", "wedding_rentals", "catering", "stylist", "photography_and_videography");

        foreach ($business_category as $category) {
            switch ($category) {
                case 'venue':
                    $min_budget += $this->getRecommendation($category, $request, true);
                    break;

                case 'wedding_rentals':
                    $min_budget += $this->getRecommendation($category, $request, true);
                    break;

                case 'catering':
                    $min_budget += $this->getRecommendation($category, $request, true) * ceil($request->input('guest_count') / $guest_count_per_table);
                    break;

                case 'stylist':
                    $min_budget += $this->getRecommendation($category, $request, true) * $request->input('num_of_pax_requiring_stylist');
                    break;

                case 'photography_and_videography':
                    $min_budget += $this->getRecommendation($category, $request, true);
                    break;

                default:
                    break;
            }
        }


        // Venue Filter
        // $venue_min_budget = 
        //     $services
        //     ->where('vendor.business_category', 'venue')
        //     ->where('vendor.state', $request->input('state'))
        //     ->where('service_guest_count', '>=', $request->input('guest_count'))
        //     ->sortBy('service_price')
        //     ->first();

        // if ($venue_min_budget) 
        //     $min_budget += $venue_min_budget->service_price;
            

        // // Wedding Rentals Filter
        // $wedding_rentals_min_budget = 
        //     $services
        //     ->where('vendor.business_category', 'wedding_rentals')
        //     ->where('vendor.state', $request->input('state'))
        //     ->where('service_guest_count', '>=', $request->input('guest_count'))
        //     ->sortBy('service_price')
        //     ->first();

        // if ($wedding_rentals_min_budget) 
        //     $min_budget += $wedding_rentals_min_budget->service_price;


        // // Catering Filter
        // $catering_min_budget = 
        //     $services
        //     ->where('vendor.business_category', 'catering')
        //     ->where('vendor.state', $request->input('state'))
        //     ->sortBy('service_price')
        //     ->first();
        // $guest_count_per_table = 10;

        // if ($catering_min_budget) 
        //     $min_budget += ceil($request->input('guest_count') / $guest_count_per_table) * $catering_min_budget->service_price;


        // // Stylist Filter
        // $stylist_min_budget = 
        //     $services
        //     ->where('vendor.business_category', 'stylist')
        //     ->where('vendor.state', $request->input('state'))
        //     ->sortBy('service_price')
        //     ->first();

        // if ($stylist_min_budget) 
        //     $min_budget += $request->input('num_of_pax_requiring_stylist') * $stylist_min_budget->service_price;


        // // Photo & Videography Filter
        // $photography_min_budget = 
        //     $services
        //     ->where('vendor.business_category', 'photography_and_videography')
        //     ->where('vendor.state', $request->input('state'))
        //     ->sortBy('service_price')
        //     ->first();

        // if ($photography_min_budget) 
        //     $min_budget += $photography_min_budget->service_price;


        return view('wedding_planning-budget_form', ['form_data' => $request->all(), 'min_budget' => number_format($min_budget, 2, '.', '')]);
    }

    public function getRecommendations(Request $request) {

        /* FILTER SERVICE */
        // get 2 choices for each services based on the preferences and requirement entered by user (state, guest count, budget)
        $recommendations = collect();
        $business_category = array("venue", "wedding_rentals", "catering", "stylist", "photography_and_videography");

        foreach ($business_category as $category) {
            $recommendations = $recommendations->concat($this->getRecommendation(
                $category,
                $request,
                false
            ));
        }

        // return $recommendations;
        return view('wedding_planning-recommendation_result', ['recommendations' => $recommendations, 'form_data' => $request->all()]);
    }

    private function getRecommendation($category, $request, $getBudgetOnly) {

        if (!$getBudgetOnly) {
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
            foreach ($budget_allocation as $service_category => $allocation) {
                if ($service_category == $request->input('highest_priority')) {
                    $budget_allocation[$service_category] += $additional_allocation_for_priority;
                }
                else {
                    $budget_allocation[$service_category] -= ($additional_allocation_for_priority / (count($budget_allocation) - 1));
                }
            }


            /* BUDGET CALCULATION */
            // budget calculation for different type of service price unit (eg. price per table, price per pax)
            $budget = $request->input('budget');

            switch ($category) {
                case 'venue':
                    $budget = $budget * $budget_allocation['venue'] / 100;
                    break;

                case 'wedding_rentals':
                    $budget = $budget * $budget_allocation['wedding_rentals'] / 100;
                    break;

                case 'catering':
                    $budget = ($budget * $budget_allocation['catering'] / 100) / ceil($request->input('guest_count') / $guest_count_per_table);
                    break;

                case 'stylist':
                    $budget = ($budget * $budget_allocation['stylist'] / 100) / $request->input('num_of_pax_requiring_stylist');
                    break;

                case 'photography_and_videography':
                    $budget = $budget * $budget_allocation['photography_and_videography'] / 100;
                    break;

                default:
                    break;
            }
        }


        /* FILTER SERVICE */
        // filter service category and state
        $services = Service::with('vendor')->where('service_enable', 1)->get();
        foreach ($services as $service) {
            $vendor_info = json_decode($service->vendor->user_info);
            $service->vendor->state =  $vendor_info->state;
            $service->vendor->business_category =  $vendor_info->business_category;
        }

        $result = $services
                    ->where('vendor.business_category', $category)
                    ->where('vendor.state', $request->input('state'));

        // filter guest count for venue and wedding_rentals
        if ($category == 'venue' || $category == 'wedding_rentals') {
            $result = $result->where('service_guest_count', '>=', $request->input('guest_count'));
        }

        // exclude the services that being declined
        if ($request->has($category) && is_array($request->input($category))) {
            $decline_ids = $request->input($category);
            $result = $result->whereNotIn('id', $decline_ids);
        } 


        if ($getBudgetOnly) {
            $result = $result
                        ->sortBy('service_price')
                        ->first();

            // return price only which for min budget field purpose
            return $result ? $result->service_price : 0; 
        }
        else {
            // filter budget
            $result = $result
                        ->where('service_price', '<=', $budget)
                        ->sortByDesc('service_price')
                        ->take(2);

            // return all result for recommendation choices purpose
            return collect($result);
        }
    }

    // public function store(Request $request) {

    //     return dd($request->all());
    // }
}
