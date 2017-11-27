<?php if($this->session->userdata('id_level')=='1'){ 
  $penjualan = '';
  $pemesanan = '';
  $penerimaan = '';
}else if($this->session->userdata('id_level')=='2'){
  $penjualan = '';
  $pemesanan = 'disabled';
  $penerimaan = 'disabled';
}else if($this->session->userdata('id_level')=='3'){
  $penjualan = 'disabled';
  $pemesanan = '';
  $penerimaan = '';
}
?>
<!-- LAPORAN PENJUALAN -->
<form class="form-horizontal" action="<?php echo base_url() ?>Laporan/laporan_penjualan" method="post" enctype="multipart/form-data">
  <div class="row">
   <div class="col-md-6">
    <div class="box-body">
      <div class="panel panel-default">
       <div class="panel-heading">Laporan Penjualan</div>
       <div class="box-body">
        <div class="form-group">
          <div class="col-md-3">
            <label for="dari">Dari</label>
            <input type="date" name="dari" class="form-control"/>
          </div>
          <div class="col-md-3">
            <label for="sampai">Sampai</label>
            <input type="date" name="sampai" class="form-control"/>
          </div>
          <br>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-flat" <?php echo $penjualan; ?>><i class="fa fa-search"> Submit </i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<!-- LAPORAN PEMESANAN -->
<form class="form-horizontal" action="<?php echo base_url() ?>Laporan/laporan_pemesanan" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <div class="box-body">
      <div class="panel panel-default">
       <div class="panel-heading">Laporan Pemesanan</div>
       <div class="box-body">
        <div class="form-group">
          <div class="col-md-3">
            <label for="dari">Dari</label>
            <input type="date" name="dari" class="form-control"/>
          </div>
          <div class="col-md-3">
            <label for="sampai">Sampai</label>
            <input type="date" name="sampai" class="form-control"/>
          </div>
          <br>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-flat" <?php echo $pemesanan; ?>><i class="fa fa-search"> Submit </i></button>        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>

<form class="form-horizontal" action="<?php echo base_url() ?>Laporan/laporan_penerimaan" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6">
    <div class="box-body">
      <div class="panel panel-default">
       <div class="panel-heading">Laporan Penerimaan</div>
       <div class="box-body">
        <div class="form-group">
          <div class="col-md-3">
            <label for="dari">Dari</label>
            <input type="date" name="dari" class="form-control"/>
          </div>
          <div class="col-md-3">
            <label for="sampai">Sampai</label>
            <input type="date" name="sampai" class="form-control"/>
          </div>
          <br>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-flat" <?php echo $penerimaan; ?>><i class="fa fa-search"> Submit </i></button>        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>