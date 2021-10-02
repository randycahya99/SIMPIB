<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Models\Pengelola;
use App\Models\Coach;
use App\Models\Mentor;
use App\Models\Pendamping;
use App\Models\Tenant;
use App\Models\MateriCoaching;
use App\Models\JadwalCoaching;
use App\Models\MateriMentoring;
use App\Models\JadwalMentoring;
use App\Models\MateriPendampingan;
use App\Models\JadwalPendampingan;
use App\Models\FormMentoring;
use App\Models\FormPendampingan;

class LaporanController extends Controller
{
    // Menampilkan Halaman List Tenant Pada Laporan Coaching
    public function LaporanCoaching()
    {
        $tenant = Tenant::where('status','diterima')->get();

        return view('laporan/coaching', compact('tenant'));
    }

    // Menampilkan Halaman List Tenant Pada Laporan Mentoring
    public function LaporanMentoring()
    {
        $tenant = Tenant::where('status','diterima')->get();

        return view('laporan/mentoring', compact('tenant'));
    }

    // Menampilkan Halaman List Tenant Pada Laporan Pendampingan
    public function LaporanPendampingan()
    {
        $tenant = Tenant::where('status','diterima')->get();

        return view('laporan/pendampingan', compact('tenant'));
    }

    // Menampilkan List Coaching Untuk Tenant yang Dipilih
    public function TenantCoaching($id)
    {
        //
    }

    // Menampilkan List Mentoring Untuk Tenant yang Dipilih
    public function TenantMentoring($id)
    {
        $tenant = Tenant::find($id);
        $form = $tenant->formMentorings;

        // dd($form);

        return view('laporan/tenantMentoring', compact('form','tenant'));
    }

    // Menampilkan List Pendampingan Untuk Tenant yang Dipilih
    public function TenantPendampingan($id)
    {
        $tenant = Tenant::find($id);
        $form = $tenant->formPendampingans;

        // dd($form);

        return view('laporan/tenantPendampingan', compact('form','tenant'));
    }

    // Menampilkan Halaman Detail Laporan Mentoring Tenant
    public function DetailMentoring($id)
    {
        // Mencari or Mengambil Data Sesuai Dengan id
        $form = FormMentoring::find($id);

        // dd($form);

        return view('laporan/detailMentoring', compact('form'));
    }

    // Menampilkan Halaman Detail Laporan Pendampingan Tenant
    public function DetailPendampingan($id)
    {
        // Mencari or Mengambil Data Sesuai Dengan id
        $form = FormPendampingan::find($id);

        // dd($form);

        return view('laporan/detailPendampingan', compact('form'));
    }
}
