@extends('layout.main')

@section('title','SIMPIB - Hasil Mentoring')

@if (Auth::user()->hasRole('mentor'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Hasil Mentoring</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="120">Tenant</th>
							<th width="200">Mentor</th>
							<th>Perihal</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($form as $forms)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$forms->tanggal}}</td>
							<td>{{$forms->tenants->nama}}</td>
							<td>{{$forms->mentors->nama_mentor}}</td>
							<td>{{$forms->perihal}}</td>

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								<a href="{{$forms->id}}/detailHasilMentoring" class="btn btn-success btn-sm" title="Review">
									{{-- <i class="fas fa-eye"></i> --}}Lihat
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


@elseif (Auth::user()->hasRole('tenant'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Hasil Mentoring</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="120">Tenant</th>
							<th width="200">Mentor</th>
							<th>Perihal</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($form as $forms)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$forms->tanggal}}</td>
							<td>{{$forms->tenants->nama}}</td>
							<td>{{$forms->mentors->nama_mentor}}</td>
							<td>{{$forms->perihal}}</td>

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								<a href="{{$forms->id}}/detailHasilMentoring" class="btn btn-success btn-sm" title="Review">
									{{-- <i class="fas fa-eye"></i> --}}Lihat
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


@endif

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
