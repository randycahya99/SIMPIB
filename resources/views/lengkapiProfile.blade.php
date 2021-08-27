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
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="identitas">No. Identitas (KTP/SIM)</label>
                        <input type="text" class="form-control" id="identitas" placeholder="Masukkan No. Identitas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="JenisKelamin" id="laki" value="Laki-laki">
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="JenisKelamin" id="perempuan" value="Perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="tempatlahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="tanggallahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggallahir">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk">Status Perkawinan</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="StatusKawin" id="belummenikah" value="Belum Menikah">
                            <label class="form-check-label" for="belummenikah">Belum menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="StatusKawin" id="menikah" value="Menikah">
                            <label class="form-check-label" for="menikah">Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="StatusKawin" id="jandaduda" value="Janda/Duda">
                            <label class="form-check-label" for="jandaduda">Janda/Duda</label>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="asterisk">Pendidikan Terakhir (saat ini)</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Pendidikan" id="kuliahdiplomas1" value="Masih kuliah Diploma/S1">
                            <label class="form-check-label" for="kuliahdiplomas1">Masih kuliah Diploma/S1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Pendidikan" id="kuliahs2s3" value="Masih kuliah S2/S3">
                            <label class="form-check-label" for="kuliahs2s3">Masih kuliah S2/S3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Pendidikan" id="alumnikuliah" value="Alumni Diploma/S1/S2/S3">
                            <label class="form-check-label" for="alumnikuliah">Alumni Diploma/S1/S2/S3</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="perguruantinggi">Perguruan Tinggi</label>
                        <input type="text" class="form-control" id="perguruantinggi" placeholder="Sebutkan Nama Perguruan Tinggi">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="fakultasjurusan">Fakultas/Jurusan</label>
                        <input type="text" class="form-control" id="fakultasjurusan" placeholder="Sebutkan Fakultas/Jurusan Anda">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label class="asterisk" for="alamat">Alamat Tinggal</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda Tinggal">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="kodepos">Kode Pos</label>
                        <input type="text" class="form-control" id="kodepos" placeholder="Kode Pos Anda">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="telphp">No. Telp/HP</label>
                        <input type="text" class="form-control" id="telphp" placeholder="Masukkan No. Telp/HP">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan Alamat E-mail Anda">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="website">Website</label>
                        <input type="text" class="form-control" id="website" placeholder="Masukkan Alamat Website Anda">
                    </div>
                </div>
                <div class="form-row">
					<div class="form-group col-md-12"><hr></div>
				</div>
                <h4 class="card-text font-weight-bold">Profil Usaha</h4>
                <p class="card-text" style="color: red">* Wajib</p>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="namausaha">Nama Usaha</label>
                        <input type="text" class="form-control" id="namausaha" placeholder="Masukkan Nama Usaha Anda">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="produkusaha">Produk Usaha</label>
                        <input type="email" class="form-control" id="produkusaha" placeholder="Sebutkan Produk Usaha Anda">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk">Bentuk Badan Usaha</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="BadanUsaha" type="radio" id="belumbadanusaha" value="Belum berbadan usaha">
                            <label class="form-check-label" for="belumbadanusaha">Belum berbadan usaha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="BadanUsaha" type="radio" id="cvpt" value="CV/PT">
                            <label class="form-check-label" for="cvpt">CV/PT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="BadanUsaha" type="radio" id="bentuklainnya" value="Lainnya">
                            <label class="form-check-label" for="bentuklainnya">Lainnya</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label class="asterisk">Kategori Usaha (pilih salah satu)</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="KategoriUsaha" id="agrobisnis" value="Agrobisnis">
                            <label class="form-check-label" for="agrobisnis"><b>Agrobisnis</b></label><br>
                            <p>(Suatu usaha yang memberikan nilai tambah dengan 
                                memproduksi dan atau memperdagangkan produk 
                                pangan antara lain industri pengolah makanan dan 
                                minuman yang berasal dari pertanian, peternakan, 
                                Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="KategoriUsaha" id="agroindustri" value="Agroindustri">
                            <label class="form-check-label" for="agroindustri"><b>Agroindustri</b></label><br>
                            <p>(Suatu usaha yang menghasilkan produk 
                                manufaktur di bidang pertanian, peternakan, 
                                Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="mulaiusaha">Mulai Usaha</label>
                        <input type="date" class="form-control" id="mulaiusaha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label class="asterisk" for="alamatusaha">Alamat Usaha</label>
                        <input type="text" class="form-control" id="alamatusaha" placeholder="Masukkan Alamat Usaha Anda">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="kodeposusaha">Kode Pos</label>
                        <input type="text" class="form-control" id="kodeposusaha" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="telphpusaha">No. Telp/HP Usaha</label>
                        <input type="text" class="form-control" id="telphpusaha" placeholder="No. Telp/HP Usaha">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="emailusaha">E-mail Usaha</label>
                        <input type="email" class="form-control" id="emailusaha" placeholder="Alamat E-mail Usaha">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="asterisk" for="websiteusaha">Website Usaha</label>
                        <input type="text" class="form-control" id="websiteusaha" placeholder="Alamat Website Usaha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="asterisk" for="modalusaha">Modal Usaha</label>
                        <input type="text" class="form-control" id="modalusaha" placeholder="Modal Usaha Anda">
                    </div>
                </div>
                <label class="asterisk"><b>Omzet Usaha</b></label>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="omzetusaha1">Tahun 2017</label>
                        <input type="text" class="form-control" id="omzetusaha1" placeholder="Omzet di Tahun 2017">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="omzetusaha2">Tahun 2016</label>
                        <input type="text" class="form-control" id="omzetusaha2" placeholder="Omzet di Tahun 2016">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="omzetusaha3">Tahun 2015</label>
                        <input type="text" class="form-control" id="omzetusaha3" placeholder="Omzet di Tahun 2015">
                    </div>
                </div>
                <label class="asterisk"><b>Profit Usaha</b></label>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="profitusaha1">Tahun 2017</label>
                        <input type="text" class="form-control" id="profitusaha1" placeholder="Profit di Tahun 2017">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="profitusaha2">Tahun 2016</label>
                        <input type="text" class="form-control" id="profitusaha2" placeholder="Profit di Tahun 2016">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="profitusaha3">Tahun 2015</label>
                        <input type="text" class="form-control" id="profitusaha3" placeholder="Profit di Tahun 2015">
                    </div>
                </div>
                <label class="asterisk"><b>Komposisi Modal Usaha (saat ini)</b></label>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="modalsendiri">Sendiri</label>
                        <input type="text" class="form-control" id="modalsendiri" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modalkeluarga">Keluarga</label>
                        <input type="text" class="form-control" id="modalkeluarga" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modalkeluarga">Teman/Investor</label>
                        <input type="text" class="form-control" id="modalinvestor" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="modalbank">Perbankan</label>
                        <input type="text" class="form-control" id="modalbank" placeholder="Rp. 1.000.000">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="totalmodal">Total</label>
                        <input type="text" class="form-control" id="totalmodal" placeholder="Rp. 4.000.000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="cabangusaha"><b>Jumlah Cabang</b></label>
                        <input type="text" class="form-control" id="cabangusaha" placeholder="Jumlah Cabang Usaha Anda">
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-2">
                        <label class="asterisk" for="jumlahpegawai"><b>Jumlah Pegawai</b></label>
                        <input type="text" class="form-control" id="jumlahpegawai" placeholder="Jumlah Pegawai Anda">
                    </div>
                </div>
                <div class="form-group">
                    <label class="asterisk"><b>Siapa yang awal mula merintis 
                        usaha yang Anda jalankan saat 
                        ini?</b></label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PeloporUsaha" id="andasendiri" value="Anda Sendiri">
                            <label class="form-check-label" for="andasendiri">Anda Sendiri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PeloporUsaha" id="keluarga" value="Keluarga">
                            <label class="form-check-label" for="keluarga">Keluarga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PeloporUsaha" id="partnerusaha" value="Partner Usaha">
                            <label class="form-check-label" for="partnerusaha">Partner Usaha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PeloporUsaha" id="peloporlainnya" value="Lainnya">
                            <label class="form-check-label" for="peloporlainnya">Lainnya</label>
                        </div>
                </div>
                <div class="form-group">
                    <label class="asterisk" for="prestasiusaha">Prestasi / penghargaan yang pernah diraih</label>
                    <input type="text" class="form-control" id="prestasiusaha" placeholder="Jika banyak gunakan koma (,)">
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