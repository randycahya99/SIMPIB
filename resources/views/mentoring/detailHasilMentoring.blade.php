@extends('layout.main')

@section('title','SIMPIB - Detail Hasil Mentoring')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<a href="/hasilMentoring" class="btn btn-secondary">
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
                        <p class=" col-sm-4 font-weight-bold">Mentor</p>
                        <div class="container-fluid">
                            <div class="form-group row">
                                <p class=" col-sm-3">Kode</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->mentors->categories->kode_mentor}}</p>
                                </div>
                                <p class=" col-sm-3">Nama</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->mentors->nama_mentor}}</p>
                                </div>
                                <p class=" col-sm-3">Bidang Keahlian</p>
                                <div class="col-sm-9">
                                    <p>: {{$form->mentors->bidangs->bidang_keahlian}} ({{$form->mentors->bidangs->kode_bidang}})</p>
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
                        <p class=" col-sm-3 font-weight-bold">Bentuk Badan Perusahaan</p>
                        <div class="col-sm-9">
                            <p>: {{$form->tenants->usahas->bentuk_badan}}</p>
                        </div>
                        <p class=" col-sm-3 font-weight-bold">Kategori Usaha</p>
                        <div class="col-sm-9">
                            <p>: {{$form->tenants->usahas->kategori_usaha}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container-fluid">
            
                <br><h5 class="card-text font-weight-bold">Strategi Marketing</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="100%">Strategi Marketing Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->strategi_marketing}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Pengembangan Produk</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="100%">Pengembangan Produk Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->pengembangan_produk}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Branding</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="100%">Branding Usaha Tenant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->branding}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><h5 class="card-text font-weight-bold">Sistemasi Organisasi</h5>
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="100%">Sistemasi Organisasi Perusahaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$form->sistemasi_organisasi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection