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
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Pengguna</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('admin/penggunaupdate'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Username</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="username" name="username" value="<?php echo $pengguna->username ?>" placeholder="Nama" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="<?php echo $pengguna->nama ?>" placeholder="Nama" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control" ></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Ulangi Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="ulangipassword" name="ulangipassword" placeholder="Ulangi Password" class="form-control" ></div>
                          </div>

                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="role">Kewenangan</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="role" class="form-control" name="role">
                                    <option>Pilih</option>
                                    <?php foreach($roles as $role): ?>
                                    <option <?php echo $role->role_name == $pengguna->role ? 'selected' : '' ?> value="<?php echo $role->id_role ?>"><?php echo $role->role_name ?></option>
                                  <?php endforeach; ?>
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
