<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function index () {
    $services = Service::all();

    return response()->json([
      'success' => true,
      'results' => $services,
    ]);
  }
}
