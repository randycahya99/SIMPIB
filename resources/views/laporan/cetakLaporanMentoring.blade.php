<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Mentoring Tenant</title>
</head>
<body>
    <div>
        <center><h1>Pusat Inkubator Bisnis<br>Universitas Jenderal Soedirman</h1></center>
    </div>
    <div>
        <center><h2>Laporan Mentoring Tenant</h2></center>
    </div>
    <hr>
    <div>
        <div class="tes" style="font-family: sans-serif; color: #232323;">
            
            <h3>Profile Perusahaan</h3>
            <div style="margin-left: 30px">

                <p style="font-weight: bold; line-height: 0.5">Nama Pengusaha PPBT</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->nama}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Nama Perusahaan</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->usahas->nama_usaha}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Nama Founder</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->nama}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Bentuk Badan Perusahaan</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->usahas->bentuk_badan}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Kategori Usaha</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->usahas->kategori_usaha}}</p>
                
            </div>

            <br>

            <h3>Penanggung Jawab</h3>
            <div style="margin-left: 30px">
                
                <p style="font-weight: bold; line-height: 0.5"">Kode Mentor</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->mentors->categories->kode_mentor}}</p>
                
                <p style="font-weight: bold; line-height: 0.5"">Nama Mentor</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->mentors->nama_mentor}}</p>
                
                <p style="font-weight: bold; line-height: 0.5"">Bidang Keahlian</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->mentors->bidangs->bidang_keahlian}} ({{$form->mentors->bidangs->kode_bidang}})</p>
                
            </div>

        </div>
        <br>
        <div>
            <h3>Strategi Marketing</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="100%">Strategi Marketing</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->strategi_marketing}}</td>
                    </tr>
                </tbody>
            </table>
            <h3>Pengembangan Produk</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="100%">Pengembangan Produk Usaha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->pengembangan_produk}}</td>
                    </tr>
                </tbody>
            </table>
            <h3>Branding</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="100%">Branding Usaha Tenant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->branding}}</td>
                    </tr>
                </tbody>
            </table>
            <h3>Sistemasi Organisasi</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="100%">Sistemasi Organisasi Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->sistemasi_organisasi}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>