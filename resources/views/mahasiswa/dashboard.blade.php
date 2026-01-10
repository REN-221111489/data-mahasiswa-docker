@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Dashboard Mahasiswa</h4>

    <a href="{{ url('/mahasiswa/data-diri') }}" class="btn btn-primary btn-sm">
        Data Diri
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm mb-3">
    <div class="card-body">
        <form method="GET">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari NIM atau Nama Mahasiswa..."
                value="{{ request('search') }}"
            >
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Nama Mahasiswa</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($mahasiswas as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->nama_mahasiswa }}</td>
                    <td>{{ ucfirst($mhs->fakultas) }}</td>
                    <td>{{ $mhs->prodi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data tidak ditemukan
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

