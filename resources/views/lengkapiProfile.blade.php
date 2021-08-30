@extends('layout.main')

@section('title','SIMPIB - Lengkapi Data Diri dan Usaha')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Form Profil Diri dan Usaha Calon Tenant</h6>
		</div>
		<div class="card-body">
            <h4 class="card-text font-weight-bold">Profil Diri</h4>
			<p class="card-text" style="color: red">* Wajib</p>
            <form action="isiProfileUsaha" method="POST" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                        <div class="invalid-feedback">Nama tidak valid</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="no_identitas">No. Identitas (KTP/SIM)</label>
                        <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Masukkan No. Identitas" required>
                        <div class="invalid-feedback">No. Identitas tidak valid</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki">
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        <div class="invalid-feedback">Tempat lahir tidak valid</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        <div class="invalid-feedback">Tempat lahir tidak valid</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk">Status Perkawinan</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_kawin" id="belummenikah" value="Belum menikah">
                            <label class="form-check-label" for="belummenikah">Belum menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_kawin" id="menikah" value="Menikah">
                            <label class="form-check-label" for="menikah">Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_kawin" id="jandaduda" value="Janda/Duda">
                            <label class="form-check-label" for="jandaduda">Janda/Duda</label>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="asterisk">Pendidikan Terakhir (saat ini)</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan_akhir" id="kuliahdiplomas1" value="Masih kuliah Diploma/S1">
                            <label class="form-check-label" for="kuliahdiplomas1">Masih kuliah Diploma/S1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan_akhir" id="kuliahs2s3" value="Masih kuliah S2/S3">
                            <label class="form-check-label" for="kuliahs2s3">Masih kuliah S2/S3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan_akhir" id="alumnikuliah" value="Alumni Diploma/S1/S2/S3">
                            <label class="form-check-label" for="alumnikuliah">Alumni Diploma/S1/S2/S3</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="perguruan_tinggi">Perguruan Tinggi</label>
                        <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Sebutkan Nama Perguruan Tinggi">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="jurusan">Fakultas/Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Sebutkan Fakultas/Jurusan Anda">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label class="asterisk" for="alamat">Alamat Tinggal</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda Tinggal" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos Anda">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="no_hp">No. Telp/HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. Telp/HP">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="Masukkan Alamat Website Anda">
                    </div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-12"><hr></div>
				</div>
                <h4 class="card-text font-weight-bold">Profil Usaha</h4>
                <p class="card-text" style="color: red">* Wajib</p>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="nama_usaha">Nama Usaha</label>
                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Masukkan Nama Usaha Anda">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="produk">Produk Usaha</label>
                        <input type="email" class="form-control" id="produk" name="produk" placeholder="Sebutkan Produk Usaha Anda">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk">Bentuk Badan Usaha</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bentuk_badan" type="radio" id="belumbadanusaha" value="Belum berbadan usaha">
                            <label class="form-check-label" for="belumbadanusaha">Belum berbadan usaha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bentuk_badan" type="radio" id="cvpt" value="CV/PT">
                            <label class="form-check-label" for="cvpt">CV/PT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bentuk_badan" type="radio" id="bentuklainnya" value="Lainnya">
                            <label class="form-check-label" for="bentuklainnya">Lainnya</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label class="asterisk">Kategori Usaha (pilih salah satu)</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_usaha" id="agrobisnis" value="Agrobisnis">
                            <label class="form-check-label" for="agrobisnis"><b>Agrobisnis</b></label><br>
                            <p>(Suatu usaha yang memberikan nilai tambah dengan 
                                memproduksi dan atau memperdagangkan produk 
                                pangan antara lain industri pengolah makanan dan 
                                minuman yang berasal dari pertanian, peternakan, 
                                Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_usaha" id="agroindustri" value="Agroindustri">
                            <label class="form-check-label" for="agroindustri"><b>Agroindustri</b></label><br>
                            <p>(Suatu usaha yang menghasilkan produk 
                                manufaktur di bidang pertanian, peternakan, 
                                Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="mulai_usaha">Mulai Usaha</label>
                        <input type="date" class="form-control" id="mulai_usaha" name="mulai_usaha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label class="asterisk" for="alamat_usaha">Alamat Usaha</label>
                        <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" placeholder="Masukkan Alamat Usaha Anda">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="kode_pos_usaha">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos_usaha" name="kode_pos_usaha" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="no_hp_usaha">No. Telp/HP Usaha</label>
                        <input type="text" class="form-control" id="no_hp_usaha" name="no_hp_usaha" placeholder="No. Telp/HP Usaha">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="email_usaha">E-mail Usaha</label>
                        <input type="email" class="form-control" id="email_usaha" name="email_usaha" placeholder="Alamat E-mail Usaha">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="website_usaha">Website Usaha</label>
                        <input type="text" class="form-control" id="website_usaha" name="website_usaha" placeholder="Alamat Website Usaha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="asterisk" for="modal">Modal Usaha</label>
                        <input type="text" class="form-control" id="modal" name="modal" placeholder="Modal Usaha Anda">
                    </div>
                </div>
                <label class="asterisk"><b>Omzet Usaha</b></label>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="omzet_1">Tahun 2017</label>
                        <input type="text" class="form-control" id="omzet_1" name="omzet_1" placeholder="Omzet di Tahun 2017">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="omzet_2">Tahun 2016</label>
                        <input type="text" class="form-control" id="omzet_2" name="omzet_2" placeholder="Omzet di Tahun 2016">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="omzet_3">Tahun 2015</label>
                        <input type="text" class="form-control" id="omzet_3" name="omzet_3" placeholder="Omzet di Tahun 2015">
                    </div>
                </div>
                <label class="asterisk"><b>Profit Usaha</b></label>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="profit_1">Tahun 2017</label>
                        <input type="text" class="form-control" id="profit_1" name="profit_1" placeholder="Profit di Tahun 2017">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="profit_2">Tahun 2016</label>
                        <input type="text" class="form-control" id="profit_2" name="profit_2" placeholder="Profit di Tahun 2016">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="profit_3">Tahun 2015</label>
                        <input type="text" class="form-control" id="profit_3" name="profit_3" placeholder="Profit di Tahun 2015">
                    </div>
                </div>
                <label class="asterisk"><b>Komposisi Modal Usaha (saat ini)</b></label>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="modal_sendiri">Sendiri</label>
                        <input type="text" class="form-control" id="modal_sendiri" name="modal_sendiri" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modal_keluarga">Keluarga</label>
                        <input type="text" class="form-control" id="modal_keluarga" name="modal_keluarga" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modal_investor">Teman/Investor</label>
                        <input type="text" class="form-control" id="modal_investor" name="modal_investor" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modal_bank">Perbankan</label>
                        <input type="text" class="form-control" id="modal_bank" name="modal_bank" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="modal_total">Total</label>
                        <input type="text" class="form-control" id="modal_total" name="modal_total" placeholder="Rp. 4.000.000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="jumlah_cabang"><b>Jumlah Cabang</b></label>
                        <input type="text" class="form-control" id="jumlah_cabang" name="jumlah_cabang" placeholder="Jumlah Cabang Usaha Anda">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="jumlah_pegawai"><b>Jumlah Pegawai</b></label>
                        <input type="text" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" placeholder="Jumlah Pegawai Anda">
                    </div>
                </div>
                <div class="form-group">
                    <label class="asterisk"><b>Siapa yang awal mula merintis 
                        usaha yang Anda jalankan saat 
                        ini?</b></label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perintis" id="andasendiri" value="Anda Sendiri">
                            <label class="form-check-label" for="andasendiri">Anda Sendiri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perintis" id="keluarga" value="Keluarga">
                            <label class="form-check-label" for="keluarga">Keluarga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perintis" id="partnerusaha" value="Partner Usaha">
                            <label class="form-check-label" for="partnerusaha">Partner Usaha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perintis" id="peloporlainnya" value="Lainnya">
                            <label class="form-check-label" for="peloporlainnya">Lainnya</label>
                        </div>
                </div>
                <div class="form-group">
                    <label class="asterisk" for="prestasi">Prestasi / penghargaan yang pernah diraih</label>
                    <input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Jika banyak gunakan koma (,)">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            “Dengan ini saya menyatakan bahwa usaha yang saya jalankan tidak bertentangan dengan ketertiban 
                            umum, kesusilaan dan ketentuan perundang-undangan. Saya juga menyatakan bahwa seluruh 
                            informasi yang saya berikan dalam formulir pendaftaran ini adalah benar adanya. Apabila ternyata 
                            dikemudian hari terdapat tuntutan / gugatan dari pihak manapun maka saya bersedia menanggung 
                            seluruh akibat atas tuntutan / gugatan dari manapun tersebut dan membebaskan Pusat Inkubator 
                            Bisnis LPPM Unsoed dari segala tuntutan / gugatan serta kerugian berupa apapun”.
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Mendaftar</button>
            </form>
		</div>
	</div>
</div>

@endsection