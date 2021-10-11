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

class DashboardController extends Controller
{
    // Menampilkan Halaman Dashboard
    public function Dashboard()
    {
        if (Auth::user()->hasRole('admin')) {
            $pengelola = Pengelola::count();
            $coach = Coach::count();
            $mentor = Mentor::count();
            $pendamping = Pendamping::count();
            $tenant = Tenant::where('status','diterima')->count();
            $calon = Tenant::where('status','pengajuan')->count();

            // dd($calon);

            return view('dashboard', compact(
                'pengelola',
                'coach',
                'mentor',
                'pendamping',
                'tenant',
                'calon'
            ));
        } elseif (Auth::user()->hasRole('coach')) {

            $tenantCoach = Auth::user()->coachs->tenants->count();
            $fileDikirim = Auth::user()->coachs->materiCoachings->where('from','coach')->count();
            $fileDiterima = Auth::user()->coachs->materiCoachings->where('from','tenant')->count();
            $coachingTerlaksana = Auth::user()->coachs->jadwalCoachings->where('status','selesai')->count();

            // dd($tenantCoach);

            return view('dashboard', compact(
                'tenantCoach',
                'fileDikirim',
                'fileDiterima',
                'coachingTerlaksana'
            ));
        } elseif (Auth::user()->hasRole('mentor')) {
            $tenantMentor = Auth::user()->mentors->tenants->count();
            $fileDikirim = Auth::user()->mentors->materiMentorings->where('from','mentor')->count();
            $fileDiterima = Auth::user()->mentors->materiMentorings->where('from','tenant')->count();
            $mentoringTerlaksana = Auth::user()->mentors->jadwalMentorings->where('status','selesai')->count();

            // dd($tenantMentor);

            return view('dashboard', compact(
                'tenantMentor',
                'fileDikirim',
                'fileDiterima',
                'mentoringTerlaksana'
            ));
        } elseif (Auth::user()->hasRole('pendamping')) {
            $tenantPendamping = Auth::user()->pendampings->tenants->count();
            $fileDikirim = Auth::user()->pendampings->materiPendampingans->where('from','pendamping')->count();
            $fileDiterima = Auth::user()->pendampings->materiPendampingans->where('from','tenant')->count();
            $pendampinganTerlaksana = Auth::user()->pendampings->jadwalPendampingans->where('status','selesai')->count();

            // dd($tenantMentor);

            return view('dashboard', compact(
                'tenantPendamping',
                'fileDikirim',
                'fileDiterima',
                'pendampinganTerlaksana'
            ));
        } elseif (Auth::user()->hasRole('tenant')) {
            $jadwalCoaching = Auth::user()->tenants->jadwalCoachings->where('status','pending')->count();
            $jadwalMentoring = Auth::user()->tenants->jadwalMentorings->where('status','pending')->count();
            $jadwalPendampingan = Auth::user()->tenants->jadwalPendampingans->where('status','pending')->count();
            $materiCoaching = Auth::user()->tenants->materiCoachings->where('from','coach')->count();
            $materiMentoring = Auth::user()->tenants->materiMentorings->where('from','mentor')->count();
            $materiPendampingan = Auth::user()->tenants->materiPendampingans->where('from','pendamping')->count();

            // dd($jadwalPendampingan);

            return view('dashboard', compact(
                'jadwalCoaching',
                'jadwalMentoring',
                'jadwalPendampingan',
                'materiCoaching',
                'materiMentoring',
                'materiPendampingan'
            ));
        } elseif (Auth::user()->hasRole('calon tenant')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('pemonev')) {
            $laporanMentoring = FormMentoring::count();
            $laporanPendampingan = FormPendampingan::count();

            // dd($laporanMentoring);

            return view('dashboard', compact(
                'laporanMentoring',
                'laporanPendampingan'
            ));
        } elseif (Auth::user()->hasRole('perusahaan')) {
            $laporanMentoring = FormMentoring::count();
            $laporanPendampingan = FormPendampingan::count();

            // dd($laporanMentoring);

            return view('dashboard', compact(
                'laporanMentoring',
                'laporanPendampingan'
            ));
        }
    }
}
