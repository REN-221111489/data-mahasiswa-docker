@extends('layouts.app')

@section('title', 'Dashboard Operator')

@section('content')

<div class="card shadow-sm mb-4">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Mahasiswa</h5>

        <a href="{{ url('/operator/mahasiswa/create') }}" class="btn btn-primary btn-sm">
            + Tambah Data Mahasiswa
        </a>
    </div>
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
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($mahasiswas as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->nama_mahasiswa }}</td>
                    <td>{{ $mhs->nomor_hp }}</td>
                    <td>{{ ucfirst($mhs->fakultas) }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ ucfirst($mhs->kategori_kelas) }}</td>
                    <td class="text-center">
                        <a href="{{ url('/operator/mahasiswa/'.$mhs->id.'/edit') }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ url('/operator/mahasiswa/'.$mhs->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        Data tidak ditemukan
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
