@extends('layout.main')

@section('title','SIMPIB - Data Pengelola Inkubator')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Admin</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambah Admin
			</button>
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
							<th>Nama</th>
							<th>Jabatan</th>
							<th>No. HP</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($pengelola as $pengelolas)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$pengelolas->nama_pengelola}}</td>
							<td>{{$pengelolas->jabatan}}</td>
							<td>{{$pengelolas->no_hp}}</td>

							<td>
								<a href="{{$pengelolas->id}}/deleteAdmin" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button>
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="">
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


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Tahap Inkubasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addAdmin" method="POST" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_pengelola" id="nama_pengelola" class="form-control" placeholder="Masukkan nama pengelola" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Nama tidak valid</div>
					</div>
					<div class="form-group">
						<label>Jabatan</label>
						<input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan jabatan" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Jabatan tidak valid</div>
					</div>
					<div class="form-group">
						<label>No. HP</label>
						<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan no. hp" pattern="[0-9]+" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Username tidak valid</div>
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Masukan e-mail" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Password tidak valid</div>
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