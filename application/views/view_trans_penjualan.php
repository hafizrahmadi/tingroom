<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<script type="text/javascript">
    function search_barang(){
    var str=$('#namabarang').val();//this will get value from text box when you press any key or text
    var result=$("#result");//this will be a result block
    if(str!=""){//chek if string is not empty
        result.show(300);//if string not empty the result block will show on
        $.ajax({
                'type':'get',//type of send data
                'data':{'namabarang':str},//data will past value to controller
                'url':'<?php echo site_url(); ?>'+'/TransaksiPenjualan/search_barang/',//url that ajax will direct to to get data
                'beforeSend':function(){result.html('<div id="searching"></div>')},//some action you want to show to user while data is sending request
                'success':function(data){//do something like show the result data when ajax success to send request and get back data
                if(data){
                    result.html(data);
                }
            }
        });
            
    }else{
        result.hide(300);//if string is empty result block will hide
    }
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Transaksi Penjualan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box" >
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Transaksi Penjualan</h3>
            <div class="box-tools pull-right">
                <!-- <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
               <!--  <a href=""><button class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" style=""></i> Tambah Data</button></a> -->
            </div>
        </div>
        <div class="col-md-7">
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="idbarang" class="col-sm-3 control-label">ID Barang</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="idbarang" placeholder="ID Barang">
                    </div>

                </div>
                <div class="form-group">
                  <label for="namabarang" class="col-sm-3 control-label">Nama Barang</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama Barang" name="namabarang" onkeyup="search_barang();">
                        <div id="result"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="hargabarang" class="col-sm-3 control-label">Harga (Rp)</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="hargabarang" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jumlah" class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="jumlah" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="subtotal" class="col-sm-3 control-label">Sub-Total (Rp)</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="subtotal" placeholder="">
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus" style=""></i> Tambah</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
             <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Penghitungan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="total" class="col-sm-5 control-label">Total (Rp)</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" id="total" placeholder="">
                    </div>
                    
                </div>
                 <div class="form-group">
                  <label for="kembali" class="col-sm-5 control-label">Total Pokok (Rp)</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" id="kembali" placeholder="">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="kembali" class="col-sm-5 control-label">Diskon (Rp)</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" id="kembali" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bayar" class="col-sm-5 control-label">Bayar (Rp)</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" id="bayar" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kembali" class="col-sm-5 control-label">Kembali (Rp)</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" id="kembali" placeholder="">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check" style=""></i> Submit</button>
              </div>
            </form>
          </div>

        </div>
        <div class="box-body">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Barang</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub-Total</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>Rengginang Lorjuk</td>
                        <td>Rp. 10.000,-</td>
                        <td>4</td>
                        <td>Rp. 40.000,-</td>
                        <td>
                             <a href="">
                             <button class="btn btn-xs btn-success"><i class="fa fa-trash-o" style=""></i> Hapus</button>
                             </a>
                            </div>
                        </td>                        
                    </tr>
                    <!-- <tr>
                        <td>2</td>
                        <td>B-007</td>
                        <td>Rengginang Mentah</td>
                        <td>Rp. 18.000,-</td>
                        <td>1</td>
                        <td>Rp. 18.000,-</td>
                        <td>
                             <a href="">
                             <button class="btn btn-xs btn-success"><i class="fa fa-trash-o" style=""></i> Hapus</button>
                             </a>
                            </div>
                        </td>                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>B-001</td>
                        <td>Kripik Singkong</td>
                        <td>Rp. 13.000,-</td>
                        <td>3</td>
                        <td>Rp. 39.000,-</td>
                        <td>
                             <a href="">
                             <button class="btn btn-xs btn-success"><i class="fa fa-trash-o" style=""></i> Hapus</button>
                             </a>
                            </div>
                        </td>                        
                    </tr> -->
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
        </div><!-- /.box-footer-->
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
        
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      
    });
  });
</script>
<!--tambahkan custom js disini-->

<?php
$this->load->view('template/foot');
?>