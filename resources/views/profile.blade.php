@extends('layout.main')

@section('title','SIMPIB - Profil Saya')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Profil Saya</h6>
                </div>
                <div class="card-body" style="text-align:center">
                    <div class="row no-gutters" style="background-color: ">
                        <div class="col-lg-4" style="background-color: ">
                            <div class="card mt-5 mb-3 mr-5 ml-5">
                                <div class="card-body" style="text-align:center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                    <div>
                                        <img src="" class="" alt="..." width='200px' height="200px">
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                <form action="{{auth()->user()->id}}/profile/edit">
                                    <button class='btn btn-warning' style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Edit Profil</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8" style="background-color: ">
                            <div class="m-5" style="text-align:left">
                                

                                @if (auth()->user()->hasRole('admin'))

                                <b>Informasi Saya</b>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        Nama
                                    </div>
                                    <div class="col">
                                        {{$pengelola->nama_pengelola}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Jabatan
                                    </div>
                                    <div class="col">
                                        {{$pengelola->jabatan}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        No. HP
                                    </div>
                                    <div class="col">
                                        {{$pengelola->no_hp}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        E-mail
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <div class="row mt-2 mb-5">
                                    <div class="col-lg-4">
                                        Username
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->username }}
                                    </div>
                                </div>


                                @elseif(auth()->user()->hasRole('pendamping'))

                                <b>Informasi Saya</b>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        Nama
                                    </div>
                                    <div class="col">
                                        {{$pendamping->nama_pendamping}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Alamat
                                    </div>
                                    <div class="col">
                                        {{$pendamping->alamat}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        No. HP
                                    </div>
                                    <div class="col">
                                        {{$pendamping->no_hp}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Bidang Keahlian
                                    </div>
                                    <div class="col">
                                        {{$pendamping->bidangs->bidang_keahlian}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        E-mail
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <div class="row mt-2 mb-5">
                                    <div class="col-lg-4">
                                        Username
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->username }}
                                    </div>
                                </div>


                                @elseif(auth()->user()->hasRole('mentor'))

                                <b>Informasi Saya</b>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        Nama
                                    </div>
                                    <div class="col">
                                        {{$mentor->nama_mentor}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Alamat
                                    </div>
                                    <div class="col">
                                        {{$mentor->alamat}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        No. HP
                                    </div>
                                    <div class="col">
                                        {{$mentor->no_hp}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Bidang Keahlian
                                    </div>
                                    <div class="col">
                                        {{$mentor->bidangs->bidang_keahlian}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        E-mail
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <div class="row mt-2 mb-5">
                                    <div class="col-lg-4">
                                        Username
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->username }}
                                    </div>
                                </div>


                                @elseif(auth()->user()->hasRole('coach'))

                                <b>Informasi Saya</b>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        Nama
                                    </div>
                                    <div class="col">
                                        {{$coach->nama_coach}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Alamat
                                    </div>
                                    <div class="col">
                                        {{$coach->alamat}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        No. HP
                                    </div>
                                    <div class="col">
                                        {{$coach->no_hp}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Bidang Keahlian
                                    </div>
                                    <div class="col">
                                        {{$coach->bidangs->bidang_keahlian}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        E-mail
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <div class="row mt-2 mb-5">
                                    <div class="col-lg-4">
                                        Username
                                    </div>
                                    <div class="col">
                                        {{ auth()->user()->username }}
                                    </div>
                                </div>


                                @endif
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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