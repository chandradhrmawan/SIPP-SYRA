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
                <th class="text-center" >Kode Penerimaan</th>
                <th class="text-center" >Tanggal Penerimaan</th>
                <th class="text-center" >Petugas Pelayan</th>
                <th class="text-center" width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              foreach ($data_retur as $key => $value) { 
              ?>
              <tr>
              <td> <?php echo $no; ?> </td>
              <td> <?php echo $value->id_penerimaan; ?> </td>
              <td> <?php echo $value->tgl_penerimaan; ?> </td>
              <td> <?php echo $value->nama_lengkap; ?> </td>
              <td> <center><a  href="<?php echo base_url() ?>Retur/retur_barang/<?php echo $value->id_pemesanan; ?>" title="View" ><button class='btn btn-warning btn-md btn-flat'> <i class="fa fa-edit"></i>  Retur </button></a>
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
