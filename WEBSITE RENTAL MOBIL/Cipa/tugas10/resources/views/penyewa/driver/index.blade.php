@extends('layouts.penyewa')

@section('content')
    <div class="container">
        <h2>Driver Management</h2>

        <!-- List Drivers -->
        <h3>List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>License Picture</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->gender }}</td>
                        <td>{{ $driver->license_picture }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
