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
        <?php $this->load->view('header_menu'); ?>
        <!-- Header-->
<!-- TABEL-->
        <div class="content mt-3">
          <?php if($this->session->flashdata('msg')){ ?>
            <?php $state =  $this->session->flashdata('state') ?>
          <div class="col-sm-12">
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-<?php echo $state ?>"><?php echo $state ?></span> <?php echo $this->session->flashdata('msg') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          </div>
        <?php } ?>
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Daftar Pengajuan Pemeliharaan</strong>
                        </div>
                        <div class="card-header">
                          <div class="row form-group">
                          <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-md-4">
                              <select id="status" class="form-control">
                                <option></option>
                                <?php foreach($pemeliharaan_status as $s){ ?>
                                  <option <?php echo $s->status == $this->input->get('s') ? 'Selected' : '' ?> value="<?php echo $s->status ?>"><?php echo $s->status ?></option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('pemeliharaan/menejpemeliharaan/') ?>'+'?s='+$('#status').val())" >GO</a>
                          </div>
                        </div>

                 <div class="card-body">
                  <table id="tabelPemeliharaan" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Keterangan</th>
                          <th>Dibuat oleh</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Approval</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $x=1; foreach($daftar_pemeliharaan as $pr){ ?>

						<tr>

						<td><?php echo $x++; ?></td>
						<td><?php echo $pr->kode_barang ?></td>
						<td><?php echo $pr->nama_barang ?></td>
						<td><?php echo $pr->keterangan ?></td>
						<td><?php echo $pr->created_by ?></td>
						<td><?php echo $pr->created_at ?></td>
            <td class=""><?php echo $pr->approval ?></td>
            <td>
              <?php if($pr->approval == 'PENDING'): ?>
                <a class="btn btn-warning btn-sm"
                    data-toggle="modal"
                    data-target="#accModal<?php echo $pr->id_pemeliharaan; ?>"
                    onclick="confirm_modal('<?php echo $pr->id_pemeliharaan;?>');"
                    class="btn btn-small">
                    <i class="fa fa-check"></i>Proses
                </a>
              <?php elseif($pr->approval == 'APPROVED'): ?>
                <a class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#accModal<?php echo $pr->id_pemeliharaan; ?>"
                    onclick="confirm_process('<?php echo $pr->id_pemeliharaan;?>','PROCESS');"
                    class="btn btn-small">
                    <i class="fa fa-check"></i>Proses
                </a>
              <?php elseif($pr->approval == 'RECEIVEDBYADMIN'): ?>
                <a class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#accModal<?php echo $pr->id_pemeliharaan; ?>"
                    onclick="confirm_process('<?php echo $pr->id_pemeliharaan;?>','READYFORDELIVER');"
                    class="btn btn-small">
                    <i class=""></i>Barang Siap
                </a>&nbsp;
                <a class="btn btn-danger btn-sm"
                    data-toggle="modal"
                    data-target="#accModal<?php echo $pr->id_pemeliharaan; ?>"
                    onclick="confirm_process('<?php echo $pr->id_pemeliharaan;?>','CANNOTBEFIXED');"
                    class="btn btn-small">
                    <i class=""></i>Tidak bisa diperbaiki
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

  <div class="modal fade" id="modal_acc" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
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
          Setujui permohonan peminjaman ruangan ?
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

  <div class="modal fade" id="modal_proses" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticProsesTitle">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          <div id="content_confirm"></div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a type="button" class="btn btn-primary"  onclick="cetak()" id="btnProsesCetak">Ya, Cetak tanda Terima</a>

        </div>
      </div>
    </div>
  </div>
            <?php $this->load->view('foot') ?>
          <script>
            jQuery(document).ready(function(){
              jQuery("#tabelPemeliharaan").dataTable();
            })

            function cetak(){
                  id_pemeliharaan = jQuery("#btnProsesCetak").attr('idnya');
                  jQuery('#modal_proses').modal('hide');
                  var w = window.open('<?php echo base_url('pemeliharaan/cetaktandaterima/') ?>'+id_pemeliharaan, 'thePopup', 'width=800,height=800');
                  //e.preventDefault();
                  //var w = window.open();
                  //w.document.write('http://localhost/peminjaman/peralatan/cetakpermohonan/'+id_transaksi);
                  window.location.reload();
                  w.window.print();
                  w.document.close();

                  return false;
                }
          </script>
					<script>

                      function proses(status){
                        var id;
                        if(status == 'APPROVED'){
                          id = jQuery("#btnProsesApproved").attr('idnya');
                        }else{
                          id = jQuery("#btnProsesRejected").attr('idnya');
                        }
                        $.post('<?php echo base_url('pemeliharaan/proses/') ?>',{id : id, status:status})
                          .done(function(data){
                              if(data == 'SUCCESS'){
                                window.location.reload();
                              }
                          })


                      }
                        function confirm_modal(id)
                        {
                          jQuery('#modal_acc').modal('show', {backdrop: 'static',keyboard :false});
                          
                          jQuery("#btnProsesApproved").attr('idnya',id);
                          jQuery("#btnProsesRejected").attr('idnya',id);
                        }

                        function confirm_process(id,status)
                        {
                          if(status == 'RECEIVEDBYADMIN'){
                            jQuery("#content_confirm").html('Barang Telah diterima ?');
                          }else if(status == 'READYFORDELIVER'){
                            jQuery("#content_confirm").html('Selesai pemeliharaan ? <br/> Barang siap diantarkan');
                          }else if(status == 'CANNOTBEFIXED'){
                            jQuery("#content_confirm").html('kerusakan tidak bisa diperbaiki ?');
                          }

                          jQuery('#modal_proses').modal('show', {backdrop: 'static',keyboard :false});
                          jQuery("#btnProsesCetak").attr('idnya',id);
                          //jQuery("#btnProsesRejected").attr('idnya',id);
                        }


    	</script>



</body>

</html>
