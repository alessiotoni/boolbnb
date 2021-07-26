<?php

namespace App\Http\Controllers\logged;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Message;
use App\Service;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index()
    {
        //
    }

    public function create() {
        $services = Service::all();

        return view('logged.accomodation.create', compact('services'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|min:5|max:85',
            'description' => 'required|string|min:5|max:2000',
            'number_rooms' => 'required|integer|min:1|max:20',
            'number_bathrooms' => 'required|integer|min:1|max:20',
            'number_beds' => 'required|integer|min:1|max:20',
            'square_mts' => 'required|integer|min:10|max:1000|',
            'visibility' => 'nullable|bool',
            'country' => 'required|string|min:3|max:50',
            'city' => 'required|string|min:3|max:50',
            'province' => 'required|string|min:3|max:50',
            'zip' => 'required|string|size:5',
            'street_name' => 'required|string|min:3|max:150',
            'building_number' => 'required|string|min:1|max:10000',
            'placeholder' => 'nullable|string|min:1|max:200',
            'price_per_night' => 'required|integer|min:10|max:500',
            'check_in' => 'required|integer|min:0|max:23',
            'check_out' => 'required|integer|min:0|max:23'
        ]);

        $data = $request->all();

        $new_accomodation = new Accomodation();

        $new_accomodation->lat = 90.00;

        $new_accomodation->long = 90.00;

        $new_accomodation->fill($data);

        $new_accomodation->user_id = $request->user()->id;

        $new_accomodation->save();

        if (isset($data['services'])) {
            $new_accomodation->services()->sync($data['services']);
        }

        return redirect()->route('logged.show', $new_accomodation->id);
    }

    public function show($id) {
        $accomodation = Accomodation::findOrFail($id);

        $messages = Message::where('accomodation_id', $id)->get();

        return view('logged.accomodation.show', ['accomodation' => $accomodation, 'messages' => $messages]);
    }

    public function edit($id) {
        $accomodation = Accomodation::findOrFail($id);

        $services = Service::all();

        // if(!key_exists('services', $accomodation))

        return view('logged.accomodation.edit', ['accomodation'=> $accomodation, 'services' => $services]);
    }

    public function update(Request $request, $id) {
        $accomodation = Accomodation::findOrFail($id);

        $request->validate([
            'title' => 'required|string|min:5|max:85',
            'description' => 'required|string|min:5|max:2000',
            'number_rooms' => 'required|integer|min:1|max:20',
            'number_bathrooms' => 'required|integer|min:1|max:20',
            'number_beds' => 'required|integer|min:1|max:20',
            'square_mts' => 'required|integer|min:10|max:1000|',
            'visibility' => 'nullable|bool',
            'country' => 'required|string|min:3|max:50',
            'city' => 'required|string|min:3|max:50',
            'province' => 'required|string|min:3|max:50',
            'zip' => 'required|string|size:5',
            'street_name' => 'required|string|min:3|max:150',
            'building_number' => 'required|string|min:1|max:10000',
            'placeholder' => 'nullable|string|min:1|max:200',
            'price_per_night' => 'required|integer|min:10|max:500',
            'check_in' => 'required|integer|min:0|max:23',
            'check_out' => 'required|integer|min:0|max:23'
        ]);

        $data = $request->all();

        $accomodation->update($data);

        if (isset($data['services'])) {
            $accomodation->services()->sync($data['services']);
        }

        return redirect()->route('logged.show', $id);
    }

    public function destroy($id) {
        $accomodation = Accomodation::findOrFail($id);

        $user_id = $accomodation->user_id;

        $accomodation->services()->detach();

        $accomodation->messages()->delete();

        $accomodation->views()->delete();

        // $accomodation->images()->delete();
        // $accomodation->sponsorhip()->detach();

        $accomodation->delete();

        return redirect()->route('logged.dashboard', $user_id);
    }

    // public function filter(Request $request) {
    //     $filters = $request->all();

        

    //     $accomodations = Accomodation::join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
    //         ->where("accomodation_service.service_id", $filters["services"])->get();

    //     return redirect()->route("logged.accomodation.show")->with(["accomodations" => $accomodations]);
    // }
}
