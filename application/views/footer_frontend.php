
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript">
      $('tr[data-href]').on("click", function() {
          document.location = $(this).data('href');
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
  </body>
</html>
