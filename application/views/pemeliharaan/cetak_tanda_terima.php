<html>
  <header>
    <title>Cetak Tanda Terima Pemeliharaan Barang Persediaan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  </header>
  <body>
    <h4>Tanda Terima Pemeliharaan Barang Inventaris</h4>
    <hr/>
    <br/>
    <div class="row">
      <div class="col-sm-4">Nama Barang</div>
      <div class="col-sm-8">: <?php echo $detail->nama_barang ?></div>
    </div>
    <div class="row">
      <div class="col-sm-4">Keterangan</div>
      <div class="col-sm-8">: <?php echo $detail->keterangan ?></div>
    </div>
    <div class="row">
      <div class="col-sm-4">Tanggal Pengajuan</div>
      <?php
          $datetime = strtotime($detail->created_at);
          $create = date('d-m-Y',$datetime);
      ?>
      <div class="col-sm-8">: <?php echo $create ?></div>
    </div>
    <br/>
    <h5>Detail</h5>


    <table width="100%">
        <tr>
          <td width="50%">
            <br/>
            Pengurus Barang,
            <br/><br/><br/>
            <?php echo $this->session->userdata('nama') ?>
          </td>
          <td>
            Bogor, <?php echo $created_at ?><br/>
            Pemohon
            <br/><br/><br/>
            <?php echo $detail->created_by ?>
          </td>
        </tr>
      </table>
  </body>
</html>
