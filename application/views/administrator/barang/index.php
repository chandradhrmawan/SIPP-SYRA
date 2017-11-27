<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Master Data Barang</h3>
        </div>  

        <?php if($this->session->flashdata('insert_gagal')) { ?>
        <div class="alert alert-success alert-dismissible">
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

       <!-- /.box-header -->
       <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <button class="btn btn-primary pull-right btn-flat" data-toggle="modal" data-target="#myModal" ><span class="fa fa-plus"></span> Tambah Master Barang</button>
          </div>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered" id="example1" style="width: 100% important!;">
            <thead>
              <tr>
                <th class="text-center" width="2%">No.</th>
                <th class="text-center" >Nama Barang</th>
                <th class="text-center" >Nama Kategori</th>
                <th class="text-center" >Nama Warna</th>
                <th class="text-center" >Stok</th>
                <th class="text-center" >Keterangan</th>
                <th class="text-center" >Harga Jual</th>
                <th class="text-center" >Harga Beli</th>
                <th class="text-center" >Direktori</th>
                <th class="text-center" width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($get_barang as $key => $value) { ?>
              <tr>
              <td> <?php echo $value->id_barang; ?> </td>
              <td> <?php echo $value->nama_barang; ?> </td>
              <td> <?php echo $value->nama_kategori; ?> </td>
              <td> <?php echo $value->nama_warna; ?> </td>
              <td> <?php echo $value->stok; ?> </td>
              <td> <?php echo $value->keterangan; ?> </td>
              <td>Rp. <?php echo number_format($value->harga_jual); ?> </td>
              <td>Rp. <?php echo number_format($value->harga_beli); ?> </td>
              <td> <?php echo $value->direktori; ?> </td>
              <td> <center><a  href="#" title="Edit" onclick="edit_Barang(<?php echo $value->id_barang?>)" ><i class="fa fa-pencil"></i> Edit</a>|
                <a  href="<?php echo base_url()?>Barang/delete_barang/<?php echo $value->id_barang?>" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center> </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <script src="<?php echo base_url('assets/datatables/jquery/jquery-2.1.4.min.js')?>"></script>
          <script type="text/javascript">
    var save_method; //for save method string
    var table;
    $(document).ready(function() { //TAMPIL DATA TABLE SERVER SIDE
      /*table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Barang/list_data')?>",
          "type": "POST"

        },

        //Set column definition initialisation properties.
        "columnDefs": [
        
        { 

          "targets": [ 0,1,2 ], //last column
          "class":"text-center",
          "orderable": true, //set not orderable
        },

        ],
        "order": [[0, 'desc']]

      });*/
    });
    
    function add_Barang()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('Barang/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('Barang/ajax_update')?>";
      }
       // ajax adding data to database
       $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          });
     }
     function edit_Barang(id)
     {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
       $('#modal_form').modal('show'); // show bootstrap modal
       $('.modal-title').text('Edit Barang'); 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Barang/ajax_get_Barang_by_id')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id_barang"]').val(data.id_barang);
          $('[name="nama_barang"]').val(data.nama_barang);
          $('[name="id_kategori"]').val(data.id_kategori);
          $('[name="id_warna"]').val(data.id_warna); 
          $('[name="stok"]').val(data.stok);
          $('[name="keterangan"]').val(data.keterangan);
          $('[name="harga_jual"]').val(data.harga_jual);
          $('[name="harga_beli"]').val(data.harga_beli);
          
          $('#modal_formView').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Update Form Master Barang'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
    }
    
  </script>


</div>
<!-- /.box-body -->
</div> 
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Master Kategori Form Input</h3>
        </div>
        <form action="#" id="form" enctype="multipart/form-data" />
        <div class="modal-body form">
          <div class="row col-md-12 center">
            <input type="hidden" value="" name="id_barang"/> 
            <div class="form-group">
              <label for="nama_barang" class="form-control-label">Nama Barang</label>
              <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="id_kategori" class="form-control-label">Kategori</label>
              <select name="id_kategori" class="form-control" type="text" required="required">
                <?php foreach ($get_kategori as $key => $value) { ?>
                <option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_warna" class="form-control-label">Warna</label>
              <select name="id_warna" class="form-control" type="text" required="required">
                <?php foreach ($get_warna as $key => $value) { ?>
                <option value="<?php echo $value->id_warna ?>"><?php echo $value->nama_warna ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="stok" class="form-control-label">Stok</label>
              <input name="stok" placeholder="Jumlah Stok" class="form-control" type="number" required="required">
            </div>
            <div class="form-group">
              <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea name="keterangan" class="form-control" required="required" cols="5" rows="3">Isi Deskripsi Barang</textarea>
            </div>
            <div class="form-group">
              <label for="harga_jual" class="form-control-label">Harga Jual</label>
              <input name="harga_jual" placeholder="Harga Jual" class="form-control" type="number" required="required">
            </div>
            <div class="form-group">
              <label for="harga_beli" class="form-control-label">Harga Beli</label>
              <input name="harga_beli" placeholder="Jumlah Stok" class="form-control" type="number" required="required">
            </div>
            <!-- <div class="form-group">
              <label for="direktori" class="form-control-label">Foto Barang</label>
              <input name="direktori" placeholder="Gambar Barang" class="form-control" type="file" required="required">
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Kirim</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>barang/tambah_barang" method="POST" enctype="multipart/form-data" />
        <div class="modal-body form">
          <div class="row col-md-12 center">             
              <input type="hidden" name="id_barang" placeholder="Kode Barang" class="form-control" required="required">
            <div class="form-group">
              <label for="nama_barang" class="form-control-label">Nama Barang</label>
              <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="id_kategori" class="form-control-label">Kategori</label>
              <select name="id_kategori" class="form-control" type="text" required="required">
                <?php foreach ($get_kategori as $key => $value) { ?>
                <option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_warna" class="form-control-label">Warna</label>
              <select name="id_warna" class="form-control" type="text" required="required">
                <?php foreach ($get_warna as $key => $value) { ?>
                <option value="<?php echo $value->id_warna ?>"><?php echo $value->nama_warna ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="stok" class="form-control-label">Stok</label>
              <input name="stok" placeholder="Jumlah Stok" class="form-control" type="number" required="required">
            </div>
            <div class="form-group">
              <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea name="keterangan" class="form-control" required="required" cols="5" rows="3">Isi Deskripsi Barang</textarea>
            </div>
            <div class="form-group">
              <label for="harga_jual" class="form-control-label">Harga Jual</label>
              <input name="harga_jual" placeholder="Harga Jual" class="form-control" type="number" required="required">
            </div>
            <div class="form-group">
              <label for="harga_beli" class="form-control-label">Harga Beli</label>
              <input name="harga_beli" placeholder="Jumlah Stok" class="form-control" type="number" required="required">
            </div>
            <div class="form-group">
              <label for="direktori" class="form-control-label">Foto Barang</label>
              <input name="direktori" placeholder="Gambar Barang" class="form-control" type="file" required="required">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success btn-flat" type="submit" name="submit">
            Confirm
          </button>
          <button type="reset" class="btn btn-danger btn-flat"  data-dismiss="modal" aria-hidden="true">
            Cancel
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
</div>