@extends('layout.main')

@section('title','SIMPIB - Form Pendampingan')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Form Pendampingan Tenant</h6>
		</div>
		<div class="card-body">
            {{-- <h4 class="card-text font-weight-bold text-center">Form Pendampingan</h4> --}}
            <form action="isiProfileUsaha" method="POST" class="needs-validation" novalidate>
                
                @csrf

                <br>

                <div class="container-fluid">
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="tgl_pendampingan">Tanggal</label>
                        :<div class="col-sm-3">
                            <input type="date" class="form-control" id="tgl_pendampingan" name="tgl_pendampingan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="tenant_id">Tenant</label>
                        :<div class="col-sm-4">
                            <select class="form-control" name="tenant_id" id="tenant_id" required>
                                <option value="" selected>Pilih Tenant</option>
    
                                @foreach($tenant as $tenants)
    
                                <option value="{{ $tenants->id }}">{{ $tenants->nama }}</option>
    
                                @endforeach
    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="perihal">Perihal</label>
                        :<div class="col-sm-4">
                            <textarea class="form-control" rows="4" id="perihal" name="perihal" placeholder="Sebutkan Perihal" required></textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="container-fluid">
                    
                    <div class="row">
                        <p class="font-weight-bold">Profil Perusahaan</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="sdm_total">Jumlah SDM Total (termasuk founder / co-founder)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="sdm_total" name="sdm_total" placeholder="Jumlah SDM Total" required>
                                    <div class="invalid-feedback">Jumlah SDM total tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="sdm_lepas">Jumlah SDM Lepas / Produksi (yang dibiayai program ppbt)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="sdm_lepas" name="sdm_lepas" placeholder="Jumlah SDM Lepas/Produksi" required>
                                    <div class="invalid-feedback">Jumlah SDM lepas/produksi tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="status_inkubator">Status Dengan Inkubator</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="status_inkubator" name="status_inkubator" placeholder="Sebutkan Status" required>
                                    <div class="invalid-feedback">Status dengan inkubator tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="luas_bangunan">Luas Bangunan (tempat usaha / inkubasi tenant ppbt)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Masukkan Jumlah Bangunan" required>
                                    <div class="invalid-feedback">Luas bangunan tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="kepemilikan_teknologi">Kepemilikan Teknologi (milik sendiri, orang lain, atau genetik/umum)</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="kepemilikan_teknologi" name="kepemilikan_teknologi" placeholder="Sebutkan Kepemilikan Teknologi" required>
                                    <div class="invalid-feedback">Kepemilikan teknologi inkubator tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Target</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="target_akhir_tahun">Akhir Tahun</label>
                                :<div class="col-sm-7">
                                    <textarea class="form-control" rows="4" id="target_akhir_tahun" name="target_akhir_tahun" placeholder="Sebutkan Target Akhir Tahun" required></textarea>
                                    <div class="invalid-feedback">Target akhir tahun tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="target_saat_ini">Sampai Dengan Saat Ini</label>
                                :<div class="col-sm-7">
                                    <textarea class="form-control" rows="4" id="target_saat_ini" name="target_saat_ini" placeholder="Sebutkan Target Sampai Saat Ini" required></textarea>
                                    <div class="invalid-feedback">Target saat ini tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Anggaran</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="jumlah_anggaran_ppbt">Jumlah Anggaran PPBT/tenant (Rp.)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="jumlah_anggaran_ppbt" name="jumlah_anggaran_ppbt" placeholder="Masukkan Jumlah Anggaran PPBT" required>
                                    <div class="invalid-feedback">Jumlah anggaran PPBT tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="anggaran_inkubator">Inkubator (Rp.)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="anggaran_inkubator" name="anggaran_inkubator" placeholder="Masukkan Jumlah Anggaran Inkubator" required>
                                    <div class="invalid-feedback">Anggaran inkubator tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Produksi Sampai Saat Ini</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="jumlah_produksi">Jumlah Produksi</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="jumlah_produksi" name="jumlah_produksi" placeholder="Masukkan Jumlah Produksi" required>
                                    <div class="invalid-feedback">Jumlah produksi PPBT tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="jumlah_penjualan">Jumlah Penjualan</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="jumlah_penjualan" name="jumlah_penjualan" placeholder="Masukkan Jumlah Penjualan" required>
                                    <div class="invalid-feedback">Jumlah penjualan tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="harga_produksi">Harga Produksi</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="harga_produksi" name="harga_produksi" placeholder="Masukkan Harga Produksi" required>
                                    <div class="invalid-feedback">Harga produksi tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="harga_produksi_unit">Harga Produksi/unit (HPP)</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="harga_produksi_unit" name="harga_produksi_unit" placeholder="Masukkan Harga Produksi/unit" required>
                                    <div class="invalid-feedback">Harga produksi unit tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="harga_jual_unit">Harga Jual/unit</label>
                                :<div class="col-sm-7">
                                    <input type="number" class="form-control" id="harga_jual_unit" name="harga_jual_unit" placeholder="Masukkan Harga Produksi/unit" required>
                                    <div class="invalid-feedback">Harga jual unit tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Perijinan</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="perijinan_perusahaan">Perusahaan (CV/PT)</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="perijinan_perusahaan" name="perijinan_perusahaan" placeholder="Sebutkan Perijinan Perusahaan" required>
                                    <div class="invalid-feedback">Perijinan perusahaan tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="perijinan_produk">Produk (HKI/Merk/ PIRT/POM/SNI/dll)</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="perijinan_produk" name="perijinan_produk" placeholder="Sebutkan Perijinan Produk" required>
                                    <div class="invalid-feedback">Perijinan produk tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Belanja Mesin</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="nama_mesin">Nama Mesin</label>
                                :<div class="col-sm-7">
                                    <textarea rows="4" class="form-control" id="nama_mesin" name="nama_mesin" placeholder="Nama Mesin (alat kopi espresso, biji kopi robusta)" required></textarea>
                                    <div class="invalid-feedback">Nama mesin tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="jumlah_mesin">Jumlah Mesin</label>
                                :<div class="col-sm-7">
                                    <textarea rows="4" class="form-control" id="jumlah_mesin" name="jumlah_mesin" placeholder="Jumlah Mesin (15 unit, 4000 kg)" required></textarea>
                                    <div class="invalid-feedback">Jumlah mesin tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="total_nilai_mesin">Total Nilai (Rp.)</label>
                                :<div class="col-sm-7">
                                    <textarea rows="4" class="form-control" id="total_nilai_mesin" name="total_nilai_mesin" placeholder="Total Nilai (Rp 7 juta, Rp 5.2 juta)" required></textarea>
                                    <div class="invalid-feedback">Total nilai tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="font-weight-bold">Inkubator (Jenis Mentoring)</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="inkubator_produk">Produk</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="inkubator_produk" name="inkubator_produk" placeholder="Sebutkan Jenis Mentoring Produk" required>
                                    <div class="invalid-feedback">Jenis mentoring produk tidak valid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="inkubator_bisnis">Bisnis</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="inkubator_bisnis" name="inkubator_bisnis" placeholder="Sebutkan Jenis Mentoring Bisnis" required>
                                    <div class="invalid-feedback">Jenis mentoring bisnis tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4" for="inkubator_administrasi">Administrasi</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="inkubator_administrasi" name="inkubator_administrasi" placeholder="Sebutkan Jenis Mentoring Administrasi" required>
                                    <div class="invalid-feedback">Jenis mentoring administrasi tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 font-weight-bold" for="lama_kontrak">Lama Kontrak dengan Inkubator</label>
                                :<div class="col-sm-7">
                                    <input type="text" class="form-control" id="lama_kontrak" name="lama_kontrak" placeholder="Lama Kontrak (tahun/bulan/hari)" required>
                                    <div class="invalid-feedback">Lama kontrak tidak valid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="masalah_administrasi">Uraian Masalah Administrasi (Pelaporan, Keuangan, dsb)</label>
                                <textarea rows="4" class="form-control" id="masalah_administrasi" name="masalah_administrasi" placeholder="Uraikan Masalah Administrasi" required></textarea>
                                <div class="invalid-feedback">Uraian masalah administrasi tidak valid</div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </div>

            </form>
        </div>
    </div>

</div>

@endsection