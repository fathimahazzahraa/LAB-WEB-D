<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;


class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index', compact('drivers'));
    }
    public function index1()
    {
        $drivers = Driver::all();
        return view('penyewa.driver.index', compact('drivers'));
    }


    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'license_picture' => 'required',
        ]);

        Driver::create($request->all());

        return redirect()->route('driver.index') ->with('success', 'Driver created successfully.');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            // Add other validations as needed
        ]);

        $input = $request->all();

        // Handle file upload
        if ($request->hasFile('license_picture')) {
            $image = $request->file('license_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/license_pictures', $imageName);
            $input['license_picture'] = $imageName;
        }

        $driver = Driver::findOrFail($id);
        $driver->update($input);

        return redirect()->route('drivers.index')
            ->with('success', 'Driver updated successfully.');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully.');
    }
}
