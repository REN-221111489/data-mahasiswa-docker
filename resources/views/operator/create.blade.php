@extends('layouts.app')

@section('title', 'Tambah Data Mahasiswa')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Tambah Data Mahasiswa
    </div>

    <div class="card-body">

        <form method="POST" action="{{ url('/operator/mahasiswa') }}">
            @csrf

            @include('operator.form')

            <div class="text-end">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ url('/operator/dashboard') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
