<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Auth;
use File;
use Response;
use App\User;
use App\Models\Mentor;
use App\Models\CategoryMentor;
use App\Models\BidangKeahlian;
use App\Models\JadwalMentoring;
use App\Models\FormMentoring;
use App\Models\MateriMentoring;

class MentorController extends Controller
{
    // Menampilkan Halaman Manajemen Data Mentor
    public function Mentor()
    {
        $mentor = Mentor::all();
        $category = CategoryMentor::all();
        $ahli = BidangKeahlian::all();
        
        return view('mentor', compact('mentor', 'category', 'ahli'));
    }

    // Menambahkan Data Mentor
    public function addMentor(Request $request)
    {
        $token = Str::random();

        // Validasi Inputan Form
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

        // Menambahkan Akun User ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token
        ]);

        // Menambahkan Data Mentor ke Database
        $mentor = Mentor::create([
            'nama_mentor' => $request->nama_mentor,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Menyimpan Data Relasi Tabel User Dengan Mentor
        $user->mentors()->save($mentor);

        // Menambahkan Role Kepada Akun User
        $user->assignRole('mentor');

        return redirect('/mentor')->with('sukses', 'Data mentor berhasil ditambahkan.');
    }

    // Menampilkan Halaman Edit Data Mentor
    public function editMentor($id)
    {
        $mentor = Mentor::find($id);
        $category = CategoryMentor::all();
        $ahli = BidangKeahlian::all();

        // dd($mentor);

        return view('editMentor', compact('mentor', 'category', 'ahli'));
    }

    // Mengubah Data Mentor
    public function updateMentor(Request $request, $id)
    {
        // Validasi Inputan Form
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

        // Mencari Data Sesuai Dengan id
        $mentor = Mentor::find($id);
        $user = $mentor->users;

        // Mengubah Data Mentor di Database
        $mentor->update([
            'nama_mentor' => $request->nama_mentor,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'category_id' => $request->category_id,
            'bidang_id' => $request->bidang_id
        ]);

        // Mengubah Data Akun Mentor di Database
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        // dd($mentor);

        return redirect('/mentor')->with('sukses', 'Data mentor berhasil diperbarui.');
    }

    // Menghapus Data Mentor
    public function deleteMentor($id)
    {
        // Mencari Data Mentor di Database
        $mentor = Mentor::find($id);

        // Mencari Data Akun Mentor di Database
        $user = $mentor->users;

        // Menghapus Data Mentor di Database
        $mentor->delete();

        // Menghapus Data Akun Mentor di Database
        $user->delete();

        return redirect('/mentor');
    }

    // Menampilkan Halaman Jadwal Mentoring
    public function JadwalMentoring()
    {
        // Mengambil Data Jadwal dan Tenant Sesuai Dengan Mentor yang Sedang Login
        if (Auth::user()->hasRole('mentor')) {
            $jadwal = Auth::user()->mentors->jadwalMentorings;
            $tenant = Auth::user()->mentors->tenants;

            // dd($jadwal);

            return view('mentoring/jadwal', compact('jadwal','tenant'));
        } else {
            $jadwal = Auth::user()->tenants->jadwalMentorings;
            $mentor = Auth::user()->tenants->mentors;

            // dd($jadwal);

            return view('mentoring/jadwal', compact('jadwal','mentor'));
        }
    }

    // Menambahkan or Membuat Jadwal Mentoring
    public function AddJadwalMentoring(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:1000',
            'link' => 'required|max:200',
            'tenant_id' => 'required',
            'mentor_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'topik.required' => 'Topik tidak boleh kosong',
            'topik.string' => 'Topik harus berupa string',
            'topik.max' => 'Topik maksimal 1000 karakter',
            'link.required' => 'Link tidak boleh kosong',
            'link.max' => 'Link maksimal 200 karakter',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong',
        ]);

        // Menambahkan Jadwal ke Database
        $jadwal = JadwalMentoring::create([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link,
            'tenant_id' => $request->tenant_id,
            'mentor_id' => $request->mentor_id,
        ]);

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Jadwal mentoring berhasil dibuat.');
    }

    // Mengubah or Memperbarui Data Jadwal Mentoring
    public function UpdateJadwalMentoring(Request $request, $id)
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
        $jadwal = JadwalMentoring::find($id);

        // Mengubah Data Jadwal Mentoring di Database
        $jadwal->update([
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'link' => $request->link
        ]);

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Jadwal mentoring berhasil diperbarui.');
    }

    // Membatalkan Jadwal Mentoring
    public function BatalkanJadwalMentoring($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalMentoring::find($id);

        // Mengubah Status Jadwal Mentoring Menjadi Dibatalkan
        $jadwal->status = 'dibatalkan';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Jadwal mentoring berhasil dibatalkan.');
    }

    // Menghapus Data Jadwal Mentoring
    public function DeleteJadwalMentoring($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalMentoring::find($id);

        // Menghapus Jadwal Mentoring dari Database
        $jadwal->delete();

        // dd($jadwal);

        return redirect('/jadwalMentoring');
    }

    // Mengubah Status Mentoring Menjadi Selesai
    public function SelesaiJadwalMentoring($id)
    {
        // Mencari Data Sesuai Dengan id
        $jadwal = JadwalMentoring::find($id);

        // Mengubah Status Menjadi Selesai
        $jadwal->status = 'selesai';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Mentoring telah selesai dilakukan.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Mentoring (for tenant)
    public function KonfirmasiHadirMentoring(Request $request, $id)
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
        $jadwal = JadwalMentoring::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Mentoring
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Mentoring Menjadi Disetujui oleh Tenant
        $jadwal->status = 'disetujui';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Berhasil mengkonfirmasi kehadiran mentoring.');
    }

    // Melakukan Konfirmasi Kehadiran Untuk Mentoring (for tenant)
    public function TolakHadirMentoring(Request $request, $id)
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
        $jadwal = JadwalMentoring::find($id);

        // Mengubah or Menambahkan Keterangan Pada Jadwal Mentoring
        $jadwal->update([
            'keterangan' => $request->keterangan
        ]);

        // Mengubah Status Jadwal Mentoring Menjadi Ditolak oleh Tenant
        $jadwal->status = 'ditolak';
        $jadwal->save();

        // dd($jadwal);

        return redirect('/jadwalMentoring')->with('sukses', 'Berhasil mengkonfirmasi kehadiran mentoring.');
    }

    // Menampilkan Halaman Materi Mentoring
    public function MateriMentoring()
    {
        // Mengambil Data Materi dan Tenant Sesuai Dengan Mentor yang Sedang Login
        if (Auth::user()->hasRole('mentor')) {
            $materi = Auth::user()->mentors->materiMentorings->where('from','mentor');
            $tenant = Auth::user()->mentors->tenants;

            // dd($jadwal);

            return view('mentoring/materi', compact('materi','tenant'));
        } else {
            $materi = Auth::user()->tenants->materiMentorings->where('from','mentor');
            $mentor = Auth::user()->tenants->mentors;

            // dd($jadwal);

            return view('mentoring/materi', compact('materi','mentor'));
        }
    }

    // Menambahkan Data Materi Mentoring
    public function AddMateriMentoring(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'materi' => 'required',
            'keterangan' => 'required|string',
            'tenant_id' => 'required',
            'mentor_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'materi.required' => 'Materi tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'keterangan.string' => 'Keterangan harus berupa string',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong',
        ]);

        // Status From Diisi dengan Value Mentor
        $from = "mentor";

        // Menyimpan Data File kedalam Variabel
        $file = $request->file('materi');
        $filename = time()."_".$file->getClientOriginalName();
        $filext = $file->getClientOriginalExtension();
        $filesize = $file->getSize();

        // Menentukan Storage Materi Mentoring
        $path = 'storage';
        $file->move($path, $filename);

        // dd($filename);

        // Menambahkan Materi ke Database
        $materi = MateriMentoring::create([
            'tanggal' => $request->tanggal,
            'materi' => $filename,
            'keterangan' => $request->keterangan,
            'from' => $from,
            'tenant_id' => $request->tenant_id,
            'mentor_id' => $request->mentor_id,
        ]);

        // dd($materi);

        return redirect('/materiMentoring')->with('sukses', 'Materi berhasil dikirimkan ke tenant.');
    }

    // Mendownload Materi Mentoring
    public function GetFile($id)
    {
        $file = MateriMentoring::find($id);

        $pathFile = storage_path('../public/storage/' . $file->materi);

        return response()->download($pathFile);
    }

    // Menampilkan Halaman Upload File (Konsultasi)
    public function UploadFile()
    {
        // Mengambil Data Materi dan Tenant Sesuai Dengan Mentor yang Sedang Login
        if (Auth::user()->hasRole('mentor')) {
            $materi = Auth::user()->mentors->materiMentorings->where('from','tenant');
            $tenant = Auth::user()->mentors->tenants;

            // dd($jadwal);

            return view('mentoring/upload', compact('materi','tenant'));
        } else {
            $materi = Auth::user()->tenants->materiMentorings->where('from','tenant');
            $mentor = Auth::user()->tenants->mentors;

            // dd($jadwal);

            return view('mentoring/upload', compact('materi','mentor'));
        }
    }

    // Mengirimkan File Untuk Konsultasi
    public function AddKonsultasiFile(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required|date',
            'materi' => 'required',
            'keterangan' => 'required|string',
            'tenant_id' => 'required',
            'mentor_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tanggal tidak valid',
            'materi.required' => 'Materi tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'keterangan.string' => 'Keterangan harus berupa string',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong',
        ]);

        // Status From Diisi dengan Value Tenant
        $from = "tenant";

        // Menyimpan Data File kedalam Variabel
        $file = $request->file('materi');
        $filename = time()."_".$file->getClientOriginalName();
        $filext = $file->getClientOriginalExtension();
        $filesize = $file->getSize();

        // Menentukan Storage Materi Mentor
        $path = 'storage';
        $file->move($path, $filename);

        // dd($filename);

        // Menambahkan Materi ke Database
        $materi = MateriMentoring::create([
            'tanggal' => $request->tanggal,
            'materi' => $filename,
            'keterangan' => $request->keterangan,
            'from' => $from,
            'tenant_id' => $request->tenant_id,
            'mentor_id' => $request->mentor_id,
        ]);

        // dd($materi);

        return redirect('/fileMentoring')->with('sukses', 'File berhasil dikirimkan ke mentor.');
    }

    // Menampilkan Halaman Form Mentoring
    public function FormMentoring()
    {
        // Mengambil Data Tenant Sesuai Dengan Mentor yang Sedang Login
        $tenant = Auth::user()->mentors->tenants;

        // dd($tenant);

        return view('mentoring/form', compact('tenant'));
    }

    // Menambahkan Data Form Mentoring
    public function AddFormMentoring(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'tanggal' => 'required',
            'perihal' => 'required',
            'strategi_marketing' => 'required',
            'pengembangan_produk' => 'required',
            'branding' => 'required',
            'sistemasi_organisasi' => 'required',
            'tenant_id' => 'required',
            'mentor_id' => 'required'
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'perihal.required' => 'Perihal tidak boleh kosong',
            'strategi_marketing.required' => 'Strategi marketing tidak boleh kosong',
            'pengembangan_produk.required' => 'Pengembangan produk tidak boleh kosong',
            'branding.required' => 'Branding tidak boleh kosong',
            'sistemasi_organisasi.required' => 'Sistemasi organisasi tidak boleh kosong',
            'tenant_id.required' => 'Tenant tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong'
        ]);

        // Menambahkan Data Form Mentoring ke Database
        $form = FormMentoring::create($request->all());

        // dd($form);

        return redirect('/hasilMentoring')->with('sukses', 'Form mentoring tenant berhasil disimpan.');
    }

    // Menampilkan Halaman Hasil Mentoring
    public function HasilMentoring()
    {
        // Mengambil Data Form Mentoring Sesuai Dengan User yang Sedang Login
        if (Auth::user()->hasRole('mentor')) {
            $form = Auth::user()->mentors->FormMentorings;

            // dd($form);

            return view('mentoring/hasilMentoring', compact('form'));
        } else {
            $form = Auth::user()->tenants->FormMentorings;

            // dd($form);

            return view('mentoring/hasilMentoring', compact('form'));
        }
    }

    // Menampilkan Halaman Detail Hasil Mentoring
    public function DetailHasilMentoring($id)
    {
        // Mencari or Mengambil Data Sesuai Dengan id
        $form = FormMentoring::find($id);

        // dd($form);

        return view('mentoring/detailHasilMentoring', compact('form'));
    }
}
