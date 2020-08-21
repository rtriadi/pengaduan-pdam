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
        <li class="active">Ubah</li>
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
                    <form role="form" action="<?= site_url() ?>/meterpelanggan/update" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group <?= ($validation->hasError('bulan_meter') ? 'has-error' : '') ?>">
                            <label for="bulan_meter">Bulan Meter</label>
                            <select class="form-control" id="bulan_meter" name="bulan_meter">
                                <option value="">[Pilih Bulan]</option>
                                <option value="Januari" <?= $meter_pelanggan['bulan_meter'] == 'Januari' ? 'selected' : '' ?>>Januari</option>
                                <option value="Februari" <?= $meter_pelanggan['bulan_meter'] == 'Februari' ? 'selected' : '' ?>>Februari</option>
                                <option value="Maret" <?= $meter_pelanggan['bulan_meter'] == 'Maret' ? 'selected' : '' ?>>Maret</option>
                                <option value="April" <?= $meter_pelanggan['bulan_meter'] == 'April' ? 'selected' : '' ?>>April</option>
                                <option value="Mei" <?= $meter_pelanggan['bulan_meter'] == 'Mei' ? 'selected' : '' ?>>Mei</option>
                                <option value="Juni" <?= $meter_pelanggan['bulan_meter'] == 'Juni' ? 'selected' : '' ?>>Juni</option>
                                <option value="Juli" <?= $meter_pelanggan['bulan_meter'] == 'Juli' ? 'selected' : '' ?>>Juli</option>
                                <option value="Agustus" <?= $meter_pelanggan['bulan_meter'] == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                                <option value="September" <?= $meter_pelanggan['bulan_meter'] == 'September' ? 'selected' : '' ?>>September</option>
                                <option value="Oktober" <?= $meter_pelanggan['bulan_meter'] == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                                <option value="November" <?= $meter_pelanggan['bulan_meter'] == 'November' ? 'selected' : '' ?>>November</option>
                                <option value="Desember" <?= $meter_pelanggan['bulan_meter'] == 'Desember' ? 'selected' : '' ?>>Desember</option>
                            </select>
                            <span class="help-block"><?= $validation->getError('bulan_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('tahun_meter') ? 'has-error' : '') ?>">
                            <label for="tahun_meter">Tahun Meter</label>
                            <input type="text" class="form-control" maxlength="4" pattern="[0-9]{1,4}" title="*tahun harus berisi angka" id="tahun_meter" name="tahun_meter" value="<?= (old('tahun_meter')) ? old('tahun_meter') : $meter_pelanggan['tahun_meter'] ?>">
                            <span class="help-block"><?= $validation->getError('tahun_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('meter') ? 'has-error' : '') ?>">
                            <input type="hidden" class="form-control" name="id" value="<?= $meter_pelanggan['id'] ?>">
                            <label for="meter">Meter</label>
                            <input type="text" class="form-control" id="meter" name="meter" placeholder="Meter" value="<?= (old('meter')) ? old('meter') : $meter_pelanggan['meter'] ?>">
                            <span class="help-block"><?= $validation->getError('meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('no_sambung') ? 'has-error' : '') ?>">
                            <label for="no_sambung">Pelanggan</label>
                            <select class="form-control" id="no_sambung" name="no_sambung">
                                <option value="">[Pilih Pelanggan]</option>
                                <?php foreach ($pelanggan as $key) : ?>
                                    <option value="<?= $key['no_sambung'] ?>" <?= $meter_pelanggan['no_sambung'] == $key['no_sambung'] ? 'selected' : '' ?>><?= $key['no_sambung'] . ' - ' . $key['nama_lengkap'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="help-block"><?= $validation->getError('no_sambung') ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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