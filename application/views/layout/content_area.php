  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
       <div class="col-md-10 offset-md-2">

        <?php if($this->session->flashdata('login_success')) { ?>
        <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo $this->session->flashdata('login_success'); ?>
       </div>
       <?php } ?>
       <?php if($this->session->flashdata('pesan')) { ?>
        <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo $this->session->flashdata('pesan'); ?>
       </div>
       <?php } ?>

     </div>
   </div>
   <h1>
    <?php echo $head; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="#"><?php echo $bread; ?></a></li>
  </ol>
</section>
<!-- Main content -->
<?php
  if($isi){
    $this->load->view($isi);
  }
?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
