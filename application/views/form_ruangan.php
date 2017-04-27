<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pengelolaan Data Ruangan
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Pengelolaan Data Ruangan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Data Ruangan</h3>
            <!-- <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <a href=""><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a>
            </div> -->
        </div>
         <form role="form" action="<?php echo !isset($id_ruangan)?site_url('masterruangan/prosesform'):site_url('masterruangan/prosesform/'.$id_ruangan) ;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                <label for="InputGedung">Gedung</label> <?php echo form_error('id_gedung'); ?>
                  <select class="form-control" name="id_gedung" id="id_gedung" <?php echo isset($id_ruangan)?"disabled='disabled'":null; ?>>
                  <?php if (!isset($datalantai[0]['id_gedung'])){ ?>
                      <option disabled selected value>Pilih Gedung</option>
                      <?php  foreach ($gedung as $value) { ?>
                        <option value="<?php  echo $value['id_gedung'] ?>" <?php echo (isset($id_gedung)&&$id_gedung==$value['id_gedung'])?"selected=selected":null;?>> <?php  echo $value['nama_gedung'] ?></option>
                      <?php  } ?>
                  <?php }else{ ?>
                    <option value="<?php echo $datalantai[0]['id_gedung'] ?>"><?php echo $datalantai[0]['nama_gedung'] ?></option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_gedung" value="<?php echo isset($datalantai[0]['id_gedung'])?$datalantai[0]['id_gedung']:null; ?>" <?php echo !isset($id_lantai)?"disabled='disabled'":null; ?>>
                </div>
                <div class="form-group">
                <label for="InputLantai">Lantai</label> <?php echo form_error('id_lantai'); ?>
                  <select class="form-control" name="id_lantai" id="id_lantai" <?php echo isset($id_ruangan)?"disabled='disabled'":null; ?>>
                  <?php if (!isset($dataruangan[0]['id_lantai'])){ ?>
                      <option disabled selected value>Pilih Lantai</option>
                      <?php  /*foreach ($lantai as $value) { ?>
                        <option value="<?php  echo $value['id_lantai'] ?>" <?php echo (isset($id_lantai)&&$id_lantai==$value['id_lantai'])?"selected=selected":null;?>> <?php  echo $value['nama_lantai'] ?></option>
                      <?php  } */?>
                  <?php }else{ ?>
                    <option value="<?php echo $datalantai[0]['id_gedung'] ?>"><?php echo $datalantai[0]['nama_gedung'] ?></option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_gedung" value="<?php echo isset($datalantai[0]['id_gedung'])?$datalantai[0]['id_gedung']:null; ?>" <?php echo !isset($id_lantai)?"disabled='disabled'":null; ?>>
                </div>
                <div class="form-group">
                  <label for="InputNamaRuangan">Ruangan</label> <?php echo form_error('nama_ruangan');?>
                  <input type="text" class="form-control" id="inputNamaruangan" name="nama_ruangan" placeholder="Masukkan nama ruangan" value="<?php 
                   if (isset($nama_ruangan)) {
                     echo $nama_ruangan;
                   }else if(isset($dataruangan[0]['nama_ruangan'])){
                    echo $dataruangan[0]['nama_ruangan'];
                   }
                  ?>">
                </div>
                 <div class="form-group">
                  <label for="InputKeterangan">Keterangan</label> <?php echo form_error('keterangan');?>
                  <input type="text" class="form-control" id="inputKeterangan" name="keterangan" placeholder="Masukkan keterangan ruangan" value="<?php 
                   if (isset($keterangan)) {
                     echo $keterangan;
                   }else if(isset($dataruangan[0]['keterangan'])){
                    echo $dataruangan[0]['keterangan'];
                   }
                  ?>">
                </div>

                
              </div>
              <!-- /.box-body -->

              <div class="box-footer clearfix">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
                
              </div>
            </form>
          </div>
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.min.js') ?>"></script>

<script>
  $(function () {

    $('#tabel').dataTable({
        "columnDefs": [
        { "targets": 2, "orderable": false}
      ]
      // "paging": true,
      // "lengthChange": false,
      // "searching": false,
      // "ordering": false,
      // "info": true,
      // "autoWidth": false,
      
    });
  });
</script>

<!--tambahkan custom js disini-->
<script type="text/javascript">
// $('#id_lantai').hide();


    $('#id_gedung').on('change', function() {
     // alert( this.value ); // or $(this).val()
      if (this.value == 0) {
        $('#id_lantai').hide(600);
      }else{


        
        // alert($(this).val());
            $.ajax({
                  type:"POST",
                  dataType: 'json',
                  url:"<?php echo site_url('masterruangan/getLantai/') ?>",
                  data: {id_gedung:$(this).val()},  
                  success: function(data) {
                      $('select#id_lantai').html('<option disabled selected value>Pilih Lantai</option>');

                      for(var i=0;i<data.length;i++)
                      {
                          $("<option />").val(data[i].id_lantai)
                                         .text(data[i].nama_lantai)
                                         .appendTo($('select#id_lantai'));
                      }                  
                  }
                });


        $('#id_lantai').show(600); 
      };



    });
</script>
<?php
$this->load->view('template/foot');
?>