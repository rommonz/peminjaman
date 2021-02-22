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
                                    <strong class="card-title">Daftar pengajuan <?php echo $this->session->userdata['unit_kerja'] ?></strong>
                                </div>

                              <div class="card-header">
                                <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kegiatan</label></div>
                                  <div class="col-md-8">
                                    <select id="kegiatan" name="kegiatan" class="form-control">
                                      <option></option>
                                      <?php foreach($daftar_kegiatan as $keg){ ?>
                                        <option <?php echo  isset($_GET['k']) == $keg->id_pagu ? 'Selected' : '' ?> value="<?php echo $keg->id_pagu ?>"><?php echo $keg->kegiatan ?></option>
                                      <?php } ?>
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
                                <th>Sub Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Peserta (Jumlah)</th>
                                <th>Nilai Pengajuan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    						<?php

                    						foreach($daftar_mamin as $p){
                    						?>
                    						<tr>
                                <td><?php echo $p->nama_kegiatan ?></td>
                    						<td><?php echo $p->lokasi_kegiatan ?></td>
                                <td><?php echo $p->peserta." (".$p->jumlah_peserta.")" ?></td>
                                <td><?php echo number_format($p->nilai_pengajuan) ?></td>
                                <td><?php echo $p->keterangan ?></td>
                                <td><?php echo $p->approval ?>
                    						<td>
                                  <a class="btn btn-warning btn-sm" href="<?php echo site_url('mamin/editpengajuan/'.$p->id_mamin_pengajuan);?>"class="btn btn-small"><i class="fa fa-edit"></i>Edit</a>
                                  <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#staticModal<?php echo $p->id_mamin_pengajuan; ?>" onclick="confirm_modal('<?php echo site_url('mamin/hapuspengajuan/'.$p->id_mamin_pengajuan);?>','Title');" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
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
            	function confirm_modal(delete_url,title)
            	{
            		jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
            		jQuery("#modal_delete_m_n .grt").text(title);
            		document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
            		document.getElementById('delete_link_m_n').focus();
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
