<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="{{ URL::asset('landing/assets/img/logo unsoed.png') }}" rel="shortcut icon" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <style>
                .carousel-item {
                    height: 100vh;
                    min-height: 350px;
                    background: no-repeat center center scroll;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }

                section {
                    padding-top: 5rem;
                    padding-bottom: 5rem;
                }

                .lnr {
                    display: inline-block;
                    fill: currentColor;
                    width: 1em;
                    height: 1em;
                    vertical-align: -0.05em;
                    stroke-width: 1;
                }

                .services-icon {
                    margin-bottom: 20px;
                    font-size: 30px;
                }

                bgc2, .vLine, .hLine {
                    background-color: #0F52BA;
                }

                .quote-icon {
                    font-size: 40px;
                    margin-bottom: 20px;
                }

                .services-icon {
                    font-size: 60px;
                    margin-left: 2rem;
                }

                .asterisk:after {
                    content: "*";
                    color: red;
                }
            </style>

        <title>Pendaftaran - Inkubator Bisnis UNSOED</title>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <div class="col-md-1">
                    <img src="{{URL::asset('landing/assets/img/logo unsoed.png')}}" alt="" width="40px" height="40px">
                </div>
                <a class="navbar-brand" href="#">Inkubator Bisnis UNSOED</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/registration">Registrasi
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-3 text-center"></section>
        <section class="py-5 text-center">
            <div class="container">
                <h3 class="text-center">Pendaftaran Calon Tenant</h3>
            </div>
        </section>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5>Form Profil Usaha Calon Tenant</h5>
                </div>
                <div class="card-body">
                    <p class="card-text" style="color: red">* Wajib</p>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="asterisk" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="asterisk" for="identitas">No. Identitas (KTP/SIM)</label>
                                <input type="text" class="form-control" id="identitas" placeholder="Masukkan No. Identitas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="asterisk">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="JenisKelamin" id="laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="JenisKelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="tempatlahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="tanggallahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggallahir">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="asterisk">Status Perkawinan</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="StatusKawin" id="belummenikah" value="Belum Menikah">
                                    <label class="form-check-label" for="belummenikah">Belum menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="StatusKawin" id="menikah" value="Menikah">
                                    <label class="form-check-label" for="menikah">Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="StatusKawin" id="jandaduda" value="Janda/Duda">
                                    <label class="form-check-label" for="jandaduda">Janda/Duda</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="asterisk">Pendidikan Terakhir (saat ini)</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Pendidikan" id="kuliahdiplomas1" value="Masih kuliah Diploma/S1">
                                    <label class="form-check-label" for="kuliahdiplomas1">Masih kuliah Diploma/S1</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Pendidikan" id="kuliahs2s3" value="Masih kuliah S2/S3">
                                    <label class="form-check-label" for="kuliahs2s3">Masih kuliah S2/S3</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Pendidikan" id="alumnikuliah" value="Alumni Diploma/S1/S2/S3">
                                    <label class="form-check-label" for="alumnikuliah">Alumni Diploma/S1/S2/S3</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="asterisk" for="perguruantinggi">Perguruan Tinggi</label>
                                <input type="text" class="form-control" id="perguruantinggi" placeholder="Sebutkan Nama Perguruan Tinggi">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="asterisk" for="fakultasjurusan">Fakultas/Jurusan</label>
                                <input type="text" class="form-control" id="fakultasjurusan" placeholder="Sebutkan Fakultas/Jurusan Anda">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label class="asterisk" for="alamat">Alamat Tinggal</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda Tinggal">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="asterisk" for="kodepos">Kode Pos</label>
                                <input type="text" class="form-control" id="kodepos" placeholder="Kode Pos Anda">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="telphp">No. Telp/HP</label>
                                <input type="text" class="form-control" id="telphp" placeholder="Masukkan No. Telp/HP">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Alamat E-mail Anda">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="website">Website</label>
                                <input type="text" class="form-control" id="website" placeholder="Masukkan Alamat Website Anda">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="namausaha">Nama Usaha</label>
                                <input type="text" class="form-control" id="namausaha" placeholder="Masukkan Nama Usaha Anda">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="produkusaha">Produk Usaha</label>
                                <input type="email" class="form-control" id="produkusaha" placeholder="Sebutkan Produk Usaha Anda">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk">Bentuk Badan Usaha</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="BadanUsaha" type="radio" id="belumbadanusaha" value="Belum berbadan usaha">
                                    <label class="form-check-label" for="belumbadanusaha">Belum berbadan usaha</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="BadanUsaha" type="radio" id="cvpt" value="CV/PT">
                                    <label class="form-check-label" for="cvpt">CV/PT</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="BadanUsaha" type="radio" id="bentuklainnya" value="Lainnya">
                                    <label class="form-check-label" for="bentuklainnya">Lainnya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="asterisk">Kategori Usaha (pilih salah satu)</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KategoriUsaha" id="agrobisnis" value="Agrobisnis">
                                    <label class="form-check-label" for="agrobisnis"><b>Agrobisnis</b></label><br>
                                    <p>(Suatu usaha yang memberikan nilai tambah dengan 
                                        memproduksi dan atau memperdagangkan produk 
                                        pangan antara lain industri pengolah makanan dan 
                                        minuman yang berasal dari pertanian, peternakan, 
                                        Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KategoriUsaha" id="agroindustri" value="Agroindustri">
                                    <label class="form-check-label" for="agroindustri"><b>Agroindustri</b></label><br>
                                    <p>(Suatu usaha yang menghasilkan produk 
                                        manufaktur di bidang pertanian, peternakan, 
                                        Perkebunan, Perikanan, Kelautan, dan kehutanan)</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="mulaiusaha">Mulai Usaha</label>
                                <input type="date" class="form-control" id="mulaiusaha">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label class="asterisk" for="alamatusaha">Alamat Usaha</label>
                                <input type="text" class="form-control" id="alamatusaha" placeholder="Masukkan Alamat Usaha Anda">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="asterisk" for="kodeposusaha">Kode Pos</label>
                                <input type="text" class="form-control" id="kodeposusaha" placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="telphpusaha">No. Telp/HP Usaha</label>
                                <input type="text" class="form-control" id="telphpusaha" placeholder="No. Telp/HP Usaha">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="emailusaha">E-mail Usaha</label>
                                <input type="email" class="form-control" id="emailusaha" placeholder="Alamat E-mail Usaha">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="asterisk" for="websiteusaha">Website Usaha</label>
                                <input type="text" class="form-control" id="websiteusaha" placeholder="Alamat Website Usaha">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="asterisk" for="modalusaha">Modal Usaha</label>
                                <input type="text" class="form-control" id="modalusaha" placeholder="Modal Usaha Anda">
                            </div>
                        </div>
                        <label class="asterisk"><b>Omzet Usaha</b></label>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="omzetusaha1">Tahun 2017</label>
                                <input type="text" class="form-control" id="omzetusaha1" placeholder="Omzet di Tahun 2017">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="omzetusaha2">Tahun 2016</label>
                                <input type="text" class="form-control" id="omzetusaha2" placeholder="Omzet di Tahun 2016">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="omzetusaha3">Tahun 2015</label>
                                <input type="text" class="form-control" id="omzetusaha3" placeholder="Omzet di Tahun 2015">
                            </div>
                        </div>
                        <label class="asterisk"><b>Profit Usaha</b></label>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="profitusaha1">Tahun 2017</label>
                                <input type="text" class="form-control" id="profitusaha1" placeholder="Profit di Tahun 2017">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="profitusaha2">Tahun 2016</label>
                                <input type="text" class="form-control" id="profitusaha2" placeholder="Profit di Tahun 2016">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="profitusaha3">Tahun 2015</label>
                                <input type="text" class="form-control" id="profitusaha3" placeholder="Profit di Tahun 2015">
                            </div>
                        </div>
                        <label class="asterisk"><b>Komposisi Modal Usaha (saat ini)</b></label>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="modalsendiri">Sendiri</label>
                                <input type="text" class="form-control" id="modalsendiri" placeholder="Rp. 1.000.000">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modalkeluarga">Keluarga</label>
                                <input type="text" class="form-control" id="modalkeluarga" placeholder="Rp. 1.000.000">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modalkeluarga">Teman/Investor</label>
                                <input type="text" class="form-control" id="modalinvestor" placeholder="Rp. 1.000.000">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modalbank">Perbankan</label>
                                <input type="text" class="form-control" id="modalbank" placeholder="Rp. 1.000.000">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="totalmodal">Total</label>
                                <input type="text" class="form-control" id="totalmodal" placeholder="Rp. 4.000.000">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="asterisk" for="cabangusaha"><b>Jumlah Cabang</b></label>
                                <input type="text" class="form-control" id="cabangusaha" placeholder="Jumlah Cabang Usaha Anda">
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-2">
                                <label class="asterisk" for="jumlahpegawai"><b>Jumlah Pegawai</b></label>
                                <input type="text" class="form-control" id="jumlahpegawai" placeholder="Jumlah Pegawai Anda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="asterisk"><b>Siapa yang awal mula merintis 
                                usaha yang Anda jalankan saat 
                                ini?</b></label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="PeloporUsaha" id="andasendiri" value="Anda Sendiri">
                                    <label class="form-check-label" for="andasendiri">Anda Sendiri</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="PeloporUsaha" id="keluarga" value="Keluarga">
                                    <label class="form-check-label" for="keluarga">Keluarga</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="PeloporUsaha" id="partnerusaha" value="Partner Usaha">
                                    <label class="form-check-label" for="partnerusaha">Partner Usaha</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="PeloporUsaha" id="peloporlainnya" value="Lainnya">
                                    <label class="form-check-label" for="peloporlainnya">Lainnya</label>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="asterisk" for="prestasiusaha">Prestasi / penghargaan yang pernah diraih</label>
                            <input type="text" class="form-control" id="prestasiusaha" placeholder="Jika banyak gunakan koma (,)">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    “Dengan ini saya menyatakan bahwa usaha yang saya jalankan tidak bertentangan dengan ketertiban 
                                    umum, kesusilaan dan ketentuan perundang-undangan. Saya juga menyatakan bahwa seluruh 
                                    informasi yang saya berikan dalam formulir pendaftaran ini adalah benar adanya. Apabila ternyata 
                                    dikemudian hari terdapat tuntutan / gugatan dari pihak manapun maka saya bersedia menanggung 
                                    seluruh akibat atas tuntutan / gugatan dari manapun tersebut dan membebaskan Pusat Inkubator 
                                    Bisnis LPPM Unsoed dari segala tuntutan / gugatan serta kerugian berupa apapun”.
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Mendaftar</button>
                    </form>
                </div>
            </div>
        </div>

        <section class="py-4 text-center"></section>

        <header class="bg-primary text-center py-5 mb-4">
            <div class="container">
                <h1 class="font-weight-light text-white">Meet the Team</h1>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <blockquote class="blockquote text-center mb-0">
                        <svg class="lnr text-muted quote-icon pull-left">
                            <use xlink:href="#lnr-heart"></use>                                       
                        </svg>
                        <p class="mb-0">Keep in touch with me for more Theme  right here!</p>
                        <footer class="blockquote-footer">Luckmoshy Designing
                            <cite title="Source Title">Webublog @</cite>
                        </footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <a class="flot-right btn btn-white border-0 rounded shadow post-pager-link p-0 next ml-4" href="">
                        <span class="d-flex h-100">
                            <span class="p-3 d-flex flex-column justify-content-center w-100">
                                <div class="indicator mb-1 text-uppercase text-muted">webublog<i class="fa fa-bars ml-2"></i></div>
                                    <p class="f-13">See next awesome themes</p>
                            </span>
                            <span class="bg-primary p-2 d-flex align-items-center text-white">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    </body>
</html>