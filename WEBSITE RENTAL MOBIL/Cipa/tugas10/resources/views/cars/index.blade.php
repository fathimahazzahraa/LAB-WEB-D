@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="container">
        <h2>Daftar Mobil</h2>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                        @else
                            {{-- Sediakan gambar default atau alternatif jika tidak ada gambar tersedia --}}
                            <img src="{{ asset('path/to/default/image.jpg') }}" class="card-img-top" alt="{{ $car->car_type }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->car_type }}</h5>
                            <!-- Tampilkan kolom-kolom lain jika diperlukan -->
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="btn btn-success">Sewa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2>Tambah Mobil Baru</h2>
        <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="car_type">Tipe Mobil:</label>
                <input type="text" class="form-control" name="car_type" required>
            </div>
            <div class="form-group">
                <label for="price_per_hour">Harga per Jam:</label>
                <input type="number" class="form-control" name="price_per_hour" required>
            </div>
            <div class="form-group">
                <label for="number_license">Nomor Lisensi:</label>
                <input type="text" class="form-control" name="number_license" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar Mobil:</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image" required>
            </div>

            <!-- Tambahkan input untuk kolom-kolom lain jika diperlukan -->
            <button type="submit" class="btn btn-primary">Tambah Mobil</button>
        </form>
    </div>
@endsection
