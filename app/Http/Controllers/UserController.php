<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use App\User;
use App\Models\Pengelola;
use App\Models\Coach;
use App\Models\Mentor;
use App\Models\Pendamping;

class UserController extends Controller
{
    //Menampilkan Halaman Profile User
    public function Profile()
    {
        $user = Auth::user()->pengelolas;

        // dd($user);
        
        return view('profile', compact('user'));
    }

    public function EditProfile($id)
    {
        $user = Auth::user($id);
        
        // dd($user);

        return view('editProfile', compact('user'));
    }

    public function UpdateProfilePengelola(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'nama_pengelola' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required'
        ], [
            'nama_pengelola.required' => 'Nama tidak boleh kosong',
            'nama_pengelola.string' => 'Nama harus berupa string',
            'nama_pengelola.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.string' => 'Jabatan harus berupa string',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email' => 'E-mail tidak boleh kosong'
        ]);

        $user = Auth::user();
        $pengelola = Auth::user()->pengelolas;

        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $pengelola->update([
            'nama_pengelola' => $request->nama_pengelola,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/profile')->with('sukses', 'Profile berhasil diperbarui.');
    }
}
