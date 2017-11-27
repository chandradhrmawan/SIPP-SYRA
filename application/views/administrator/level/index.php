<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Master Data Level</h3>
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
              <button class="btn btn-primary pull-right" onclick="add_Level()"><span class="fa fa-plus"></span> Tambah Master Level</button>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered" id="table" style="width: 100% important!;">
              <thead>
                <tr>
                  <th class="text-center" width="2%">No.</th>
                  <th class="text-center" >Nama Level</th>
                  <th class="text-center" width="20%">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <script src="<?php echo base_url('assets/datatables/jquery/jquery-2.1.4.min.js')?>"></script>
          <script type="text/javascript">
    var save_method; //for save method string
    var table;
    $(document).ready(function() { //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Level/list_data')?>",
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

      });
    });
    
    function add_Level()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Level'); // Set Title to Bootstrap modal title
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
        url = "<?php echo site_url('Level/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('Level/ajax_update')?>";
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
     function edit_Level(id)
     {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
       $('#modal_form').modal('show'); // show bootstrap modal
       $('.modal-title').text('Edit Level'); 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Level/ajax_get_Level_by_id')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id_level"]').val(data.id_level);
          $('[name="nama_level"]').val(data.nama_level);
          

          $('#modal_formView').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Update Form Master Level'); // Set title to Bootstrap modal title

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
          <h3 class="modal-title">Master Level Form Input</h3>
        </div>
        <form action="#" id="form">
          <div class="modal-body form">
            <div class="row col-md-12 center">
            <input type="hidden" value="" name="id_level"/> 
             <div class="form-group">
                <label for="nama_level" class="form-control-label">Nama Level</label>
                <input name="nama_level" placeholder="Nama Level" class="form-control" type="text" required="required">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>