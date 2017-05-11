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
            <div class="box-tools pull-right">
                <!-- <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                <a href="<?php echo site_url('masterlantai/tambah') ?>"><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a>
            </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Gedung</th>
                        <th>Lantai</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($lantai as $value) {
                        
                    
                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['nama_gedung'] ?></td>
                        <td><?php echo $value['nama_lantai'] ?></td>
                        <td>
                            <div class="btn-group">
                             <a href="<?php echo site_url('masterlantai/edit/'.$value['id_lantai']) ?>">
                             <button class="btn btn-xs btn-success"><i class="fa fa-pencil" style=""></i> Edit</button>
                             </a>
                             <a href="<?php echo site_url('masterlantai/hapus/'.$value['id_lantai']) ?>"  onclick="return conf();">
                             <button class="btn btn-xs btn-success"><i class="fa fa-trash-o" style=""></i> Hapus</button>
                             </a>
                            </div>
                        </td>                        
                    </tr>
                    <?php 
                            $no++;
                        } 
                    ?>
                </tbody>
            </table>
        </div>
      </div><!-- /.box-body -->
        <!-- <div class="box-footer">
            
        </div> --><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->


<?php 
$this->load->view('template/js');
?>

<!-- DataTables -->
<!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.min.js') ?>"></script> -->

<script>
  $(function () {

    $('#tabel').dataTable({
        "columnDefs": [
        { "targets": 3, "orderable": false}
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