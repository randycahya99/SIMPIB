@extends('layout.main')

@section('title','SIMPIB - Data Tenant')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Tenant</h6>
			{{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Tenant
			</button> --}}
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
							<th>Namat</th>
							<th>No. Identitas</th>
							<th>Alamat</th>
							<th>No. HP</th>
							<th>E-mail</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($tenant as $tenants)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$tenants->nama}}</td>
							<td>{{$tenants->no_identitas}}</td>
							<td>{{$tenants->alamat}}</td>
							<td>{{$tenants->no_hp}}</td>
							<td>{{$tenants->email}}</td>

							<td>
								<a href="{{$tenants->id}}/deactiveTenant" class="btn btn-danger btn-circle btn-sm nonAktivasi" title="Non-Aktivasi">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$tenants['id']}}">
									<i class="fas fa-edit"></i>
								</button>
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target=""> --}}
									<a href="{{$tenants->id}}/detailTenant" class="btn btn-success btn-circle btn-sm" title="Detail">
										<i class="fas fa-eye"></i>
									</a>
								{{-- </button> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal Edit Data -->
@foreach($tenant as $tenants)
<div class="modal fade" id="editData{{$tenants['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Tenant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$tenants->id}}/updateTenant" method="POST" class="needs-validation" novalidate>
					@csrf
					
					<div class="form-group">
						<label>Coach</label>
						<select class="form-control" name="coach_id" id="coach_id" required>
							<option value="{{$tenants['coach_id']}}" selected>{{ !empty($tenants->coachs) ? $tenants->coachs['nama_coach']:'' }}</option>

							@foreach($coach as $coachs)
    
							<option value="{{ $coachs->id }}">{{ $coachs->nama_coach }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Coach tidak valid</div>
					</div>
					<div class="form-group">
						<label>Mentor</label>
						<select class="form-control" name="mentor_id" id="mentor_id" required>
							<option value="{{$tenants['mentor_id']}}" selected>{{ !empty($tenants->mentors) ? $tenants->mentors['nama_mentor']:'' }}</option>

							@foreach($mentor as $mentors)
    
							<option value="{{ $mentors->id }}">{{ $mentors->nama_mentor }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Mentor tidak valid</div>
					</div>
					<div class="form-group">
						<label>Pendamping</label>
						<select class="form-control" name="pendamping_id" id="pendamping_id" required>
							<option value="{{$tenants['pendamping_id']}}" selected>{{ !empty($tenants->pendampings) ? $tenants->pendampings['nama_pendamping']:'' }}</option>

							@foreach($pendamping as $pendampings)
    
							<option value="{{ $pendampings->id }}">{{ $pendampings->nama_pendamping }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Pendamping tidak valid</div>
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