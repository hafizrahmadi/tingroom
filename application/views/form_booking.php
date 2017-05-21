<?php $this->load->view('template/head_frontend') ?>

<div class="row container-content-2" >
        <div class="col-xs-12 no-padding" >
          <div class="box-dgrey"><?php echo ucwords($ruangan[0]['nama_gedung'])." <span class='col-lantai'>".$ruangan[0]['nama_lantai']."</span>" ; ?> - For <b style="color:#f39c12;"><?php echo date('d M Y',strtotime($waktu)) ?></b></div>
          

          <div class="col-xs-12 box-green no-pointer" >
            <div class="col-xs-3 t-bold"><?php echo $ruangan[0]['nama_ruangan']; ?></div>
            <div class="col-xs-3 t-white i-board"><?php echo ($ruangan[0]['board']<2?$ruangan[0]['board'].' Unit':$ruangan[0]['board'].' Units') ?></div>
            <div class="col-xs-3 t-white i-projector"><?php echo $ruangan[0]['proyektor']==0?"None":"Available" ?></div>
            <div class="col-xs-3 t-white i-chair"><?php echo $ruangan[0]['kapasitas'] ?> person</div>
          </div>
          <form method="post" action="<?php echo site_url('apps/proses_book') ?>">
          <div class="col-xs-12 no-pointer" >
            <div class="funkyradio">
            <?php foreach ($jadwal as $key => $value) { ?>
              <div class="funkyradio-default">
                  <input type="checkbox" name="jadwal[]" id="checkbox1_<?php echo $key; ?>" checked value="<?php echo $value['id_jadwal'] ?>"/>
                  <label for="checkbox1_<?php echo $key; ?>">
                  <span><?php echo $value['jam_awal'].' - '.$value['jam_akhir'] ?></span>
                  
                  </label>
              </div>
              <?php } ?>
              <!-- <div class="funkyradio-default">
                  <input type="checkbox" name="jadwal[]" id="checkbox1_2" checked />
                  <label for="checkbox1_2">
                  <span>10.00 am - 11.00 am</span>
                  
                  </label>
              </div> -->
              
            </div>
          </div>

           
          
          <div class="col-xs-12">
            <div class="form-group">
              <input type="hidden" name="waktu" value="<?php echo $waktu ?>">
              <textarea class="form-control textarea" rows="5" id="t_description" name="deskripsi" placeholder="Masukkan deskripsi booking (perihal booking)"></textarea>
              <button class="btn  btn-block btn-turquoise"  data-href="">Continue</button> 
            </div>
          </div>
          </form>
          
        </div>
      </div>

      
        
       
      
      </div> <!-- /.container -->
     
    
    </section> <!-- /.sign-in-up-section -->

<?php $this->load->view('template/foot_frontend') ?>