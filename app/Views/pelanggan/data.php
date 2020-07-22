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
                <a href="/pelanggan/create" class="btn btn-sm btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif ?>
                <table id="tabel-pelanggan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>No. Handphone</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelanggan as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= $data['jenis_kelamin'] ?></td>
                                <td><?= $data['no_hp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td class="text-center">
                                    <a href="/pelanggan/edit/<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-primary">Ubah</a>
                                    <a href="/pelanggan/delete/<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
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