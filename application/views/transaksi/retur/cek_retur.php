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
<!-- DATA TRANSAKSI -->

<!-- DATA TRANSAKSI -->

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
              <th>Jumlah Retur</th>
              <th>Alasan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_bayar = 0; 
            $no=1;
            foreach ($data_tmp_retur as $key => $value) { ?>
            <input type="hidden" name="id_detail" value="<?php echo $value->id_detail; ?>">
            <input type="hidden" name="id_barang[]" value="<?php echo $value->id_barang; ?>">
            <input type="hidden" name="jumlah_retur[]" value="<?php echo $value->jumlah_retur; ?>">
            <tr>  
              <td><?php echo $no; ?></td>
              <td><?php echo $value->nama_barang ?></td>
              <td>Rp.<?php echo number_format($value->harga_beli) ?></td>
              <td><?php echo $value->jumlah_retur ?> </td>
              <td><?php echo $value->keterangan ?> </td>
            </tr>
            <?php
            $no++;
          } ?>
        </tbody>
        <tfoot>
          <td colspan="6" style="text-align: left;">
            <a href="<?php echo base_url()?>Retur"><button type="button" name="print" class="btn btn-danger btn-sm btn-flat" onClick="">
              <i class="fa fa-arrow-left">  
              KEMBALI</i></button></a>
            </td>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
</div>
</div>