<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FotoSlider;
use App\Models\ProductTenant;

class LandingPageController extends Controller
{
    // Menampilkan Halaman Landing Page
    public function LandingPage()
    {
        $foto = FotoSlider::all();
        $product = ProductTenant::all();

        return view('landing', compact('foto','product'));
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
            'judul' => 'required|string',
            'sub_judul' => 'required|string'
        ], [
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Format foto tidak sesuai (harus jpeg/png/jpg)',
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.string' => 'Judul harus berupa string',
            'sub_judul.required' => 'Sub judul tidak boleh kosong',
            'sub_judul.string' => 'Sub judul harus berupa string'
        ]);

        // Menyimpan Foto/Gambar ke Dalam Folder Public
        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('landing'), $imgName);

        // Menambahkan Data ke Database
        FotoSlider::create([
            'foto' => $imgName,
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul
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

    // Menampilkan Halaman Manajemen Produk Tenant u/ di Landing Page
    public function ProdukTenant()
    {
        $product = ProductTenant::all();

        return view('landing/produkTenant', compact('product'));
    }

    // Menambahkan Data Produk Tenant u/ Landing Page
    public function AddProdukTenant(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'foto' => 'required|mimes:jpeg,png,jpg',
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string'
        ], [
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Format foto tidak sesuai (harus jpeg/png/jpg)',
            'nama_produk.required' => 'Nama produk tidak boleh kosong',
            'nama_produk.string' => 'Nama produk harus berupa string',
            'deskripsi.required' => 'Deskripsi judul tidak boleh kosong',
            'deskripsi.string' => 'Deskripsi judul harus berupa string'
        ]);

        // Menyimpan Foto/Gambar ke Dalam Folder Public
        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('landing'), $imgName);

        // Menambahkan Data ke Database
        ProductTenant::create([
            'foto' => $imgName,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/produkTenant')->with('sukses', 'Data produk tenant berhasil ditambahkan.');
    }

    // Menghapus Data Produk Tenant Landing Page
    public function DeleteProdukTenant($id)
    {
        // Mencari Data Sesuai dengan id
        $foto = ProductTenant::findorfail($id);

        $file = public_path('/landing/').$foto->foto;

        // Cek Jika Ada Foto
        if (file_exists($file)) {
            // Menghapus Foto dari File
            @unlink($file);
        }

        // Menghapus Data di Database
        $foto->delete();

        return redirect('/produkTenant');
    }
}
