<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <?php if($this->session->flashdata('insert_gagal')) { ?>
      <div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <?php echo $this->session->flashdata('insert_gagal'); ?>
     </div>
     <?php } ?>

     <?php if($this->session->flashdata('delete_sukses')) { ?>
     <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <?php echo $this->session->flashdata('delete_sukses'); ?>
     </div>
     <?php } ?>

     <?php if($this->session->flashdata('insert_sukses')) { ?>
     <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <?php echo $this->session->flashdata('insert_sukses'); ?>
     </div>
     <?php } ?>
   </div>
 </div>
</div>

<form class="form-horizontal" action="<?php echo base_url() ?>Retur/insert_retur" method="post" enctype="multipart/form-data">
  <div class="row">
   <div class="col-md-12">
    <div class="box-body">
      <div class="panel panel-default">
       <div class="panel-heading">Data Penerimaan</div>
       <div class="box-body">
        <div class="form-group" style="padding-bottom: 5px;">
          <div class="col-xs-2">
            <label for="id_pemesanan">No Penerimaan</label>
            <input type="text" name="id_pemesanan" readonly class="form-control" value="<?php echo $id_pemesanan; ?>"/>
          </div>
          <div class="col-xs-2">
            <label for="tgl_transaksi">Tanggal Retur</label>
            <input type="text" name="tgl_transaksi" readonly class="form-control" value="<?php echo date('d-m-Y h:i') ?>"/>
          </div>
          <div class="col-xs-2">
            <label for="id_user">Petugas Penerima</label>
            <input type="text" name="id_user" readonly class="form-control" value="<?php echo $this->session->userdata('nama_lengkap') ?>"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- DATA TRANSAKSI -->

<!-- DATA TRANSAKSI -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">Detail Pemesanan</div>
    <div class="box-body">
      <div class="box-body">
        <table class="display table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah Pesan</th>
              <th>Alasan Retur</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $total_bayar = 0; 
            $no=1;
            foreach ($data_detail as $key => $value) { ?>
            <input type="hidden" name="id_retur" value="<?php echo $id_retur; ?>">
            <input type="hidden" name="id_barang" value="<?php echo $value->id_barang; ?>">
            <input type="hidden" name="jumlah_retur" value="<?php echo $value->jumlah_pesan; ?>">
            <tr>  
              <td><?php echo $no; ?></td>
              <td><?php echo $value->nama_barang ?></td>
              <td>Rp.<?php echo number_format($value->harga_beli) ?></td>
              <td><div class="col-xs-6">
                <input type="text" name="jumlah_pesan" class="form-control" value="<?php echo $value->jumlah_pesan ?>">
              </div>
            Pcs</td>
            <td>
              <div class="col-xs-12">
                <input type="text" name="alasan" class="form-control">
              </div>
            </td>
              <!-- <td>
                <button type="submit" name="selesai" class="btn btn-success btn-sm btn-flat" onClick="tekan()">
                  <i class="fa fa-plus"> 
                RETUR</i></button>
              </td> -->
            </tr>
            <?php
            $total_bayar = $total_bayar + $value->sub_total;
            $no++;
          } ?>
        </tbody>
        <tfoot>
          <td colspan="6" style="text-align: left;">
            <button type="submit" name="simpan" class="btn btn-success btn-sm btn-flat" onClick="tekan()">
              <i class="fa fa-plus"> 
              PROSES</i></button>
            </td>
          </tfoot>
        </table>

        <!-- <input type="hidden" name="id_penerimaan" value="<?php echo $id_penerimaan; ?>"> -->
      <!-- <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>">
      <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
      <input type="hidden" name="status" value="<?php echo '1'; ?>"> -->
      <!-- <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-3" align="left">
          <a href="<?php echo base_url() ?>Penerimaan"><button type="button" name="batal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-times"> BATAL</i></button></a>
          <button type="submit" name="selesai" class="btn btn-success btn-sm btn-flat" onClick="tekan()"><i class="fa fa-plus"> UPDATE STOK</i></button>
        </div>
      </div> -->

    </div>
  </div>
</div>
</div>
</div>

<!-- DATA RETUR -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">Detail Retur</div>
    <div class="box-body">
      <div class="box-body">
        <table class="display table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah Pesan</th>
              <th>Sub Total</th>
              <th>Retur</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_bayar = 0; 
            $no=1;
            foreach ($data_tmp_retur as $key => $value) { ?>
            <input type="hidden" name="id_detail" value="<?php echo $value->id_detail; ?>">
            <input type="hidden" name="id_barang[]" value="<?php echo $value->id_barang; ?>">
            <input type="hidden" name="jumlah_pesan[]" value="<?php echo $value->jumlah_pesan; ?>">
            <tr>  
              <td><?php echo $no; ?></td>
              <td><?php echo $value->nama_barang ?></td>
              <td>Rp.<?php echo number_format($value->harga_beli) ?></td>
              <td><?php echo $value->jumlah_pesan ?> Pcs</td>
              <td>Rp.<?php echo number_format($value->sub_total) ?></td>
              <td><button type="submit" name="selesai" class="btn btn-success btn-sm btn-flat" onClick="tekan()"><i class="fa fa-plus"> SUMBIT</i></button></td>
            </tr>
            <?php
            $total_bayar = $total_bayar + $value->sub_total;
            $no++;
          } ?>
        </tbody>
        <!-- <tfoot>
          <td colspan="4" style="text-align: right;">Total Bayar</td>
          <td colspan="2">Rp <?php echo number_format($total_bayar); ?> </td>
        </tfoot> -->
      </table>
      <!-- <input type="hidden" name="id_penerimaan" value="<?php echo $id_penerimaan; ?>"> -->
      <!-- <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>">
      <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
      <input type="hidden" name="status" value="<?php echo '1'; ?>"> -->
      <!-- <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-3" align="left">
          <a href="<?php echo base_url() ?>Penerimaan"><button type="button" name="batal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-times"> BATAL</i></button></a>
          <button type="submit" name="selesai" class="btn btn-success btn-sm btn-flat" onClick="tekan()"><i class="fa fa-plus"> UPDATE STOK</i></button>
        </div>
      </div> -->

    </form>
  </div>
</div>
</div>
</div>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#harga_beli, #jumlah_pesan").on("keydown keyup", function() {
      sum();
    });
  });

  function sum() {
    var num1 = document.getElementById('harga_beli').value;
    var num2 = document.getElementById('jumlah_pesan').value;
    var result = parseInt(num1) * parseInt(num2);
    if (!isNaN(result)) {
      document.getElementById('sub_total').value = result;
    }
  }
</script>