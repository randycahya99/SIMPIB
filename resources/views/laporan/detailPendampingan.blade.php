@extends('layout.main')

@section('title','SIMPIB - Laporan Pendampingan')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<a href="/laporanPendampingan" class="btn btn-secondary">
                Kembali
            </a>
		</div>
		<div class="card-body">

            <div class="form-group row">
                <div class="col-sm-1">
                    
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="card-text font-weight-bold">Penanggung Jawab</h4><br>
                <div class="container-fluid">
                    <div class="form-group row">
                        <p class=" col-sm-4 font-weight-bold">Pendamping</p>
                        <div class="container-fluid">
                            <div class="form-group row">
                                <p class=" col-sm-3">Kode</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->pendampings->categories->kode_pendamping}}</p>
                                </div>
                                <p class=" col-sm-3">Nama</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->pendampings->nama_pendamping}}</p>
                                </div>
                                <p class=" col-sm-3">Bidang Keahlian</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->pendampings->bidangs->bidang_keahlian}} ({{$form->pendampings->bidangs->kode_bidang}})</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container-fluid">
                <br><h4 class="card-text font-weight-bold">Profile Perusahaan</h4><br>
                <div class="container-fluid">
                    <div class="form-group row">
                        <p class=" col-sm-3 font-weight-bold">Nama Pengusaha PPBT</p>
                        <div class="col-sm-9">
                            <p>: {{$form->tenants->nama}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Nama Perusahaan</p>
                        <div class="col-sm-9">
                            <p>: {{$form->tenants->usahas->nama_usaha}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Nama Founder</p>
                        <div class="col-sm-9">
                            <p>: {{$form->tenants->nama}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Jumlah SDM Total<br>(termasuk founder/co-founder)</p>
                        <div class="col-sm-9">
                            <p>: {{$form->sdm_total}} orang</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Jumlah SDM Lepas / Produksi<br>(yang dibiayai program PPBT)</p>
                        <div class="col-sm-9">
                            <p>: {{$form->sdm_lepas}} orang</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Status Dengan Inkubator</p>
                        <div class="col-sm-9">
                            <p>: {{$form->status_inkubator}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Luas Bangunan<br>(tempat usaha/inkubasi tenant PPBT)</p>
                        <div class="col-sm-9">
                            <p>: {{$form->luas_bangunan}} m2</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Kepemilikan Teknologi</p>
                        <div class="col-sm-9">
                            <p>: {{$form->kepemilikan_teknologi}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Lama Kontrak Dengan Inkubator</p>
                        <div class="col-sm-9">
                            <p>: {{$form->lama_kontrak}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container-fluid">
                
                <br><h5 class="card-text font-weight-bold">Target</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="50%">Akhir Tahun</th>
                                        <th width="50%">Sampai Dengan Saat Ini</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->target_akhir_tahun}}</td>
                                        <td>{{$form->target_saat_ini}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Anggaran</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="50%">Jumlah Anggaran PPBT/tenant (Rp.)</th>
                                        <th width="50%">Inkubator (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@currency($form->jumlah_anggaran_ppbt)</td>
                                        <td>@currency($form->anggaran_inkubator)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Produksi Sampai Saat Ini</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="33%">Jumlah Produksi</th>
                                        <th width="34%">Jumlah Penjualan</th>
                                        <th width="33%">Harga Produksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->jumlah_produksi}}</td>
                                        <td>{{$form->jumlah_penjualan}}</td>
                                        <td>{{$form->harga_produksi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="50%">Harga Produksi/unit (HPP)</th>
                                        <th width="50%">Harga Jual/unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@currency($form->harga_produksi_unit)</td>
                                        <td>@currency($form->harga_jual_unit)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Perijinan</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="50%">Perusahaan (CV/PT)</th>
                                        <th width="50%">Produk (HKI/Merk/PIRT/POM/SNI/dll)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->perijinan_perusahaan}}</td>
                                        <td>{{$form->perijinan_produk}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Belanja Mesin</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="33%">Nama Mesin</th>
                                        <th width="34%">Jumlah Mesin</th>
                                        <th width="33%">Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->nama_mesin}}</td>
                                        <td>{{$form->jumlah_mesin}}</td>
                                        <td>{{$form->total_nilai_mesin}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Inkubator</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th colspan="3">Jenis Mentoring</th>
                                    </tr>
                                    <tr>
                                        <th width="33%">Produk</th>
                                        <th width="34%">Bisnis</th>
                                        <th width="33%">Administrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->inkubator_produk}}</td>
                                        <td>{{$form->inkubator_bisnis}}</td>
                                        <td>{{$form->inkubator_administrasi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Uraian Masalah Administrasi</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="100%">Uraian Masalah Administrasi (Pelaporan, Keuangan, dsb)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->masalah_administrasi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <br>

            <div>
                <div class="text-center">
                    <form action="/cetakLaporanPendampingan" method="GET">
                        <input type="hidden" id="laporan_id" name="laporan_id" value="{{$form->id}}">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"> Export PDF</i></button>
                    </form>
                    {{-- <a href="/cetakLaporanPendampingan/{{$form->id}}" class="btn btn-primary btn-sm" id="pdf"><i class="fa fa-print"> Export PDF</i></a> --}}
                </div>
            </div>
            
        </div>
    </div>

</div>

@endsection