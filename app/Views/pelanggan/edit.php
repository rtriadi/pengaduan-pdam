<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Pelanggan
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li><a href="#">Pelanggan</a></li>
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
                    <a href="/pelanggan" class="btn btn-sm btn-default pull-right">Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="/pelanggan/update" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group <?= ($validation->hasError('username') ? 'has-error' : '') ?>">
                            <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= (old('username')) ? old('username') : $pelanggan['username'] ?>">
                            <span class="help-block"><?= $validation->getError('username') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('password') ? 'has-error' : '') ?>">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= (old('password')) ? old('password') : $pelanggan['password'] ?>">
                            <span class="help-block"><?= $validation->getError('password') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('nama_lengkap') ? 'has-error' : '') ?>">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $pelanggan['nama_lengkap'] ?>">
                            <span class="help-block"><?= $validation->getError('nama_lengkap') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('jenis_kelamin') ? 'has-error' : '') ?>">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">[Pilih Jenis Kelamin]</option>
                                <option value="L" <?= $pelanggan['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= $pelanggan['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <span class="help-block"><?= $validation->getError('jenis_kelamin') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('no_hp') ? 'has-error' : '') ?>">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone" value="<?= (old('no_hp')) ? old('no_hp') : $pelanggan['no_hp'] ?>">
                            <span class="help-block"><?= $validation->getError('no_hp') ?></span>
                        </div>
                        <div class="form-group <?= ($validation->hasError('alamat') ? 'has-error' : '') ?>">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= (old('alamat')) ? old('alamat') : $pelanggan['alamat'] ?></textarea>
                            <span class="help-block"><?= $validation->getError('alamat') ?></span>
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