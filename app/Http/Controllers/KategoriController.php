<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('dashboard.kategori.index', [
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
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FacadesSession::flash('kategori', $request->kategori);
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'kategori'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/kategori/', $image->hashName());
        $data = [
            'nama_kategori' => $request->kategori,
            'foto' => $image->hashName(),
        ];

        Kategori::create($data);
        return redirect()->route('kategoris.index')->with('success', 'Data Berhasil Disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $kategori = Kategori::find($id);

    if (!$kategori) {
        return redirect()->route('kategoris.index')->with('error', 'Category not found');
    }

    return view('dashboard.kategori.show', compact('kategori'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('dashboard.kategori.edit', [
            'data' => $data,
        ]);
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
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'kategori'     => 'required',
        ]);

        $data = Kategori::find($id);

        // cek apakah Update Gambar atau tidak
        if ($request->hasFile('image')) {

            //Upload Gambar baru kedalam Folder
            $image = $request->file('image');
            $image->storeAs('/public/kategori/', $image->hashName());

            //Hapus Gambar Lama yang ada di folder
            Storage::delete('/public/kategori/' . $data->foto);

            //update data dengan gambar
            $data->update([
                'foto'     => $image->hashName(),
                'nama_kategori' => $request->kategori,
            ]);
        } else {

            //update data tanpa gambar
            $data->update([
                'nama_kategori' => $request->kategori,
            ]);
        }
        return redirect()->route('kategoris.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data  = Kategori::find($id);
        Storage::delete('public/kategori/' . $data->foto);
        $data->delete();
        return redirect()->route('kategoris.index')->with(['success' => 'Berhasil Dihapus']);
    }
}
