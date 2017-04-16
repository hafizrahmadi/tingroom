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
        Pengelolaan Data Lantai
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Pengelolaan Data Lantai</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Data Lantai</h3>
            <!-- <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <a href=""><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a>
            </div> -->
        </div>
         <form role="form" action="<?php echo !isset($id_lantai)?site_url('masterlantai/prosesform'):site_url('masterlantai/prosesform/'.$id_lantai) ;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                <label for="InputGedung">Gedung</label> <?php echo form_error('id_gedung'); ?>
                  <select class="form-control" name="id_gedung">
                  <option>Pilih Gedung</option>
                  <?php  foreach ($gedung as $value) { ?>
                    <option value="<?php  echo $value['id_gedung'] ?>"><?php  echo $value['nama_gedung'] ?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="InputNamaLantai">Lantai</label> <?php echo form_error('nama_lantai'); ?>
                  <input type="number" class="form-control" id="inputNamaLantai" name="nama_lantai" placeholder="Masukkan nomor lantai" value="<?php echo isset($datalantai[0]['nama_lantai'])?$datalantai[0]['nama_lantai']:null; ?>">
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
<?php
$this->load->view('template/foot');
?>