@extends('layout.main')

@section('title','SIMPIB - Edit Data Mentor')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Card Content - Form -->
	<div class="card shadow mb-4">
		<ol class="breadcrumb" style="background-color: #F8F8FF">
			<li class="breadcrumb-item">
				<a href="/mentor" class="m-0 font-weight-bold text-primary float-left">Mentor</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Edit Data Mentor</li>
		</ol>
		<div class="card-body">
			<form action="/updateMentor/{{$mentor->id}}" method="POST" class="needs-validation" novalidate>

				@csrf

				<h4 class="card-text font-weight-bold">Identitas</h4>
                <input type="hidden" name="id" id="id" class="form-control" value="{{$mentor['id']}}">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="nama_mentor">Nama Mentor</label>
						<input type="text" name="nama_mentor" id="nama_mentor" class="form-control" value="{{$mentor['nama_mentor']}}" required>
						<div class="invalid-feedback">Nama mentor tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="category_id">Kategori Mentor</label>
						<select class="form-control" name="category_id" id="category_id" required>
							<option value="{{$mentor['category_id']}}" selected>{{ !empty($mentor->categories) ? $mentor->categories['kategori_mentor']:'' }}</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->kategori_mentor }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori mentor tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="bidang_id">Bidang Keahlian</label>
						<select class="form-control" name="bidang_id" id="bidang_id" required>
							<option value="{{$mentor['bidang_id']}}" selected>{{ !empty($mentor->bidangs) ? $mentor->bidangs['bidang_keahlian']:'' }}</option>

							@foreach($ahli as $ahlis)

							<option value="{{ $ahlis->id }}">{{ $ahlis->bidang_keahlian }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Bidang keahlian tidak valid</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" value="{{$mentor['alamat']}}" pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Alamat tidak valid</div>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="no_hp">No. HP</label>
						<input type="text" name="no_hp" id="no_hp" class="form-control" value="{{$mentor['no_hp']}}" pattern="[0-9]+" required>
						<div class="invalid-feedback">No. HP tidak valid</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12"><hr></div>
				</div>
				<h4 class="card-text font-weight-bold">Akun</h4>
				<div class="form-group row">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="username" id="username" value="{{$mentor->users['username']}}" pattern="[a-zA-Z\s0-9]+" readonly>
						<div class="invalid-feedback">Username tidak valid</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">E-mail</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email" id="email" value="{{$mentor->users['email']}}" readonly>
						<div class="invalid-feedback">E-mail tidak valid</div>
					</div>
				</div>
				{{-- <div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password" id="password" value="{{$mentor->users['password']}} pattern="[a-zA-Z\s0-9]+" required>
						<div class="invalid-feedback">Password tidak valid</div>
					</div>
				</div> --}}

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4">
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection