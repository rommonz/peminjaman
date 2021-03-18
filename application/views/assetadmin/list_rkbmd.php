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
                    <h3>ADMIN RKBMD</h3>
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
                            <strong class="card-title">Daftar Pengajuan RKBMD</strong>
                        </div>
                        <div class="card-header">
                          <div class="row form-group">
                          <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-md-3">
                              <select id="status" class="form-control">
                                <option value="ALL">ALL</option>
                                <option <?php echo  isset($_GET['s']) and $_GET['s'] == 'PENDING' ? 'selected' : '' ?> value="PENDING">PENDING</option>
                                <option <?php echo isset($_GET['s']) and $_GET['s'] == 'APPROVED' ? 'selected' : '' ?> value="APPROVED">APPROVED</option>
                                <option <?php echo isset($_GET['s']) and $_GET['s'] == 'REJECTED' ? 'selected' : '' ?> value="REJECTED">REJECTED</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('assetadmin/listrkbmd/') ?>'+'?s='+$('#status').val())" >GO</a>
                          </div>
                        </div>

                 <div class="card-body">
                  <table id="tabelPemeliharaan" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Spesifikasi</th>
                          <th>Jumlah Barang</th>
                          <th>Harga Satuan</th>
                          <th>Dibuat oleh / Tanggal</th>
                          <th>Approval</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $x=1; foreach($daftar_rkbmd as $r){ ?>

						<tr>

						<td><?php echo $x++; ?></td>
						<td><?php echo $r->nama_barang ?></td>
						<td><?php echo $r->spesifikasi ?></td>
						<td><?php echo $r->jumlah_barang ?></td>
            <td><?php echo number_format($r->harga_satuan) ?></td>
						<td><?php echo $r->created_by."<br/>".$r->created_at ?></td>
						<td class=""><?php echo $r->approval ?></td>
            <td>
              <?php if($r->approval == 'PENDING'): ?>
                <a class="btn btn-warning btn-sm"
                    data-toggle="modal"
                    data-target="#accModal<?php echo $r->id_rkbmd; ?>"
                    onclick="confirm_modal('<?php echo $r->id_rkbmd;?>');"
                    class="btn btn-small">
                    <i class="fa fa-check"></i>Proses
                </a>
              <?php endif; ?>
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
        <div class="modal-header">
          <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          Setujui Permohonan RKBMD ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a type="button" class="btn btn-primary"  onclick="proses('APPROVED')" id="btnProsesApproved">Ya, Setujui</a>
          <a type="button" class="btn btn-danger" onclick="proses('REJECTED')" id="btnProsesRejected">Tolak</a>
        </div>
      </div>
    </div>
  </div>

            <?php $this->load->view('foot') ?>
            <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
            <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->
            <script>
              jQuery(document).ready(function(){
                jQuery("#tabelPemeliharaan").dataTable();
              });
            </script>

						<script>
            function confirm_modal(id)
            {
              jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
              jQuery("#btnProsesApproved").attr('idnya',id);
              jQuery("#btnProsesRejected").attr('idnya',id);
            }

            function proses(status){
              var id;
              if(status == 'APPROVED'){
                id = jQuery("#btnProsesApproved").attr('idnya');
              }else{
                id = jQuery("#btnProsesRejected").attr('idnya');
              }
              $.post('<?php echo base_url('assetadmin/proses/') ?>',{id : id, status:status})
                .done(function(data){
                    if(data == 'SUCCESS'){

                      window.location.reload();
                    }
                })

            }


    	</script>



</body>

</html>
