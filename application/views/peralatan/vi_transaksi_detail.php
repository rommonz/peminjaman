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
                    <h3>Jenis Persediaan</h3>
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

                        </div>
                  <div class="card-body">
                  <table id="tabelPeminjaman" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>Pemohon</th>
                          <th>Tgl Permintaan</th>
                          <th>Keterangan</th>
                          <th>Status Transaksi</th>
                          <!-- th>Action</th -->
                        </tr>
                    </thead>
                    <tbody>
						<tr>

						<td><?php echo $transaksi->nama ?></td>
            <td><?php echo $transaksi->tgl_transaksi ?></td>
						<td><?php echo $transaksi->keterangan ?></td>
            <td><?php echo $transaksi->status_transaksi ?></td>
						<!--td>
            <a href="< ?php echo base_url('peralatan/transaksi_detail/'.$tr->id_persediaan_transaksi ) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>detail</a>
          </td -->
						</tr>


                    </tbody>
                </table>
				</div>
        <div class="card-footer">
          <btn class="btn btn-warning btn-sm" onclick="window.history.back()" ><i class="fa fa-arrow-circle-left"></i> Kembali</btn>
          <?php if($transaksi->status_transaksi == 'DRAFT'){ ?>
          <btn class="btn btn-primary btn-sm" onclick="(ajukan(<?php echo $transaksi->id_persediaan_transaksi ?>))" ><i class="fa fa-arrow-circle-right"></i> Ajukan</btn>
        <?php } ?>
          <btn class="btn btn-primary btn-sm" onclick="(cetak(<?php echo $transaksi->id_persediaan_transaksi ?>))" ><i class="fa fa-arrow-circle-right"></i> Cetak Form Permintaan</btn>
        </div>
				</div>
			</div>
		</div>

		</div>
	</div>

  <div class="content mt-3">
      <div class="animated fadeIn">
          <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <strong class="card-title">Detail</strong>
                      <span>
                        <?php if($transaksi->status_transaksi == 'DRAFT'){ ?>
                      <a class="btn btn-primary btn-sm" onclick="confirm_modal('<?php echo site_url('peralatan/transaksi_detail_add/'.$this->uri->segment(3)) ?>')"><i class="fa fa-edit"></i> Tambah detail </a>
                    <?php } ?>
                      </span>
                  </div>
            <div class="card-body">
            <table id="tabelPeminjaman" class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Nama Persediaan</th>
                    <th>Jumlah Permintaan</th>
                    <th>Jumlah Disetujui</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
      <?php $x=1; foreach($detail as $tr){ ?>

      <tr>

      <td><?php echo $x++; ?></td>
      <td><?php echo $tr->jenis_persediaan ?></td>
      <td><?php echo $tr->nama_persediaan ?></td>
      <td><?php echo $tr->jumlah_permintaan ?></td>
      <td><?php echo $tr->jumlah_disetujui ?></td>
      <td>
        <?php if($transaksi->status_transaksi == 'DRAFT') { ?>
      <a onclick="delete_detail(<?php echo $tr->id_persediaan_transaksi_detail ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> hapus</a>
    <?php } ?>
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
        <form name="formaddtransaksidetail" method="post" id="formaddtransaksi" action="<?php echo base_url('peralatan/transaksi_detail_add/') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="staticModalLabel">Tambah pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
              <label for="text-input" class=" form-control-label">Nama Persediaan (jumlah tersedia)</label>
              <select name="id_persediaan" class="form-control">
                <option>PILIH</option>
                <?php foreach($persediaan as $per) { ?>
                  <option value="<?php echo $per->id_persediaan ?>"><?php echo $per->jenis_persediaan." - ".$per->nama_persediaan." (".$per->jumlah_persediaan." ".$per->satuan.")" ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="text-input" class=" form-control-label">Jumlah</label>
              <input type="text" name="jumlah_permintaan" class="form-control" />
              <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi ?>" />
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
            <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
            <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->


						<script>
            function confirm_modal(url)
            {

              jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});

            }

    	       </script>
<script type="text/javascript">
  function delete_detail(id_transaksi_detail){
    var r = confirm("Apakah anda yakin untuk menghapus data ini ?");
    if (r == true) {
      jQuery.post('<?php echo base_url('peralatan/transaksi_detail_delete') ?>',{'id_transaksi_detail':id_transaksi_detail})
        .done(function(respon){
          if(respon == 'SUCCESS'){
              alert('Berhasil di hapus');
          }else{
            alert('Gagal menghapus');
          }

          window.location.reload();
        })
    }
  }

  function ajukan(id_transaksi){
    var r = confirm("setelah transaksi diajukan, detail tidak bisa dirubah ");
    if (r == true) {
      jQuery.post('<?php echo base_url('peralatan/transaksi_ajukan') ?>',{'id_persediaan_transaksi':id_transaksi})
        .done(function(respon){
          if(respon == 'SUCCESS'){
              alert('Transaksi berhasil');
          }else{
            alert('Transaksi gagal');
          }

          window.location.reload();
        })
    }
  }

  function cetak(id_transaksi){
    var w = window.open('<?php echo base_url('peralatan/cetakpermohonan/') ?>'+id_transaksi, 'thePopup', 'width=800,height=800');
    //e.preventDefault();
    //var w = window.open();
    //w.document.write('<?php echo base_url('peralatan/cetakpermohonan/') ?>'+id_transaksi);
    w.window.print();
    w.document.close();
    return false;
  }
</script>

</body>

</html>
