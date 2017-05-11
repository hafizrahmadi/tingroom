<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link rel="stylesheet" href="<?php echo base_url('assets/timepicker/jquery.timepicker.min.css'); ?>">
<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pengelolaan Data Jadwal
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Data Jadwal Ruangan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Data Jadwal</h3>
            <!-- <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <a href=""><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a>
            </div> -->
            <small>(Kolom dengan tanda <span style="color:red;">*</span> wajib dipilih / diisi)</small>
        </div>

         <form role="form" action="<?php echo !isset($id_jadwal)?site_url('masterjadwal/prosesform'):site_url('masterjadwal/prosesform/'.$id_jadwal) ;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                <label for="InputGedung">Gedung <span style="color:red;">*</span></label> <?php echo form_error('id_gedung'); ?>
                  <select class="form-control" name="id_gedung" id="id_gedung" <?php echo isset($id_jadwal)?"disabled='disabled'":null; ?>>
                  <?php if (!isset($datajadwal[0]['id_gedung'])){ ?>
                      <option disabled selected value>Pilih Gedung</option>
                      <?php  foreach ($gedung as $value) { ?>
                        <option value="<?php  echo $value['id_gedung'] ?>" <?php echo (isset($id_gedung)&&$id_gedung==$value['id_gedung'])?"selected=selected":null;?>> <?php  echo $value['nama_gedung'] ?></option>
                      <?php  } ?>
                  <?php }else{ ?>
                    <option value="<?php echo $datajadwal[0]['id_gedung'] ?>"><?php echo $datajadwal[0]['nama_gedung'] ?></option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_gedung" value="<?php echo isset($datajadwal[0]['id_gedung'])?$datajadwal[0]['id_gedung']:null; ?>" <?php echo !isset($id_jadwal)?"disabled='disabled'":null; ?>>
                </div>

                <div class="form-group">
                <label for="InputLantai">Lantai<span style="color:red;">*</span></label> <?php echo form_error('id_lantai'); ?>
                  <select class="form-control" name="id_lantai" id="id_lantai" <?php echo isset($id_jadwal)?"disabled='disabled'":null; ?>>
                  <?php if (!isset($datajadwal[0]['id_lantai'])){ ?>
                      <option disabled selected value>Pilih Lantai</option>
                  <?php }else{ ?>
                    <option value="<?php echo $datajadwal[0]['id_lantai'] ?>"><?php echo $datajadwal[0]['nama_lantai'] ?></option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_lantai" value="<?php echo isset($datajadwal[0]['id_lantai'])?$datajadwal[0]['id_lantai']:null; ?>" <?php echo !isset($id_jadwal)?"disabled='disabled'":null; ?>>
                </div>
                <div class="form-group">
                <label for="InputRuangan">Ruangan<span style="color:red;">*</span></label> <?php echo form_error('id_ruangan'); ?>
                  <select class="form-control" name="id_ruangan" id="id_ruangan" <?php echo isset($id_jadwal)?"disabled='disabled'":null; ?>>
                  <?php if (!isset($datajadwal[0]['id_ruangan'])){ ?>
                      <option disabled selected value>Pilih Ruangan</option>
                  <?php }else{ ?>
                    <option value="<?php echo $datajadwal[0]['id_ruangan'] ?>"><?php echo $datajadwal[0]['nama_ruangan'] ?></option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_ruangan" value="<?php echo isset($datajadwal[0]['id_ruangan'])?$datajadwal[0]['id_ruangan']:null; ?>" <?php echo !isset($id_jadwal)?"disabled='disabled'":null; ?>>
                </div>
                <div class="bootstrap-timepicker row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="InputJamAwal">Jam Awal<span style="color:red;">*</span></label> <?php echo form_error('jam_awal'); ?>
                      <div class="input-group">
                        <input type="text" name="jam_awal" class="form-control timepicker" id="jam_awal" 
                        value="<?php 
                          if (isset($jam_awal)) {
                             echo $jam_awal;
                           }else if(isset($dataruangan[0]['jam_awal'])){
                            echo $dataruangan[0]['jam_awal'];
                           }
                         ?>">

                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="InputJamAkhir">Jam Akhir<span style="color:red;">*</span></label> <?php echo form_error('jam_akhir'); ?>
                      <div class="input-group">
                        <input type="text" name="jam_akhir" class="form-control timepicker" id="jam_akhir" value="<?php 
                          if (isset($jam_akhir)) {
                             echo $jam_akhir;
                           }else if(isset($dataruangan[0]['jam_akhir'])){
                            echo $dataruangan[0]['jam_akhir'];
                           }
                         ?>">

                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
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
<!--<script src="<?php //echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.min.js') ?>"></script>-->
<script src="<?php echo base_url('assets/timepicker/jquery.timepicker.min.js')?>"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
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
    $('#jam_awal').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '8:00am',
        maxTime: '6:00pm',
        // defaultTime: '08:00am',
        startTime: '08:00am',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    $('#jam_akhir').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '8:30am',
        maxTime: '6:00pm',
        // defaultTime: '08:30am',
        startTime: '08:30am',
        dynamic: false,
        dropdown: true,
        scrollbar: true
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

    <?php   if(!isset($id_jadwal)){ ?>
    if ( $('#id_gedung').val()!=null ) {
         $.ajax({
                  type:"POST",
                  dataType: 'json',
                  url:"<?php echo site_url('masterruangan/getLantai/') ?>",
                  data: {id_gedung:$('#id_gedung').val()},  
                  success: function(data) {
                      $('select#id_lantai').html('<option disabled selected value>Pilih Lantai</option>');

                      for(var i=0;i<data.length;i++)
                      {
                        if(data[i].id_lantai==<?php echo isset($id_lantai)?$id_lantai:'null'; ?>){
                          $("<option />").val(data[i].id_lantai)
                                         .text(data[i].nama_lantai)
                                         .attr("selected","selected")
                                         .appendTo($('select#id_lantai'));
                        }else{
                          $("<option />").val(data[i].id_lantai)
                                         .text(data[i].nama_lantai)
                                         .appendTo($('select#id_lantai'));
                        }
                      }
                      if($('#id_lantai').val()!=null){

                          $.ajax({
                                    type:"POST",
                                    dataType: 'json',
                                    url:"<?php echo site_url('masterjadwal/getRuangan/') ?>",
                                    data: {id_lantai:$('#id_lantai').val()},  
                                    success: function(data) {
                                        $('select#id_ruangan').html('<option disabled selected value>Pilih Ruangan</option>');
                
                                        for(var i=0;i<data.length;i++)
                                        {
                                          if(data[i].id_ruangan==<?php echo isset($id_ruangan)?$id_ruangan:'null'; ?>){
                                            $("<option />").val(data[i].id_ruangan)
                                                          .text(data[i].nama_ruangan)
                                                          .attr("selected","selected")
                                                          .appendTo($('select#id_ruangan'));
                                          }else{
                                            $("<option />").val(data[i].id_ruangan)
                                                          .text(data[i].nama_ruangan)
                                                          .appendTo($('select#id_ruangan'));
                                          }
                                        }                  
                                    }
                                  });
                      }
                  }

                });
      }
      <?php   } ?>
    $('#id_lantai').on('change', function() {
     // alert( this.value ); // or $(this).val()
      if (this.value == 0) {
        $('#id_ruangan').hide(600);
      }else{


        
        // alert($(this).val());
            $.ajax({
                  type:"POST",
                  dataType: 'json',
                  url:"<?php echo site_url('masterjadwal/getRuangan/') ?>",
                  data: {id_lantai:$(this).val()},  
                  success: function(data) {
                      $('select#id_ruangan').html('<option disabled selected value>Pilih Ruangan</option>');

                      for(var i=0;i<data.length;i++)
                      {
                          $("<option />").val(data[i].id_ruangan)
                                         .text(data[i].nama_ruangan)
                                         .appendTo($('select#id_ruangan'));
                      }                  
                  }
                });


        $('#id_ruangan').show(600); 
      };
    });
</script>
<?php
$this->load->view('template/foot');
?>