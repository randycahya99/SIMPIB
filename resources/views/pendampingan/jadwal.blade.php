@extends('layout.main')

@section('title','SIMPIB - Jadwal Pendampingan')

@if (Auth::user()->hasRole('pendamping'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Jadwal Pendampingan</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Buat Jadwal
			</button>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="200">Nama Tenant</th>
                            <th>Topik</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($jadwal as $jadwals)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$jadwals->tanggal}}</td>
							<td>{{$jadwals->tenants->nama}}</td>
                            <td>{{$jadwals->topik}}</td>

							<td align="center">
								<a href="{{$jadwals->id}}/deleteJadwalPendampingan" class="btn btn-danger btn-circle btn-sm hapusProduct" title="Hapus">
									<i class="fas fa-trash"></i>
								</a>
                                
                                @if ($jadwals->status == "pending" || $jadwals->status == "disetujui")
                                    <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$jadwals['id']}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endif
								
								<button class="btn btn-success btn-circle btn-sm" title="Detail" data-toggle="modal" data-target="#detailData{{$jadwals['id']}}">
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
				<h5 class="modal-title" id="exampleModalLabel">Buat Jadwal Pendampingan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addJadwalPendampingan" method="POST" class="needs-validation" novalidate>

					@csrf

                    <input type="hidden" class="form-control" id="pendamping_id" name="pendamping_id" value="{{auth()->user()->pendampings->id}}">

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
						<label>Link</label>
						<input type="text" name="link" id="link" class="form-control" placeholder="Masukan link" required>
						<div class="invalid-feedback">Link tidak valid</div>
					</div>
                    <div class="form-group">
						<label>Topik</label>
						<textarea rows="3" name="topik" id="topik" class="form-control" placeholder="Masukan topik" required></textarea>
						<div class="invalid-feedback">Topik tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Buat</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Edit Data -->
@foreach($jadwal as $jadwals)
<div class="modal fade" id="editData{{$jadwals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$jadwals->id}}/updateJadwalPendampingan" method="POST" class="needs-validation" novalidate>
					
                    @csrf
					
					<div class="form-group">
                        <label>Tenant</label>
						<input type="text" name="tenant_id" id="tenant_id" class="form-control" value="{{$jadwals->tenants['nama']}}" readonly>
						<div class="invalid-feedback">Tenant tidak valid</div>
                    </div>
					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tanggal" id="tanggal" class="form-control" value="{{$jadwals['tanggal']}}" required>
						<div class="invalid-feedback">Tanggal tidak valid</div>
					</div>
					<div class="form-group">
						<label>Link</label>
						<input type="text" name="link" id="link" class="form-control" value="{{$jadwals['link']}}" required>
						<div class="invalid-feedback">Link tidak valid</div>
					</div>
                    <div class="form-group">
						<label>Topik</label>
						<input type="text" name="topik" id="topik" class="form-control" value="{{$jadwals['topik']}}" required>
						<div class="invalid-feedback">Topik tidak valid</div>
					</div>
					
					<div class="modal-footer">
						<a href="{{$jadwals->id}}/batalkanJadwalPendampingan" class="btn btn-danger">Batalkan Pendampingan</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Detail Data -->
