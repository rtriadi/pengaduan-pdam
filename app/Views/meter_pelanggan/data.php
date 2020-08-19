<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Meter Pelanggan
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li class="active">Meter Pelanggan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><?= $title ?></h3>
                    <a href="<?= site_url() ?>/meterpelanggan/create" class="btn btn-sm btn-success pull-right">Tambah</a>
                </div>
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
                    <table id="tabel-meterpelanggan" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Tanggal Meter</th>
                                <th>Meter</th>
                                <th>No Sambung - Nama Lengkap</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($meter_pelanggan as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['tanggal_meter'] ?></td>
                                    <td><?= $data['meter'] ?></td>
                                    <td><?= $data['no_sambung'] . ' - ' . $data['nama_lengkap'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url() ?>/meterpelanggan/edit/<?= $data['id'] ?>" class="btn btn-sm btn-primary">Ubah</a>
                                        <a href="<?= site_url() ?>/meterpelanggan/delete/<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
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
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Import Meter Pelanggan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="<?= site_url() ?>/meterpelanggan/importExcel" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fileexcel">Pilih Excel</label>
                            <input type="file" class="form-control" id="fileexcel" name="fileexcel" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <a href="<?= site_url() ?>/uploads/formatImport/data_meterpelanggan.xlsx" target="_blank">Download format excel data meter pelanggan</a>
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