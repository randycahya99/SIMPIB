<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pendamping;
use App\Models\CategoryPendamping;
use App\Models\BidangKeahlian;

class PendampingController extends Controller
{
    //Menampilkan Halaman Manajemen Data Pendamping
    public function Pendamping()
    {
        $pendamping = Pendamping::all();
        $category = CategoryPendamping::all();
        $ahli = BidangKeahlian::all();
        
        return view('pendamping', compact('pendamping', 'category', 'ahli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //Menambahkan Data Pendamping
    public function addPendamping(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_pendamping' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:pendamping',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_pendamping.required' => 'Nama pendamping tidak boleh kosong',
            'nama_pendamping.string' => 'Nama pendamping harus berupa string',
            'nama_pendamping.max' => 'Nama pendamping tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.unique' => 'E-mail sudah ada',
            'category_id.required' => 'Kategori pendamping tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Masuk ke Database
        Pendamping::create($request->all());

        return redirect('/pendamping')->with('sukses', 'Data pendamping berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    //Mengubah Data Pendamping
    public function updatePendamping(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_pendamping' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:pendamping',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_pendamping.required' => 'Nama pendamping tidak boleh kosong',
            'nama_pendamping.string' => 'Nama pendamping harus berupa string',
            'nama_pendamping.max' => 'Nama pendamping tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.unique' => 'E-mail sudah ada',
            'category_id.required' => 'Kategori pendamping tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Mengubah Data di Database
        $pendamping = Pendamping::find($id);
        $pendamping->update($request->all());

        return redirect('/pendamping')->with('sukses', 'Data pendamping berhasil diperbarui.');
    }

    //Menghapus Data Pendamping
    public function deletePendamping($id)
    {
        //Menghapus Data di Database
        $pendamping = Pendamping::find($id);
        $pendamping->delete();

        return redirect('/pendamping');
    }
}
