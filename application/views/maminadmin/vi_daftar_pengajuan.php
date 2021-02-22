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
                    <h3><?php echo $this->judul ?></h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
        <!-- TABEL-->
                <div class="content mt-3">
                    <?php $this->load->view('flashdata') ?>
                    <div class="animated fadeIn">
                        <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Daftar pengajuan mamin</strong>
                                </div>

                              <div class="card-header">
                                <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                                  <div class="col-md-8">
                                    <select id="kegiatan" name="kegiatan" class="form-control">
                                      <option></option>
                                      <option>PENDING</option>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                  <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('mamin/listmamin') ?>'+'?k='+$('#kegiatan').val())" >GO</a>
                                </div>
                              </div>
                              </div>
                              <div class="card-header">
                                <?php if(isset($_GET['k'])){ ?>
                              <a class="btn btn-primary btn-sm" href="<?php echo site_url('mamin/pengajuan/?k='.$_GET['k']) ?>" ><i class="fa fa-pencil"></i> Add New</a>
                            <?php } ?>
                            </div>

                         <div class="card-body">
                          <table id="table-pengguna" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Pagu</th>
                                <th>Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Peserta (Jumlah)</th>
                                <th>Nilai Pengajuan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    						<?php
                    						foreach($daftar_pengajuan as $p){
                    						?>
                    						<tr>
                                <td><?php echo $p->kegiatan ?></td>
                                <td><?php echo $p->nama_kegiatan ?></td>
                    						<td><?php echo $p->lokasi_kegiatan ?></td>
                                <td><?php echo $p->peserta." (".$p->jumlah_peserta.")" ?></td>
                                <td><?php echo number_format($p->nilai_pengajuan) ?></td>
                                <td><?php echo $p->keterangan ?></td>
                                <td><?php echo $p->approval ?>
                    						<td>

                                  <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#staticModal<?php echo $p->id_mamin_pengajuan; ?>" onclick="prosesmamin(<?php echo $p->id_mamin_pengajuan ?>);" class="btn btn-small"><i class="fa fa-trash-o"></i>Proses </a>
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
        										<h5 class="modal-title" id="staticModalLabel">Konfirmasi Hapus</h5>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        											<span aria-hidden="true">&times;</span>
        										</button>
        									</div>
        									<div class="modal-body">
        										<p>
        										Yakin ingin menghapus ini?
        										</p>
        									</div>
        									<div class="modal-footer">
        										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        										<a type="button" class="btn btn-primary" id="delete_link_m_n">Ya, Hapus</a>
        									</div>
        								</div>
        							</div>
        						</div>
        						<script>
            	function prosesmamin(id_pengajuan)
            	{
            		jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
                jQuery.post('<?php echo base_url('maminadmin/proses_pengajuan') ?>',{'id_pengajuan':id_pengajuan})
                .done(function(data){
                  jQuery("#tabeldetail").html(data);
                })
                //jQuery("#modal_delete_m_n .grt").text(title);
            		//document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
            		//document.getElementById('delete_link_m_n').focus();
            	}
            	</script>
              <?php $this->load->view('foot') ?>
            <script>
            $(document).ready(function() {
                jQuery('#table-pengguna').DataTable();
              } );
            </script>

        </body>

        </html>
