<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Riwayat Penerimaan</h3>
        </div>  
       <!-- /.box-header -->
       <div class="box-body">
        <br>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered" id="example1" style="width: 100% important!;">
            <thead>
              <tr>
                <th class="text-center" width="2%">No.</th>
                <th class="text-center" >Kode Pemesanan</th>
                <th class="text-center" >Tanggal Pemesanan</th>
                <th class="text-center" >Petugas Pelayan</th>
                <th class="text-center" >Total Bayar</th>
                <th class="text-center" >Status</th>
                <th class="text-center" width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              foreach ($data_pemesanan as $key => $value) { 
                if($value->status == 0){
                  $status = "<button class='btn btn-warning btn-xs btn-flat' readonly> Belum Terima </button>";
                  $dis = "";
                }else{
                  $status = "<button class='btn btn-success btn-xs btn-flat' disabled> Sudah Terima </button>";
                  $dis = "disabled";
                }
              ?>
              <tr>
              <td> <?php echo $no; ?> </td>
              <td> <?php echo $value->id_pemesanan; ?> </td>
              <td> <?php echo $value->tgl_pemesanan; ?> </td>
              <td> <?php echo $value->nama_lengkap; ?> </td>
              <td> <?php echo $value->total_bayar; ?> </td>
              <td style="text-align: center;"> <?php echo $status; ?> </td>
              <td> <center><a  href="<?php echo base_url() ?>Penerimaan/terima_barang/<?php echo $value->id_pemesanan; ?>" title="View" ><button class='btn btn-default btn-md btn-flat' <?php echo $dis; ?>> <i class="fa fa-refresh"></i>  Proses </button></a>
                </center> </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
</div>
<!-- /.box-body -->
</div> 
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>



<!-- MODAL TAMBAH -->
