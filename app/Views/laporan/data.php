<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="content-header">
    <h1>
        <?= $title ?>
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-file-text-o"></i> Laporan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Ambil Laporan Sesuai Tanggal Pengaduan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="search" type="button" class="btn btn-block btn-success pull-right"><i class="fa fa-search"></i> Seacrh</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection() ?>