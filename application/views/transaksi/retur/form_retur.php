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
            $dis_app = '';
            foreach ($data_detail as $key => $value) { 
              if($value->status_barang == 2){
                $dis_app = 'disabled';
              }else{
                $dis_app = '';
              }
              ?>
              <input type="hidden" name="id_retur" value="<?php echo $id_retur; ?>">
              <input type="hidden" name="id_barang[]" value="<?php echo $value->id_barang; ?>">
              <tr>  
                <td><?php echo $no; ?></td>
                <td><?php echo $value->nama_barang ?></td>
                <td>Rp.<?php echo number_format($value->harga_beli) ?></td>
                <td><div class="col-xs-6">
                  <input type="text" <?php echo $dis_app; ?> name="jumlah_retur[]" class="form-control" value="<?php echo $value->jumlah_pesan ?>">
                </div>
              Pcs</td>
              <td>
                <div class="col-xs-12">
                  <input type="text" name="alasan[]" class="form-control" <?php echo $dis_app; ?> >
                </div>
              </td>
            </tr>
            <?php
            $total_bayar = $total_bayar + $value->sub_total;
            $no++;
          } ?>
        </tbody>
        <tfoot>

          <?php
          if(!empty($data_tmp_retur)){
            $dis_btn = 'disabled';
         }else{
            $dis_btn = '';
        }
        ?>
        <td colspan="6" style="text-align: left;">
          <button type="submit" <?php echo $dis_btn; ?> name="simpan" class="btn btn-success btn-sm btn-flat" onClick="tekan()">
            <i class="fa fa-plus"> 
            PROSES</i></button>
          </td>
        </tfoot>
      </table>
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
            <button type="button" name="print" class="btn btn-default btn-sm btn-flat" onClick="">
              <i class="fa fa-print">  
              PRINT</i></button>
            </td>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
</div>
</div>