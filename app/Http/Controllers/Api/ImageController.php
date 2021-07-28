<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    
    public function index ($id) {
        $result = []; 
        $accomodation = Accomodation::find($id);
        $placeholder = $accomodation->placeholder;
        $result[] = $placeholder;
        $images = Image::where('accomodation_id', $id)->get();

        if(count($images)  > 0 )  {
            foreach($images as $image) {
                $result[] = $image;
            }
        }

        return response()->json([
            'success' => true,
            'results' => $result,
        ]);
    }
}
