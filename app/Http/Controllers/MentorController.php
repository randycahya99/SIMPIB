<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mentor;
use App\Models\CategoryMentor;
use App\Models\BidangKeahlian;

class MentorController extends Controller
{
    //Menampilkan Halaman Manajemen Data Mentor
    public function Mentor()
    {
        $mentor = Mentor::all();
        $category = CategoryMentor::all();
        $ahli = BidangKeahlian::all();
        
        return view('mentor', compact('mentor', 'category', 'ahli'));
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

    //Menambahkan Data Mentor
    public function addMentor(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:mentor',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_mentor.required' => 'Nama mentor tidak boleh kosong',
            'nama_mentor.string' => 'Nama mentor harus berupa string',
            'nama_mentor.max' => 'Nama mentor tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.unique' => 'E-mail sudah ada',
            'category_id.required' => 'Kategori mentor tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Masuk ke Database
        Mentor::create($request->all());

        return redirect('/mentor')->with('sukses', 'Data mentor berhasil ditambahkan.');
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

    //Mengubah Data Mentor
    public function updateMentor(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|unique:mentor',
            'category_id' => 'required',
            'bidang_id' => 'required'
        ], [
            'nama_mentor.required' => 'Nama mentor tidak boleh kosong',
            'nama_mentor.string' => 'Nama mentor harus berupa string',
            'nama_mentor.max' => 'Nama mentor tidak boleh lebih dari 100 karakter',
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
        $mentor = Mentor::find($id);
        $mentor->update($request->all());

        return redirect('/mentor')->with('sukses', 'Data mentor berhasil diperbarui.');
    }

    //Menghapus Data Mentor
    public function deleteMentor($id)
    {
        //Menghapus Data di Database
        $mentor = Mentor::find($id);
        $mentor->delete();

        return redirect('/mentor');
    }
}
