<?php include('layouts/header.php'); ?>
<title>Data Kota</title>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Atur <b>Kota</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#add-kota" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data Kota Baru</span></a>
                            <a href="<?=base_url('kota/statistik')?>" class="btn btn-primary" target="_blank"><i class="material-icons">&#xE0C8;</i> <span>Info Statistik Wilayah</span></a>
                        </div>
                    </div>
                </div>
                <?=$this->session->flashdata('validation')?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th width="30%">Detail Kota</th>
                            <th>Keunggulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1; 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <?php foreach($cities as $city) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td>
                                    <b>Nama Kabpuaten/Kota :</b> <?= $city->NamaKota ?> <br>
                                    <b>Bupati/Walikota :</b> <?= $city->NamaPemimpin ?><br>
                                    <b>Jenis Wilayah :</b> <?= $city->JenisKota ?><br>
                                    <b>Berdiri Sejak :</b> <?= $city->TglBerdiri ?><br>
                                    <b>Total Penduduk :</b> <?= number_format($city->JmlPenduduk, 0, '', '.') ?> orang<br>
                                    <b>Luas Wilayah :</b> <?= number_format($city->LuasWilayah, 2, ',', '.') ?> m<sup>2</sup>
                                </td>
                                <td><?=strlen($city->Keunggulan) > 500 ? substr($city->Keunggulan, 0, 500).'...' : $city->Keunggulan ?></td>
                                <td>
                                    <a href="#kota-<?=$city->IDKota?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#kota-delete-<?=$city->IDKota?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    <a href="<?=base_url('/kota/export/'.$city->IDKota)?>" class="success" target="_blank"><i class="material-icons" data-toggle="tooltip" title="Print">&#xE8AD;</i></a>
                                </td>
                            </tr>
                            <div id="kota-delete-<?=$city->IDKota?>" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?=base_url('/kota/delete')?>">
                                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                            <input type="hidden" name="id" value="<?=$city->IDKota?>" />
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Hapus Mahasiswa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                                                <p class="text-warning"><small>Aksi ini tidak dapat diundur</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                                                <input type="submit" class="btn btn-danger" value="Hapus">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="kota-<?=$city->IDKota?>" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?=base_url('/kota/update/'.$city->IDKota)?>">
                                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Tambah Mahasiswa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <div class="form-group">
                                                    <label>Nama Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" name="NamaKota" value="<?=$city->NamaKota?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pemimpin Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" name="NamaPemimpin" value="<?=$city->NamaPemimpin?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Berdiri Wilayah</label>
                                                    <input type="date" class="form-control" name="TglBerdiri" value="<?=$city->TglBerdiri?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Penduduk (orang)</label>
                                                    <input type="text" class="form-control" name="JmlPenduduk" value="<?=$city->JmlPenduduk?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Luas Wilayah (m<sup>2</sup>)</label>
                                                    <input type="text" class="form-control" name="LuasWilayah" value="<?=$city->LuasWilayah?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kota</label>
                                                    <select name="JenisKota" class="form-control" id="">
                                                        <option value="Istimewa" <?= ($city->JenisKota == 'Istimewa' ? 'Selected' : '' )?>>Istimewa</option>
                                                        <option value="Otonom" <?= ($city->JenisKota == 'Otonom' ? 'Selected' : '' )?>>Otonom</option>
                                                        <option value="Percontohan" <?= ($city->JenisKota == 'Percontohan' ? 'Selected' : '' )?>>Percontohan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Keunggulan</label>
                                                    <textarea name="Keunggulan" id="" cols="30" rows="10" class="form-control"required><?=$city->Keunggulan?></textarea>
                                                </div>    
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                                                <input type="submit" class="btn btn-info" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
    <div id="add-kota" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?=base_url('/kota/store')?>">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <div class="modal-header">						
                        <h4 class="modal-title">Tambah Data Kota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Nama Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="NamaKota" value="<?=set_value('NamaKota')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pemimpin Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="NamaPemimpin" value="<?=set_value('NamaPemimpin')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berdiri Wilayah</label>
                            <input type="date" class="form-control" name="TglBerdiri" value="<?=set_value('TglBerdiri')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penduduk (orang)</label>
                            <input type="text" class="form-control" name="JmlPenduduk" value="<?=set_value('JmlPenduduk')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Luas Wilayah (m<sup>2</sup>)</label>
                            <input type="text" class="form-control" name="LuasWilayah" value="<?=set_value('NaLuasWilayahmaKota')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kota</label>
                            <select name="JenisKota" class="form-control" id="">
                                <option value="Istimewa" <?=set_select('JenisKota', 'Istimewa')?>>Istimewa</option>
                                <option value="Otonom" <?=set_select('JenisKota', 'Otonom')?>>Otonom</option>
                                <option value="Percontohan" <?=set_select('JenisKota', 'Percontohan')?>>Percontohan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keunggulan</label>
                            <textarea name="Keunggulan" id="" cols="30" rows="10" class="form-control"required><?=set_value('Keunggulan')?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-info" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include('layouts/footer.php'); ?>