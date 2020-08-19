<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Petugas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li class="active">Petugas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
                <a href="<?= site_url() ?>/petugas/create" class="btn btn-sm btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif ?>
                <table id="tabel-petugas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>No. Handphone</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($petugas as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_lengkap_petugas'] ?></td>
                                <td><?= $data['jenis_kelamin_petugas'] ?></td>
                                <td><?= $data['no_hp_petugas'] ?></td>
                                <td><?= $data['alamat_petugas'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['level'] == '0' ? '<label class="label label-success">Administrator</label>' : ($data['level'] == '1' ? '<label class="label label-info">Pimpinan</label>' : '<label class="label label-default">Petugas</label>') ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url() ?>/petugas/edit/<?= $data['id_petugas'] ?>" class="btn btn-sm btn-primary">Ubah</a>
                                    <a href="<?= site_url() ?>/petugas/delete/<?= $data['id_petugas'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
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