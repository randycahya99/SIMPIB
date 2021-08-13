<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Coach;
use App\Models\CategoryCoach;
use App\Models\BidangKeahlian;

class CoachController extends Controller
{
    //Menampilkan Halaman Manajemen Data Coach
    public function Coach()
    {
        $coach = Coach::all();
        $category = CategoryCoach::all();
        $ahli = BidangKeahlian::all();
        
        return view('coach', compact('coach', 'category', 'ahli'));
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

    //Menambahkan Data Coach
    public function addCoach(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_coach' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:coach',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_coach.required' => 'Nama coach tidak boleh kosong',
            'nama_coach.string' => 'Nama coach harus berupa string',
            'nama_coach.max' => 'Nama coach tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.unique' => 'E-mail sudah ada',
            'category_id.required' => 'Kategori coach tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Masuk ke Database
        Coach::create($request->all());

        return redirect('/coach')->with('sukses', 'Data coach berhasil ditambahkan.');
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

    //Mengubah Data Coach
    public function updateCoach(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_coach' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:coach',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_coach.required' => 'Nama coach tidak boleh kosong',
            'nama_coach.string' => 'Nama coach harus berupa string',
            'nama_coach.max' => 'Nama coach tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.unique' => 'E-mail sudah ada',
            'category_id.required' => 'Kategori coach tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Mengubah Data di Database
        $coach = Coach::find($id);
        $coach->update($request->all());

        return redirect('/coach')->with('sukses', 'Data coach berhasil diperbarui.');
    }

    //Menghapus Data Coach
    public function deleteCoach($id)
    {
        //Menghapus Data di Database
        $coach = Coach::find($id);
        $coach->delete();

        return redirect('/coach');
    }
}
