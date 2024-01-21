<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/style.css')?>">
</head>
<style>
    @page { margin: 0px; }
    body { margin: 0px; }
</style>
<title>Data Kota</title>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data Kota <b><?=$city->NamaKota?></b></h2>
                        </div>
                    </div>
                </div>
                <?=$this->session->flashdata('validation')?>
                <table class="table table-striped table-hover">
                    <tbody> 
                        <tr>
                            <td>Nama Kabupaten/Kota</td>
                            <td>:</td>
                            <td><?=$city->NamaKota?></td>
                        </tr>
                        <tr>
                            <td>Nama Pemimpim Kabupaten/Kota</td>
                            <td>:</td>
                            <td><?=$city->NamaPemimpin?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Berdiri</td>
                            <td>:</td>
                            <td><?=$city->TglBerdiri?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Penduduk</td>
                            <td>:</td>
                            <td><?=number_format($city->JmlPenduduk, 0, '', '.') ?> orang</td>
                        </tr>
                        <tr>
                            <td>Luas Wilayah</td>
                            <td>:</td>
                            <td><?=number_format($city->LuasWilayah, 2, ',', '.')?> m<sup>2</sup></td>
                        </tr>
                        <tr>
                            <td>Jenis Kota</td>
                            <td>:</td>
                            <td><?=$city->JenisKota?></td>
                        </tr>
                        <tr>
                            <td>Keunggulan</td>
                            <td>:</td>
                            <td><?=$city->Keunggulan?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</body>
</html>