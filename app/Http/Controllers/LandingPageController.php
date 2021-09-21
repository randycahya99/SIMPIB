<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FotoSlider;

class LandingPageController extends Controller
{
    // Menampilkan Halaman Landing Page
    public function LandingPage()
    {
        $foto = FotoSlider::all();

        return view('landing', compact('foto'));
    }

    // Menampilkan Halaman Manajemen Foto Slider Landing Page
    public function FotoSlider()
    {
        $foto = FotoSlider::all();

        return view('landing/slider', compact('foto'));
    }

    // Menambahkan Foto Slider Landing Page
    public function AddFotoSlider(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'foto' => 'required|mimes:jpeg,png,jpg',
            'keterangan' => 'required|string'
        ], [
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Format foto tidak sesuai (harus jpeg/png/jpg)',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'keterangan.string' => 'Keterangan harus berupa string'
        ]);

        // Menyimpan Foto/Gambar ke Dalam Folder Public
        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('landing'), $imgName);

        // Menambahkan Data ke Database
        FotoSlider::create([
            'foto' => $imgName,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/fotoSlider')->with('sukses', 'Foto berhasil ditambahkan.');
    }

    // Menghapus Foto Slider Landing Page
    public function DeleteFotoSlider($id)
    {
        // Mencari Data Sesuai dengan id
        $foto = FotoSlider::findorfail($id);

        $file = public_path('/landing/').$foto->foto;

        // Cek Jika Ada Foto
        if (file_exists($file)) {
            // Menghapus Foto dari File
            @unlink($file);
        }

        // Menghapus Data di Database
        $foto->delete();

        return redirect('/fotoSlider');
    }
}
