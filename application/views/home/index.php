<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Dashboard</h3>
        </div>  
        <div class="box-body" align="center">
          <h3><b>Sistem Informasi Penjualan Dan Persediaan Barang Syra Hijab</b></h3>
          <h4>Selamat Datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b></h4>
          <h4>Hak Akses <b><?php echo $this->session->userdata('nama_level'); ?></b></h4>
          <img src="<?php echo base_url() ?>assets/img/syra_goodiebag.jpg" height="300" width="500">
          <br>
        </div>
      </div> 
    </div>
  </div>
</section>