@extends('layout.main')

@section('title','SIMPIB - Mentoring')

@if (Auth::user()->hasRole('mentor'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Mentoring</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Kirimkan Materi
			</button>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="250">Nama Tenant</th>
                            <th>Keterangan</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($materi as $materis)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$materis->tanggal}}</td>
							<td>{{$materis->tenants->nama}}</td>
                            <td>{{$materis->keterangan}}</td>

							<td align="center">
								<a href="{{$materis->id}}/deleteMateriMentoring" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
                                <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$materis['id']}}">
                                    <i class="fas fa-edit"></i>
                                </button>
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$materis['id']}}">
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
				<h5 class="modal-title" id="exampleModalLabel">Kirim Materi Mentoring</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addMateriMentoring" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

                    <input type="hidden" class="form-control" id="mentor_id" name="mentor_id" value="{{auth()->user()->mentors->id}}">

                    <div class="form-group">
                        <label>Tenant</label>
						<select class="form-control" name="tenant_id" id="tenant_id" required>
							<option value="" selected>Pilih Tenant</option>

							@foreach($tenant as $tenants)

							<option value="{{ $tenants->id }}">{{ $tenants->nama }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Tenant tidak valid</div>
                    </div>
					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tanggal" id="tanggal" class="form-control" required>
						<div class="invalid-feedback">Tanggal tidak valid</div>
					</div>
					<div class="form-group">
						<label>Materi</label>
						<input type="file" name="materi" id="materi" class="form-control" required>
						<div class="invalid-feedback">Materi tidak valid</div>
					</div>
                    <div class="form-group">
						<label>Keterangan</label>
						<textarea rows="3" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan keterangan" required></textarea>
						<div class="invalid-feedback">Keterangan tidak valid</div>
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


<!-- Modal Detail Data -->
@foreach($materi as $materis)
<div class="modal fade" id="detailData{{$materis['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Nama Tenant</p>
					<div class="col-sm-8">
						<p>: {{$materis->tenants['nama']}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Tanggal</p>
					<div class="col-sm-8">
						<p>: {{$materis['tanggal']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Materi</p>
					<div class="col-sm-8">
						<a href="/getfile2/{{$materis->id}}">: {{$materis['materi']}}</a>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Keterangan</p>
					<div class="col-sm-8">
						<p>: {{$materis['keterangan']}}</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>
@endforeach


@elseif (Auth::user()->hasRole('tenant'))


@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Materi Mentoring</h6>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="250">Mentor</th>
                            <th>Keterangan</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($materi as $materis)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$materis->tanggal}}</td>
							<td>{{$materis->mentors->nama_mentor}}</td>
                            <td>{{$materis->keterangan}}</td>

							<td align="center">
								{{-- <a href="{{$materis->id}}/deleteMateriMentoring" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
                                <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$materis['id']}}">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
								<button class="btn btn-success btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$materis['id']}}">
									{{-- <i class="fas fa-eye"></i> --}}
                                    Lihat
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


<!-- Modal Detail Data -->
@foreach($materi as $materis)
<div class="modal fade" id="detailData{{$materis['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Nama Mentor</p>
					<div class="col-sm-8">
						<p>: {{$materis->mentors['nama_mentor']}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Tanggal</p>
					<div class="col-sm-8">
						<p>: {{$materis['tanggal']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Materi</p>
					<div class="col-sm-8">
						<a href="/getfile2/{{$materis->id}}">: {{$materis['materi']}}</a>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Keterangan</p>
					<div class="col-sm-8">
						<p>: {{$materis['keterangan']}}</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>
@endforeach


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
