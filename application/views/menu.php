<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand">NambutDong</a>
            <a class="navbar-brand hidden"><img src="" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <!--h3 class="menu-title">Menu </h3><!-- /.menu-title -->
                <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('admin/index')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <?php if($this->session->userdata('role') <= 2) : ?>

                <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-keyboard-o"></i>Master</a>
                  <ul class="sub-menu children dropdown-menu">
                    <li class="<?php echo $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('admin/pengguna')?>"> <i class="fa fa-users"></i>Daftar Pengguna</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'daftarruangan' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('ruangan/daftarruangan')?>"> <i class="fa fa-map-marker"></i>Daftar Ruangan</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'daftarbarang' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('barang/daftarbarang')?>"> <i class="fa fa-laptop"></i>Daftar Barang</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'daftarjenispersediaan' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('peralatan/daftarjenispersediaan')?>"> <i class="fa fa-tags"></i>Jenis Persediaan</a>
                    </li>
                  </ul>
                </li>
              <!-- end master menu -->
              <?php endif; ?>
              <?php if($this->session->userdata('role') <= 2) : ?>
                <h3 class="menu-title">Manajemen </h3><!-- /.menu-title -->
                <li class="<?php echo $this->uri->segment(2) == 'menejpinjamruangan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pinjam/menejpinjamruangan')?>"> <i class="menu-icon fa fa-file-o"></i>Manajemen Ruangan</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'menejpemeliharaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pemeliharaan/menejpemeliharaan')?>"> <i class="menu-icon fa fa-file-o"></i>Manajemen Asset</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'daftarpersediaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('peralatan/daftarpersediaan')?>"> <i class="menu-icon fa fa-camera-retro"></i>Manajemen Peralatan</a>
                </li>
              <?php endif; ?>
                <!-- for user -->
                <h3 class="menu-title">Form </h3><!-- /.menu-title -->
                <li class="<?php echo $this->uri->segment(2) == 'calendar' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pinjam/calendar')?>"> <i class="menu-icon fa fa-building-o"></i>Kalender Ruangan</a>
                </li>
                <li class="<?php echo $this->uri->segment(1) == 'pemeliharaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pemeliharaan')?>"> <i class="menu-icon fa fa-car"></i>Pemeliharaan Asset</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'lop' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('peralatan/lop')?>"> <i class="menu-icon fa fa-file-o"></i>Peralatan & Perlengkapan</a>
                </li>
                <!-- li class="<?php echo $this->uri->segment(2) == 'kelaporan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('Laporanbarang/kelaporan')?>"> <i class="menu-icon fa fa-print"></i>Laporan Peminjaman</a>
                </li -->
                <h3 class="menu-title"></h3>
                <li class="<?php echo $this->uri->segment(2) == 'editprofil' ? 'active' : '' ?>">
                  <a href="<?php echo site_url('profil/editprofil')?>"> <i class="menu-icon fa fa fa-cog"></i>	<?php echo 'Profil '.$this->session->userdata('username') ?></a>
                </li>
                <li>
                  <a href="<?php echo site_url('Login/keluar')?>"> <i class="menu-icon fa fa fa-sign-out"></i>	Logout</a>
                </li>

      </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
