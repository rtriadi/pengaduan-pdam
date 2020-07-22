<?php $this->uri = service('uri') ?>
<li class="header">MENU UTAMA</li>
<!-- Optionally, you can add icons to the links -->
<li class="<?= $this->uri->getSegment(1) == 'home' ? 'active' : '' ?>"><a href="/home"><i class="fa fa-tv"></i> <span>Home</span></a></li>
<li class="<?= $this->uri->getSegment(1) == 'pengaduan' ? 'active' : '' ?>"><a href="/pengaduan"><i class="fa fa-commenting"></i> <span>Data Pengaduan</span></a></li>
<li class="header">MENU PENGATURAN</li>
<li class="treeview <?= $this->uri->getSegment(1) == 'pelanggan' || $this->uri->getSegment(1) == 'petugas' || $this->uri->getSegment(1) == 'kategori' ? 'active' : '' ?>">
    <a href="#"><i class="fa fa-database"></i> <span>Data Master</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?= $this->uri->getSegment(1) == 'pelanggan' ? 'active' : '' ?>"><a href="/pelanggan">Data Pelanggan</a></li>
        <li class="<?= $this->uri->getSegment(1) == 'petugas' ? 'active' : '' ?>"><a href="/petugas">Data Petugas</a></li>
        <li class="<?= $this->uri->getSegment(1) == 'kategori' ? 'active' : '' ?>"><a href="/kategori">Data Kategori</a></li>
    </ul>
</li>