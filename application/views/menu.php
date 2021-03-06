<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand"><span style="color:red;font-size:40px;">[</span><u> Pa.RT </u><span style="color:red;font-size:40px;">]</span></a>
            <a class="navbar-brand hidden"><img src="<?php echo base_url('assets/images/logo-part.png') ?>" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <!--h3 class="menu-title">Menu </h3><!-- /.menu-title -->
                <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('admin/index')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <?php if($this->session->userdata('role') != 'USER') : ?>

                <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-keyboard-o"></i>Master</a>
                  <ul class="sub-menu children dropdown-menu">
                    <li class="<?php echo $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('admin/pengguna')?>"> <i class="fa fa-users"></i>Daftar Pengguna</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'unitkerja' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('admin/unitkerja')?>"> <i class="fa fa-leaf"></i>Daftar Unit Kerja</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pagumamin' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('admin/pagumamin')?>"> <i class="fa fa-money"></i>Pagu Mamin</a>
                    </li>
                  </ul>
                </li>
              <!-- end master menu -->
              <?php endif; ?>
              <?php if($this->session->userdata('role') != 'USER') : ?>
                <h3 class="menu-title">ADMIN </h3><!-- /.menu-title -->
                <?php if($this->session->userdata('role') == 'ADMINRUANG' || $this->session->userdata('role') == 'SUPERADMIN' ) : ?>
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Manajemen Ruangan</a>
                      <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo $this->uri->segment(2) == 'daftarruangan' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('ruangan/daftarruangan')?>"> <i class="fa fa-map-marker"></i>Daftar Ruangan</a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'daftarbarang' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('barang/daftarbarang')?>"> <i class="fa fa-laptop"></i>Daftar Barang</a>
                        </li>

                        <li class="<?php echo $this->uri->segment(2) == 'menejpinjamruangan' ? 'active' : '' ?>">
                            <!-- a href="<?php //echo site_url('pinjam/menejpinjamruangan')?>"> <i class="menu-icon fa fa-file-o"></i>Peminjaman</a -->
                            <a href="<?php echo site_url('pinjam/menejpinjamruangan')?>"> <i class="fa fa-file-o"></i>Peminjaman</a>
                        </li>
                      </ul>
                    </li>
                <?php endif; ?>
                <?php if($this->session->userdata('role') == 'ADMINASET' || $this->session->userdata('role') == 'SUPERADMIN' ) : ?>
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Manajemen Asset</a>
                      <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo $this->uri->segment(2) == 'menejpemeliharaan' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('assetadmin/listrkbmd')?>"> <i class="fa fa-file-o"></i>RKBMD</a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'menejpemeliharaan' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('pemeliharaan/menejpemeliharaan')?>"> <i class="fa fa-file-o"></i>Pemeliharaan</a>
                        </li>
                      </ul>
                    </li>
              <?php endif; ?>
              <?php if($this->session->userdata('role') == 'ADMINSUPPLY' || $this->session->userdata('role') == 'SUPERADMIN' ) : ?>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Manajemen Persediaan</a>
                    <ul class="sub-menu children dropdown-menu">
                      <li class="<?php echo $this->uri->segment(2) == 'daftarjenispersediaan' ? 'active' : '' ?>">
                          <a href="<?php echo site_url('peralatanadmin/daftarjenispersediaan')?>"> <i class="fa fa-tags"></i>Jenis Persediaan</a>
                      </li>
                      <li class="<?php echo $this->uri->segment(2) == 'daftarpersediaan' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('peralatanadmin/daftarpersediaan')?>"> <i class="fa fa-map-marker"></i>Stok Barang</a>
                      </li>
                      <li class="<?php echo $this->uri->segment(2) == 'permohonanpersediaan' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('peralatanadmin/listpermohonan')?>"> <i class="fa fa-map-marker"></i>Permohonan Peralatan</a>
                      </li>
                      <li class="<?php echo $this->uri->segment(2) == 'daftar_pengajuan' ? 'active' : '' ?>">
                        <a href="<?php echo site_url('maminadmin/daftar_pengajuan')?>"> <i class="fa fa-map-marker"></i>Mamin</a>
                      </li>
                    </ul>

                </li>
              <?php endif; ?>
              <?php endif; ?>
                <!-- for user -->
                <h3 class="menu-title">Form </h3><!-- /.menu-title -->
                <li class="<?php echo $this->uri->segment(2) == 'calendar' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pinjam/calendar')?>"> <i class="menu-icon fa fa-calendar"></i>Kalender Ruangan</a>
                </li>
                <li class="<?php echo $this->uri->segment(1) == 'pemeliharaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pemeliharaan')?>"> <i class="menu-icon fa fa-car"></i>Pemeliharaan Asset</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('peralatan/transaksi')?>"> <i class="menu-icon fa fa-shopping-cart "></i>Peralatan Kantor</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asset/rkbmd')?>"> <i class="menu-icon fa fa-barcode"></i>RKBMD</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'listmamin' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('mamin/listmamin')?>"> <i class="menu-icon fa fa-cutlery"></i>Pengajuan Mamin</a>
                </li>
                <!-- li class="<?php echo $this->uri->segment(2) == 'kelaporan' ? 'active' : '' ?>">
                    <a href="< ?php echo site_url('Laporanbarang/kelaporan')?>"> <i class="menu-icon fa fa-print"></i>Laporan Peminjaman</a>
                </li -->
                <h3 class="menu-title"></h3>
                <li class="<?php echo $this->uri->segment(2) == 'editprofil' ? 'active' : '' ?>">
                  <a href="<?php echo site_url('profil/editprofil/') ?>"> <i class="menu-icon fa fa fa-cog"></i>	<?php echo 'Profil '.$this->session->userdata('username') ?></a>
                </li>
                <li>
                  <a href="<?php echo site_url('Login/keluar')?>"> <i class="menu-icon fa fa fa-sign-out"></i>	Logout</a>
                </li>

      </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
