@extends('layout.main')

@section('title','SIMPIB - Review Registrasi Calon Tenant')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Card Content - Form -->
	<div class="card shadow mb-4">
		<ol class="breadcrumb" style="background-color: #F8F8FF">
			<li class="breadcrumb-item">
				<a href="/calonTenant" class="m-0 font-weight-bold text-primary float-left">Data Registrasi Calon Tenant</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Review</li>
		</ol>
		<div class="card-body">

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

            <hr>

            <br><h4 class="card-text font-weight-bold">Seleksi</h4><br>
            <div class="container-fluid">
                
                <form action="/terimaRegister/{{$tenant->id}}" method="POST" class="needs-validation" novalidate>

                    @csrf
                    
                    <div class="form-group row">
                        <label for="coach_id" class="col-sm-4 font-weight-bold">Coach</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="coach_id" id="coach_id" required>
                                <option value="" selected>Pilih Coach</option>
    
                                @foreach($coach as $coachs)
    
                                <option value="{{ $coachs->id }}">{{ $coachs->nama_coach }}</option>
    
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback">Coach tidak valid</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mentor_id" class="col-sm-4 font-weight-bold">Mentor</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="mentor_id" id="mentor_id" required>
                                <option value="" selected>Pilih Mentor</option>
    
                                @foreach($mentor as $mentors)
    
                                <option value="{{ $mentors->id }}">{{ $mentors->nama_mentor }}</option>
    
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback">Mentor tidak valid</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pendamping_id" class="col-sm-4 font-weight-bold">Pendamping</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="pendamping_id" id="pendamping_id" required>
                                <option value="" selected>Pilih Pendamping</option>
    
                                @foreach($pendamping as $pendampings)
    
                                <option value="{{ $pendampings->id }}">{{ $pendampings->nama_pendamping }}</option>
    
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback">Pendamping tidak valid</div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-1">
                            <a href="/tolakRegister/{{$tenant->id}}" class="btn btn-danger">
                            {{-- <button type="submit" class="btn btn-danger"> --}}
                                Tolak
                            {{-- </button> --}}
                            </a>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary">Terima</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection