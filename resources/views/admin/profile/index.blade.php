@extends('layouts.backend.template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Profil Pengguna</h4>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</p>
                <!-- Tambahkan info lain sesuai kebutuhan -->
            </div>
        </div>
    </div>
@endsection
