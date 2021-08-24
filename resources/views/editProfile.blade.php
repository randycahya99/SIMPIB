@extends('layout.main')

@section('title','SIMPIB - Edit Profil Saya')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Edit Profil Saya</h6>
                </div>
                <div class="card-body" style="text-align:center">

                    @if (auth()->user()->hasRole('admin'))

                    <form enctype="multipart/form-data" id="form-regist" method="POST" action="/updateProfilePengelola">
                        
                        @csrf
                        
                        <div class="row no-gutters">
                            <div class="col-lg-4">
                                <div class="card mt-5 mb-3 mr-5 ml-5">
                                    <div class="card-body" style="text-align:center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                        <div>
                                            <img src="" class="" alt="..." width='200px' height="200px">
                                            <div class="custom-file mt-4">
                                                <!-- <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih file</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="profile_image"> -->
                                                <label class="custom-file-label" for="customFile" style="padding-right: 30%">Pilih file</label>
                                                <input type="file" name='profile_image' class="custom-file-input" id="customFile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="m-5" style="text-align:left">
                                    <b>Informasi Saya</b>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="nama_pengelola" class="col-form-label">Nama
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nama_pengelola" name='nama_pengelola' autocomplete='off' value="{{$user->pengelolas['nama_pengelola']}}"></input>
                                            <span class='text-danger' style="color: red">{{ $errors->first('nama_pengelola') }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="jabatan" class="col-form-label">Jabatan
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="jabatan" class="form-control" name='jabatan' autocomplete='off' required value="{{$user->pengelolas['jabatan']}}"></input>
                                            <span class='text-danger'>{{ $errors->first('jabatan') }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="no_hp" class="col-form-label">No. HP
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="no_hp" class="form-control" name='no_hp' autocomplete='off' required value="{{$user->pengelolas['no_hp']}}"></input>
                                            <span class='text-danger'>{{ $errors->first('no_hp') }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="email" class="col-form-label">E-mail
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="email" class="form-control" name='email' id="email" autocomplete='off' required value="{{$user['email']}}" readonly></input>
                                            <span class='text-danger'>{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-lg-4">
                                            <label for="username" class="col-form-label">Username
                                            </label> </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name='username' id="username" autocomplete='off' required value="{{$user['username']}}" readonly></input>
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>
                                    <div style="text-align: right">
                                        <div class="row mt-3">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-7">
                                                <a href="/profile" class="btn btn-secondary">Batal</a>
                                                <button class="btn btn-primary" type="submit" style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection