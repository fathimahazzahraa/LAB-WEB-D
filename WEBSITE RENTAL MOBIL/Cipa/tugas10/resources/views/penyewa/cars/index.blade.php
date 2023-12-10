@extends('layouts.penyewa')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="container">
        <h2>Daftar Mobil</h2>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->car_type }}">
                        @else
                            {{-- Sediakan gambar default atau alternatif jika tidak ada gambar tersedia --}}
                            <img src="{{ asset('path/to/default/image.jpg') }}" class="card-img-top" alt="{{ $car->car_type }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->car_type }}</h5>
                            <!-- Tampilkan kolom-kolom lain jika diperlukan -->
                            <a href="{{ route('cars1.show', $car->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('rentals1.create', ['car_id' => $car->id]) }}" class="btn btn-success">Sewa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
