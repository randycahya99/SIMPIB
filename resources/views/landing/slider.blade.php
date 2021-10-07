@extends('layout.main')

@section('title','SIMPIB - Foto Slider')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Foto Slider</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambah Foto
			</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="200">Judul</th>
							<th width="300">Sub Judul</th>
							<th>Foto</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($foto as $fotos)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td align="center">{{$fotos->judul}}</td>
							<td align="center">{{$fotos->sub_judul}}</td>
							<td align="center">
                                {{-- {{$fotos->foto}} --}}
                                <img class="card-img-top" src="/landing/{{$fotos->foto}}" alt="Card image cap" style="width: 200px; height: 100px">
                            </td>

							<td align="center">
								<a href="{{$fotos->id}}/deleteFotoSlider" class="btn btn-danger btn-circle btn-sm hapusFoto" title="Hapus">
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Foto Slider</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addFotoSlider" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

					<div class="form-group">
						<label>Pilih Foto Slider</label>
						<input type="file" name="foto" id="foto" class="form-control" required>
						<div class="invalid-feedback">Materi tidak valid</div>
					</div>
                    <div class="form-group">
						<label>Judul</label>
						<textarea rows="3" name="judul" id="judul" class="form-control" placeholder="Masukan judul" required></textarea>
						<div class="invalid-feedback">Judul tidak valid</div>
					</div>
					<div class="form-group">
						<label>Sub Judul</label>
						<textarea rows="3" name="sub_judul" id="sub_judul" class="form-control" placeholder="Masukan sub judul" required></textarea>
						<div class="invalid-feedback">Sub judul tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
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
