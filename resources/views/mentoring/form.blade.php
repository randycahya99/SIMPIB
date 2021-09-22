@extends('layout.main')

@section('title','SIMPIB - Form Mentoring')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Form Mentoring Tenant</h6>
		</div>
		<div class="card-body">
            {{-- <h4 class="card-text font-weight-bold text-center">Form Mentoring</h4> --}}
            
            <form action="addFormMentoring" method="POST" class="needs-validation" novalidate>
                
                @csrf

                <br>

                <input type="hidden" class="form-control" id="mentor_id" name="mentor_id" value="{{auth()->user()->mentors->id}}">

                <div class="container-fluid">

                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="tanggal">Tanggal</label>
                        :<div class="col-sm-3">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="tenant_id">Tenant</label>
                        :<div class="col-sm-4">
                            <select class="form-control" name="tenant_id" id="tenant_id" required>
                                <option value="" selected>Pilih Tenant</option>
    
                                @foreach($tenant as $tenants)
    
                                <option value="{{ $tenants->id }}">{{ $tenants->nama }}</option>
    
                                @endforeach
    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="perihal">Perihal</label>
                        :<div class="col-sm-4">
                            <textarea class="form-control" rows="4" id="perihal" name="perihal" placeholder="Sebutkan Perihal" required></textarea>
                        </div>
                    </div>

                    <br>

                    <hr>

                    {{-- <div class="container-fluid"> --}}

                    <br>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="strategi_marketing">Stategi Marketing</label>
                        :<div class="col-sm-6">
                            <textarea class="form-control" rows="4" id="strategi_marketing" name="strategi_marketing" placeholder="Sebutkan Strategi Marketing" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="pengembangan_produk">Pengembangan Produk</label>
                        :<div class="col-sm-6">
                            <textarea class="form-control" rows="4" id="pengembangan_produk" name="pengembangan_produk" placeholder="Sebutkan Cara Pengembangan Produk" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="branding">Branding</label>
                        :<div class="col-sm-6">
                            <textarea class="form-control" rows="4" id="branding" name="branding" placeholder="Sebutkan Cara Branding" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="sistemasi_organisasi">Sistemasi Organisasi</label>
                        :<div class="col-sm-6">
                            <textarea class="form-control" rows="4" id="sistemasi_organisasi" name="sistemasi_organisasi" placeholder="Jelaskan Sistemasi Organisasi" required></textarea>
                        </div>
                    </div>

                    {{-- </div> --}}

                    <div class="form-group row">
                        <label class="col-sm-2 font-weight-bold" for="sistemasi_organisasi"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </div>

            </form>

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