<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Tenant;
use App\Models\Usaha;
use App\Models\Coach;
use App\Models\Mentor;
use App\Models\Pendamping;
use Auth;

class TenantController extends Controller
{
    // Menampilkan Halaman Manajemen Data Registrasi (Calon Tenant)
    public function Registrasi()
    {
        $tenant = Tenant::where('status','pengajuan')->get();
        $usaha = Usaha::all();

        // dd($tenant);
        
        return view('calonTenant', compact('tenant', 'usaha'));
    }

    // Menampilkan Halaman Manajemen Data Tenant
    public function Tenant()
    {
        $tenant = Tenant::where('status','diterima')->get();
        $usaha = Usaha::all();
        $coach = Coach::all();
        $mentor = Mentor::all();
        $pendamping = Pendamping::all();

        // dd($tenant);

        return view('tenant', compact('tenant','usaha','coach','mentor','pendamping'));
    }

    // Menampilkan Halaman Histori Pendaftaran Calon Tenant & Tenant
    public function HistoriPendaftaran()
    {
        $tenant = Auth::user()->tenants->get();

        // dd($tenant);
        
        return view('historiPendaftaran', compact('tenant'));
    }

    // Menampilkan Halaman Detail Histori Pendaftaran Calon Tenant & Tenant
    public function DetailHistori($id)
    {
        $tenant = Tenant::find($id);

        // dd($tenant);

        return view('detailHistori', compact('tenant'));
    }

    // Menampilkan Halaman Review Data Registrasi Calon Tenant
    public function ReviewRegister($id)
    {
        $tenant = Tenant::find($id);
        $coach = Coach::all();
        $mentor = Mentor::all();
        $pendamping = Pendamping::all();

        // dd($tenant);

        return view('reviewRegister', compact('tenant','coach','mentor','pendamping'));
    }

    // Menerima Data Registrasi Calon Tenant
    public function TerimaRegister(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'coach_id' => 'required',
            'mentor_id' => 'required',
            'pendamping_id' => 'required'
        ], [
            'coach_id.required' => 'Coach tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong',
            'pendamping_id.required' => 'Pendamping tidak boleh kosong'
        ]);
        
        // Mengubah Status Aktivasi Tenant
        $tenant = Tenant::find($id);
        $tenant->status = 'diterima';
        $tenant->save();

        // Mengubah Data Tenant (Menambahkan Coach, Mentor dan Pendamping)
        $tenant->update([
            'coach_id' => $request->coach_id,
            'mentor_id' => $request->mentor_id,
            'pendamping_id' => $request->pendamping_id
        ]);

        // Mengubah Role Akun User Calon Tenant Menjadi Role Tenant
        $user = $tenant->users;
        $user->removeRole('calon tenant');
        $user->assignRole('tenant');

        // dd($tenant);

        return redirect('/tenant')->with('sukses', 'Berhasil menerima calon tenant baru.');
    }

    // Menolak Data Registrasi Calon Tenant
    public function TolakRegister($id)
    {
        // Mengubah Status Aktivasi Tenant
        $tenant = Tenant::find($id);
        $tenant->status = 'ditolak';
        $tenant->save();

        // dd($tenant);

        return redirect('/tenant')->with('sukses', 'Berhasil menolak calon tenant baru.');
    }

    public function UpdateTenant(Request $request, $id)
    {
        // Validasi Inputan Form
        $request->validate([
            'coach_id' => 'required',
            'mentor_id' => 'required',
            'pendamping_id' => 'required'
        ], [
            'coach_id.required' => 'Coach tidak boleh kosong',
            'mentor_id.required' => 'Mentor tidak boleh kosong',
            'pendamping_id.required' => 'Pendamping tidak boleh kosong'
        ]);

        // Mengubah Data di Database
        $tenant = Tenant::find($id);
        $tenant->update([
            'coach_id' => $request->coach_id,
            'mentor_id' => $request->mentor_id,
            'pendamping_id' => $request->pendamping_id
        ]);

        // dd($tenant);

        return redirect('/tenant')->with('sukses', 'Data tenant berhasil diperbarui.');
    }

    public function DeactiveTenant($id)
    {
        // Mencari or Mengambil Data Tenant di Database
        $tenant = Tenant::find($id);
        
        // Mengubah Status Aktivasi Tenant
        $tenant->status = 'ditolak';
        $tenant->save();

        // Mengubah Role Akun User Tenant Menjadi Role Calon Tenant
        $user = $tenant->users;
        $user->removeRole('tenant');
        $user->assignRole('calon tenant');

        // dd($tenant);

        return redirect('/tenant');
    }

    public function DaftarTenant()
    {
        if (Auth::user()->hasRole('coach')) {
            $tenant = Auth::user()->coachs->tenants;
        } elseif (Auth::user()->hasRole('mentor')) {
            $tenant = Auth::user()->mentors->tenants;
        } else {
            $tenant = Auth::user()->pendampings->tenants;
        }
        

        // dd($tenant);
        
        return view('daftarTenant', compact('tenant'));
    }
}