@foreach($jadwal as $jadwals)
<div class="modal fade" id="detailData{{$jadwals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Nama Tenant</p>
					<div class="col-sm-8">
						<p>: {{$jadwals->tenants['nama']}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Tanggal</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['tanggal']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Link</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['link']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Topik</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['topik']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Status</p>
					<div class="col-sm-8">
                        
                        @if ($jadwals->status == "pending")
                            <p>: Menunggu konfirmasi tenant</p>
                        @elseif ($jadwals->status == "disetujui")
                            <p>: Tenant bersedia hadir</p>
                        @elseif ($jadwals->status == "ditolak")
                            <p style="color: red">: Tenant berhalangan hadir</p>
                        @elseif ($jadwals->status == "dibatalkan")
                            <p style="color: red">: Pendamping membatalkan jadwal pendampingan</p>
                        @else
                            <p style="color: rgb(28, 180, 28)">: Selesai</p>
                        @endif

					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Keterangan</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['keterangan']}}</p>
					</div>
				</div>
                
                @if ($jadwals->status == "disetujui")
                    <div class="modal-footer">
                        <a href="{{$jadwals->id}}/selesaiJadwalPendampingan" class="btn btn-success">Selesai</a>
                    </div>
                @endif
			
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
			<h6 class="m-0 font-weight-bold text-primary float-left">Jadwal Pendampingan</h6>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th width="80">Tanggal</th>
							<th width="200">Nama Pendamping</th>
                            <th>Topik</th>
                            <th width="90">Status</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($jadwal as $jadwals)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$jadwals->tanggal}}</td>
							<td>{{$jadwals->pendampings->nama_pendamping}}</td>
                            <td>{{$jadwals->topik}}</td>
                            <td>
                                @if ($jadwals->status == "pending")
                                    <p>Menunggu konfirmasi</p>
                                @elseif ($jadwals->status == "disetujui")
                                    <p>Bersedia hadir</p>
                                @elseif ($jadwals->status == "ditolak")
                                    <p style="color: red">Berhalangan hadir</p>
                                @elseif ($jadwals->status == "dibatalkan")
                                    <p style="color: red">Dibatalkan</p>
                                @else
                                    <p style="color: rgb(28, 180, 28)">Selesai</p>
                                @endif
                            </td>

							<td align="center">
								{{-- <a href="" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a> --}}
								{{-- <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="">
									<i class="fas fa-edit"></i>
								</button> --}}
								{{-- <button class="btn btn-success btn-circle btn-sm" title="Review" data-toggle="modal" data-target=""> --}}
								@if ($jadwals->status == "pending")
                                    <button class="btn btn-success btn-circle btn-sm" title="Setujui" data-toggle="modal" data-target="#konfirmasiTerima{{$jadwals['id']}}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-danger btn-circle btn-sm" title="Tolak" data-toggle="modal" data-target="#konfirmasiTolak{{$jadwals['id']}}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @elseif ($jadwals->status == "disetujui" || $jadwals->status == "selesai")
                                    <button class="btn btn-success btn-sm" title="Lihat Detail" data-toggle="modal" data-target="#detail{{$jadwals['id']}}">
									    Lihat
								    </button>
                                @endif
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


<!-- Modal Konfirmasi Setuju Kehadiran Pendampingan -->
@foreach($jadwal as $jadwals)
<div class="modal fade" id="konfirmasiTerima{{$jadwals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$jadwals->id}}/konfirmasiHadirPendampingan" method="POST" class="needs-validation" novalidate>
					
                    @csrf
					
					<div class="form-group">
                        <label>Keterangan</label>
						<textarea rows="4" name="keterangan" id="keterangan" class="form-control" placeholder="Tambahkan keterangan (jika bisa hadir ataupun tidak dapat hadir)" required></textarea>
						<div class="invalid-feedback">Keterangan tidak valid</div>
                    </div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Hadir</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Konfirmasi Tolak Kehadiran Pendampingan -->
@foreach($jadwal as $jadwals)
<div class="modal fade" id="konfirmasiTolak{{$jadwals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$jadwals->id}}/tolakHadirPendampingan" method="POST" class="needs-validation" novalidate>
					
                    @csrf
					
					<div class="form-group">
                        <label>Keterangan</label>
						<textarea rows="4" name="keterangan" id="keterangan" class="form-control" placeholder="Tambahkan keterangan (jika bisa hadir ataupun tidak dapat hadir)" required></textarea>
						<div class="invalid-feedback">Keterangan tidak valid</div>
                    </div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Tidak Bisa</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Detail Data -->
@foreach($jadwal as $jadwals)
<div class="modal fade" id="detail{{$jadwals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Lihat Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Nama Pendamping</p>
					<div class="col-sm-8">
						<p>: {{$jadwals->pendampings['nama_pendamping']}}</p>
					</div>
				</div>
				<div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Tanggal</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['tanggal']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Link</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['link']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Topik</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['topik']}}</p>
					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Status</p>
					<div class="col-sm-8">
                        
                        @if ($jadwals->status == "pending")
                            <p>: Menunggu konfirmasi tenant</p>
                        @elseif ($jadwals->status == "disetujui")
                            <p>: Tenant bersedia hadir</p>
                        @elseif ($jadwals->status == "ditolak")
                            <p style="color: red">: Tenant berhalangan hadir</p>
                        @elseif ($jadwals->status == "dibatalkan")
                            <p style="color: red">: Pendamping membatalkan jadwal pendampingan</p>
                        @else
                            <p style="color: rgb(28, 180, 28)">: Selesai</p>
                        @endif

					</div>
				</div>
                <div class="form-group row">
					<p class=" col-sm-4 font-weight-bold">Keterangan</p>
					<div class="col-sm-8">
						<p>: {{$jadwals['keterangan']}}</p>
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
