<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\ClientRequest;
use App\Models\Car;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $cars = Car::paginate(6);
        return view('index', compact('cars'));
    }

    public function create(){
        return view('client-form');
    }

    public function store(ClientRequest $request){
        Client::create($request->only(['fio', 'gender', 'phone', 'address']));
        return redirect()->route('cars.create');
    }

    public function update(ClientRequest $request, Client $client){
        $client->update($request->only(['fio', 'gender', 'phone', 'address']));
        return redirect()->route('clients.index');
    }

}
