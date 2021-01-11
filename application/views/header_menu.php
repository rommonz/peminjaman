<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
            <div class="header-left">
            <h3><?php echo $page_title ?></h3>
            </div>
        </div>
        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle" src="<?php echo base_url().'assets/images/admin.jpg' ?>" alt="User Avatar">
              </a>

              <div class="user-menu dropdown-menu">
                  <a class="nav-link" href="<?php echo base_url('profil/editprofil') ?>"><i class="fa fa-user"></i> Profil <?php echo $this->session->userdata('nama') ?></a>

                  <!-- a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a -->

                  <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                  <a href="<?php echo base_url('login/keluar') ?>"class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
              </div>
          </div>
        </div>
  </div>
</header><!-- /header -->
