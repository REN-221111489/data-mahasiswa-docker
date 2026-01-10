@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        Edit Data Mahasiswa
    </div>

    <div class="card-body">

        <form method="POST" action="{{ url('/operator/mahasiswa/'.$mahasiswa->id) }}">
            @csrf
            @method('PUT')

            @include('operator.form')

            <div class="text-end">
                <button class="btn btn-warning">Update</button>
                <a href="{{ url('/operator/dashboard') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
