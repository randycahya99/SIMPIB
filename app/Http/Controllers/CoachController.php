<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\User;
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
        $token = Str::random();

        //Validasi Inputan Form
        $request->validate([
            'nama_coach' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
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
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'email.unique' => 'E-mail sudah digunakan',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori coach tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        //Menambahkan Data Coach ke Database
        $coach = Coach::create([
            'nama_coach' => $request->nama_coach,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        //Menyimpan Data Relasi Tabel User Dengan Coach
        $user->coachs()->save($coach);

        //Menambahkan Role Kepada Akun User
        $user->assignRole('coach');

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
        //Mencari Data Coach di Database
        $coach = Coach::find($id);

        //Mencari Data Akun Coach di Database
        $user = $coach->users;

        //Menghapus Data Coach di Database
        $coach->delete();

        //Menghapus Data Akun Coach di Database
        $user->delete();

        return redirect('/coach');
    }
}
