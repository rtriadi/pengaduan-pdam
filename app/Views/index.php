<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/penyelesaian/fonts/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/penyelesaian/css/style.css">
</head>

<body>
    <div class="wrapper" style="background-image: url('<?= base_url() ?>/assets/penyelesaian/images/bg-registration-form-2.jpg');">
        <div class="inner">
            <form action="/auth/selesai" method="post">
                <?= csrf_field() ?>
                <h3>Form Penyelesaian</h3>
                <div class="form-wrapper">
                    <label for="">No. Sambung</label>
                    <input type="hidden" class="form-control" name="id_pengaduan" value="<?= $pengaduan['id_pengaduan'] ?>" readonly>
                    <input type="text" class="form-control" value="<?= $pengaduan['no_sambung'] ?>" readonly>
                </div>
                <div class="form-wrapper">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" value="<?= $pengaduan['nama'] ?>" readonly>
                </div>
                <div class="form-wrapper">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" value="<?= $pengaduan['alamat'] ?>" readonly>
                </div>
                <div class="form-wrapper">
                    <?php $this->db = \Config\Database::connect();
                    $query = $this->db->table('kategori')
                        ->whereIn('id_kategori', explode(",", $pengaduan['pengaduan']))
                        ->get()
                        ->getResultArray(); ?>
                    <label for="">Pengaduan</label>
                    <textarea class="form-control" readonly><?php
                                                            foreach ($query as $key) {
                                                                echo $key['nama_kategori'] . ', ';
                                                            }
                                                            ?></textarea>
                </div>
                <div class=" form-wrapper">
                    <label for="">Penyelesaian</label>
                    <textarea name="penyelesaian_pengaduan" class="form-control" required></textarea>
                </div>
                <div class="form-wrapper">
                    <label for="">Id Petugas</label>
                    <input type="text" name="id_petugas" class="form-control" required>
                </div>
                <button type="submit" name="selesai">Selesai</button>
            </form>
        </div>
    </div>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="262e426ef26b3c2df6a61ef2-text/javascript"></script>
    <script src="<?= base_url() ?>/assets/penyelesaian/js/rocket-loader.min.js" data-cf-settings="262e426ef26b3c2df6a61ef2-|49" defer=""></script>
</body>

</html>