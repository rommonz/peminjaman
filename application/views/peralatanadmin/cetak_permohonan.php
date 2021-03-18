<html>
  <header>
    <title>Cetak Tanda terima Barang Persediaan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  </header>
  <body>
    <h4>Form Tanda Terima Barang Persediaan</h4>
    <hr/>
    <br/>
    <div class="row">
      <div class="col-sm-4">Nama Pemohon</div>
      <div class="col-sm-8">: <?php echo $transaksi->nama ?></div>
    </div>
    <div class="row">
      <div class="col-sm-4">Keterangan</div>
      <div class="col-sm-8">: <?php echo $transaksi->keterangan ?></div>
    </div>
    <div class="row">
      <div class="col-sm-4">Tanggal Permohonan</div>
      <div class="col-sm-8">: <?php echo $transaksi->tgl_transaksi ?></div>
    </div>
    <br/>
    <h5>Detail</h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php $x=1; foreach($detail as $d){ ?>
        <tr>
          <td><?php echo $x++ ?></td>
          <td><?php echo $d->jenis_persediaan ?></td>
          <td><?php echo $d->nama_persediaan ?></td>
          <td><?php echo $d->jumlah_disetujui ?></td>
        </tr>
      <?php  } ?>
      </tbody>
    </table>

    <table width="100%">
        <tr>
          <td width="50%">
            <br/>
            Admin,
            <br/><br/><br/>
            <?php echo $this->session->userdata('nama') ?>
          </td>
          <td>
            Bogor,       <br/>
            Pemohon
            <br/><br/><br/>
            <?php echo $transaksi->nama ?>
          </td>
        </tr>
      </table>
  </body>
</html>
