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
        Konfirmasi Booking
    </h1>

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Konfirmasi Booking</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Konfirmasi Booking</h3>
            <div class="box-tools pull-right">
                
            </div>
        </div>
        <div class="box-body">
         <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Ruangan</th>
                        <th>Lokasi</th>
                        <th>Tgl Booking</th>
                        <th>Jam Jadwal</th>
                        <th>Deskripsi</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($booking as $value) {
                ?>
                <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['nama'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['nama_ruangan'] ?></td>
                        <td><?php echo ($value['nama_gedung']!=null||$value['nama_lantai']!=null)?ucwords($value['nama_gedung'])." <span class='col-lantai'>".$value['nama_lantai']."</span>":'-' ; ?></td>
                        <td><?php echo date('d M Y',strtotime($value['waktu'])); ?></td>
                        <td><?php echo $value['jam_jadwal'] ?></td>
                        <td><?php echo $value['deskripsi'] ?></td>
                            
                        <td>
                            <div class="btn-group">
                             <a href="<?php echo site_url('sekretaris/confirm/'.$value['id_booking']) ?>" onclick="return con_conf();">
                             <button class="btn btn-xs btn-success"><i class="fa fa-check" style=""></i> Confirm</button>
                             </a>
                              <a href="<?php echo site_url('sekretaris/reject/'.$value['id_booking']) ?>"  onclick="return rej_conf();">
                             <button class="btn btn-xs btn-danger"><i class="fa fa-close" style=""></i> Reject</button>
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
      </div>
        <!-- /.box-body -->
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
        { "targets": 8, "orderable": false, "autoWidth":true}
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