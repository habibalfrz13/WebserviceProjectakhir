<?php

namespace App\Http\Controllers;

use App\Models\FotoKerajinan;
use App\Models\Kategori;
use App\Models\Kerajinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KerajinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kerajinan::all();
        return view('dashboard.kerajinan.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kerajinan = Kerajinan::all();
        $category = Kategori::all();
        return view('dashboard.kerajinan.create', [
            'kerajinan' => $kerajinan,
            'category' => $category,
        ]);

      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('bahan', $request->bahan);
        Session::flash('langkah', $request->langkah);
        $this->validate($request, [
            'foto*'     => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'foto'     => 'max:6',
            'judul'     => 'required',
            'deskripsi'     => 'required',
            'bahan_bahan'     => 'required',
            'langkah_langkah'     => 'required',
        ]);

        //upload image
        $data = [
            'id_user'     => Auth::id(),
            'judul'     => $request->judul,
            'id_kategori' => $request->id_kategori,
            'deskripsi'     => $request->deskripsi,
            'bahan_bahan'     => $request->bahan_bahan,
            'langkah_langkah'     => $request->langkah_langkah,
        ];

        $kerajinan = Kerajinan::create($data);
        // menimpan foto  atau gambar ke dalam tabel kerajinan
        $image = $request->file('foto');
        foreach ($image as $images) {
            $images->storeAs('public/kerajinan/', $images->hashName());
            FotoKerajinan::create([
                'id_kerajinan' => $kerajinan->id,
                'foto' => $images->hashName(),
            ]);
        }


        return redirect()->route('kerajinans.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kerajinan = Kerajinan::find($id);
        $fotoKerajinan = FotoKerajinan::where('id_kerajinan', $id)->get();
        return view('dashboard.kerajinan.show', [
            'kerajinan' => $kerajinan,
            'fotoKerajinan' => $fotoKerajinan,
            'title' => 'Detail',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
