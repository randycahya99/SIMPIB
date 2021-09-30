@extends('layout.main')

@section('title','SIMPIB - Beranda')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		{{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Buat order</a> --}}
	</div>

	@if (auth()->user()->hasRole('admin'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengelola Inkubator</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$pengelola}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Coach</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$coach}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Mentor</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$mentor}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Pendamping</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$pendamping}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-secondary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Jumlah Tenant</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$tenant}} Tenant</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-dark shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Registrasi</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$calon}} Pendaftar</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

	@elseif (auth()->user()->hasRole('coach'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tenant Yang Diampu</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$tenantCoach}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Yang Dikirimkan</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDikirim}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">File Yang Diterima</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDiterima}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Coaching Terlaksana</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$coachingTerlaksana}} Kali</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

	@elseif (auth()->user()->hasRole('mentor'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tenant Yang Diampu</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$tenantMentor}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Yang Dikirimkan</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDikirim}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">File Yang Diterima</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDiterima}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Mentoring Terlaksana</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$mentoringTerlaksana}} Kali</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

	@elseif (auth()->user()->hasRole('pendamping'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tenant Yang Diampu</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$tenantPendamping}} Orang</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Yang Dikirimkan</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDikirim}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">File Yang Diterima</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$fileDiterima}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pendampingan Terlaksana</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$pendampinganTerlaksana}} Kali</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

	@elseif (auth()->user()->hasRole('tenant'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jadwal Coaching Pending</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$jadwalCoaching}} Pending</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jadwal Mentoring Pending</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$jadwalMentoring}} Pending</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jadwal Pendampingan Pending</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$jadwalPendampingan}} Pending</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Materi/Tugas Coaching</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$materiCoaching}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-secondary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Materi/Tugas Mentoring</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$materiMentoring}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-dark shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Materi/Tugas Pendampingan</div>
									<div class="mb-0 font-weight-bold text-gray-800">{{$materiPendampingan}} File</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

	@elseif (auth()->user()->hasRole('calon tenant'))

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-xl-12 col-md-6 mb-4">
					<h5 style="text-align: justify; text-indent: 0.5in;">Silahkan lengkapi data diri dan profile usaha Anda untuk melanjutkan proses pendaftaran sebagai calon tenant di PIB Universitas Jenderal Soedirman. Klik menu "Ajukan Pendaftaran" atau klik <a href="/lengkapiProfile">disini</a>.</h5>
					<br>
					<h5 style="text-align: justify; text-indent: 0.5in;">Jika sudah melengkapi data diri dan profile usaha, data Anda akan diseleksi oleh pihak PIB Universitas Jenderal Soedirman. Silahkan tunggu dan cek status Anda secara berkala. Terima kasih.</h5>
				</div>

			</div>

		</div>
		
	</div>

	@endif
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection