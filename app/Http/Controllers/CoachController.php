<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use App\User;
use App\Models\Coach;
use App\Models\CategoryCoach;
use App\Models\BidangKeahlian;
use App\Models\JadwalCoaching;

class CoachController extends Controller
{
    // Menampilkan Halaman Manajemen Data Coach
    public function Coach()
    {
        $coach = Coach::all();
        $category = CategoryCoach::all();
        $ahli = BidangKeahlian::all();
        
        return view('coach', compact('coach', 'category', 'ahli'));
    }

    // Menambahkan Data Coach
    public function addCoach(Request $request)
    {
        $token = Str::random();

        // Validasi Inputan Form
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

        // Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        // Menambahkan Data Coach ke Database
        $coach = Coach::create([
            'nama_coach' => $request->nama_coach,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Menyimpan Data Relasi Tabel User Dengan Coach
        $user->coachs()->save($coach);

        // Menambahkan Role Kepada Akun User
        $user->assignRole('coach');

        return redirect('/coach')->with('sukses', 'Data coach berhasil ditambahkan.');
    }

    // Menampilkan Halaman Edit Data Coach
    public function editCoach($id)
    {
        $coach = Coach::find($id);
        $category = CategoryCoach::all();
        $ahli = BidangKeahlian::all();

        // dd($coach);

        return view('editCoach', compact('coach', 'category', 'ahli'));
    }

    // Mengubah Data Coach
    public function updateCoach(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_coach' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email',
            'username' => 'required',
            // 'password' => 'required|min:8',
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
            'username.required' => 'Username tidak boleh kosong',
            // 'password.required' => 'Password tidak boleh kosong',
            // 'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori coach tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        // Mencari Data Sesuai Dengan id
        $coach = Coach::find($id);
        $user = $coach->users;

        // Mengubah Data Coach di Database
        $coach->update([
            'nama_coach' => $request->nama_coach,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Mengubah Data Akun Coach di Database
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        // dd($coach);

        return redirect('/coach')->with('sukses', 'Data coach berhasil diperbarui.');
    }

    // Menghapus Data Coach
    public function deleteCoach($id)
    {
        // Mencari Data Coach di Database
        $coach = Coach::find($id);

        // Mencari Data Akun Coach di Database
        $user = $coach->users;

        // Menghapus Data Coach di Database
        $coach->delete();

        // Menghapus Data Akun Coach di Database
        $user->delete();

        return redirect('/coach');
    }

    // Menampilkan Halaman Jadwal Coaching
    public function JadwalCoaching()
    {
        // Mengambil Data Jadwal dan Tenant Sesuai Dengan Coach yang Sedang Login
        if (Auth::user()->hasRole('coach')) {
            $jadwal = Auth::user()->coachs->jadwalCoachings;
            $tenant = Auth::user()->coachs->tenants;

            // dd($jadwal);

            return view('coaching/jadwal', compact('jadwal','tenant'));
        } else {
            $jadwal = Auth::user()->tenants->jadwalCoachings;
            $coach = Auth::user()->tenants->coachs;

            // dd($jadwal);

            return view('coaching/jadwal', compact('jadwal','coach'));
        }
    }

    // Menambahkan or Membuat Jadwal Coaching
    public function AddJadwalCoaching(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:1000',
            'link' => 'required|max:200',
            'tenant_id' => 'required',
            'coach_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'topik.required' => 'Topik tidak boleh kosong',
            'topik.string' => 'Topik harus berupa string',
            'topik.max' => 'Topik maksimal 1000 karakter',
            'link.required' => 'Link tidak boleh kosong',
            'link.max' => 'Link maksimal 200 karakter',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'coach_id.required' => 'Coach tidak boleh kosong',
        ]);

        // Menambahkan Jadwal ke Database
        $jadwal = JadwalCoaching::create([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link,
            'tenant_id' => $request->tenant_id,
            'coach_id' => $request->coach_id,
        ]);

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Jadwal coaching berhasil dibuat.');
    }

    // Mengubah or Memperbarui Data Jadwal Coaching
    public function UpdateJadwalCoaching(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:1000',
            'link' => 'required|max:200'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'topik.required' => 'Topik tidak boleh kosong',
            'topik.string' => 'Topik harus berupa string',
            'topik.max' => 'Topik maksimal 1000 karakter',
            'link.required' => 'Link tidak boleh kosong',
            'link.max' => 'Link maksimal 200 karakter'
        ]);

        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Mengubah Data Jadwal Coaching di Database
        $jadwal->update([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link
        ]);

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Jadwal coaching berhasil diperbarui.');
    }

    // Membatalkan Jadwal Coaching
    public function BatalkanJadwalCoaching($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Mengubah Status Jadwal Coaching Menjadi Dibatalkan
        $jadwal->status = 'dibatalkan';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Jadwal coaching berhasil dibatalkan.');
    }

    // Menghapus Data Jadwal Coaching
    public function DeleteJadwalCoaching($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Menghapus Jadwal Coaching dari Database
        $jadwal->delete();

        // dd($jadwal);

        return redirect('/jadwalCoaching');
    }

    // Mengubah Status Coaching Menjadi Selesai
    public function SelesaiJadwalCoaching($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Mengubah Status Menjadi Selesai
        $jadwal->status = 'selesai';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Coaching telah selesai dilakukan.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Coaching (for tenant)
    public function KonfirmasiHadirCoaching(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'keterangan' => 'required|string|max:100'
        ], [
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'keterangan.string' => 'Keterangan harus berupa string',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 100 karakter'
        ]);

        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Coaching
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Coaching Menjadi Disetujui oleh Tenant
        $jadwal->status = 'disetujui';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Berhasil mengkonfirmasi kehadiran coaching.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Coaching (for tenant)
    public function TolakHadirCoaching(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'keterangan' => 'required|string|max:100'
        ], [
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'keterangan.string' => 'Keterangan harus berupa string',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 100 karakter'
        ]);

        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalCoaching::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Coaching
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Coaching Menjadi Ditolak oleh Tenant
        $jadwal->status = 'ditolak';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalCoaching')->with('sukses', 'Berhasil mengkonfirmasi kehadiran coaching.');
    }
}
