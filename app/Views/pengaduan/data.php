<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <h1>
        Pengaduan
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-commenting"></i> Pengaduan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
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
                <table id="tabel-pengaduan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Tanggal</th>
                            <th>No. Sambung</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pengaduan</th>
                            <th>Penyelesaian Pengaduan</th>
                            <th width="5%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        helper('Tanggal');
                        foreach ($pengaduan as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['created_at'] ?></td>
                                <td><?= $data['no_sambung'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td>
                                    <?php
                                    $this->db = \Config\Database::connect();
                                    $query = $this->db->table('kategori')
                                        ->whereIn('id_kategori', explode(",", $data['pengaduan']))
                                        ->get()
                                        ->getResultArray();
                                    foreach ($query as $key) {
                                        echo '- ' . $key['nama_kategori'] . '<br>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($data['penyelesaian_pengaduan'] == null) : ?>
                                        <div>
                                            <?php
                                            $qrCode = new Endroid\QrCode\QrCode($data['id_pengaduan']);
                                            $qrCode->writeFile('uploads/pengaduan/pengaduan-' . $data['id_pengaduan'] . '.png');
                                            ?>
                                            <img src="/uploads/pengaduan/pengaduan-<?= $data['id_pengaduan'] ?>.png" style="width: 100px">
                                            <br>
                                        </div>
                                    <?php else : $data['penyelesaian_pengaduan'] ?>

                                    <?php endif ?>
                                </td>
                                <td><?= $data['status'] == 0 ? '<label class="label label-danger">Belum Selesai</label>' : '<label class="label label-success">Selesai</label>' ?></td>
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