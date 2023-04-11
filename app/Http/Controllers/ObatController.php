<?php

namespace App\Http\Controllers;

use App\Models\obatModel;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = obatModel::all();
        return view('obat')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            // 'nama' => 'required|string|max:50',
            // 'jk' => 'required|in:l,p',
            // 'tempat_lahir' => 'required|string|max:50',
            // 'tanggal_lahir' => 'required|date',
            // 'alamat' => 'required|string|max:225',
            // 'hp' => 'required|digits_between:6, 15',

            'nama_obat' => 'required|string|max:20|unique:obat',
            'jenis' => 'required|string|max:10',
            'dosis' => 'required|string|max:10',
            'harga' => 'required|string|max:30'

        ]);
        $date = obatModel::create($request->except(['_token']));
        // Jika data berhasil ditambahkan, akan kembali kehalaman utama
        return redirect('obat')
        ->with('success', 'Obat Berhasil ditambahkan');
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
        return view('obat')
        ->with('obat', $obat)
            ->with('url_form', url('/obat/' . $id));
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
            // 'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $id,
            // 'nama' => 'required|string|max:50',
            // 'jk' => 'required|in:l,p',
            // 'tempat_lahir' => 'required|string|max:50',
            // 'tanggal_lahir' => 'required|date',
            // 'alamat' => 'required|string|max:225',
            // 'hp' => 'required|digits_between:6, 15',

            'nama_obat' => 'required|string|max:20|unique:obat',
            'jenis' => 'required|string|max:10',
            'dosis' => 'required|string|max:10',
            'harga' => 'required|string|max:30'

        ]);
        $date = obatModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        // Jika data berhasil ditambahkan, akan kembali kehalaman utama
        return redirect('obat')
        ->with('success', 'Obat Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        obatModel::where('id', '=', $id)->delete();
        return redirect('obat')
        ->with('success', 'Obat berhasil dihapus');
    }
}
