@extends('layout.main')

@section('title','SIMPIB - Daftar Tenant')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Daftar Tenant</h6>
			{{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Tenant
			</button> --}}
		</div>
		<div class="card-body">
            
            @if (Auth::user()->hasRole('coach'))
            
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Nama</th>
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

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								<a href="{{$tenants->id}}/reviewRegister" class="btn btn-success btn-sm" title="Review">
									{{-- <i class="fas fa-eye"></i> --}}Detail
								</a>
								{{-- </button> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

            @elseif (Auth::user()->hasRole('mentor'))

            <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Nama</th>
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

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								<a href="{{$tenants->id}}/reviewRegister" class="btn btn-success btn-sm" title="Review">
									{{-- <i class="fas fa-eye"></i> --}}Detail
								</a>
								{{-- </button> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

            @else

            <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Nama</th>
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

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								<a href="{{$tenants->id}}/reviewRegister" class="btn btn-success btn-sm" title="Review">
									{{-- <i class="fas fa-eye"></i> --}}Detail
								</a>
								{{-- </button> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

            @endif

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