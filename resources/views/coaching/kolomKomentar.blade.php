@extends('layout.main')

@section('title','SIMPIB - Kolom Komentar')

@if (Auth::user()->hasRole('coach'))

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			{{-- <h6 class="m-0 font-weight-bold text-primary float-left">Komentar</h6> --}}
            <a href="/komentarCoaching" class="btn btn-secondary">
                Kembali
            </a>
            {{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Balas
			</button> --}}
		</div>
		<div class="card-body">
            
            {{-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="false">
                <div class="toast-header">
                    <span class="rounded mr-2 bg-primary" style="width: 15px;height: 15px"></span>
             
                    <strong class="mr-auto">Notifikasi</strong>
                    <small>1 menit yang lalu</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Halo, ini pesan notifikasi toast.
                    <br/>
                    www.malasngoding.com
                </div>
            </div> --}}
            
            {{-- <div class="container">
                <a href="/historiPendaftaran" class="btn btn-secondary">
                    Kembali
                </a>
            </div> --}}

            <div class="container">
                <h2 class="text-center">{{$coaching->perihal}}</h2>
                <h4 class="text-center">{{$coaching->topik}}</h4>
            </div>

            @if ($totalComment == NULL)

            Belum ada balasan.

            @else

            <div class="container-fluid">

                @foreach ($comment as $comments)

                    @if ($comments->from == "coach")

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body" style="text-align: right">
                                <h6 class="card-title">From :</h6>
                                <h6 class="card-subtitle mb-2 text-muted" style="font-weight: bold">Me</h6>
                                <p class="card-text">{{$comments->replies}}</p>
                            </div>
                        </div>
                    </div>

                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h6 class="card-title">From :</h6>
                                <h6 class="card-subtitle mb-2 text-muted" style="font-weight: bold">{{$comments->coachings->tenants->nama}}</h6>
                                <p class="card-text">{{$comments->replies}}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endif
                    
                @endforeach

            </div>
                
            @endif

        </div>
        <div class="text-center">
            <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Balas
			</button>
        </div><br>
    </div>

</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kirim Balasan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addRepliesCoach" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

                    <input type="hidden" class="form-control" id="coaching_id" name="coaching_id" value="{{$coaching->id}}">

					<div class="form-group">
						<label>Balasan</label>
						<textarea rows="3" name="replies" id="replies" class="form-control" placeholder="Masukan balasan" required></textarea>
						<div class="invalid-feedback">Balasan tidak valid</div>
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


@elseif (Auth::user()->hasRole('tenant'))


@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			{{-- <h6 class="m-0 font-weight-bold text-primary float-left">Komentar</h6> --}}
            <a href="/komentarCoaching" class="btn btn-secondary">
                Kembali
            </a>
            {{-- <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Balas
			</button> --}}
		</div>
		<div class="card-body">
            
            {{-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="false">
                <div class="toast-header">
                    <span class="rounded mr-2 bg-primary" style="width: 15px;height: 15px"></span>
             
                    <strong class="mr-auto">Notifikasi</strong>
                    <small>1 menit yang lalu</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Halo, ini pesan notifikasi toast.
                    <br/>
                    www.malasngoding.com
                </div>
            </div> --}}

            <div class="container">
                <h2 class="text-center">{{$coaching->perihal}}</h2>
                <h4 class="text-center">{{$coaching->topik}}</h4>
            </div>

            @if ($totalComment == NULL)

            Belum ada balasan.

            @else

            <div class="container-fluid">

                @foreach ($comment as $comments)

                    @if ($comments->from == "tenant")

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body" style="text-align: right">
                                <h6 class="card-title">From :</h6>
                                <h6 class="card-subtitle mb-2 text-muted" style="font-weight: bold">Me</h6>
                                <p class="card-text">{{$comments->replies}}</p>
                            </div>
                        </div>
                    </div>

                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h6 class="card-title">From :</h6>
                                <h6 class="card-subtitle mb-2 text-muted" style="font-weight: bold">{{$comments->coachings->coachs->nama_coach}}</h6>
                                <p class="card-text">{{$comments->replies}}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endif
                    
                @endforeach

            </div>
                
            @endif

        </div>
        <div class="text-center">
            <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData" title="Tambah">
				Balas
			</button>
        </div><br>
    </div>

</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kirim Balasan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addRepliesTenant" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

					@csrf

                    <input type="hidden" class="form-control" id="coaching_id" name="coaching_id" value="{{$coaching->id}}">

					<div class="form-group">
						<label>Balasan</label>
						<textarea rows="3" name="replies" id="replies" class="form-control" placeholder="Masukan balasan" required></textarea>
						<div class="invalid-feedback">Balasan tidak valid</div>
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


@endif

@endsection


{{-- <script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>

<script>
	$('.toast').toast('show');
</script> --}}