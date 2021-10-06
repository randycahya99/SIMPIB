<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendampingan Tenant</title>
</head>
<body>
    <div>
        <center><h1>Pusat Inkubator Bisnis<br>Universitas Jenderal Soedirman</h1></center>
    </div>
    <div>
        <center><h2>Laporan Pendampingan Tenant</h2></center>
    </div>
    <hr>
    <div>
        <div class="tes" style="font-family: sans-serif; color: #232323;">
            
            <h3>Penanggung Jawab</h3>
            <div style="margin-left: 30px">
                
                <p style="font-weight: bold; line-height: 0.5"">Kode Pendamping</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->pendampings->categories->kode_pendamping}}</p>
                
                <p style="font-weight: bold; line-height: 0.5"">Nama Pendamping</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->pendampings->nama_pendamping}}</p>
                
                <p style="font-weight: bold; line-height: 0.5"">Bidang Keahlian</p>
                <p style="margin-left: 30px; line-height: 0.5"">{{$form->pendampings->bidangs->bidang_keahlian}} ({{$form->pendampings->bidangs->kode_bidang}})</p>
                
            </div>

            <br>

            <h3>Profile Perusahaan</h3>
            <div style="margin-left: 30px">

                <p style="font-weight: bold; line-height: 0.5">Nama Pengusaha PPBT</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->nama}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Nama Perusahaan</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->usahas->nama_usaha}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Nama Founder</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->tenants->nama}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Jumlah SDM Total</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->sdm_total}} orang</p>
                
                <p style="font-weight: bold; line-height: 0.5">Jumlah SDM Lepas / Produksi (yang dibiayai program PPBT)</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->sdm_lepas}} orang</p>
                
                <p style="font-weight: bold; line-height: 0.5">Status Dengan Inkubator</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->status_inkubator}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Luas Bangunan (tempat usaha/inkubasi tenant PPBT)</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->luas_bangunan}} m2</p>
                
                <p style="font-weight: bold; line-height: 0.5">Kepemilikan Teknologi</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->kepemilikan_teknologi}}</p>
                
                <p style="font-weight: bold; line-height: 0.5">Lama Kontrak Dengan Inkubator</p>
                <p style="margin-left: 30px; line-height: 0.5">{{$form->lama_kontrak}}</p>
                
            </div>

        </div>
        <br>
        <div>

            <h3>Target</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Akhir Tahun</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Sampai Dengan Saat Ini</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td  style="border: 1px solid #999; padding: 8px 20px;">{{$form->target_akhir_tahun}}</td>
                        <td  style="border: 1px solid #999; padding: 8px 20px;">{{$form->target_saat_ini}}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Anggaran</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead width="660px">
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Jumlah Anggaran PPBT/tenant (Rp.)</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Inkubator (Rp.)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($form->jumlah_anggaran_ppbt)</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($form->anggaran_inkubator)</td>
                    </tr>
                </tbody>
            </table>

            <h3>Produksi Sampai Saat Ini</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Jumlah Produksi</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="34%">Jumlah Penjualan</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Harga Produksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->jumlah_produksi}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->jumlah_penjualan}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->harga_produksi}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Harga Produksi/unit (HPP)</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Harga Jual/unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($form->harga_produksi_unit)</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($form->harga_jual_unit)</td>
                    </tr>
                </tbody>
            </table>

            <h3>Perijinan</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Perusahaan (CV/PT)</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="50%">Produk (HKI/Merk/PIRT/POM/SNI/dll)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->perijinan_perusahaan}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->perijinan_produk}}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Belanja Mesin</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Nama Mesin</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="34%">Jumlah Mesin</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Total Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->nama_mesin}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->jumlah_mesin}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->total_nilai_mesin}}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Inkubator</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" colspan="3">Jenis Mentoring</th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Produk</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="34%">Bisnis</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="33%">Administrasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->inkubator_produk}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->inkubator_bisnis}}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->inkubator_administrasi}}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Uraian Masalah Administrasi</h3>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;" width="100%">Uraian Masalah Administrasi (Pelaporan, Keuangan, dsb)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{$form->masalah_administrasi}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>