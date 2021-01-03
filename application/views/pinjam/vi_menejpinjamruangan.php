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
                    <h3>Manajemen Ruangan</h3>
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
                            <strong class="card-title">Daftar Peminjaman Ruangan</strong>
                        </div>
                        <div class="card-header">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Pilih Ruangan</label></div>
                            <div class="col-12 col-md-3">
                              <select id="pilihruangan" class="form-control" required>
                                <option value="ALL">SEMUA</option>
                                <?php foreach($listruangan as $ruang){ ?>
                                <option value="<?php echo $ruang->id_ruangan ?>"
                                        <?php echo $this->input->get('r') == $ruang->id_ruangan ? 'selected' : '' ?>>
                                        <?php echo $ruang->kode_ruangan ?>
                                </option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-md-3">
                              <select id="status" class="form-control">
                                <option value="ALL">ALL</option>
                                <option value="PENDING">PENDING</option>
                                <option value="APPROVED">APPROVED</option>
                                <option value="REJECTED">REJECTED</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('pinjam/menejpinjamruangan/') ?>'+'?r='+$('#pilihruangan').val() +'&'+'s='+$('#status').val())" >GO</a>
                          </div>
                        </div>

                 <div class="card-body">
                  <table id="tabelPeminjaman" class="table table-striped table-bordered">
                    <thead>
                        <tr>

                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Ruangan</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Berakhir</th>
                        <th>Dibuat oleh</th>
                        <th>Approval</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($daftar_pinjamruangan as $br){
						?>
						<tr>

						<td><?php echo $br->title ?></td>
						<td><?php echo $br->description ?></td>
						<td><?php echo $br->nama_ruangan ?></td>
						<td><?php echo $br->start_date ?></td>
						<td><?php echo $br->end_date ?></td>
						<td><?php echo $br->create_by ?></td>
            <td class=""><?php echo $br->approval ?></td>
            <td>
              <?php if($br->approval == 'PENDING'): ?>
                <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#accModal<?php echo $br->id; ?>" onclick="confirm_modal('<?php echo $br->id;?>');" class="btn btn-small"><i class="fa fa-check"></i>Proses</a>
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

            <?php $this->load->view('foot') ?>
            <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
            <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->


						<script>


            function proses(status){
              var id;
              if(status == 'APPROVED'){
                id = $("#btnProsesApproved").attr('idnya');
              }else{
                id = $("#btnProsesRejected").attr('idnya');
              }
              $.post('<?php echo base_url('pinjam/proses/') ?>',{id : id, status:status})
                .done(function(data){
                    if(data == 'SUCCESS'){
                      window.location.reload();
                    }
                })


            }
            	function confirm_modal(id)
            	{
            		jQuery('#modal_acc').modal('show', {backdrop: 'static',keyboard :false});
            		//jQuery("#modal_delete_m_n .grt").text(title);
            		//document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
            		//document.getElementById('delete_link_m_n').focus();
                $("#btnProsesApproved").attr('idnya',id);
                $("#btnProsesRejected").attr('idnya',id);
            	}
    	</script>



</body>

</html>
