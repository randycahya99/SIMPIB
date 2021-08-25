@extends('layout.main')

@if (Request::is('mentor'))

@section('title','SIMPIB - Data Mentor')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Mentor</h6>
			{{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah"> --}}
				<a href="/mentor/tambah" class="btn  btn-sm btn-primary" title="Tambah">
					Tambah Mentor
				</a>
			{{-- </button> --}}
		</div>
		<div class="card-body">
<!-- 			@if ($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal menambahkan data Produk dikarenakan :</strong>
				<ul>
					@foreach ($errors->all() as $error)

					<li>{{ $error }}</li>

					@endforeach
				</ul>
				<strong>Silahkan perbaiki kembali data dalam form!</strong>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif -->

<!-- 			@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>{{ session('success') }}</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif -->
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Kode Mentor</th>
							<th>Nama Mentor</th>
							<th>Bidang Keahlian</th>
							<th>No. HP</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($mentor as $mentors)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$mentors->categories->kode_mentor}}</td>
							<td>{{$mentors->nama_mentor}}</td>
							<td>{{$mentors->bidangs->bidang_keahlian}}</td>
							<td>{{$mentors->no_hp}}</td>

							<td>
								<a href="{{$mentors->id}}/deleteMentor" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
								<a href="{{$mentors->id}}/editMentor" class="btn btn-primary btn-circle btn-sm" title="Edit">
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$mentors['id']}}"> --}}
									<i class="fas fa-edit"></i>
								{{-- </button> --}}
								</a>
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$mentors['id']}}">
									<i class="fas fa-eye"></i>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Tambah Data Mentor -->
@elseif (Request::is('mentor/tambah'))

@section('title','SIMPIB - Tambah Data Mentor')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Card Content - Form -->
	<div class="card shadow mb-4">
		<ol class="breadcrumb" style="background-color: #F8F8FF">
			<li class="breadcrumb-item">
				<a href="/mentor" class="m-0 font-weight-bold text-primary float-left">Mentor</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Data Mentor</li>
		</ol>
		<div class="card-body">
			<form action="addMentor" method="POST" class="needs-validation" novalidate>

				@csrf

				<h4 class="card-text font-weight-bold">Identitas</h4>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="nama_mentor">Nama Mentor</label>
						<input type="text" name="nama_mentor" id="nama_mentor" class="form-control" placeholder="Masukan nama mentor" required>
						<div class="invalid-feedback">Nama mentor tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="category_id">Kategori Mentor</label>
						<select class="form-control" name="category_id" id="category_id" required>
							<option value="" selected>Pilih Kategori Mentor</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->kategori_mentor }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori mentor tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="bidang_id">Bidang Keahlian</label>
						<select class="form-control" name="bidang_id" id="bidang_id" required>
							<option value="" selected>Pilih Bidang Keahlian</option>

							@foreach($ahli as $ahlis)

							<option value="{{ $ahlis->id }}">{{ $ahlis->bidang_keahlian }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Bidang keahlian tidak valid</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Alamat tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="no_hp">No. HP</label>
						<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan no. hp" pattern="[0-9]+" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12"><hr></div>
				</div>
				<h4 class="card-text font-weight-bold">Akun</h4>
				<div class="form-group row">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Username tidak valid</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">E-mail</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan e-mail" required>
						<div class="invalid-feedback">E-mail tidak valid</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Password tidak valid</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>


@endif


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Mentor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addMentor" method="POST" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label>Kategori Mentor</label>
						<select class="form-control" name="category_id" id="category_id" required>
							<option value="" selected>Pilih Kategori Mentor</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->kategori_mentor }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori mentor tidak valid</div>
					</div>
					<div class="form-group">
						<label>Nama Mentor</label>
						<input type="text" name="nama_mentor" id="nama_mentor" class="form-control" placeholder="Masukan nama mentor" required>
						<div class="invalid-feedback">Nama mentor tidak valid</div>
					</div>
					<div class="form-group">
						<label>Bidang Keahlian</label>
						<select class="form-control" name="bidang_id" id="bidang_id" required>
							<option value="" selected>Pilih Bidang Keahlian</option>

							@foreach($ahli as $ahlis)

							<option value="{{ $ahlis->id }}">{{ $ahlis->bidang_keahlian }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Bidang keahlian tidak valid</div>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Alamat tidak valid</div>
					</div>
					<div class="form-group">
						<label>No. HP</label>
						<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan no. hp" pattern="[0-9]+" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Masukan e-mail" required>
						<div class="invalid-feedback">E-mail tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Edit Data -->
@foreach ($mentor as $mentors)
<div class="modal fade" id="editData{{$mentors['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Mentor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$mentors->id}}/updateMentor" method="POST" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label>Kategori Mentor</label>
						<select class="form-control" name="category_id" id="category_id" required>
							<option value="{{$mentors['category_id']}}" selected>{{ !empty($mentors->categories) ? $mentors->categories['kategori_mentor']:'' }}</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->kategori_mentor }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori mentor tidak valid</div>
					</div>
					<div class="form-group">
						<label>Nama Mentor</label>
						<input type="text" name="nama_mentor" id="nama_mentor" class="form-control" value="{{$mentors['nama_mentor']}}" required>
						<div class="invalid-feedback">Nama mentor tidak valid</div>
					</div>
					<div class="form-group">
						<label>Bidang Keahlian</label>
						<select class="form-control" name="bidang_id" id="bidang_id" required>
							<option value="{{$mentors['bidang_id']}}" selected>{{ !empty($mentors->bidangs) ? $mentors->bidangs['bidang_keahlian']:'' }}</option>

							@foreach($ahli as $ahlis)

							<option value="{{ $ahlis->id }}">{{ $ahlis->bidang_keahlian }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Bidang keahlian tidak valid</div>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" value="{{$mentors['alamat']}}" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Alamat tidak valid</div>
					</div>
					<div class="form-group">
						<label>No. HP</label>
						<input type="text" name="no_hp" id="no_hp" class="form-control" value="{{$mentors['no_hp']}}" pattern="[0-9]+" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" name="email" id="email" class="form-control" value="{{$mentors->users['email']}}" required>
						<div class="invalid-feedback">E-mail tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Detail Data -->
@foreach($mentor as $mentors)
<div class="modal fade" id="detailData{{$mentors['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Data Mentor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Kategori Mentor</p>
					<div class="col-sm-8">
						<p>: {{$mentors->categories->kategori_mentor}} ({{$mentors->categories->kode_mentor}})</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Nama Mentor</p>
					<div class="col-sm-8">
						<p>: {{$mentors->nama_mentor}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Bidang Keahlian</p>
					<div class="col-sm-8">
						<p>: {{$mentors->bidangs->bidang_keahlian}} ({{$mentors->bidangs->kode_bidang}})</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Alamat</p>
					<div class="col-sm-8">
						<p>: {{$mentors->alamat}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">No. HP</p>
					<div class="col-sm-8">
						<p>: {{$mentors->no_hp}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">E-mail</p>
					<div class="col-sm-8">
						<p>: {{$mentors->users->email}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Username</p>
					<div class="col-sm-8">
						<p>: {{$mentors->users->username}}</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>
@endforeach


{{-- <!-- Modal Hapus Data -->
@foreach($mentor as $mentors)
<div class="modal fade" id="hapusData{{$mentors['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<a href="{{$mentors->id}}/deleteMentor" class="btn btn-danger">Hapus</a>
			</div> 
		</div>
	</div>
</div>
@endforeach --}}

    
@endsection

<script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<!-- SCRIPT VALIDASI FORM -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>