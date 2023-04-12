<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Application|Factory|View
    {
        $doctors = DokterModel::latest()->filter($request->keyword)->paginate(5)->withQueryString();

        return view('dokter.dokter')
            ->with('title', 'Data Dokter')
            ->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view('dokter.tambah-dokter')
            ->with('title', 'Tambah Dokter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'spesialis' => 'required|string|max:50',
            'pengalaman' => 'required|max_digits:2',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|digits_between:6,15'
        ]);

        DokterModel::create($request->except(['_token']));
        return redirect('dokter')
            ->with('success', 'Dokter Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Application|Factory|View
    {
        $doctor = DokterModel::find($id);
        return view('dokter.edit-dokter')
            ->with('title', 'Ubah Dokter')
            ->with('doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'spesialis' => 'required|string|max:50',
            'pengalaman' => 'required|max_digits:2',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|digits_between:6,15'
        ]);

        DokterModel::where('id', '=', $id)->update($request->except(['_token', '_method']));

        return redirect('dokter')
            ->with('success', 'Dokter Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        DokterModel::where('id', '=', $id)->delete();
        return redirect('dokter')
            ->with('success', 'Dokter Berhasil Dihapus');
    }
}

