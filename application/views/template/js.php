</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>

<script>
    $(function(){
        $('.col-lantai').each(function(ix){
          var i = $(this).html();
          var j = i % 10,
          k = i % 100;
          if (j == 1 && k != 11) {
              $(this).text(i + "st Floor");
          }else if (j == 2 && k != 12) {
              $(this).text(i + "nd Floor");
          }else if (j == 3 && k != 13) {
              $(this).text(i + "rd Floor");
          }else{
              $(this).text(i + "th Floor");
          }
        });                
      });

    function startTime() {
    	var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    	var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        var today = new Date();
        var _hari = today.getDay();
        var _bulan = today.getMonth();
        var _tahun = today.getYear();
        var tanggal = today.getDate();
        var hari = hari[_hari];
        var bulan = bulan[_bulan];
        var tahun = (_tahun<1000)? _tahun+1900:_tahun;
        document.getElementById('date').innerHTML =
        hari + ", " + tanggal + " " + bulan + " " + tahun;

        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + " : " + m + " : " + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }

     function conf(){
            if(confirm("Anda yakin untuk menghapus ?")){
                return true;

            }else{
                window.close();
                return false;
            }
        }
        function acc_conf(){
            if(confirm("Anda yakin untuk melakukan approve permintaan booking ini ?")){
                return true;

            }else{
                window.close();
                return false;
            }
        }

        function rej_conf(){
            if(confirm("Anda yakin untuk melakukan reject permintaan booking ini ?")){
                return true;

            }else{
                window.close();
                return false;
            }
        }

</script>