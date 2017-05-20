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
        Pengelolaan Data User
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Pengelolaan Data User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Data User</h3>
            <!-- <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <a href=""><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a>
            </div> -->
            <small>(Kolom dengan tanda <span style="color:red;">*</span> wajib dipilih / diisi)</small>
        </div>
         <form role="form" action="<?php echo !isset($id_user)?site_url('masteruser/prosesform'):site_url('masteruser/prosesform/'.$id_user) ;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="InputLevel">Level User<span style="color:red;">*</span></label> <?php echo form_error('level');?>
                  <select class="form-control" name="level" id="level">                  
                    <option disabled selected value>Pilih Level user</option>
                    <option value="0" <?php echo (isset($level)&&$level==1)||(isset($datauser[0]['level'])&&$datauser[0]['level']==1)?"selected=selected":null;?>>Admin</option>
                    <option value="1" <?php echo (isset($level)&&$level==2)||(isset($datauser[0]['level'])&&$datauser[0]['level']==2)?"selected=selected":null;?>>Sekretaris</option>
                    <option value="1" <?php echo (isset($level)&&$level==3)||(isset($datauser[0]['level'])&&$datauser[0]['level']==3)?"selected=selected":null;?>>User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="InputNamaUser">Nama<span style="color:red;">*</span></label> <?php echo form_error('nama'); ?>
                  <input type="text" class="form-control" id="inputNamaUser" name="nama" placeholder="Masukkan nama" value="<?php 
                  if(isset($nama)){
                    echo $nama;
                  }else if(isset($datauser[0]['nama'])){
                    echo $datauser[0]['nama'];
                  }
                  ?>">
                </div>
                <div class="form-group">
                  <label for="InputEmailUser">Email / Username<span style="color:red;">*</span></label> <?php echo form_error('email'); ?>
                  <input type="text" class="form-control" id="inputEmailUser" name="email" placeholder="Masukkan email atau username" value="<?php 
                  if(isset($email)){
                    echo $email;
                  }else if(isset($datauser[0]['email'])){
                    echo $datauser[0]['email'];
                  }
                  ?>">
                </div>

                <div class="form-group">
                  <label for="InputPasswordUser">Password<span style="color:red;">*</span></label> <?php echo form_error('password'); ?>
                  <input type="password" class="form-control" id="inputPasswordUser" name="password" placeholder="Masukkan password" value="<?php echo isset($datauser[0]['password'])?$datauser[0]['password']:null; ?>">
                </div>

                <div class="form-group">
                  <label for="inputConfPasswordUser">Konfirmasi Password<span style="color:red;">*</span></label> <?php echo form_error('conf_password'); ?>
                  <input type="password" class="form-control" id="inputConfPasswordUser" name="conf_password" placeholder="Masukkan konfirmasi password" value="">
                </div>

                <div class="form-group">
                  <label for="InputPhoneUser">Nomor Handphone</label> <?php echo form_error('no_hp'); ?>
                  <input type="text" class="form-control" id="inputPhoneUser" name="no_hp" placeholder="Masukkan nomor handphone" value="<?php 
                  if(isset($no_hp)){
                    echo $no_hp;
                  }else if(isset($datauser[0]['no_hp'])){
                    echo $datauser[0]['no_hp'];
                  }
                  ?>">
                </div>

                <div class="form-group">
                  <label for="InputUnit">Unit</label> <?php echo form_error('id_unit');?>
                  <select class="form-control" name="id_unit" >
                    <option disabled selected value>Pilih Unit</option>
                      <?php  foreach ($unit as $value) { ?>
                        <option value="<?php  echo $value['id_unit'] ?>" <?php echo (isset($id_unit)&&$id_unit==$value['id_unit'])?"selected=selected":null;?>> <?php  echo $value['nama_unit'] ?></option>
                      <?php  } ?>                  
                  </select>
                </div>

                <div class="form-group">
                  <label for="InputLokasi">Lokasi</label> <?php echo form_error('id_lantai');?>
                  <select class="form-control" name="id_lantai" >
                      <option disabled selected value>Pilih Lokasi</option>
                        <?php  foreach ($lantai as $value) { ?>
                        <?php
                          $lt = $value['nama_lantai'];
                          $x = $lt % 10;
                          $y = $lt % 100;
                          if ($x == 1 && $y != 11) {
                              $nmlnt = $lt."st Floor";
                          }else if ($x == 2 && $y != 12) {
                              $nmlnt = $lt."nd Floor";
                          }else if ($x == 3 && $y != 13) {
                              $nmlnt = $lt."rd Floor";
                          }else{
                              $nmlnt = $lt."th Floor";
                          }
                         ?>
                          <option value="<?php  echo $value['id_lantai'] ?>" <?php echo (isset($id_lantai)&&$id_lantai==$value['id_lantai'])?"selected=selected":null;?>> <?php  echo ucwords($value['nama_gedung'])." ".$nmlnt ?></option>
                        <?php  } ?>                  
                    </select>
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
<!--<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.min.js') ?>"></script>-->

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