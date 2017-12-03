<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Riwayat Pemesanan</h3>
        </div>  
       <!-- /.box-header -->
       <div class="box-body">
        <div class="row">

        </div>
        <div class="row">
           <div class="table-responsive">
          <table class="table table-bordered" style="width:30%">
          <tr>
            <th>Id Transaksi</th>
            <th><?php echo $data_pemesanan['id_pemesanan'] ?></th>
          </tr>
          <tr>
            <th>Tanggal Transaksi</th>
            <th><?php echo date('d-m-Y',strtotime($data_pemesanan['tgl_pemesanan'])) ?></th>
          </tr>
          <tr>
            <th>Nama Petugas</th>
            <th><?php echo $data_pemesanan['nama_lengkap'] ?></th>
          </tr>
          </table>
        </div>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-hover table-bordered" style="width: 100% important!;">
            <thead>
              <tr>
                <th class="text-center" width="2%">No.</th>
                <th class="text-center" >No Invoice</th>
                <th class="text-center" >Nama Barang</th>
                <th class="text-center" >Jumlah Pesan</th>
                <th class="text-center" >Total Bayar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $total = 0;
              foreach ($data_detail_pesan as $key => $value) { ?>
              <tr>
              <td> <?php echo $no; ?> </td>
              <td> <?php echo $value->id_pemesanan; ?> </td>
              <td> <?php echo $value->nama_barang; ?> </td>
              <td> <?php echo $value->jumlah_pesan; ?> Pcs</td>
              <td> Rp. <?php echo number_format($value->sub_total); ?> </td>
                </tr>
                <?php
                 $total = $total + $value->sub_total;
                 $no++; 
               } ?>
              <tr>
                  <td colspan="4" style="text-align: right;">Total</td>
                  <td>Rp. <?php echo number_format($total); ?></td>
              </tr>
              </tbody>
            </table>
            <a href="<?php echo base_url()?>Pemesanan/riwayat_pemesanan"><button type="button" class="btn btn-flat btn-warning btn-sm"> <i class="fa fa-arrow-left"> Kembali </i> </button></a>
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
