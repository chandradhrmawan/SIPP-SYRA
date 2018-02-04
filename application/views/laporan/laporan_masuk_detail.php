<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
  

</head>
<style>
.table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

.table {
    border-collapse: collapse;
    width: 100%;
}

.th, td {a
    padding: 15px;
}

.border{
    border: none;
}
</style>
<div class="container">
<table cellpadding="2" cellspacing="2"   border="0" width='100%'>
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <tr>
                  <td style="border:none; text-align: center;" colspan="10" align="center" ><font face="verdana" align="center"><strong> Laporan Data Masuk Detail</strong></font></td>
              </tr>
              <tr>
                  <td style="border:none; text-align: center;" colspan="10" align="center" ><font face="verdana" align="center"><strong> Syra Hijab.</strong></font></td>
              </tr>
              <tr>
                  <td style="border:none; text-align: center;" colspan="10"  align="center"> <strong> jalan Budi Luhur No 6A</strong></td>
              </tr>
              <tr>
               <td style="border:none; text-align: center;" colspan="10" align="center"><strong> Tlp.  08987997351</strong></td>
           </tr>
       </div>
   </div>
</div>
</table>
<hr>
<table id="zctb" class="table" cellspacing="0" width="100%">
    <thead>
        <tr style="padding:15px">
            <th style="padding:15px">NO</th>
            <th>ID MASUK</th>
            <th>TANGGAL MASUK</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH MASUK</th>
            <th>SUB TOTAL</th>
        </tr>
    </thead>
    <?php $no=1; 
    $total_bayar = 0; 
    foreach ($hasil_query as $key => $value) { ?>
    <tr>
            <td style="padding:10px"><?php echo $no; ?></td>
            <td><?php echo $value->id_masuk; ?></td>
            <td><?php echo $value->tgl_masuk; ?></td>
            <td><?php echo $value->nama_barang; ?></td>
            <td><?php echo $value->jumlah_masuk; ?> Pcs</td>
            <td>Rp. <?php echo number_format($value->sub_total); ?></td>
    </tr>
    <?php $total_bayar = $total_bayar + $value->sub_total; $no++; } ?>
    <tr>
        <td style="padding:10px; text-align: right;" colspan="7">Total Pengeluaran : Rp. <?php echo number_format($total_bayar); ?></td>
    </tr>
</table>
<div class="pull-right" align="right">
   <br />
   Hormat Saya <?php echo date('d-m-Y'); ?>
   <br />
   <br />
   <br />
   <br />
   <br />
   <?php
   echo '<b>Petugas : '.$this->session->userdata('nama_lengkap').'</b>';

   ?>
</div>
<button id="button" class="btn btn-default btn-sm" onClick="cetak();">Print</button>
</div>
</html>
<script type="text/javascript">
    function cetak()
    {
        document.getElementById('button').style.visibility='hidden';
        window.print();
        location.replace('<?php echo base_url() ?>');

    }
</script>