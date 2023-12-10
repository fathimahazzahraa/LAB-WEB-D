<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $userRentals = Rental::all();
        return view('rentals.index', compact('userRentals'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('rentals.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'has_driver' => 'required|boolean',
            'sim_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validations as needed
        ]);
    
        // Handle file uploads and save rental data
        $user = Auth::user();

        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->car_id = $request->car_id;
        $rental->has_driver = $request->has_driver;
        $rental->sim_image = $request->file('sim_image')->store('sim_images', 'public');
        $rental->ktp_image = $request->file('ktp_image')->store('ktp_images', 'public') ?? null;
        $rental->payment_proof = $request->file('payment_proof')->store('payment_proofs', 'public') ?? null;
    
        // Handle sim_image upload and save path
        if ($request->hasFile('sim_image')) {
            $simPath = $request->file('sim_image')->store('sim_images', 'public');
            $rental->sim_image = $simPath;
        }
    
        // ... Handle ktp_image, payment_proof, and other fields
    
        // Save the rental record
        $rental->save();
    
        return redirect()->route('rentals.index')
            ->with('success', 'Pemesanan berhasil dikirim. Menunggu konfirmasi.');
    }
    public function index1()
    {
        $userRentals = Rental::all();
        return view('penyewa.rentals.index', compact('userRentals'));
    }

    public function create1()
    {
        $cars = Car::all();
        return view('penyewa.rentals.create', compact('cars'));
    }

    public function store1(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'has_driver' => 'required|boolean',
            'sim_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validations as needed
        ]);
    
        // Handle file uploads and save rental data
        $user = Auth::user();

        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->car_id = $request->car_id;
        $rental->has_driver = $request->has_driver;
        $rental->sim_image = $request->file('sim_image')->store('sim_images', 'public');
        $rental->ktp_image = $request->file('ktp_image')->store('ktp_images', 'public') ?? null;
        $rental->payment_proof = $request->file('payment_proof')->store('payment_proofs', 'public') ?? null;
    
        // Handle sim_image upload and save path
        if ($request->hasFile('sim_image')) {
            $simPath = $request->file('sim_image')->store('sim_images', 'public');
            $rental->sim_image = $simPath;
        }
    
        // ... Handle ktp_image, payment_proof, and other fields
    
        // Save the rental record
        $rental->save();
    
        return redirect()->route('payments1.index')
            ->with('success', 'Pemesanan berhasil dikirim. Menunggu konfirmasi.');
    }
    
}
