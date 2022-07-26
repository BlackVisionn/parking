<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::paginate(6);
        return view('index', compact('cars'));
    }

    public function create(){
        return view('car-form');
    }

    public function store(CarRequest $request){
        $request->merge(array('status'=>$request->has('status')));
        Car::create($request->only(['mark', 'model', 'color', 'car_num', 'id_client', 'status']));
        return redirect()->route('cars.index');
    }

    public function edit(Car $car){
        return view('form', compact('car'));
    }

    public function update(CarRequest $request, Car $car){
        $request->merge(array('status' => $request->has('status')));
        $car->update($request->only(['mark', 'model', 'color', 'car_num', 'id_client', 'status']));
        return redirect()->route('clients.index');
    }

    public function destroy(Car $car){
        $car->delete();
        return redirect()->route('cars.index');
    }
}
