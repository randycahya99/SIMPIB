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

//Landing Page
Route::get('/', function () {
    return view('landing');
})->middleware('guest')->name('/');


//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


//Profil User
Route::get('/profile', 'UserController@Profile')->middleware('auth');
Route::get('{id}/profile/edit', 'UserController@EditProfile')->middleware('auth');
Route::post('/updateProfilePengelola', 'UserController@UpdateProfilePengelola')->middleware('auth','checkRole:admin');
Route::post('/updateProfilePendamping', 'UserController@updateProfilePendamping')->middleware('auth','checkRole:pendamping');
Route::post('/updateProfileMentor', 'UserController@updateProfileMentor')->middleware('auth','checkRole:mentor');
Route::post('/updateProfileCoach', 'UserController@updateProfileCoach')->middleware('auth','checkRole:coach');


//Login
Route::get('/login', 'LoginController@index')->middleware('guest')->name('login');
Route::post('/postLogin', 'LoginController@login');


//Logout
Route::get('/logout', 'LoginController@logout')->middleware('auth');


//Registrasi
Route::get('/registration', 'RegisterController@RegisterPage')->middleware('guest')->name('registration');
Route::post('/registerTenant', 'RegisterController@RegisterTenant')->middleware('guest');


//Melengkapi Profil
Route::get('/profilTenant', 'RegisterController@profilTenant')->middleware('auth','checkRole:calon tenant');


//Kategori Coach
Route::get('/kategoriCoach', 'KategoriController@KategoriCoach')->middleware('auth','checkRole:admin');
Route::post('/addCategoryCoach', 'KategoriController@addCategoryCoach')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryCoach', 'KategoriController@updateCategoryCoach')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryCoach', 'KategoriController@deleteCategoryCoach')->middleware('auth','checkRole:admin');


//Kategori Mentor
Route::get('/kategoriMentor', 'KategoriController@KategoriMentor')->middleware('auth','checkRole:admin');
Route::post('/addCategoryMentor', 'KategoriController@addCategoryMentor')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryMentor', 'KategoriController@updateCategoryMentor')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryMentor', 'KategoriController@deleteCategoryMentor')->middleware('auth','checkRole:admin');


//Kategori Pendamping
Route::get('/kategoriPendamping', 'KategoriController@KategoriPendamping')->middleware('auth','checkRole:admin');
Route::post('/addCategoryPendamping', 'KategoriController@addCategoryPendamping')->middleware('auth','checkRole:admin');
ROute::post('{id}/updateCategoryPendamping', 'KategoriController@updateCategoryPendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryPendamping', 'KategoriController@deleteCategoryPendamping')->middleware('auth','checkRole:admin');


//Tahap Inkubasi
Route::get('/tahapInkubasi', 'KategoriController@TahapInkubasi')->middleware('auth','checkRole:admin');
Route::post('/addTahapInkubasi', 'KategoriController@addTahapInkubasi')->middleware('auth','checkRole:admin');
Route::post('{id}/updateTahapInkubasi', 'KategoriController@updateTahapInkubasi')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteTahapInkubasi', 'KategoriController@deleteTahapInkubasi')->middleware('auth','checkRole:admin');


//Kategori Tenant
Route::get('/kategoriTenant', 'KategoriController@KategoriTenant')->middleware('auth','checkRole:admin');
Route::post('/addCategoryTenant', 'KategoriController@addCategoryTenant')->middleware('auth','checkRole:admin');
Route::post('{id}/updateCategoryTenant', 'KategoriController@updateCategoryTenant')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCategoryTenant', 'KategoriController@deleteCategoryTenant')->middleware('auth','checkRole:admin');


//Bidang Keahlian
Route::get('/bidangKeahlian', 'KategoriController@BidangKeahlian')->middleware('auth','checkRole:admin');
Route::post('/addBidangKeahlian', 'KategoriController@addBidangKeahlian')->middleware('auth','checkRole:admin');
Route::post('{id}/updateBidangKeahlian', 'KategoriController@updateBidangKeahlian')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteBidangKeahlian', 'KategoriController@deleteBidangKeahlian')->middleware('auth','checkRole:admin');


//Data Admin atau Pengelola Inkubator
Route::get('/admin', 'AdminController@Admin')->middleware('auth','checkRole:admin');
Route::post('/addAdmin', 'AdminController@addAdmin')->middleware('auth','checkRole:admin');
Route::post('{id}/updateAdmin', 'AdminController@updateAdmin')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteAdmin', 'AdminController@deleteAdmin')->middleware('auth','checkRole:admin');


//Manajemen Data Coach
Route::get('/coach', 'CoachController@Coach')->middleware('auth','checkRole:admin');
Route::post('/coach/addCoach', 'CoachController@addCoach')->middleware('auth','checkRole:admin');
Route::post('/updateCoach/{id}', 'CoachController@updateCoach')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteCoach', 'CoachController@deleteCoach')->middleware('auth','checkRole:admin');
Route::get('/coach/tambah', 'CoachController@Coach')->middleware('auth','checkRole:admin');
Route::get('{id}/editCoach', 'CoachController@editCoach')->middleware('auth','checkRole:admin');


//Manajemen Data Mentor
Route::get('/mentor', 'MentorController@Mentor')->middleware('auth','checkRole:admin');
Route::post('/mentor/addMentor', 'MentorController@addMentor')->middleware('auth','checkRole:admin');
Route::post('/updateMentor/{id}', 'MentorController@updateMentor')->middleware('auth','checkRole:admin');
Route::get('{id}/deleteMentor', 'MentorController@deleteMentor')->middleware('auth','checkRole:admin');
Route::get('/mentor/tambah', 'MentorController@Mentor')->middleware('auth','checkRole:admin');
Route::get('{id}/editMentor', 'MentorController@editMentor')->middleware('auth','checkRole:admin');


//Manajemen Data Pendamping
Route::get('/pendamping', 'PendampingController@Pendamping')->middleware('auth','checkRole:admin');
Route::post('pendamping/addPendamping', 'PendampingController@addPendamping')->middleware('auth','checkRole:admin');
Route::post('/updatePendamping/{id}', 'PendampingController@updatePendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/deletePendamping', 'PendampingController@deletePendamping')->middleware('auth','checkRole:admin');
Route::get('/pendamping/tambah', 'PendampingController@Pendamping')->middleware('auth','checkRole:admin');
Route::get('{id}/editPendamping', 'PendampingController@editPendamping')->middleware('auth','checkRole:admin');


//Manajemen Data Tenant
Route::get('/tenant', 'TenantController@index')->middleware('auth','checkRole:admin');
