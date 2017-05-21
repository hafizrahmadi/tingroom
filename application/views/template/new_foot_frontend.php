
		<footer class="navbar-fixed-bottom footer"></footer>
	</div>



	<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    <script type="text/javascript">
    	var curCheckedRoom = "";
    	$('div[data-href]').on("click", function() {
        	document.location = $(this).data('href');
      	});
    </script>

    <script type="text/javascript">
      var curCheckedRoom = "";
      $('div[data-href]').on("click", function() {
          document.location = $(this).data('href');
        });
      $('button[data-href]').on("click", function() {
          alert("Room ID = " + $('#' + curCheckedRoom).attr('value'));
          document.location = $(this).data('href');
        });
        $('input:checkbox').click( function(){
          var parentID = $(this).parents("div").eq(2).attr('id');
          var val_room = $('#'+parentID).attr("value");
          if( $(this).is(':checked') ) {
            if (curCheckedRoom == "") {
                curCheckedRoom = parentID;
                $("input[name='t_roomID']").val(val_room);
              }else{
                if (curCheckedRoom != parentID) {
                    var wConfirm1 = confirm("Oops, anda sudah memilih ruangan lain :( . Lanjutkan ?");
                    if (wConfirm1) {
                      $('#' + curCheckedRoom +' > div > div > input ').each(function () { 
                          $(this).prop("checked", false);
                      });
                      curCheckedRoom = parentID;
                      $("input[name='t_roomID']").val(val_room);
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
    <script type="text/javascript">
      $('tr[data-href]').on("click", function() {
            document.location = $(this).data('href');
        });
        $('div[data-href]').on("click", function() {
          document.location = $(this).data('href');
        });
    //     $(document).ready(function () {
    //     $('#datepicker').datepicker({
    //         startDate: 'today',
    //         endDate: '+90d',
    //         autoclose: true,
    //         todayHighlight: true
    //     });
    // });

    </script>
    
</body>
</html>