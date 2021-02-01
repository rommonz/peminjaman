<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('head'); ?>

</head>

<body>


        <!-- Left Panel -->
        <?php $this->load->view('menu'); ?>
        <!-- #Left Panel -->
        <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3>Permohonan Barang Persediaan</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
<!-- TABEL-->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"></strong>
                            <span>
                            <a class="btn btn-primary btn-sm" onclick="confirm_modal('<?php echo site_url('peralatan/addtransaksi'); ?>')"><i class="fa fa-edit"></i> Buat Transaksi Baru </a>
                            </span>
                        </div>
                  <div class="card-body">
                  <table id="tabelPeminjaman" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Tgl Permintaan</th>
                          <th>Keterangan</th>
                          <th>Status Transaksi</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $x=1; foreach($transaksi as $tr){ ?>

						<tr>

						<td><?php echo $x++; ?></td>
            <td><?php echo $tr->tgl_transaksi ?></td>
						<td><?php echo $tr->keterangan ?></td>
            <td><?php echo $tr->status_transaksi ?></td>
						<td>
            <a href="<?php echo base_url('peralatan/transaksi_detail/'.$tr->id_persediaan_transaksi ) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>detail</a>
						</td>
						</tr>

						<?php } ?>
                    </tbody>
                </table>
				</div>
				</div>
			</div>
		</div>

		</div>
	</div>
	</div>

  <div class="modal fade" id="modal_delete_m_n" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form name="formaddtransaksi" method="post" id="formaddtransaksi" action="<?php echo base_url('peralatan/transaksi_detail') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="staticModalLabel">Konfirmasi Transaksi Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
              <label for="text-input" class=" form-control-label">Keterangan/Kegiatan</label>
              <input type="text" id="keterangan" name="keterangan" class="form-control" required />
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="selanjutnya" />
        </div>
        </form>
      </div>
    </div>
  </div>

            <?php $this->load->view('foot') ?>
            <!-- script src="< ?php echo base_url('assets/js/plugins.js');?>"></script -->
            <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->
            <script>
              jQuery(document).ready(function(){
                jQuery("#tabelPeminjaman").dataTable();
              });
            </script>

						<script>
            function confirm_modal(url)
            {

              jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});

            }


    	</script>



</body>

</html>
