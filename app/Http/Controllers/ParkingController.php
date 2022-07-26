<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;


class ParkingController extends Controller
{
    public function index(){
        $cars = Car::paginate(6);
        return view('parking', compact('cars'));
    }

}
