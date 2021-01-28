<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('head') ?>
</head>

<body>


        <!-- Left Panel -->

        <?php $this->load->view('menu') ?>
      <!-- #Left Panel -->



    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3>Pengguna</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
      <?php $this->load->view('flashdata') ?>
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Pengguna</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('admin/penggunasave'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">NIP / username</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="NIP" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Pegawai</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="password" class=" form-control-label">Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Ulangi Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="ulangipassword" name="ulangipassword" placeholder="Ulangi Password" class="form-control" required></div>
                          </div>

                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Kewenangan</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="role" class="form-control" name="role">
                                    <option>Pilih</option>
                                    <option value="SUPERADMIN">Super Admin</option>
                                    <option value="ADMINRUANG">Admin Ruangan</option>
                                    <option value="ADMINASET">Admin Aset</option>
                                    <option value="ADMINSUPPLY">Admin Barang Persediaan</option>
                                    <option value="USER">Pengguna</option>
                                    </select>
                                </div>
                          </div>

                          <div class="row form-group">
                          </div>

                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/pengguna')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>




    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>

</html>
