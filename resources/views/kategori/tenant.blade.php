@extends('layout.main')

@section('title','SIMPIB - Kategori Tenant')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Kategori Tenant</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambah Kategori Tenant
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
							<th>Kode</th>
							<th>Kategori Tenant</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($category as $categories)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$categories->kode_tenant}}</td>
							<td>{{$categories->kategori_tenant}}</td>

							<td>
								<a href="{{$categories->id}}/deleteCategoryTenant" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$categories['id']}}">
									<i class="fas fa-edit"></i>
								</button>
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$categories['id']}}">
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Tenant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addCategoryTenant" method="POST" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label>Kode Tenant</label>
						<input type="text" name="kode_tenant" id="kode_tenant" class="form-control" placeholder="Kode tenant" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Kode tenant tidak valid</div>
					</div>
					<div class="form-group">
						<label>Kategori Tenant</label>
						<input type="text" name="kategori_tenant" id="kategori_tenant" class="form-control" placeholder="Masukan kategori tenant" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Kategori tenant tidak valid</div>
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
@foreach($category as $categories)
<div class="modal fade" id="editData{{$categories['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kategori Tenant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$categories->id}}/updateCategoryTenant" method="POST" class="needs-validation" novalidate>
					@csrf
					
					<div class="form-group">
						<label>Kode Tenant</label>
						<input type="text" name="kode_tenant" id="kode_tenant" class="form-control" value="{{$categories['kode_tenant']}}" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Kode tenant tidak valid</div>
					</div>
					<div class="form-group">
						<label>Kategori Tenant</label>
						<input type="text" name="kategori_tenant" id="kategori_tenant" class="form-control" value="{{$categories['kategori_tenant']}}" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Kategori tenant tidak valid</div>
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
@foreach($category as $categories)
<div class="modal fade" id="detailData{{$categories['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Kategori Tenant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Kode Tenant</p>
					<div class="col-sm-8">
						<p>: {{$categories->kode_tenant}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Kategori Tenant</p>
					<div class="col-sm-8">
						<p>: {{$categories->kategori_tenant}}</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>
@endforeach


{{-- <!-- Modal Hapus Data -->
@foreach($category as $categories)
<div class="modal fade" id="hapusData{{$categories['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<a href="{{$categories->id}}/deleteCategoryTenant" class="btn btn-danger">Hapus</a>
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