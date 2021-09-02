<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

use App\User;
Use App\Models\Tenant;
use App\Models\Usaha;
use Auth;

class RegisterController extends Controller
{
    // Registrasi Tenant
    public function RegisterTenant(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'E-mail tidak boleh kosong',
            'email.email' => 'Inputan harus berupa email (Contoh: tes@gmail.com)',
            'email.unique' => 'Alamat E-mail sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        // Menambahkan Akun User Calon Tenant ke Database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Menambahkan Role Kepada Akun User
        $user->assignRole('calon tenant');

        // Mengirim E-mail Verifikasi
        // event(new Registered($user));

        return redirect()->route('login')->with('sukses', 'Registrasi berhasil. Silahkan login dengan e-mail dan password Anda. Cek kotak masuk di e-mail Anda untuk melakukan verifikasi.');
    }

    // Menampilkan Halaman Registrasi Profil DIri dan Usaha Calon Tenant
    public function LengkapiProfile()
    {
        return view('lengkapiProfile');
    }

    // Registrasi Data Diri dan Data Usaha Calon Tenant
    public function IsiProfileUsaha(Request $request)
    {
        // Validasi Inputan Form
        $request->validate([
            // Form Data Diri
            'user_id' => 'required',
            'nama' => 'required',
            'no_identitas' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_kawin' => 'required',
            'pendidikan_akhir' => 'required',
            'perguruan_tinggi' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'website' => 'required',
            // Form Data Usaha
            'nama_usaha' => 'required',
            'produk' => 'required',
            'bentuk_badan' => 'required',
            'kategori_usaha' => 'required',
            'mulai_usaha' => 'required',
            'alamat_usaha' => 'required',
            'kode_pos_usaha' => 'required',
            'no_hp_usaha' => 'required',
            'email_usaha' => 'required',
            'website_usaha' => 'required',
            'modal' => 'required',
            'omzet_1' => 'required',
            'omzet_2' => 'required',
            'omzet_3' => 'required',
            'profit_1' => 'required',
            'profit_2' => 'required',
            'profit_3' => 'required',
            'modal_sendiri' => 'required',
            'modal_keluarga' => 'required',
            'modal_investor' => 'required',
            'modal_bank' => 'required',
            'modal_total' => 'required',
            'jumlah_cabang' => 'required',
            'jumlah_pegawai' => 'required',
            'perintis' => 'required',
            'prestasi' => 'required'
        ], [
            //
        ]);

        // Menambahkan Data Diri Calon Tenant ke Database
        $tenant = Tenant::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_kawin' => $request->status_kawin,
            'pendidikan_akhir' => $request->pendidikan_akhir,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'website' => $request->website
        ]);

        // Menambahkan Data Usaha Calon Tenant ke Database
        $usaha = Usaha::create([
            'nama_usaha' => $request->nama_usaha,
            'produk' => $request->produk,
            'bentuk_badan' => $request->bentuk_badan,
            'kategori_usaha' => $request->kategori_usaha,
            'mulai_usaha' => $request->mulai_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'kode_pos_usaha' => $request->kode_pos_usaha,
            'no_hp_usaha' => $request->no_hp_usaha,
            'email_usaha' => $request->email_usaha,
            'website_usaha' => $request->website_usaha,
            'modal' => $request->modal,
            'omzet_1' => $request->omzet_1,
            'omzet_2' => $request->omzet_2,
            'omzet_3' => $request->omzet_3,
            'profit_1' => $request->profit_1,
            'profit_2' => $request->profit_2,
            'profit_3' => $request->profit_3,
            'modal_sendiri' => $request->modal_sendiri,
            'modal_keluarga' => $request->modal_keluarga,
            'modal_investor' => $request->modal_investor,
            'modal_bank' => $request->modal_bank,
            'modal_total' => $request->modal_total,
            'jumlah_cabang' => $request->jumlah_cabang,
            'jumlah_pegawai' => $request->jumlah_pegawai,
            'perintis' => $request->perintis,
            'prestasi' => $request->prestasi
        ]);

        // Menyimpan Data Relasi Tabel Tenant Dengan Usaha
        $tenant->usahas()->save($usaha);

        return redirect('/historiPendaftaran')->with('sukses', 'Data Anda berhasil dikirimkan. Silahkan tunggu proses seleksi dari pihak PIB Unsoed.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
