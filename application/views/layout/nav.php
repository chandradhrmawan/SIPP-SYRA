<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url()?>assets/img/avatar04.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama_level') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <?php if($this->session->userdata('id_level')=='1'){ 
        if($this->uri->uri_string() == 'Dashboard'){echo "active";}else{echo "";}
        ?>
        <li class="header">MASTER DATA</li>
        <li class="<?php if($this->uri->uri_string() == 'Dashboard'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> 
        <li class="<?php if($this->uri->uri_string() == 'Users'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Users"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Level'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Level"><i class="fa fa-level-up"></i> <span>Level</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Warna'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Warna"><i class="fa fa-location-arrow"></i> <span>Warna</span></a></li> 
        <li class="<?php if($this->uri->uri_string() == 'Kategori'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Kategori"><i class="fa fa-columns"></i> <span>Kategori</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Barang'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Barang"><i class="fa fa-shopping-bag"></i> <span>Barang</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Suplier'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Suplier"><i class="fa fa-home"></i> <span>Suplier</span></a></li>
        <li class="header">TRANSAKSI</li>
        <li class="<?php if($this->uri->uri_string() == 'Penjualan'){echo "active";}else{echo "";} ?>"><a href="<?php echo base_url()?>Penjualan"><i class="fa fa-shopping-cart"></i> <span>PENJUALAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Pemesanan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Pemesanan"><i class="fa fa-phone"></i> <span>PEMESANAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Penerimaan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Penerimaan"><i class="fa fa-plane"></i> <span>PENERIMAAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Retur'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Retur"><i class="fa fa-edit"></i> <span>RETUR</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Masuk'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Masuk"><i class="fa fa-pencil"></i> <span>BARANG MASUK MANUAL</span></a></li>
        <li class="header">HISTORY DAN LAPORAN</li>
        <li class="<?php if($this->uri->uri_string() == 'Penjualan/riwayat_penjualan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Penjualan/riwayat_penjualan"><i class="fa fa-book"></i> <span>DATA PENJUALAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Pemesanan/riwayat_pemesanan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Pemesanan/riwayat_pemesanan"><i class="fa fa-book"></i> <span>DATA PEMESANAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Pemesanan/riwayat_pemesanan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Masuk/riwayat_masuk"><i class="fa fa-book"></i> <span>DATA BARANG MASUK MANUAL</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Laporan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Laporan"><i class="fa fa-file"></i> <span>LAPORAN</span></a></li>
        <li><a href="<?php echo base_url()?>login/do_logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
        <?php }else if($this->session->userdata('id_level')=='2'){ ?>
        <li class="header">TRANSAKSI</li>
        <li class="<?php if($this->uri->uri_string() == 'Penjualan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Penjualan"><i class="fa fa-shopping-cart"></i> <span>PENJUALAN</span></a></li>
        <li class="header">HISTORY DAN LAPORAN</li>
        <li class="<?php if($this->uri->uri_string() == 'Penjualan/riwayat_penjualan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Penjualan/riwayat_penjualan"><i class="fa fa-book"></i> <span>DATA PENJUALAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Laporan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Laporan"><i class="fa fa-file"></i> <span>LAPORAN</span></a></li>
        <li><a href="<?php echo base_url()?>login/do_logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
        <?php }else if($this->session->userdata('id_level')=='3'){ ?>
        <li class="header">TRANSAKSI</li>
        <li class="<?php if($this->uri->uri_string() == 'Pemesanan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Pemesanan"><i class="fa fa-phone"></i> <span>PEMESANAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Penerimaan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Penerimaan"><i class="fa fa-plane"></i> <span>PENERIMAAN</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Retur'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Retur"><i class="fa fa-edit"></i> <span>RETUR</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Masuk'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Masuk"><i class="fa fa-pencil"></i> <span>BARANG MASUK MANUAL</span></a></li>
        <li class="header">HISTORY DAN LAPORAN</li>
        <li class="<?php if($this->uri->uri_string() == 'Pemesanan/riwayat_pemesanan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Pemesanan/riwayat_pemesanan"><i class="fa fa-book"></i> <span>DATA PEMESANAN</span></a></li>
         <li class="<?php if($this->uri->uri_string() == 'Masuk'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Masuk"><i class="fa fa-pencil"></i> <span>BARANG MASUK MANUAL</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'Laporan'){echo "active";}else{echo "";} ?>" ><a href="<?php echo base_url()?>Laporan"><i class="fa fa-file"></i> <span>LAPORAN</span></a></li>
        <li><a href="<?php echo base_url()?>login/do_logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>