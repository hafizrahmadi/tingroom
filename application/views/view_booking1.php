<?php $this->load->view('template/head_frontend'); ?>

        <div class="row container-content">
        
          <div class="col-xs-12">
            Ini adalah aplikasi yang dirancang oleh Facility Management untuk memudahkan anda melakukan reservasi ruang meeting. Happy worklife :)
          </div>
          <form id="form-lantai" method="post" action="<?php echo site_url('apps/booking/'); ?>">
          <div class="col-xs-12"  style="margin-top:0px;">
                <div class="input-group" style="margin-bottom:0px;">  
                <input type="text" id="datepicker" class="form-control-input" placeholder="Pilih Tanggal Booking." name="waktu">
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-calendar fa-fw" style="margin-left:-5px;"></i></span>
                </div>
          </div>

          <div class="col-xs-12">
            <table class="table table-grey" >
              <tbody>
              <?php foreach ($lantai as $key) { ?>
                    <tr data-href="<?php echo $key['id_lantai'] ?>" >
                      <td><?php echo ucwords($key['nama_gedung']); ?></td>
                      <td class="col-lantai"><?php echo $key['nama_lantai'];  ?></td>
                      <td >▼</td> 
                    </tr>
              <?php } ?>  
              </tbody>
            </table>
            
          </div>
          
            <input type="hidden" name="id_lantai" value="">
          </form>
        
      </div> <!-- /.container -->

    </section> <!-- /.sign-in-up-section -->
    
<?php $this->load->view('template/foot_frontend'); ?>