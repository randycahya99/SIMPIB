<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Landing Page
Route::get('/', 'LandingPageController@LandingPage')->middleware('guest')->name('/');
// Route::get('/', function () {
//     return view('landing');
// })->middleware('guest')->name('/');


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


// Profil User
Route::get('/profile', 'UserController@Profile')->middleware('auth');
Route::get('{id}/profile/edit', 'UserController@EditProfile')->middleware('auth');
Route::post('/updateProfilePengelola', 'UserController@UpdateProfilePengelola')->middleware('auth','checkRole:admin');
Route::post('/updateProfilePendamping', 'UserController@UpdateProfilePendamping')->middleware('auth','checkRole:pendamping');
Route::post('/updateProfileMentor', 'UserController@UpdateProfileMentor')->middleware('auth','checkRole:mentor');
Route::post('/updateProfileCoach', 'UserController@UpdateProfileCoach')->middleware('auth','checkRole:coach');
Route::post('/updateProfileTenant', 'UserController@UpdateProfileTenant')->middleware('auth','checkRole:tenant');


// Login
Route::get('/login', 'LoginController@index')->middleware('guest')->name('login');
Route::post('/postLogin', 'LoginController@login');


// Logout
Route::get('/logout', 'LoginController@logout')->middleware('auth');


// Registrasi
Route::get('/registration', 'RegisterController@RegisterPage')->middleware('guest')->name('registration');
Route::post('/registerTenant', 'RegisterController@RegisterTenant')->middleware('guest');


// Melengkapi Profil
Route::get('/lengkapiProfile', 'RegisterController@LengkapiProfile')->middleware('auth','checkRole:calon tenant');
Route::post('/isiProfileUsaha', 'RegisterController@IsiProfileUsaha')->middleware('auth','checkRole:calon tenant');


// Histori Pendaftaran (Untuk Calon Tenant & Tenant)
Route::get('/historiPendaftaran', 'TenantController@HistoriPendaftaran')->middleware('auth');
Route::get('{id}/detailHistori', 'TenantController@DetailHistori')->middleware('auth');


// Manajemen Data Pada Landing Page
Route::get('/fotoSlider', 'LandingPageController@FotoSlider')->middleware('auth','checkRole:admin');
Route::post('/addFotoSlider', 'LandingPageController@AddFotoSlider')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteFotoSlider', 'LandingPageController@DeleteFotoSlider')->middleware('auth','checkRole:admin');


// Kategori Coach
Route::get('/kategoriCoach', 'KategoriController@KategoriCoach')->middleware('auth','checkRole:admin');
Route::post('/addCategoryCoach', 'KategoriController@addCategoryCoach')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryCoach', 'KategoriController@updateCategoryCoach')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryCoach', 'KategoriController@deleteCategoryCoach')->middleware('auth','checkRole:admin');


// Kategori Mentor
Route::get('/kategoriMentor', 'KategoriController@KategoriMentor')->middleware('auth','checkRole:admin');
Route::post('/addCategoryMentor', 'KategoriController@addCategoryMentor')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryMentor', 'KategoriController@updateCategoryMentor')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryMentor', 'KategoriController@deleteCategoryMentor')->middleware('auth','checkRole:admin');


// Kategori Pendamping
Route::get('/kategoriPendamping', 'KategoriController@KategoriPendamping')->middleware('auth','checkRole:admin');
Route::post('/addCategoryPendamping', 'KategoriController@addCategoryPendamping')->middleware('auth','checkRole:admin');
ROute::post('{id}/updateCategoryPendamping', 'KategoriController@updateCategoryPendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryPendamping', 'KategoriController@deleteCategoryPendamping')->middleware('auth','checkRole:admin');


// Tahap Inkubasi
Route::get('/tahapInkubasi', 'KategoriController@TahapInkubasi')->middleware('auth','checkRole:admin');
Route::post('/addTahapInkubasi', 'KategoriController@addTahapInkubasi')->middleware('auth','checkRole:admin');
Route::post('{id}/updateTahapInkubasi', 'KategoriController@updateTahapInkubasi')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteTahapInkubasi', 'KategoriController@deleteTahapInkubasi')->middleware('auth','checkRole:admin');


// Kategori Tenant
Route::get('/kategoriTenant', 'KategoriController@KategoriTenant')->middleware('auth','checkRole:admin');
Route::post('/addCategoryTenant', 'KategoriController@addCategoryTenant')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryTenant', 'KategoriController@updateCategoryTenant')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryTenant', 'KategoriController@deleteCategoryTenant')->middleware('auth','checkRole:admin');


