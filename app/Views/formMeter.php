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
            <form action="<?= site_url() ?>/auth/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <h3>Form Meter Pelanggan</h3>
                <div class="form-wrapper">
                    <label for="">Bulan Meter</label>
                    <select class="form-control" name="bulan_meter">
                        <option value="Januari" <?= old('bulan_meter') == 'Januari' ? 'selected' : '' ?>>Januari</option>
                        <option value="Februari" <?= old('bulan_meter') == 'Februari' ? 'selected' : '' ?>>Februari</option>
                        <option value="Maret" <?= old('bulan_meter') == 'Maret' ? 'selected' : '' ?>>Maret</option>
                        <option value="April" <?= old('bulan_meter') == 'April' ? 'selected' : '' ?>>April</option>
                        <option value="Mei" <?= old('bulan_meter') == 'Mei' ? 'selected' : '' ?>>Mei</option>
                        <option value="Juni" <?= old('bulan_meter') == 'Juni' ? 'selected' : '' ?>>Juni</option>
                        <option value="Juli" <?= old('bulan_meter') == 'Juli' ? 'selected' : '' ?>>Juli</option>
                        <option value="Agustus" <?= old('bulan_meter') == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                        <option value="September" <?= old('bulan_meter') == 'September' ? 'selected' : '' ?>>September</option>
                        <option value="Oktober" <?= old('bulan_meter') == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                        <option value="November" <?= old('bulan_meter') == 'November' ? 'selected' : '' ?>>November</option>
                        <option value="Desember" <?= old('bulan_meter') == 'Desember' ? 'selected' : '' ?>>Desember</option>
                    </select>
                </div>
                <div class="form-wrapper">
                    <label for="">Tahun Meter</label>
                    <input type="text" class="form-control" maxlength="4" pattern="[0-9]{1,4}" title="*tahun harus berisi angka" name="tahun_meter">
                </div>
                <div class="form-wrapper">
                    <label for="">No. Sambung</label>
                    <input type="text" class="form-control" name="no_sambung" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Meter</label>
                    <input type="text" class="form-control" name="meter" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Foto Meter</label>
                    <input type="file" class="form-control" name="foto_meter" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Id Petugas</label>
                    <input type="text" name="id_petugas" class="form-control" required>
                </div>
                <button type="submit" name="simpan">Simpan</button>
            </form>
        </div>
    </div>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="262e426ef26b3c2df6a61ef2-text/javascript"></script>
    <script src="<?= base_url() ?>/assets/penyelesaian/js/rocket-loader.min.js" data-cf-settings="262e426ef26b3c2df6a61ef2-|49" defer=""></script>
</body>

</html>