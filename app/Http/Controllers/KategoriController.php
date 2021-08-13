<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryCoach;
use App\Models\CategoryMentor;
use App\Models\CategoryPendamping;
use App\Models\CategoryTenant;
use App\Models\TahapInkubasi;
use App\Models\BidangKeahlian;

class KategoriController extends Controller
{
    //Menampilkan Halaman Kategori Coach
    public function KategoriCoach()
    {
        $category = CategoryCoach::all();

        return view('kategori/coach', compact('category'));
    }

    //Menampilkan Halaman Kategori Mentor
    public function KategoriMentor()
    {
        $category = CategoryMentor::all();

        return view('kategori/mentor', compact('category'));
    }

    //Menampilkan Halaman Kategori Pendamping
    public function KategoriPendamping()
    {
        $category = CategoryPendamping::all();
        
        return view('kategori/pendamping', compact('category'));
    }

    //Menampilkan Halaman Tahap Inkubasi
    public function TahapInkubasi()
    {
        $tahap = TahapInkubasi::all();
        
        return view('kategori/tahapinkubasi', compact('tahap'));
    }

    //Menampilkan Halaman Kategori Tenant
    public function KategoriTenant()
    {
        $category = CategoryTenant::all();
        
        return view('kategori/tenant', compact('category'));
    }

    //Menampilkan Halaman Bidang Keahlian
    public function BidangKeahlian()
    {      
        $ahli = BidangKeahlian::all();
        
        return view('kategori/bidangkeahlian', compact('ahli'));
    }

