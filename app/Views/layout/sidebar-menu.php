<?php $this->uri = service('uri') ?>
<li class="header">MENU UTAMA</li>
<!-- Optionally, you can add icons to the links -->
<li class="<?= $this->uri->getSegment(1) == 'home' ? 'active' : '' ?>"><a href="/home"><i class="fa fa-tv"></i> <span>Home</span></a></li>
<li class="<?= $this->uri->getSegment(1) == 'pengaduan' ? 'active' : '' ?>"><a href="/pengaduan"><i class="fa fa-hand-paper-o"></i> <span>Pengaduan</span></a></li>
<?php if (session()->get('level') == 1) : ?>
    <li class="<?= $this->uri->getSegment(1) == 'laporan' ? 'active' : '' ?>"><a href="/laporan"><i class="fa fa-file-text-o"></i> <span>Laporan</span></a></li>
<?php endif ?>
<?php if (session()->get('level') == 0) : ?>
    <li class="header">MENU PENGATURAN</li>
    <li class="treeview <?= $this->uri->getSegment(1) == 'pelanggan' || $this->uri->getSegment(1) == 'meterpelanggan' || $this->uri->getSegment(1) == 'petugas' || $this->uri->getSegment(1) == 'kategori' ? 'active' : '' ?>">
        <a href="#"><i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->getSegment(1) == 'pelanggan' ? 'active' : '' ?>"><a href="/pelanggan">Data Pelanggan</a></li>
            <li class="<?= $this->uri->getSegment(1) == 'meterpelanggan' ? 'active' : '' ?>"><a href="/meterpelanggan">Data Meter Pelanggan</a></li>
            <li class="<?= $this->uri->getSegment(1) == 'petugas' ? 'active' : '' ?>"><a href="/petugas">Data Petugas</a></li>
            <li class="<?= $this->uri->getSegment(1) == 'kategori' ? 'active' : '' ?>"><a href="/kategori">Data Kategori</a></li>
        </ul>
    </li>
<?php endif ?>