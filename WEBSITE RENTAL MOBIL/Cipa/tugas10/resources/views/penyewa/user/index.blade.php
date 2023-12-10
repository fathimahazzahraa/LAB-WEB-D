@extends('layouts.penyewa')

@section('content')
    <div class="container">
        <h2>User Management</h2>

        <!-- User List -->
        <h3>User List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create or Edit User Form -->
        @if(isset($userToEdit))
            <h3>Edit User:</h3>
            <form method="POST" action="{{ route('users.update', $userToEdit->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $userToEdit->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $userToEdit->email }}" required>
                </div>
            </form>
        @else
            <h3>Create User:</h3>
            <!-- Create User Form -->
            <form method="POST" action="{{ route('users1.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-success">Create User</button>
            </form>
        @endif
    </div>
@endsection