// Bidang Keahlian
Route::get('/bidangKeahlian', 'KategoriController@BidangKeahlian')->middleware('auth','checkRole:admin');
Route::post('/addBidangKeahlian', 'KategoriController@addBidangKeahlian')->middleware('auth','checkRole:admin');
Route::post('{id}/updateBidangKeahlian', 'KategoriController@updateBidangKeahlian')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteBidangKeahlian', 'KategoriController@deleteBidangKeahlian')->middleware('auth','checkRole:admin');


// Data Admin atau Pengelola Inkubator
Route::get('/admin', 'AdminController@Admin')->middleware('auth','checkRole:admin');
Route::post('/addAdmin', 'AdminController@addAdmin')->middleware('auth','checkRole:admin');
Route::post('{id}/updateAdmin', 'AdminController@updateAdmin')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteAdmin', 'AdminController@deleteAdmin')->middleware('auth','checkRole:admin');


// Manajemen Data Coach
Route::get('/coach', 'CoachController@Coach')->middleware('auth','checkRole:admin');
Route::post('/coach/addCoach', 'CoachController@addCoach')->middleware('auth','checkRole:admin');
Route::post('/updateCoach/{id}', 'CoachController@updateCoach')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCoach', 'CoachController@deleteCoach')->middleware('auth','checkRole:admin');
Route::get('/coach/tambah', 'CoachController@Coach')->middleware('auth','checkRole:admin');
Route::get('{id}/editCoach', 'CoachController@editCoach')->middleware('auth','checkRole:admin');


// Manajemen Data Mentor
Route::get('/mentor', 'MentorController@Mentor')->middleware('auth','checkRole:admin');
Route::post('/mentor/addMentor', 'MentorController@addMentor')->middleware('auth','checkRole:admin');
Route::post('/updateMentor/{id}', 'MentorController@updateMentor')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteMentor', 'MentorController@deleteMentor')->middleware('auth','checkRole:admin');
Route::get('/mentor/tambah', 'MentorController@Mentor')->middleware('auth','checkRole:admin');
Route::get('{id}/editMentor', 'MentorController@editMentor')->middleware('auth','checkRole:admin');


// Manajemen Data Pendamping
Route::get('/pendamping', 'PendampingController@Pendamping')->middleware('auth','checkRole:admin');
Route::post('pendamping/addPendamping', 'PendampingController@addPendamping')->middleware('auth','checkRole:admin');
Route::post('/updatePendamping/{id}', 'PendampingController@updatePendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/deletePendamping', 'PendampingController@deletePendamping')->middleware('auth','checkRole:admin');
Route::get('/pendamping/tambah', 'PendampingController@Pendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/editPendamping', 'PendampingController@editPendamping')->middleware('auth','checkRole:admin');


// Manajemen Data Registrasi (Calon Tenant)
Route::get('/calonTenant', 'TenantController@Registrasi')->middleware('auth','checkRole:admin');
Route::get('{id}/reviewRegister', 'TenantController@ReviewRegister')->middleware('auth','checkRole:admin');
Route::post('/terimaRegister/{id}', 'TenantController@TerimaRegister')->middleware('auth','checkRole:admin');
Route::get('/tolakRegister/{id}', 'TenantController@TolakRegister')->middleware('auth','checkRole:admin');


// Manajemen Data Tenant
Route::get('/tenant', 'TenantController@Tenant')->middleware('auth','checkRole:admin');
Route::post('{id}/updateTenant', 'TenantController@UpdateTenant')->middleware('auth','checkRole:admin');
Route::get('{id}/deactiveTenant', 'TenantController@DeactiveTenant')->middleware('auth','checkRole:admin');


// Daftar Tenant
Route::get('/daftarTenant', 'TenantController@DaftarTenant')->middleware('auth');
Route::get('{id}/detailTenant', 'TenantController@DetailTenant')->middleware('auth');


// Pendampingan
Route::get('/formPendampingan', 'PendampingController@FormPendampingan')->middleware('auth','checkRole:pendamping');
Route::post('/addFormPendampingan', 'PendampingController@AddFormPendampingan')->middleware('auth','checkRole:pendamping');
Route::get('/jadwalPendampingan', 'PendampingController@JadwalPendampingan')->middleware('auth');
Route::post('/addJadwalPendampingan', 'PendampingController@AddJadwalPendampingan')->middleware('auth','checkRole:pendamping');
Route::post('{id}/updateJadwalPendampingan', 'PendampingController@UpdateJadwalPendampingan')->middleware('auth','checkRole:pendamping');
Route::get('{id}/batalkanJadwalPendampingan', 'PendampingController@BatalkanJadwalPendampingan')->middleware('auth','checkRole:pendamping');
Route::get('{id}/deleteJadwalPendampingan', 'PendampingController@DeleteJadwalPendampingan')->middleware('auth','checkRole:pendamping');
Route::get('{id}/selesaiJadwalPendampingan', 'PendampingController@SelesaiJadwalPendampingan')->middleware('auth','checkRole:pendamping');
Route::post('{id}/konfirmasiHadirPendampingan', 'PendampingController@KonfirmasiHadirPendampingan')->middleware('auth','checkRole:tenant');
Route::post('{id}/tolakHadirPendampingan', 'PendampingController@TolakHadirPendampingan')->middleware('auth','checkRole:tenant');
Route::get('/hasilPendampingan', 'PendampingController@HasilPendampingan')->middleware('auth');
Route::get('{id}/detailHasilPendampingan', 'PendampingController@DetailHasilPendampingan')->middleware('auth');
Route::get('/materiPendampingan', 'PendampingController@MateriPendampingan')->middleware('auth');
Route::post('/addMateriPendampingan', 'PendampingController@AddMateriPendampingan')->middleware('auth','checkRole:pendamping');
Route::get('/getfile/{id}', 'PendampingController@GetFile')->middleware('auth');
Route::get('/filePendampingan', 'PendampingController@UploadFile')->middleware('auth');
Route::post('/addKonsultasiFile', 'PendampingController@AddKonsultasiFile')->middleware('auth','checkRole:tenant');


