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

<form class="form-horizontal" action="<?php echo base_url() ?>Penjualan/insert_penjualan" method="post" enctype="multipart/form-data">
  <div class="row">
   <div class="col-md-12">
    <div class="box-body">
      <div class="panel panel-default">
       <div class="panel-heading">Data Penjualan</div>
       <div class="box-body">
        <div class="form-group" style="padding-bottom: 5px;">
          <div class="col-xs-2">
            <label for="id_transaksi">No Invoice</label>
            <input type="text" name="id_transaksi" readonly class="form-control" value="<?php echo $hasilkode; ?>"/>
          </div>
          <div class="col-xs-2">
            <label for="tgl_transaksi">Tanggal Transaksi</label>
            <input type="text" name="tgl_transaksi" readonly class="form-control" value="<?php echo date('d-m-Y') ?>"/>
          </div>
          <div class="col-xs-2">
            <label for="id_user">Petugas</label>
            <input type="text" name="id_user" readonly class="form-control" value="<?php echo $this->session->userdata('nama_lengkap') ?>"/>
          </div>
          <div class="col-xs-2">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo @$data_detail[0]->nama_pelanggan; ?>" class="form-control" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- DATA TRANSAKSI -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading">Form Transaksi</div>
   <div class="box-body">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-1 control-label">Kode / Nama Barang</label>
        <div class="col-sm-3">
         <select name="id_barang" onchange="changeValue(this.value)" required class="form-control" id="select2">
          <option value="0">Kode / Nama Barang </option>
          <?php 
          $jsArray = "var prdName = new Array();\n";
          foreach ($data_barang as $key => $value) { 
            echo '<option value="' . $value->id_barang . '">'.$value->nama_barang.'</option>';
            $jsArray .= "prdName['" . $value->id_barang . "'] = {
              warna:'" . addslashes($value->nama_warna) . "', 
              stok:'" . addslashes($value->stok) . "',
              nama_barang:'" . addslashes($value->nama_barang) . "',
              nama_kategori:'" . addslashes($value->nama_kategori) . "',
              harga_jual:'".addslashes($value->harga_jual)."'
            };\n";
          } ?>
          <script>
            function changeValue(id){
             <?php echo $jsArray; ?>
             document.getElementById('stok').value = prdName[id].stok;
             document.getElementById('warna').value = prdName[id].warna;
             document.getElementById('nama_barang').value = prdName[id].nama_barang;
             document.getElementById('nama_kategori').value = prdName[id].nama_kategori;
             document.getElementById('harga_jual').value = prdName[id].harga_jual;
           };
         </script>
       </select>
     </div>
     <label class="col-sm-1 control-label">Warna</label>
     <div class="col-sm-3">
      <input type="text" name="warna" id="warna" readonly class="form-control" >
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label">Nama Barang</label>
    <div class="col-sm-3">
      <input type="text" name="nama_barang" id="nama_barang" readonly class="form-control" >
    </div>
    <label class="col-sm-1 control-label">Stok Tersedia </label>
    <div class="col-sm-3">
      <input type="text" name="stok" id="stok" readonly required class="form-control" >
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label">Kategori </label>
    <div class="col-sm-3">
      <input type="text" name="nama_kategori" id="nama_kategori" readonly class="form-control" >
    </div>
    <label class="col-sm-1 control-label">Jumlah Beli </label>
    <div class="col-sm-3">
     <input type="text" name="jumlah_beli" id="jumlah_beli" class="form-control" >
   </div>
 </div>

 <div class="form-group">
  <label class="col-sm-1 control-label">Harga Satuan</label>
  <div class="col-sm-3">
   <input type="text" name="harga_jual" class="form-control" id="harga_jual" readonly="readonly">
 </div>
 <label class="col-sm-1 control-label">Sub Total</label>
 <div class="col-sm-3">
   <input type="text" name="sub_total" class="form-control" id="sub_total" readonly="readonly">
 </div>
</div>

<div class="form-group">
  <label class="col-sm-1 control-label"></label>
  <div class="col-sm-1" align="left">
   <button type="submit" name="submit" class="btn btn-primary btn-md btn-flat" id="tekan">
    <i class="fa fa-plus"> Tambah</i></button>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- DATA TRANSAKSI -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">Detail Penjualan</div>
    <div class="box-body">
      <input type="hidden" name="id_periksa" value="">
      <div class="box-body">
        <table class="display table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah Beli</th>
              <th>Sub Total</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_bayar = 0; 
            $no=1;
            foreach ($data_detail as $key => $value) { ?>
            <form name="fform" method="post" action="<?php echo base_url() ?>Penjualan/delete_detail">
              <input type="hidden" name="id_detail" value="<?php echo $value->id_detail; ?>">
              <input type="hidden" name="id_barang" value="<?php echo $value->id_barang; ?>">
              <input type="hidden" name="jumlah_beli" value="<?php echo $value->jumlah_beli; ?>">
              <input type="hidden" name="nama_pelanggan" value="<?php echo $value->nama_pelanggan; ?>">
              <tr>  
                <td><?php echo $no; ?></td>
                <td><?php echo $value->nama_barang ?></td>
                <td>Rp.<?php echo number_format($value->harga_jual) ?></td>
                <td><?php echo $value->jumlah_beli ?> Pcs</td>
                <td>Rp.<?php echo number_format($value->sub_total) ?></td>
                <td align="center">
                  <button type="submit" name="hapus" class="btn btn-danger btn-sm btn-flat">
                    <i class="fa fa-trash"></i> Hapus</button>
                  </td>
                </tr> 
              </form>
              <?php
              $total_bayar = $total_bayar + $value->sub_total;
              $no++;
            } ?>
          </tbody>
          <tfoot>
            <td colspan="4" style="text-align: right;">Total Bayar</td>
            <td colspan="2">Rp <?php echo number_format($total_bayar); ?> </td>
          </tfoot>
        </table>
        <form action="<?php echo base_url() ?>Penjualan/insert_penjualan_final" method="POST">
          <input type="hidden" name="id_transaksi" value="<?php echo $hasilkode; ?>">
          <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
          <input type="hidden" name="total_bayar" value="<?php echo $total_bayar; ?>">
          <input type="hidden" name="nama_pelanggan" value="<?php echo @$data_detail[0]->nama_pelanggan; ?>">
          <div class="form-group">
            <label class="col-sm-1 control-label"></label>
            <div class="col-sm-3" align="left">
              <a href="<?php echo base_url() ?>Penjualan/batal_transaksi/<?php echo $total_bayar; ?>"><button type="button" name="batal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-times"> BATAL</i></button></a>
              <button type="submit" name="selesai" class="btn btn-success btn-sm btn-flat" onClick="tekan()"><i class="fa fa-plus"> SELESAI</i></button>
            </div>
          </div>
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
    $("#harga_jual, #jumlah_beli").on("keydown keyup", function() {
      sum();
    });
  });

  function sum() {
    var num1 = document.getElementById('harga_jual').value;
    var num2 = document.getElementById('jumlah_beli').value;
    var result = parseInt(num1) * parseInt(num2);
    if (!isNaN(result)) {
      document.getElementById('sub_total').value = result;
    }
  }
</script>