<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
    public function index1()
    {
        $cars = Car::all();
        return view('penyewa.cars.index', compact('cars'));
    }
    
    public function create()
    {
        return view('cars.create');
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'car_type' => 'required',
            'price_per_hour' => 'required|numeric',
            'number_license' => 'required',
            'image' => 'image|file|max:1024',
        ]);
    
        Car::create($request->all());

        if ($request->file('image')) {
            $car['image'] = $request->file('image')->store('post-images');
        }
    
        return redirect()->route('cars.index')->with('success', 'Car added successfully');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }
    public function show1($id)
    {
        $car = Car::findOrFail($id);
        return view('penyewa.cars.show', compact('car'));
    }
}
