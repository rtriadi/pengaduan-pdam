<?php if (empty($row)) : ?>
    <script>
        alert('data tidak ditemukan');
        window.close();
    </script>
<?php else : ?>
    <table width="100%" align="center" style="border-collapse: collapse;" cellpadding="5px">
        <tr align="center">
            <td>
                <h3>Laporan Pengaduan PDAM</h3>
            </td>
        </tr>
    </table>
    <table border=1 width="100%" align="center" style="border-collapse: collapse;" cellpadding="5px">
        <tr align="center">
            <td>No.</td>
            <td>Tanggal Pengaduan</td>
            <td>Data Pengadu</td>
            <td>Pengaduan</td>
        </tr>
        <?php $no = 1;
        foreach ($row as $data) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $data->tanggal_pengaduan ?></td>
                <td align="center"><?= '(' . $data->no_sambung . ') ' . $data->nama . '<br>' . $data->alamat ?></td>
                <td>
                    <?php
                    $this->db = \Config\Database::connect();
                    $query = $this->db->table('kategori')
                        ->whereIn('id_kategori', explode(",", $data->pengaduan))
                        ->get()
                        ->getResultArray();
                    foreach ($query as $key) {
                        echo '- ' . $key['nama_kategori'] . '<br>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <script>
        window.print()
    </script>
<?php endif ?>