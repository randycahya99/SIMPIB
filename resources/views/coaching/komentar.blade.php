@extends('layout.main')

@section('title','SIMPIB - Komentar')

@if (Auth::user()->hasRole('coach'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Komentar</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambahkan Komentar
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
                            <th>Perihal</th>
                            <th>Topik</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($coaching as $coachings)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$coachings->tanggal}}</td>
							<td>{{$coachings->tenants->nama}}</td>
                            <td>{{$coachings->perihal}}</td>
                            <td>{{$coachings->topik}}</td>

							<td align="center">
								{{-- <a href="{{$coachings->id}}/deleteKomentarCoaching" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
                                <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$coachings['id']}}">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
								{{-- <button class="btn btn-success btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$coachings['id']}}"> --}}
									<a href="{{$coachings->id}}/kolomKomentar" class="btn btn-success btn-sm" title="Review">
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


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Komentar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addKomentarCoaching" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

                    <input type="hidden" class="form-control" id="coach_id" name="coach_id" value="{{auth()->user()->coachs->id}}">

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
						<label>Perihal</label>
						<textarea rows="3" name="perihal" id="perihal" class="form-control" placeholder="Masukan perihal" required></textarea>
						<div class="invalid-feedback">Perihal tidak valid</div>
					</div>
                    <div class="form-group">
						<label>Topik</label>
						<textarea rows="3" name="topik" id="topik" class="form-control" placeholder="Masukan topik" required></textarea>
						<div class="invalid-feedback">Topik tidak valid</div>
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


@elseif (Auth::user()->hasRole('tenant'))


@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Komentar</h6>
			{{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Tambahkan Komentar
			</button> --}}
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="250">Coach</th>
                            <th>Perihal</th>
                            <th>Topik</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($coaching as $coachings)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$coachings->tanggal}}</td>
							<td>{{$coachings->coachs->nama_coach}}</td>
                            <td>{{$coachings->perihal}}</td>
                            <td>{{$coachings->topik}}</td>

							<td align="center">
								{{-- <a href="{{$coachings->id}}/deleteKomentarCoaching" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
                                <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$coachings['id']}}">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
								{{-- <button class="btn btn-success btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$coachings['id']}}"> --}}
									<a href="{{$coachings->id}}/kolomKomentar" class="btn btn-success btn-sm" title="Review">
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