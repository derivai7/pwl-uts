<?php

namespace App\Http\Controllers;

use App\Models\ObatModel;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Application|Factory|View
    {
        $obat = ObatModel::latest()->filter($request->keyword)->paginate(5)->withQueryString();

        return view('obat.obat')
            ->with('title', 'Daftar Obat')
            ->with('obat', $obat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('mahasiswa.create_mahasiswa')
    //     ->with('url_form', url('/mahasiswa'));
    // }
    public function create(): Application|Factory|View
    {
        return view('obat.tambah-obat')
            ->with('title', 'Tambah Obat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_obat' => 'required|string|max:20',
            'jenis' => 'required|string|max:10',
            'dosis' => 'required|string|max:10',
            'harga' => 'required|string|max:30'

        ]);
        obatModel::create($request->except(['_token']));
        return redirect('obat')
            ->with('success', 'Obat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(obatModel $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($mahasiswa->get());
        $obat = obatModel::find($id);
        return view('obat.edit-obat')
            ->with('title', 'Ubah Obat')
            ->with('obat', $obat);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:20',
            'jenis' => 'required|string|max:10',
            'dosis' => 'required|string|max:10',
            'harga' => 'required|string|max:30'

        ]);
        obatModel::where('id', '=', $id)->update($request->except(['_token', '_method']));

        return redirect('obat')
            ->with('success', 'Obat Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : RedirectResponse
    {
        obatModel::where('id', '=', $id)->delete();
        return redirect('obat')
        ->with('success', 'Obat berhasil dihapus');
    }
}
