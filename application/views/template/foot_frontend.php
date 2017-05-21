
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!--<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>-->
    <script src="<?php echo base_url('assets/js/datepicker.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jquery.mobile.datepicker.js') ?>" type="text/javascript"></script>
    
    
    <script type="text/javascript">

    $('div[data-href]').on("click", function() {
          document.location = $(this).data('href');
      });
    
      $('tr[data-href]').on("click", function() {
        $("input[name='id_lantai']").val($(this).data('href'));
        $("#form-lantai").submit();
      });

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
      

    </script>
    <script type="text/javascript">
      var curCheckedRoom = "";

      $('button[data-href]').on("click", function() {
          //document.location = $(this).data('href');
          // alert("Room ID = " + $('#' + curCheckedRoom).attr('value'));
      });
      $('input:checkbox').click( function(){
         var parentID = $(this).parents("div").eq(2).attr('id');
         var val_room = $('#'+parentID).attr("value");
         if( $(this).is(':checked') ) {
          if (curCheckedRoom == "") {
            curCheckedRoom = parentID;
            $("input[name='id_ruangan']").val(val_room);
          }else{
            if (curCheckedRoom != parentID) {
              var wConfirm1 = confirm("Oops, anda sudah memilih ruangan lain :( . Lanjutkan ?");
              if (wConfirm1) {
                $('#' + curCheckedRoom +' > div > div > input ').each(function () { 
                  $(this).prop("checked", false);
                });
                curCheckedRoom = parentID;
                $("input[name='id_ruangan']").val(val_room);
              }else{
                $(this).prop("checked", false);
              }
            }
          }
        }else{
          var allUncheck = true;
          $('#' + parentID +' > div > div > input ').each(function () { 
            if( $(this).is(':checked') ) {
              allUncheck = false;
            }
          });
          if (allUncheck) {
            curCheckedRoom = "";
            $("input[name='t_roomID']").val("");
          }
        }
      });
      


    </script>
    
    
    <script>
    var maxdate;

    $(document).ready(function(){
      var d = new Date();
      var day = d.getDay();
      // var day = 1;
      if (day==4||day==5||day==6) {
        maxdate = '+4d';
      }else if(day==0){
        maxdate = '+3d';
      }else {
        maxdate = '+2d';
      }
          $( "#datepicker" ).datepicker({
              dateFormat: 'dd-mm-yy',
              minDate: 'now',
              maxDate: maxdate,              
              beforeShowDay: $.datepicker.noWeekends,              
        });
    });

  

    </script>

    
  </body>
</html>
