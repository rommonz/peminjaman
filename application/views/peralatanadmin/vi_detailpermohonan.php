<div class="row">
  <div class="col-md-2">Pemohon</div>
  <div>: <?php echo $transaksi->nama ?></div>
</div>
<table class="table table-bordered">

  <thead>
  </tr>
    <th>Nama Barang</th>
    <th>Persediaan</th>
    <th>Permintaan</th>
    <th>Disetujui</th>
  </tr>
  </thead>
  <tbody>
      <form name="formpersetujuan" id="formpersetujuan" >
    <?php foreach ($detail as $d) { ?>
      <tr>
        <td><?php echo $d->nama_persediaan ?></td>
        <td><?php echo $d->jumlah_persediaan ?></td>
        <td><?php echo $d->jumlah_permintaan ?></td>
        <td><input type="text" class="form-control acc"
                value="<?php echo $d->jumlah_disetujui ?>"
                onchange="cekjumlah(<?php echo $d->jumlah_persediaan.",".$d->id_persediaan_transaksi_detail ?>)"
                name="permintaan_<?php echo $d->id_persediaan_transaksi_detail ?>"
                id="permintaan_<?php echo $d->id_persediaan_transaksi_detail ?>"></td>
      </tr>
    <?php } ?>
  </form>
  </tbody>
</table>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  <button type="button" class="btn btn-primary btn-sm acc" id="btnProses" onclick="prosespersetujuan(<?php echo $transaksi->id_persediaan_transaksi ?>)">Proses</button>
  <button type="button" class="btn btn-primary btn-sm print" id="btnCetak" onclick="cetak(<?php echo $transaksi->id_persediaan_transaksi ?>)">Cetak Form</button>

<script>

  jQuery(document).ready(function(){
    var status = '<?php echo $transaksi->status_transaksi ?>';
    if(status != 'PENDING'){
      jQuery(".acc").prop("disabled", true);
      jQuery("#btnProses").hide();
    }

    if(status != 'APPROVED'){
      jQuery("#btnCetak").hide();
    }
  })

  function prosespersetujuan(id_transaksi){
    jQuery.post('<?php echo base_url('peralatanadmin/prosespersetujuan') ?>',{'id_transaksi':id_transaksi,'status':'APPROVED'})
    .done(function(r){
      if(r == 'SUCCESS'){
        alert('Berhasil');
        window.location.reload();
      }else{
        alert('gagal');
      }
    })
  }

  function cekjumlah(jumlah, id){
    var permintaan = jQuery("#permintaan_"+id).val();
    if(permintaan > jumlah){
      alert('Melebihi persediaan');
      jQuery("#permintaan_"+id).focus();
    }else{
      jQuery.post('<?php echo base_url('peralatanadmin/savejumlahpersetujuan') ?>',{'id':id,'jumlah':jQuery("#permintaan_"+id).val()})

    }
  }

    function cetak(id_transaksi){

      var w = window.open('<?php echo base_url('peralatanadmin/cetakpermohonan/') ?>'+id_transaksi, 'thePopup', 'width=800,height=800');
      w.window.print();
      w.document.close();
      return false;
    }

</script>
