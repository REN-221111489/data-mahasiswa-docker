<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /* =======================
       DASHBOARD MAHASISWA
    ======================= */
    public function dashboardMahasiswa(Request $request)
    {
        $keyword = $request->search;

        $mahasiswas = Mahasiswa::when($keyword, function ($q) use ($keyword) {
            $q->where('nim', 'like', "%$keyword%")
              ->orWhere('nama_mahasiswa', 'like', "%$keyword%");
        })->get();

        return view('mahasiswa.dashboard', compact('mahasiswas'));
    }

    /* =======================
       DATA DIRI MAHASISWA
    ======================= */
    public function dataDiri()
    {
        $data = Mahasiswa::where('user_id', Auth::id())->first();
        return view('mahasiswa.data-diri', compact('data'));
    }

    public function simpanDataDiri(Request $request)
    {
        $request->validate([
            'nim' => 'required|digits:9|unique:mahasiswas,nim,' . Auth::id() . ',user_id',
            'email' => [
                'required',
                'email',
                'unique:mahasiswas,email,' . Auth::id() . ',user_id',
                'regex:/@students\.mikroskil\.ac\.id$/'
            ],
            'nama_mahasiswa' => 'required|regex:/^[A-Z\s]+$/',
            'nomor_hp' => 'required|digits_between:11,12',
            'fakultas' => 'required|in:informatika,bisnis',
            'prodi' => 'required',
            'kategori_kelas' => 'required|in:pagi,sore',
        ], [
            'nim.unique' => 'NIM sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        Mahasiswa::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->all()
        );

        return redirect('/mahasiswa/dashboard')
            ->with('success', 'Data berhasil disimpan');
    }

    /* =======================
       DASHBOARD OPERATOR
    ======================= */
    public function dashboardOperator(Request $request)
    {
        $keyword = $request->search;

        $mahasiswas = Mahasiswa::when($keyword, function ($q) use ($keyword) {
            $q->where('nim', 'like', "%$keyword%")
              ->orWhere('nama_mahasiswa', 'like', "%$keyword%");
        })->get();

        return view('operator.dashboard', compact('mahasiswas'));
    }

    /* =======================
       TAMBAH DATA (OPERATOR)
    ======================= */
    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|digits:9|unique:mahasiswas,nim',
            'email' => [
                'required',
                'email',
                'unique:mahasiswas,email',
                'regex:/@students\.mikroskil\.ac\.id$/'
            ],
            'nama_mahasiswa' => 'required|regex:/^[A-Z\s]+$/',
            'nomor_hp' => 'required|digits_between:11,12',
            'fakultas' => 'required|in:informatika,bisnis',
            'prodi' => 'required',
            'kategori_kelas' => 'required|in:pagi,sore',
        ], [
            'nim.unique' => 'NIM sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        Mahasiswa::create($request->all());

        return redirect('/operator/dashboard')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /* =======================
       EDIT & UPDATE (OPERATOR)
    ======================= */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('operator.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|digits:9|unique:mahasiswas,nim,' . $id,
            'email' => [
                'required',
                'email',
                'unique:mahasiswas,email,' . $id,
                'regex:/@students\.mikroskil\.ac\.id$/'
            ],
            'nama_mahasiswa' => 'required|regex:/^[A-Z\s]+$/',
            'nomor_hp' => 'required|digits_between:11,12',
            'fakultas' => 'required|in:informatika,bisnis',
            'prodi' => 'required',
            'kategori_kelas' => 'required|in:pagi,sore',
        ]);

        $mahasiswa->update($request->all());

        return redirect('/operator/dashboard')
            ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    /* =======================
       HAPUS DATA (OPERATOR)
    ======================= */
    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
