<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Kategori
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li class="active">Kategori</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><?= $title ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan') ?>
                        </div>
                    <?php endif ?>
                    <?php if ($validation->hasError('nama_kategori')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->getError('nama_kategori') ?>
                        </div>
                    <?php endif ?>
                    <table id="tabel-kategori" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama Kategori</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kategori as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_kategori'] ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalKategori-edit<?= $data['id_kategori'] ?>">Ubah</button>
                                        <a href="<?= site_url() ?>/kategori/delete/<?= $data['id_kategori'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data  ini?')">Hapus</a>
                                    </td>
                                    <div class="modal fade" id="modalKategori-edit<?= $data['id_kategori'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Form Ubah Data</h4>
                                                </div>
                                                <form role="form" action="<?= site_url() ?>/kategori/update" method="post">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama_kategori">Nama Kategori</label>
                                                            <input type="hidden" class="form-control" name="id_kategori" value="<?= $data['id_kategori'] ?>">
                                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $data['nama_kategori'] ?>">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Tambah Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url() ?>/kategori/save" method="post">
                    <?= csrf_field() ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->
<?= $this->endSection() ?>