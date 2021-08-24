<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\User;
use App\Models\Pengelola;

class AdminController extends Controller
{
    //Menampilkan Halaman Manajemen Data Admin/Pengelola
    public function Admin()
    {
        $pengelola = Pengelola::all();
        
        return view('admin', compact('pengelola'));
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

    //Menambahkan Data Admin/Pengelola
    public function addAdmin(Request $request)
    {
        $token = Str::random();
        
        //Validasi Inputan Form
        $request->validate([
            'nama_pengelola' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'no_hp' => 'required|max:13',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'nama_pengelola.required' => 'Nama pengelola tidak boleh kosong',
            'nama_pengelola.string' => 'Nama pengelola harus berupa string',
            'nama_pengelola.max' => 'Nama pengelola tidak boleh lebih dari 100 karakter',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.string' => 'Jabatan harus berupa string',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'email.unique' => 'Alamat E-mail sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        //Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        //Menambahkan Data Pengelola ke Database
        $pengelola = Pengelola::create([
            'nama_pengelola' => $request->nama_pengelola,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp
        ]);

        //Menyimpan Data Relasi Tabel User Dengan Pengelola
        $user->pengelolas()->save($pengelola);

        //Menambahkan Role Kepada Akun User
        $user->assignRole('admin');

        return redirect('/admin')->with('sukses', 'Data Admin berhasil ditambahkan.');
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

    //Mengubah Data Admin/Pengelola
    public function updateAdmin(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_pengelola' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required'
        ], [
            'nama_pengelola.required' => 'Nama pengelola tidak boleh kosong',
            'nama_pengelola.string' => 'Nama pengelola harus berupa string',
            'nama_pengelola.max' => 'Nama pengelola tidak boleh lebih dari 100 karakter',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.string' => 'Jabatan harus berupa string',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong'
        ]);

        //Mencari Data Sesuai Dengan id
        $pengelola = Pengelola::find($id);
        $user = $pengelola->users;
        
        //Mengubah Data Admin/Pengelola di Database
        $pengelola->update([
            'nama_pengelola' => $request->nama_pengelola,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp
        ]);

        //Mengubah Data Akun Admin/Pengelola di Database
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/admin')->with('sukses', 'Data Admin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAdmin($id)
    {
        //Mencari Data Admin/Pengelola di Database
        $pengelola = Pengelola::find($id);

        //Mencari Data Akun Admin di Database
        $user = $pengelola->users;

        //Menghapus Data Admin/Pengelola di Database
        $pengelola->delete();

        //Menghapus Data Akun Admin di Database
        $user->delete();

        return redirect('/admin');
    }
}
