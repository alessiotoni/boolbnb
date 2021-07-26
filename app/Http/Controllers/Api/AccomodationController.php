<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    
    
    

    public function index()
    {    
        $accomodations = Accomodation::with('user')->with('sponsorship')->with('services')->paginate(10);

        foreach ($accomodations as $accomodation) {
            $accomodation->link = route('guest.show', ['id' => $accomodation->id]);
        }

        return response()->json([
            'success' => true,
            'results' => $accomodations,
        ]);
    }

    public function filter(Request $request)
    {
        $filters = $request->only(["number_beds", "number_rooms", "services", "city"]);
        
        $result = Accomodation::with(["services"]);
        foreach($filters as $filter => $value) {
            if($filter === 'number_beds') {
                if (!is_array($value)) {
                    $value = explode(",", $value);
                }
                $result->whereIn("number_beds", $value);

            }else if ($filter === "services") {
                if (!is_array($value)) {
                  $value = explode(",", $value);
                }
        
                $result->join("accomodation_service", "accomodations.id", "=", "accomodation_service.service_id")
                  ->whereIn("accomodation_service.service_id", $value);
            }  else {
                $result->where($filter, "LIKE", "%$value%");
            }

        }

        $accomodations = $result->get();
        return response()->json([
            "success" => true,
            "filters" => $filters,
            "query" => $result->getQuery()->toSql(),
            "results" => $accomodations
        ]);


        
    }
    

}
