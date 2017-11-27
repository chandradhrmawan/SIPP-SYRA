<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Riwayat Penjualan</h3>
        </div>  
       <!-- /.box-header -->
       <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <a href="<?php echo base_url() ?>Penjualan"><button class="btn btn-primary pull-right btn-flat"><span class="fa fa-plus"></span> Tambah Transaksi Penjualan</button></a>
          </div>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered" id="example1" style="width: 100% important!;">
            <thead>
              <tr>
                <th class="text-center" width="2%">No.</th>
                <th class="text-center" >No Invoice</th>
                <th class="text-center" >Tanggal Transaksi</th>
                <th class="text-center" >Petugas Pelayan</th>
                <th class="text-center" >Total Bayar</th>
                <th class="text-center" width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              foreach ($data_penjualan as $key => $value) { ?>
              <tr>
              <td> <?php echo $no; ?> </td>
              <td> <?php echo $value->id_transaksi; ?> </td>
              <td> <?php echo $value->tgl_transaksi; ?> </td>
              <td> <?php echo $value->nama_lengkap; ?> </td>
              <td> <?php echo $value->total_bayar; ?> </td>
              <td> <center><a  href="<?php echo base_url() ?>Penjualan/view_detail_penjualan/<?php echo $value->id_transaksi; ?>" title="View" ><i class="fa fa-eye"></i> View</a>
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
