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
                    <a href="/meterpelanggan" class="btn btn-sm btn-default pull-right">Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="/meterpelanggan/save" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group <?= ($validation->hasError('tanggal_meter') ? 'has-error' : '') ?>">
                            <label for="tanggal_meter">Tanggal Meter</label>
                            <input type="date" class="form-control" id="tanggal_meter" name="tanggal_meter" value="<?= old('tanggal_meter') ?>">
                            <span class="help-block"><?= $validation->getError('tanggal_meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('meter') ? 'has-error' : '') ?>">
                            <label for="meter">Meter</label>
                            <input type="text" class="form-control" id="meter" name="meter" placeholder="Meter" value="<?= old('meter') ?>">
                            <span class="help-block"><?= $validation->getError('meter') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('id_pelanggan') ? 'has-error' : '') ?>">
                            <label for="id_pelanggan">Pelanggan</label>
                            <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                                <option value="">[Pilih Pelanggan]</option>
                                <?php foreach ($pelanggan as $key) : ?>
                                    <option value="<?= $key['id_pelanggan'] ?>" <?= old('id_pelanggan') == $key['id_pelanggan'] ? 'selected' : '' ?>><?= $key['nama_lengkap'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="help-block"><?= $validation->getError('id_pelanggan') ?></span>
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