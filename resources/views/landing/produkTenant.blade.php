@extends('layout.main')

@section('title','SIMPIB - Produk Tenant')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Produk Tenant</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambah Data
			</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="200">Nama Produk</th>
							<th width="300">Deskripsi</th>
							<th>Foto Produk</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($product as $products)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td align="center">{{$products->nama_produk}}</td>
							<td align="center">{{$products->deskripsi}}</td>
							<td align="center">
                                {{-- {{$products->foto}} --}}
                                <img class="card-img-top" src="/landing/{{$products->foto}}" alt="Card image cap" style="width: 200px; height: 150px">
                            </td>

							<td align="center">
								<a href="{{$products->id}}/deleteProdukTenant" class="btn btn-danger btn-circle btn-sm hapusProdukTenant" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$fotos['id']}}">
									<i class="fas fa-edit"></i>
								</button>
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$fotos['id']}}">
									<i class="fas fa-eye"></i>
								</button> --}}
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addProdukTenant" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label for="foto">Pilih Foto Produk</label>
						<input type="file" name="foto" id="foto" class="form-control" required>
						<div class="invalid-feedback">Foto produk tidak valid</div>
					</div>
                    <div class="form-group">
						<label for="nama_produk">Nama Produk</label>
						<textarea rows="3" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukan nama produk" required></textarea>
						<div class="invalid-feedback">Nama produk tidak valid</div>
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea rows="3" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan deskripsi" required></textarea>
						<div class="invalid-feedback">Deskripsi judul tidak valid</div>
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