// Coaching
Route::get('/jadwalCoaching', 'CoachController@JadwalCoaching')->middleware('auth');
Route::post('/addJadwalCoaching', 'CoachController@AddJadwalCoaching')->middleware('auth','checkRole:coach');
Route::post('{id}/updateJadwalCoaching', 'CoachController@UpdateJadwalCoaching')->middleware('auth','checkRole:coach');
Route::get('{id}/batalkanJadwalCoaching', 'CoachController@BatalkanJadwalCoaching')->middleware('auth','checkRole:coach');
Route::get('{id}/deleteJadwalCoaching', 'CoachController@DeleteJadwalCoaching')->middleware('auth','checkRole:coach');
Route::get('{id}/selesaiJadwalCoaching', 'CoachController@SelesaiJadwalCoaching')->middleware('auth','checkRole:coach');
Route::post('{id}/konfirmasiHadirCoaching', 'CoachController@KonfirmasiHadirCoaching')->middleware('auth','checkRole:tenant');
Route::post('{id}/tolakHadirCoaching', 'CoachController@TolakHadirCoaching')->middleware('auth','checkRole:tenant');
Route::get('/materiCoaching', 'CoachController@MateriCoaching')->middleware('auth');
Route::post('/addMateriCoaching', 'CoachController@AddMateriCoaching')->middleware('auth','checkRole:coach');
Route::get('/getfile1/{id}', 'CoachController@GetFile')->middleware('auth');
Route::get('/fileCoaching', 'CoachController@UploadFile')->middleware('auth');
Route::post('/addKonsultasiFile1', 'CoachController@AddKonsultasiFile')->middleware('auth','checkRole:tenant');


// Mentoring
Route::get('/formMentoring', 'MentorController@FormMentoring')->middleware('auth','checkRole:mentor');
Route::post('/addFormMentoring', 'MentorController@AddFormMentoring')->middleware('auth','checkRole:mentor');
Route::get('/hasilMentoring', 'MentorController@HasilMentoring')->middleware('auth');
Route::get('{id}/detailHasilMentoring', 'MentorController@DetailHasilMentoring')->middleware('auth');
Route::get('/jadwalMentoring', 'MentorController@JadwalMentoring')->middleware('auth');
Route::post('/addJadwalMentoring', 'MentorController@AddJadwalMentoring')->middleware('auth','checkRole:mentor');
Route::post('{id}/updateJadwalMentoring', 'MentorController@UpdateJadwalMentoring')->middleware('auth','checkRole:mentor');
Route::get('{id}/batalkanJadwalMentoring', 'MentorController@BatalkanJadwalMentoring')->middleware('auth','checkRole:mentor');
Route::get('{id}/deleteJadwalMentoring', 'MentorController@DeleteJadwalMentoring')->middleware('auth','checkRole:mentor');
Route::get('{id}/selesaiJadwalMentoring', 'MentorController@SelesaiJadwalMentoring')->middleware('auth','checkRole:mentor');
Route::post('{id}/konfirmasiHadirMentoring', 'MentorController@KonfirmasiHadirMentoring')->middleware('auth','checkRole:tenant');
Route::post('{id}/tolakHadirMentoring', 'MentorController@TolakHadirMentoring')->middleware('auth','checkRole:tenant');
Route::get('/materiMentoring', 'MentorController@MateriMentoring')->middleware('auth');
Route::post('/addMateriMentoring', 'MentorController@AddMateriMentoring')->middleware('auth','checkRole:mentor');
Route::get('/getfile2/{id}', 'MentorController@GetFile')->middleware('auth');
Route::get('/fileMentoring', 'MentorController@UploadFile')->middleware('auth');
Route::post('/addKonsultasiFile2', 'MentorController@AddKonsultasiFile')->middleware('auth','checkRole:tenant');
