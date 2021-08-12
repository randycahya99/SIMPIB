@extends('layout.main')

@section('title','SIMPIB - Data Mentor')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Mentor</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Mentor
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
							<th>Kode Mentor</th>
							<th>Nama Mentor</th>
							<th>Bidang Keahlian</th>
							<th>Alamat</th>
							<th>No. HP</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						{{-- @foreach($product as $products) --}}
						<tr>
							{{-- <td align="center">{{$loop->iteration}}</td> --}} <td align="center"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>

							<td>
								<a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button>
								<button class="btn btn-success btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-eye"></i>
								</button>
							</td>
						</tr>
						{{-- @endforeach --}}
					</tbody>
				</table>
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