@extends('layout.main')

@section('title','SIMPIB - Review Registrasi Calon Tenant')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<a href="/historiPendaftaran" class="btn btn-secondary">
                Kembali
            </a>
		</div>
		<div class="card-body">

            <div class="form-group row">
                <div class="col-sm-1">
                    
                </div>
            </div>

            <h4 class="card-text font-weight-bold">Profile Diri</h4><br>
            <div class="container-fluid">
                <div class="form-group row">
                    <p class=" col-sm-4 font-weight-bold">Nama Lengkap</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->nama}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">No. Identitas</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->no_identitas}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Jenis Kelamin</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->jenis_kelamin}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Tempat Lahir</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->tempat_lahir}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Tanggal Lahir</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->tanggal_lahir}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Status Perkawinan</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->status_kawin}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Pendidikan Terakhir</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->pendidikan_akhir}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Perguruan Tinggi</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->perguruan_tinggi}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Jurusan</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->jurusan}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Alamat</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->alamat}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Kode Pos</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->kode_pos}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">No. HP/Telp</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->no_hp}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">E-mail</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->email}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Website</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->website}}</p>
                    </div>
                </div>
            </div>

            <hr>

            <br><h4 class="card-text font-weight-bold">Profile Usaha</h4><br>
            <div class="container-fluid">
                <div class="form-group row">
                    <p class=" col-sm-4 font-weight-bold">Nama Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->nama_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Produk Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->produk}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Bentuk Badan Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->bentuk_badan}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Kategori Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->kategori_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Mulai Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->mulai_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Alamat Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->alamat_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Kode Pos</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->kode_pos_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">No. HP/Telp</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->no_hp_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">E-mail Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->email_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Website Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->website_usaha}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Modal Usaha</p>
                    <div class="col-sm-8">
                        <p>: @currency($tenant->usahas->modal)</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Omzet</p>
                    <div class="container-fluid">
                        <div class="form-group row">
                            <p class=" col-sm-4">Tahun 2017</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->omzet_1)</p>
                            </div>
                            <p class=" col-sm-4">Tahun 2018</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->omzet_2)</p>
                            </div>
                            <p class=" col-sm-4">Tahun 2019</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->omzet_3)</p>
                            </div>
                        </div>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Profit</p>
                    <div class="container-fluid">
                        <div class="form-group row">
                            <p class=" col-sm-4">Tahun 2017</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->profit_1)</p>
                            </div>
                            <p class=" col-sm-4">Tahun 2018</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->profit_2)</p>
                            </div>
                            <p class=" col-sm-4">Tahun 2019</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->profit_3)</p>
                            </div>
                        </div>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Modal</p>
                    <div class="container-fluid">
                        <div class="form-group row">
                            <p class=" col-sm-4">Sendiri</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->modal_sendiri)</p>
                            </div>
                            <p class=" col-sm-4">Keluarga</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->modal_keluarga)</p>
                            </div>
                            <p class=" col-sm-4">Investor</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->modal_investor)</p>
                            </div>
                            <p class=" col-sm-4">Perbankan</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->modal_bank)</p>
                            </div>
                            <p class=" col-sm-4">Total</p>
                            <div class="col-sm-8">
                                <p>: @currency($tenant->usahas->modal_total)</p>
                            </div>
                        </div>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Jumlah Cabang</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->jumlah_cabang}} cabang usaha</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Jumlah Pegawai</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->jumlah_pegawai}} orang</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Perintis Usaha</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->perintis}}</p>
                    </div>
                    <p class=" col-sm-4 font-weight-bold">Prestasi</p>
                    <div class="col-sm-8">
                        <p>: {{$tenant->usahas->prestasi}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection