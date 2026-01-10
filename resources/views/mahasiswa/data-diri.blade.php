@extends('layouts.app')

@section('title', 'Data Diri Mahasiswa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Data Diri Mahasiswa
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/mahasiswa/data-diri') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control"
                            value="{{ old('nim', $data->nim ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $data->email ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" name="nama_mahasiswa" class="form-control"
                            value="{{ old('nama_mahasiswa', $data->nama_mahasiswa ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="nomor_hp" class="form-control"
                            value="{{ old('nomor_hp', $data->nomor_hp ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <select name="fakultas" class="form-select">
                            <option value="">-- Pilih Fakultas --</option>
                            <option value="informatika"
                                @selected(old('fakultas', $data->fakultas ?? '') == 'informatika')>
                                Informatika
                            </option>
                            <option value="bisnis"
                                @selected(old('fakultas', $data->fakultas ?? '') == 'bisnis')>
                                Bisnis
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control"
                            value="{{ old('prodi', $data->prodi ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Kelas</label>
                        <select name="kategori_kelas" class="form-select">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="pagi"
                                @selected(old('kategori_kelas', $data->kategori_kelas ?? '') == 'pagi')>
                                Pagi
                            </option>
                            <option value="sore"
                                @selected(old('kategori_kelas', $data->kategori_kelas ?? '') == 'sore')>
                                Sore
                            </option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('/mahasiswa/dashboard') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button class="btn btn-primary">
                            {{ isset($data) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