    //Menambahkan Data Kategori Coach
    public function addCategoryCoach(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_coach' => 'required|unique:category_coach|alpha_num',
            'kategori_coach' => 'required|string',
        ], [
            'kode_coach.required' => 'Kode coach tidak boleh kosong',
            'kode_coach.unique' => 'Kode coach sudah ada',
            'kode_coach.alpha_num' => 'Kode coach harus berupa huruf dan angka',
            'kategori_coach.required' => 'Kategori coach tidak boleh kosong',
            'kategori_coach.string' => 'Kategori coach harus berupa string',
        ]);

        //Masuk ke Database
        CategoryCoach::create($request->all());

        return redirect('/kategoriCoach')->with('sukses', 'Kategori coach berhasil ditambahkan.');
    }

    //Menambahkan Data Kategori Mentor
    public function addCategoryMentor(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_mentor' => 'required|unique:category_mentor|alpha_num',
            'kategori_mentor' => 'required|string',
        ], [
            'kode_mentor.required' => 'Kode mentor tidak boleh kosong',
            'kode_mentor.unique' => 'Kode mentor sudah ada',
            'kode_mentor.alpha_num' => 'Kode mentor harus berupa huruf dan angka',
            'kategori_mentor.required' => 'Kategori mentor tidak boleh kosong',
            'kategori_mentor.string' => 'Kategori mentor harus berupa string',
        ]);

        //Masuk ke Database
        CategoryMentor::create($request->all());

        return redirect('/kategoriMentor')->with('sukses', 'Kategori mentor berhasil ditambahkan.');
    }

    //Menambahkan Data Kategori Pendamping
    public function addCategoryPendamping(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_pendamping' => 'required|unique:category_pendamping|alpha_num',
            'kategori_pendamping' => 'required|string',
        ], [
            'kode_pendamping.required' => 'Kode pendamping tidak boleh kosong',
            'kode_pendamping.unique' => 'Kode pendamping sudah ada',
            'kode_pendamping.alpha_num' => 'Kode pendamping harus berupa huruf dan angka',
            'kategori_pendamping.required' => 'Kategori pendamping tidak boleh kosong',
            'kategori_pendamping.string' => 'Kategori pendamping harus berupa string',
        ]);

        //Masuk ke Database
        CategoryPendamping::create($request->all());

        return redirect('/kategoriPendamping')->with('sukses', 'Kategori pendamping berhasil ditambahkan.');
    }

    //Menambahkan Data Tahapan Inkubasi
    public function addTahapInkubasi(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode' => 'required|unique:tahap_inkubasi|alpha_num',
            'tahap_inkubasi' => 'required|string',
        ], [
            'kdoe.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'kode.alpha_num' => 'Kode harus berupa huruf dan angka',
            'tahap_inkubasi.required' => 'Tahap inkubasi tidak boleh kosong',
            'tahap_inkubasi.string' => 'Tahap inkubasi harus berupa string',
        ]);

        //Masuk ke Database
        TahapInkubasi::create($request->all());

        return redirect('/tahapInkubasi')->with('sukses', 'Tahap inkubasi berhasil ditambahkan.');
    }

    //Menambahkan Data Kategori Tenant
    public function addCategoryTenant(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_tenant' => 'required|unique:category_tenant|alpha_num',
            'kategori_tenant' => 'required|string',
        ], [
            'kode_tenant.required' => 'Kode tenant tidak boleh kosong',
            'kode_tenant.unique' => 'Kode tenant sudah ada',
            'kode_tenant.alpha_num' => 'Kode tenant harus berupa huruf dan angka',
            'kategori_tenant.required' => 'Kategori tenant tidak boleh kosong',
            'kategori_tenant.string' => 'Kategori tenant harus berupa string',
        ]);

        //Masuk ke Database
        CategoryTenant::create($request->all());

        return redirect('/kategoriTenant')->with('sukses', 'Kategori tenant berhasil ditambahkan.');
    }

    //Menambahkan Data Bidang Keahlian
    public function addBidangKeahlian(Request $request)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_bidang' => 'required|unique:bidang_keahlian|alpha_num',
            'bidang_keahlian' => 'required|string',
        ], [
            'kode_bidang.required' => 'Kode bidang keahlian tidak boleh kosong',
            'kode_bidang.unique' => 'Kode bidang keahlian sudah ada',
            'kode_bidang.alpha_num' => 'Kode bidang keahlian harus berupa huruf dan angka',
            'bidang_keahlian.required' => 'Bidang keahlian tidak boleh kosong',
            'bidang_keahlian.string' => 'Bidang keahlian harus berupa string',
        ]);

        //Masuk ke Database
        BidangKeahlian::create($request->all());

        return redirect('/bidangKeahlian')->with('sukses', 'Bidang keahlian berhasil ditambahkan.');
    }

    //Mengubah Data Kategori Coach
    public function updateCategoryCoach(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_coach' => 'required|unique:category_coach|alpha_num',
            'kategori_coach' => 'required|string',
        ], [
            'kode_coach.required' => 'Kode coach tidak boleh kosong',
            'kode_coach.unique' => 'Kode coach sudah ada',
            'kode_coach.alpha_num' => 'Kode coach harus berupa huruf dan angka',
            'kategori_coach.required' => 'Kategori coach tidak boleh kosong',
            'kategori_coach.string' => 'Kategori coach harus berupa string',
        ]);

        //Mengubah Data di Database
        $category = CategoryCoach::find($id);
        $category->update($request->all());

        return redirect('/kategoriCoach')->with('sukses', 'Kategori coach berhasil diperbarui.');
    }

    //Mengubah Data Kategori Mentor
    public function updateCategoryMentor(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_mentor' => 'required|unique:category_mentor|alpha_num',
            'kategori_mentor' => 'required|string',
        ], [
            'kode_mentor.required' => 'Kode mentor tidak boleh kosong',
            'kode_mentor.unique' => 'Kode mentor sudah ada',
            'kode_mentor.alpha_num' => 'Kode mentor harus berupa huruf dan angka',
            'kategori_mentor.required' => 'Kategori mentor tidak boleh kosong',
            'kategori_mentor.string' => 'Kategori mentor harus berupa string',
        ]);

        //Mengubah Data di Database
        $category = CategoryMentor::find($id);
        $category->update($request->all());

        return redirect('/kategoriMentor')->with('sukses', 'Kategori mentor berhasil diperbarui.');
    }

    //Mengubah Data Kategori Pendamping
    public function updateCategoryPendamping(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_pendamping' => 'required|unique:category_pendamping|alpha_num',
            'kategori_pendamping' => 'required|string',
        ], [
            'kode_pendamping.required' => 'Kode pendamping tidak boleh kosong',
            'kode_pendamping.unique' => 'Kode pendamping sudah ada',
            'kode_pendamping.alpha_num' => 'Kode pendamping harus berupa huruf dan angka',
            'kategori_pendamping.required' => 'Kategori pendamping tidak boleh kosong',
            'kategori_pendamping.string' => 'Kategori pendamping harus berupa string',
        ]);

        //Mengubah Data di Database
        $category = CategoryPendamping::find($id);
        $category->update($request->all());

        return redirect('/kategoriPendamping')->with('sukses', 'Kategori pendamping berhasil diperbarui.');
    }

    //Mengubah Data Tahap Inkubasi
    public function updateTahapInkubasi(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode' => 'required|unique:tahap_inkubasi|alpha_num',
            'tahap_inkubasi' => 'required|string',
        ], [
            'kdoe.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'kode.alpha_num' => 'Kode harus berupa huruf dan angka',
            'tahap_inkubasi.required' => 'Tahap inkubasi tidak boleh kosong',
            'tahap_inkubasi.string' => 'Tahap inkubasi harus berupa string',
        ]);

        //Mengubah Data di Database
        $tahap = TahapInkubasi::find($id);
        $tahap->update($request->all());

        return redirect('/tahapInkubasi')->with('sukses', 'Tahap inkubasi berhasil diperbarui.');
    }

    //Mengubah Data Kategori Tenant
    public function updateCategoryTenant(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_tenant' => 'required|unique:category_tenant|alpha_num',
            'kategori_tenant' => 'required|string',
        ], [
            'kode_tenant.required' => 'Kode tenant tidak boleh kosong',
            'kode_tenant.unique' => 'Kode tenant sudah ada',
            'kode_tenant.alpha_num' => 'Kode tenant harus berupa huruf dan angka',
            'kategori_tenant.required' => 'Kategori tenant tidak boleh kosong',
            'kategori_tenant.string' => 'Kategori tenant harus berupa string',
        ]);

        //Mengubah Data di Database
        $category = CategoryTenant::find($id);
        $category->update($request->all());

        return redirect('/kategoriTenant')->with('sukses', 'Kategori tenant berhasil diperbarui.');
    }

    //Mengubah Data Bidang Keahlian
    public function updateBidangKeahlian(Request $request, $id)
    {
        //Validasi Inputan Form
        $request->validate([
            'kode_bidang' => 'required|unique:bidang_keahlian|alpha_num',
            'bidang_keahlian' => 'required|string',
        ], [
            'kode_bidang.required' => 'Kode bidang keahlian tidak boleh kosong',
            'kode_bidang.unique' => 'Kode bidang keahlian sudah ada',
            'kode_bidang.alpha_num' => 'Kode bidang keahlian harus berupa huruf dan angka',
            'bidang_keahlian.required' => 'Bidang keahlian tidak boleh kosong',
            'bidang_keahlian.string' => 'Bidang keahlian harus berupa string',
        ]);

        //Mengubah Data di Database
        $ahli = BidangKeahlian::find($id);
        $ahli->update($request->all());

        return redirect('/bidangKeahlian')->with('sukses', 'Bidang keahlian berhasil diperbarui.');
    }

    //Menghapus Data Kategori Coach
    public function deleteCategoryCoach($id)
    {
        //Menghapus Data di Database
        $category = CategoryCoach::find($id);
        $category->delete();

        return redirect('/kategoriCoach');
    }

    //Menghapus Data Kategori Mentor
    public function deleteCategoryMentor($id)
    {
        //Menghapus Data di Database
        $category = CategoryMentor::find($id);
        $category->delete();

        return redirect('/kategoriMentor');
    }

    //Menghapus Data Kategori Pendamping
    public function deleteCategoryPendamping($id)
    {
        //Menghapus Data di Database
        $category = CategoryPendamping::find($id);
        $category->delete();

        return redirect('/kategoriPendamping');
    }

    //Menghapus Data Tahap Inkubasi
    public function deleteTahapInkubasi($id)
    {
        //Menghapus Data di Database
        $category = TahapInkubasi::find($id);
        $category->delete();

        return redirect('/tahapInkubasi');
    }

    //Menghapus Data Kategori Tenant
    public function deleteCategoryTenant($id)
    {
        //Menghapus Data di Database
        $category = CategoryTenant::find($id);
        $category->delete();

        return redirect('/kategoriTenant');
    }

    //Menghapus Data Bidang Keahlian
    public function deleteBidangKeahlian($id)
    {
        //Menghapus Data di Database
        $ahli = BidangKeahlian::find($id);
        $ahli->delete();

        return redirect('/bidangKeahlian');
    }
}
