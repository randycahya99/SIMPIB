<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\User;
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
        $token = Str::random();

        //Validasi Inputan Form
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
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
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'email.unique' => 'E-mail sudah digunakan',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori mentor tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        //Menambahkan Data Mentor ke Database
        $mentor = Mentor::create([
            'nama_mentor' => $request->nama_mentor,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        //Menyimpan Data Relasi Tabel User Dengan Mentor
        $user->mentors()->save($mentor);

        //Menambahkan Role Kepada Akun User
        $user->assignRole('mentor');

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

    //Menampilkan Halaman Edit Data Mentor
    public function editMentor($id)
    {
        $mentor = Mentor::find($id);
        $category = CategoryMentor::all();
        $ahli = BidangKeahlian::all();

        // dd($mentor);

        return view('editMentor', compact('mentor', 'category', 'ahli'));
    }

    //Mengubah Data Mentor
    public function updateMentor(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email',
            'username' => 'required',
            // 'password' => 'required|min:8',
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
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'username.required' => 'Username tidak boleh kosong',
            // 'password.required' => 'Password tidak boleh kosong',
            // 'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori mentor tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        //Mencari Data Sesuai Dengan id
        $mentor = Mentor::find($id);
        $user = $mentor->users;

        //Mengubah Data Mentor di Database
        $mentor->update([
            'nama_mentor' => $request->nama_mentor,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        //Mengubah Data Akun Mentor di Database
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        // dd($mentor);

        return redirect('/mentor')->with('sukses', 'Data mentor berhasil diperbarui.');
    }

    //Menghapus Data Mentor
    public function deleteMentor($id)
    {
        //Mencari Data Mentor di Database
        $mentor = Mentor::find($id);

        //Mencari Data Akun Mentor di Database
        $user = $mentor->users;

        //Menghapus Data Mentor di Database
        $mentor->delete();

        //Menghapus Data Akun Mentor di Database
        $user->delete();

        return redirect('/mentor');
    }
}
