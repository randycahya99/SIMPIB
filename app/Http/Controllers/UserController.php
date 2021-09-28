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
use App\Models\Tenant;
use App\Models\Usaha;
use App\Models\BidangKeahlian;

class UserController extends Controller
{
    // Menampilkan Halaman Profile User
    public function Profile()
    {
        $pengelola = Auth::user()->pengelolas;
        $pendamping = Auth::user()->pendampings;
        $mentor = Auth::user()->mentors;
        $coach = Auth::user()->coachs;
        $tenant = Auth::user()->tenants;

        // dd($user);
        
        return view('profile', compact('pengelola','pendamping','mentor','coach','tenant'));
    }

    public function EditProfile($id)
    {
        $user = Auth::user($id);
        $ahli = BidangKeahlian::all();
        
        // dd($user);

        return view('editProfile', compact('user','ahli'));
    }

    // Mengubah Data Profile User Admin/Pengelola Inkubator
    public function UpdateProfilePengelola(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_pengelola' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required|email'
        ], [
            'nama_pengelola.required' => 'Nama tidak boleh kosong',
            'nama_pengelola.string' => 'Nama harus berupa string',
            'nama_pengelola.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.string' => 'Jabatan harus berupa string',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)'
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

    // Mengubah Data Profile User Pendamping
    public function UpdateProfilePendamping(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_pendamping' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required|email',
            'bidang_id' => 'required'
        ], [
            'nama_pendamping.required' => 'Nama tidak boleh kosong',
            'nama_pendamping.string' => 'Nama harus berupa string',
            'nama_pendamping.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        $user = Auth::user();
        $pendamping = Auth::user()->pendampings;

        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $pendamping->update([
            'nama_pendamping' => $request->nama_pendamping,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_id' => $request->bidang_id
        ]);

        return redirect('/profile')->with('sukses', 'Profile berhasil diperbarui.');
    }

    // Mengubah Data Profile User Mentor
    public function UpdateProfileMentor(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required|email',
            'bidang_id' => 'required'
        ], [
            'nama_mentor.required' => 'Nama tidak boleh kosong',
            'nama_mentor.string' => 'Nama harus berupa string',
            'nama_mentor.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        $user = Auth::user();
        $mentor = Auth::user()->mentors;

        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $mentor->update([
            'nama_mentor' => $request->nama_mentor,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_id' => $request->bidang_id
        ]);

        return redirect('/profile')->with('sukses', 'Profile berhasil diperbarui.');
    }

    // Mengubah Data Profile User Coach
    public function UpdateProfileCoach(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_coach' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required|email',
            'bidang_id' => 'required'
        ], [
            'nama_coach.required' => 'Nama tidak boleh kosong',
            'nama_coach.string' => 'Nama harus berupa string',
            'nama_coach.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        $user = Auth::user();
        $coach = Auth::user()->coachs;

        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $coach->update([
            'nama_coach' => $request->nama_coach,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_id' => $request->bidang_id
        ]);

        return redirect('/profile')->with('sukses', 'Profile berhasil diperbarui.');
    }

    // Mengubah Data Profile User Tenant
    public function UpdateProfileTenant(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama' => 'required|string',
            'tempat_lahir'=> 'required|string',
            'tanggal_lahir'=> 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|max:13',
            'username' => 'required',
            'email' => 'required|email',
            'nama_usaha' => 'required|string',
            'produk' => 'required|string',
            'alamat_usaha' => 'required|string',
            'no_hp_usaha' => 'required|max:13',
            'email_usaha' => 'required|email',
            'website_usaha' => 'required'
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus berupa string',
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
            'tempat_lahir.string' => 'Tempat lahir harus berupa string',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak sesuai',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'no_hp.required' => 'No. HP tidak boleh kosong',
            'no_hp.max' => 'No. HP maksimal hanya 13 angka',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'nama_usaha.required' => 'Nama usaha tidak boleh kosong',
            'nama_usaha.string' => 'Nama usaha harus berupa string',
            'produk.required' => 'Produk tidak boleh kosong',
            'produk.string' => 'Produk harus berupa string',
            'alamat_usaha.required' => 'Alamat usaha tidak boleh kosong',
            'alamat_usaha.string' => 'Alamat usaha harus berupa string',
            'no_hp_usaha.required' => 'No. Telp usaha tidak boleh kosong',
            'no_hp_usaha.max' => 'No. Telp usaha maksimal hanya 13 angka',
            'email_usaha.required' => 'E-mail usaha tidak boleh kosong',
            'email_usaha.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'website_usaha.required' => 'Website usaha tidak boleh kosong'
        ]);

        $user = Auth::user();
        $tenant = Auth::user()->tenants;
        $usaha = Auth::user()->tenants->usahas;

        // dd($usaha);

        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $tenant->update([
            'nama' => $request->nama,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        $usaha->update([
            'nama_usaha' => $request->nama_usaha,
            'produk' => $request->produk,
            'alamat_usaha' => $request->alamat_usaha,
            'no_hp_usaha' => $request->no_hp_usaha,
            'email_usaha' => $request->email_usaha,
            'website_usaha' => $request->website_usaha
        ]);

        return redirect('/profile')->with('sukses', 'Profile berhasil diperbarui.');
    }
}
