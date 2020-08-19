<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Petugas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li><a href="#">Petugas</a></li>
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
                    <a href="<?= site_url() ?>/petugas" class="btn btn-sm btn-default pull-right">Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="<?= site_url() ?>/petugas/save" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group <?= ($validation->hasError('username') ? 'has-error' : '') ?>">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= old('username') ?>">
                            <span class="help-block"><?= $validation->getError('username') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('password') ? 'has-error' : '') ?>">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= old('password') ?>">
                            <span class="help-block"><?= $validation->getError('password') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('level') ? 'has-error' : '') ?>">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="">[Pilih Level]</option>
                                <option value="0" <?= old('level') == "0" ? 'selected' : '' ?>>Administrator</option>
                                <option value="1" <?= old('level') == "1" ? 'selected' : '' ?>>Pimpinan</option>
                                <option value="2" <?= old('level') == "2" ? 'selected' : '' ?>>Petugas</option>
                            </select>
                            <span class="help-block"><?= $validation->getError('jenis_kelamin') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('nama_lengkap_petugas') ? 'has-error' : '') ?>">
                            <label for="nama_lengkap_petugas">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap_petugas" name="nama_lengkap_petugas" placeholder="Nama Lengkap" value="<?= old('nama_lengkap_petugas') ?>">
                            <span class="help-block"><?= $validation->getError('nama_lengkap_petugas') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('jenis_kelamin_petugas') ? 'has-error' : '') ?>">
                            <label for="jenis_kelamin_petugas">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_petugas" name="jenis_kelamin_petugas">
                                <option value="">[Pilih Jenis Kelamin]</option>
                                <option value="L" <?= old('jenis_kelamin_petugas') == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= old('jenis_kelamin_petugas') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <span class="help-block"><?= $validation->getError('jenis_kelamin') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('no_hp_petugas') ? 'has-error' : '') ?>">
                            <label for="no_hp_petugas">No. Handphone</label>
                            <input type="text" class="form-control" id="no_hp_petugas" name="no_hp_petugas" placeholder="No. Handphone" value="<?= old('no_hp_petugas') ?>">
                            <span class="help-block"><?= $validation->getError('no_hp_petugas') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('alamat_petugas') ? 'has-error' : '') ?>">
                            <label for="alamat_petugas">Alamat</label>
                            <textarea class="form-control" id="alamat_petugas" name="alamat_petugas" placeholder="Alamat"><?= old('alamat_petugas') ?></textarea>
                            <span class="help-block"><?= $validation->getError('alamat_petugas') ?></span>
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