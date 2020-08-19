<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Pelanggan
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li class="active">Pelanggan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
                <a href="<?= site_url() ?>/pelanggan/create" class="btn btn-sm btn-success pull-right">Tambah</a>
                <button class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#importExcel" style="margin-right: 10px;">Import Excel</button>
            </div>
            <div class="modal fade" id="importExcel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Import Excel Data Pelanggan</h4>
                        </div>
                        <form role="form" action="<?= site_url() ?>/pelanggan/importExcel" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="fileexcel">Pilih Excel</label>
                                    <input type="file" class="form-control" id="fileexcel" name="fileexcel" required>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <a href="<?= site_url() ?>/uploads/formatImport/data_pelanggan.xlsx" target="_blank">Download format excel data pelanggan</a>
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
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php elseif (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('errors')['fileexcel'] ?>
                    </div>
                <?php endif ?>
                <table id="tabel-pelanggan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>No. Sambung</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>No. Handphone</th>
                            <th>Alamat</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelanggan as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['no_sambung'] ?></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= $data['jenis_kelamin'] ?></td>
                                <td><?= $data['no_hp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url() ?>/pelanggan/edit/<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-primary">Ubah</a>
                                    <a href="<?= site_url() ?>/pelanggan/delete/<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</section>
<!-- /.content -->
<?= $this->endSection() ?>