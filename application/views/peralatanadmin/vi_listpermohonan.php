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
                    <h3>Daftar Persediaan Peralatan</h3>
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
                            <strong class="card-title">Persediaan Peralatan dan Perlengkapan</strong>
                            <span><a  class="btn btn-primary" href="<?php echo base_url('peralatanadmin/addpersediaan') ?>"><i class="fa fa-plus"></i> ADD NEW</a></span>
                        </div>
                        <div class="card-header">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-md-3">
                              <select id="status" class="form-control">
                                <option <?php echo $this->input->get('s') == 'ALL' ? 'selected' : '' ?> value="ALL">ALL</option>
                                <option <?php echo $this->input->get('s') == 'PENDING' ? 'selected' : '' ?> value="PENDING">PENDING</option>
                                <option <?php echo $this->input->get('s') == 'APPROVED' ? 'selected' : '' ?> value="APPROVED">APPROVED</option>
                                <option <?php echo $this->input->get('s') == 'REJECTED' ? 'selected' : '' ?> value="REJECTED">REJECTED</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('peralatanadmin/listpermohonan') ?>'+'?s='+$('#status').val())" >GO</a>
                          </div>
                        </div>
                      </div>
                  <div class="card-body">
                  <table id="tabelPermohonan" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Pemohon</th>
                          <th>Uraian</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status Permohonan</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $x=1; foreach($transaksi as $t){ ?>

						<tr>

						<td><?php echo $x++; ?></td>
            <td><?php echo $t->nama ?></td>
						<td><?php echo $t->keterangan ?></td>
            <td><?php echo $t->tgl_transaksi ?></td>
						<td>
              <?php echo $t->status_transaksi ?>
              <?php echo $t->tgl_approval ? "(".$t->tgl_approval.")" : "" ?>
            </td>
						<td>
              <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#accModal<?php echo $t->id_persediaan_transaksi; ?>" onclick="confirm_modal('<?php echo $t->id_persediaan_transaksi;?>');" class="btn btn-small"><i class="fa fa-check"></i >Proses</a>
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
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticModalLabel">Proses Permohonan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="tabeldetail">loading..</div>
        </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>

            <?php $this->load->view('foot') ?>
          <script>
            jQuery(document).ready(function(){
              jQuery("#tabelPermohonan").dataTable();
            })
          </script>

						<script>
            function confirm_modal(id_transaksi)
            {

              jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
              //jQuery("#modal_delete_m_n .grt").text(title);

              jQuery.post('<?php echo base_url('peralatanadmin/get_tabeldetail') ?>',{'id_transaksi':id_transaksi})
              .done(function(data){
                jQuery("#tabeldetail").html(data);
              })

              //document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
              //document.getElementById('delete_link_m_n').focus();
            }


    	</script>



</body>

</html>
