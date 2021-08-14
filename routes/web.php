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
});


//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});


//Login
Route::get('/login', 'LoginController@LoginPage');


//Registrasi
Route::get('/registration', 'RegistrationController@RegistrationPage');


//Kategori Coach
Route::get('/kategoriCoach', 'KategoriController@KategoriCoach');
Route::post('/addCategoryCoach', 'KategoriController@addCategoryCoach');
Route::post('{id}/updateCategoryCoach', 'KategoriController@updateCategoryCoach');
Route::get('{id}/deleteCategoryCoach', 'KategoriController@deleteCategoryCoach');


//Kategori Mentor
Route::get('/kategoriMentor', 'KategoriController@KategoriMentor');
Route::post('/addCategoryMentor', 'KategoriController@addCategoryMentor');
Route::post('{id}/updateCategoryMentor', 'KategoriController@updateCategoryMentor');
Route::get('{id}/deleteCategoryMentor', 'KategoriController@deleteCategoryMentor');


//Kategori Pendamping
Route::get('/kategoriPendamping', 'KategoriController@KategoriPendamping');
Route::post('/addCategoryPendamping', 'KategoriController@addCategoryPendamping');
ROute::post('{id}/updateCategoryPendamping', 'KategoriController@updateCategoryPendamping');
Route::get('{id}/deleteCategoryPendamping', 'KategoriController@deleteCategoryPendamping');


//Tahap Inkubasi
Route::get('/tahapInkubasi', 'KategoriController@TahapInkubasi');
Route::post('/addTahapInkubasi', 'KategoriController@addTahapInkubasi');
Route::post('{id}/updateTahapInkubasi', 'KategoriController@updateTahapInkubasi');
Route::get('{id}/deleteTahapInkubasi', 'KategoriController@deleteTahapInkubasi');


//Kategori Tenant
Route::get('/kategoriTenant', 'KategoriController@KategoriTenant');
Route::post('/addCategoryTenant', 'KategoriController@addCategoryTenant');
Route::post('{id}/updateCategoryTenant', 'KategoriController@updateCategoryTenant');
Route::get('{id}/deleteCategoryTenant', 'KategoriController@deleteCategoryTenant');


//Bidang Keahlian
Route::get('/bidangKeahlian', 'KategoriController@BidangKeahlian');
Route::post('/addBidangKeahlian', 'KategoriController@addBidangKeahlian');
Route::post('{id}/updateBidangKeahlian', 'KategoriController@updateBidangKeahlian');
Route::get('{id}/deleteBidangKeahlian', 'KategoriController@deleteBidangKeahlian');


//Data Admin atau Pengelola Inkubator
Route::get('/admin', 'AdminController@index');


//Manajemen Data Coach
Route::get('/coach', 'CoachController@Coach');
Route::post('/addCoach', 'CoachController@addCoach');
Route::post('{id}/updateCoach', 'CoachController@updateCoach');
Route::get('{id}/deleteCoach', 'CoachController@deleteCoach');


//Manajemen Data Mentor
Route::get('/mentor', 'MentorController@Mentor');
Route::post('/addMentor', 'MentorController@addMentor');
Route::post('{id}/updateMentor', 'MentorController@updateMentor');
Route::get('{id}/deleteMentor', 'MentorController@deleteMentor');


//Manajemen Data Pendamping
Route::get('/pendamping', 'PendampingController@Pendamping');
Route::post('/addPendamping', 'PendampingController@addPendamping');
Route::post('{id}/updatePendamping', 'PendampingController@updatePendamping');
Route::get('{id}/deletePendamping', 'PendampingController@deletePendamping');


//Manajemen Data Tenant
Route::get('/tenant', 'TenantController@index');
