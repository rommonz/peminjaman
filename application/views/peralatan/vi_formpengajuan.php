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






    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3>Peralatan dan Perlengkapan</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
			<div class="card">
                      <div class="card-header">
                        <strong>Form Pengajuan Persediaan</strong>
                      </div>
                <div class="card-body card-block">
					<div class="bootstrap-iso">
                        <form action="<?php echo site_url('peralatan/pengajuan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Persediaan</label></div>
                                    <div class="col col-md-9">
                                    <select id="jenis_persediaan" name="jenis_persediaan" class="form-control">
                                      <option>PILIH</option>
                                      <?php foreach($jenis_persediaan as $jp) : ?>
                                        <option value="<?php echo $jp->id_persediaan_jenis ?>"><?php echo $jp->jenis_persediaan ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                        </div>

						  <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Jumlah</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="jumlah" name="jumlah" placeholder="jumlah yang diajukan" class="form-control" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" placeholder="Keterangan" class="form-control" ></div>
                          </div>
						  <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Lanjut
							</button>
							<button type="reset" class="btn btn-danger btn-sm">
							<i class="fa fa-ban"></i> Reset
							</button>
							</div>
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
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
    <script>
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>


</body>

</html>
