<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Meter Pelanggan
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li><a href="#">Meter Pelanggan</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><?= $title ?></h3>
                    <a href="<?= site_url() ?>/meterpelanggan" class="btn btn-sm btn-default pull-right">Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="<?= site_url() ?>/meterpelanggan/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group <?= ($validation->hasError('bulan_meter') ? 'has-error' : '') ?>">
                            <label for="bulan_meter">Bulan Meter</label>
                            <select class="form-control" id="bulan_meter" name="bulan_meter">
                                <option value="">[Pilih Bulan]</option>
                                <option value="Januari" <?= old('bulan_meter') == 'Januari' ? 'selected' : '' ?>>Januari</option>
                                <option value="Februari" <?= old('bulan_meter') == 'Februari' ? 'selected' : '' ?>>Februari</option>
                                <option value="Maret" <?= old('bulan_meter') == 'Maret' ? 'selected' : '' ?>>Maret</option>
                                <option value="April" <?= old('bulan_meter') == 'April' ? 'selected' : '' ?>>April</option>
                                <option value="Mei" <?= old('bulan_meter') == 'Mei' ? 'selected' : '' ?>>Mei</option>
                                <option value="Juni" <?= old('bulan_meter') == 'Juni' ? 'selected' : '' ?>>Juni</option>
                                <option value="Juli" <?= old('bulan_meter') == 'Juli' ? 'selected' : '' ?>>Juli</option>
                                <option value="Agustus" <?= old('bulan_meter') == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                                <option value="September" <?= old('bulan_meter') == 'September' ? 'selected' : '' ?>>September</option>
                                <option value="Oktober" <?= old('bulan_meter') == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                                <option value="November" <?= old('bulan_meter') == 'November' ? 'selected' : '' ?>>November</option>
                                <option value="Desember" <?= old('bulan_meter') == 'Desember' ? 'selected' : '' ?>>Desember</option>
                            </select>
                            <span class="help-block"><?= $validation->getError('bulan_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('tahun_meter') ? 'has-error' : '') ?>">
                            <label for="tahun_meter">Tahun Meter</label>
                            <input type="text" class="form-control" maxlength="4" pattern="[0-9]{1,4}" title="*tahun harus berisi angka" id="tahun_meter" name="tahun_meter" placeholder="Tahun Meter" value="<?= old('tahun_meter') ?>">
                            <span class="help-block"><?= $validation->getError('tahun_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('meter') ? 'has-error' : '') ?>">
                            <label for="meter">Meter</label>
                            <input type="text" class="form-control" id="meter" name="meter" placeholder="Meter" value="<?= old('meter') ?>">
                            <span class="help-block"><?= $validation->getError('meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('foto_meter') ? 'has-error' : '') ?>">
                            <label for="foto_meter">Foto Meter</label>
                            <input type="file" class="form-control" id="foto_meter" name="foto_meter" placeholder="Foto Meter" value="<?= old('foto_meter') ?>">
                            <span class="help-block"><?= $validation->getError('foto_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('no_sambung') ? 'has-error' : '') ?>">
                            <label for="no_sambung">Pelanggan</label>
                            <select class="form-control" id="no_sambung" name="no_sambung">
                                <option value="">[Pilih Pelanggan]</option>
                                <?php foreach ($pelanggan as $key) : ?>
                                    <option value="<?= $key['no_sambung'] ?>" <?= old('no_sambung') == $key['no_sambung'] ? 'selected' : '' ?>><?= $key['no_sambung'] . ' - ' . $key['nama_lengkap'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="help-block"><?= $validation->getError('no_sambung') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('id_petugas') ? 'has-error' : '') ?>">
                            <label for="id_petugas">Petugas</label>
                            <select class="form-control" id="id_petugas" name="id_petugas">
                                <option value="">[Pilih Petugas]</option>
                                <?php foreach ($petugas as $key) : ?>
                                    <option value="<?= $key['id_petugas'] ?>" <?= old('id_petugas') == $key['id_petugas'] ? 'selected' : '' ?>><?= $key['id_petugas'] . ' - ' . $key['nama_lengkap_petugas'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="help-block"><?= $validation->getError('id_petugas') ?></span>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection() ?>