<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use App\User;
use App\Models\Pendamping;
use App\Models\CategoryPendamping;
use App\Models\BidangKeahlian;
use App\Models\JadwalPendampingan;

class PendampingController extends Controller
{
    // Menampilkan Halaman Manajemen Data Pendamping
    public function Pendamping()
    {
        $pendamping = Pendamping::all();
        $category = CategoryPendamping::all();
        $ahli = BidangKeahlian::all();
        
        return view('pendamping', compact('pendamping', 'category', 'ahli'));
    }

    // Menambahkan Data Pendamping
    public function addPendamping(Request $request)
    {
        $token = Str::random();

        // Validasi Inputan Form
        $request->validate([
            'nama_pendamping' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
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
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'email.unique' => 'E-mail sudah digunakan',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori pendamping tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        // Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        // Menambahkan Data Pendamping ke Database
        $pendamping = Pendamping::create([
            'nama_pendamping' => $request->nama_pendamping,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Menyimpan Data Relasi Tabel User Dengan Pendamping
        $user->pendampings()->save($pendamping);

        // Menambahkan Role Kepada Akun User
        $user->assignRole('pendamping');

        return redirect('/pendamping')->with('sukses', 'Data pendamping berhasil ditambahkan.');
    }

    // Menampilkan Halaman Edit Data Pendamping
    public function editPendamping($id)
    {
        $pendamping = Pendamping::find($id);
        $category = CategoryPendamping::all();
        $ahli = BidangKeahlian::all();

        // dd($pendamping);

        return view('editPendamping', compact('pendamping', 'category', 'ahli'));
    }

    //Mengubah Data Pendamping
    public function updatePendamping(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'nama_pendamping' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|max:13',
            'email' => 'required|email',
            'username' => 'required',
            // 'password' => 'required|min:8',
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
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'username.required' => 'Username tidak boleh kosong',
            // 'password.required' => 'Password tidak boleh kosong',
            // 'password.min' => 'Password minimal 8 karakter',
            'category_id.required' => 'Kategori pendamping tidak boleh kosong',
            'bidang_id.required' => 'Bidang keahlian tidak boleh kosong'
        ]);

        // Mencari Data Sesuai Dengan id
        $pendamping = Pendamping::find($id);
        $user = $pendamping->users;

        // Mengubah Data Pendamping di Database
        $pendamping->update([
            'nama_pendamping' => $request->nama_pendamping,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Mengubah Data Akun Pendamping di Database
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        // dd($pendamping);

        return redirect('/pendamping')->with('sukses', 'Data pendamping berhasil diperbarui.');
    }

    // Menghapus Data Pendamping
    public function deletePendamping($id)
    {
        // Mencari Data Pendamping di Database
        $pendamping = Pendamping::find($id);

        // Mencari Data Akun Pendamping di Database
        $user = $pendamping->users;

        // Menghapus Data Pendamping di Database
        $pendamping->delete();

        // Menghapus Data Akun Pendamping di Database
        $user->delete();

        return redirect('/pendamping');
    }

    // Menampilkan Halaman Form Pendampingan
    public function FormPendampingan()
    {
        // Mengambil Data Tenant Sesuai Dengan Pendamping yang Sedang Login
        $tenant = Auth::user()->pendampings->tenants;

        // dd($tenant);

        return view('pendampingan/form', compact('tenant'));
    }

    // Menampilkan Halaman Jadwal Pendampingan
    public function JadwalPendampingan()
    {
        // Mengambil Data Jadwal dan Tenant Sesuai Dengan Pendamping yang Sedang Login
        if (Auth::user()->hasRole('pendamping')) {
            $jadwal = Auth::user()->pendampings->jadwalPendampingans;
            $tenant = Auth::user()->pendampings->tenants;

            // dd($jadwal);

            return view('pendampingan/jadwal', compact('jadwal','tenant'));
        } else {
            $jadwal = Auth::user()->tenants->jadwalPendampingans;
            $pendamping = Auth::user()->tenants->pendampings;

            // dd($jadwal);

            return view('pendampingan/jadwal', compact('jadwal','pendamping'));
        }
    }

    // Menambahkan or Membuat Jadwal Pendampingan
    public function AddJadwalPendampingan(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:1000',
            'link' => 'required|max:200',
            'tenant_id' => 'required',
            'pendamping_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'topik.required' => 'Topik tidak boleh kosong',
            'topik.string' => 'Topik harus berupa string',
            'topik.max' => 'Topik maksimal 1000 karakter',
            'link.required' => 'Link tidak boleh kosong',
            'link.max' => 'Link maksimal 200 karakter',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'pendamping_id.required' => 'Pendamping tidak boleh kosong',
        ]);

        // Menambahkan Jadwal ke Database
        $jadwal = JadwalPendampingan::create([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link,
            'tenant_id' => $request->tenant_id,
            'pendamping_id' => $request->pendamping_id,
        ]);

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Jadwal pendampingan berhasil dibuat.');
    }

    // Mengubah or Memperbarui Data Jadwal Pendampingan
    public function UpdateJadwalPendampingan(Request $request, $id)
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
        $jadwal = JadwalPendampingan::find($id);

        // Mengubah Data Jadwal Pendampingan di Database
        $jadwal->update([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link
        ]);

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Jadwal pendampingan berhasil diperbarui.');
    }

    // Membatalkan Jadwal Pendampingan
    public function BatalkanJadwalPendampingan($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalPendampingan::find($id);

        // Mengubah Status Jadwal Pendampingan Menjadi Dibatalkan
        $jadwal->status = 'dibatalkan';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Jadwal pendampingan berhasil dibatalkan.');
    }

    // Menghapus Data Jadwal Pendampingan
    public function DeleteJadwalPendampingan($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalPendampingan::find($id);

        // Menghapus Jadwal Pendampingan dari Database
        $jadwal->delete();

        // dd($jadwal);

        return redirect('/jadwalPendampingan');
    }

    // Mengubah Status Pendampingan Menjadi Selesai
    public function SelesaiJadwalPendampingan($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalPendampingan::find($id);

        // Mengubah Status Menjadi Selesai
        $jadwal->status = 'selesai';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Pendampingan telah selesai dilakukan.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Pendampingan (for tenant)
    public function KonfirmasiHadirPendampingan(Request $request, $id)
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
        $jadwal = JadwalPendampingan::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Pendampingan
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Pendampingan Menjadi Disetujui oleh Tenant
        $jadwal->status = 'disetujui';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Berhasil mengkonfirmasi kehadiran pendampingan.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Pendampingan (for tenant)
    public function TolakHadirPendampingan(Request $request, $id)
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
        $jadwal = JadwalPendampingan::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Pendampingan
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Pendampingan Menjadi Disetujui oleh Tenant
        $jadwal->status = 'ditolak';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalPendampingan')->with('sukses', 'Berhasil mengkonfirmasi kehadiran pendampingan.');
    }
}
