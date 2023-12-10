@extends('layouts.penyewa')

@section('content')
    <div class="container">
        <h2>Daftar Penyewaan Saya</h2>
        @if($userRentals && count($userRentals) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Mobil</th>
                        <th>Driver</th>
                        <th>SIM</th>
                        <th>KTP</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userRentals as $rental)
                        <tr>
                            <td>{{ $rental->car->car_type }}</td>       
                            <td>{{ $rental->has_driver ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $rental->sim_image }}</td>
                            <td>{{ $rental->ktp_image }}</td>
                            <td>{{ $rental->payment_proof }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Belum ada penyewaan.</p>
        @endif
    </div>
@endsection
