<?php $this->load->view('template/head_frontend'); ?>

        <div class="row container-content">
        <div class="col-xs-12">
          Ini adalah aplikasi yang dirancang oleh Facility Management untuk memudahkan anda melakukan reservasi ruang meeting. Happy worklife :)
          <table class="table table-grey" >
            <tbody>
            <?php foreach ($lantai as $key) { ?>
                  <tr data-href="<?php echo site_url('apps/booking/'.$key['id_lantai']) ?>" >
                    <td><?php echo ucwords($key['nama_gedung']); ?></td>
                    <td class="col-lantai"><?php echo $key['nama_lantai'];  ?></td>
                    <td >▼</td> 
                  </tr>
            <?php } ?>  
            </tbody>
          </table>
          <!-- <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
          <div id="demo" class="collapse">ciluk ba</div> -->
        </div>



      </div>
        
      </div> <!-- /.container -->

    </section> <!-- /.sign-in-up-section -->
    
<?php $this->load->view('template/foot_frontend'); ?>