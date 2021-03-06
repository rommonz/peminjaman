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
                    <h3>Barang</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Barang</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('barang/save'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Kode Barang</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="kd" name="kd" placeholder="Kode Barang" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Barang</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nb" name="nb" placeholder="Nama Barang" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Merk/Type</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="merk" name="merk" placeholder="Merk/Type" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="ns" class=" form-control-label">No Seri</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="ns" name="ns" placeholder="No Seri" class="form-control" required></div>
                          </div>

                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Kondisi Barang</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="kb" class="form-control" name="kb">
                                    <option value="Baik">Baik</option>
                                    <option value="Sedikit Rusak">Sedikit Rusak</option>
                                    </select>
                                </div>
                          </div>

                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Ruangan</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="id_ruangan" class="form-control" name="id_ruangan">
                                    <option></option>
                                    <?php if(sizeof($ruangan) > 0) : ?>
                                      <?php foreach($ruangan as $r): ?>
                                        <option value="<?php echo $r->id_ruangan ?>"><?php echo $r->kode_ruangan ?></option>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                    </select>
                                </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="foto" class=" form-control-label">Foto</label></div>
                            <div class="col-12 col-md-9"><input type="file"  id="foto" name="foto" placeholder="foto" class="form-control" ></div>
                          </div>

                          <div class="row form-group">
                          </div>

                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('barang/kebarang')?>" role="button">Kembali</a>
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
