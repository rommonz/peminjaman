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
                    <h3>RKBMD</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah RKBMD</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('asset/saverkbmd'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Nama Barang</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Spesifikasi</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Jumlah</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="jumlah_barang" name="jumlah_barang" placeholder="Merk/Type" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="ns" class=" form-control-label">Harga Satuan</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="harga_satuan" name="harga_satuan" placeholder="harga satuan" class="form-control" required></div>
                          </div>


                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('asset/rkbmd')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>

<?php $this->load->view('foot') ?>

</body>

</html>
