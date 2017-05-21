<?php $this->load->view('template/new_head_frontend'); ?>

    <div class="content-booking-2">
        <div class="box-dgrey no-padding-top-bot menu-history">
                <div class="row no-padding">
                  <div class="col-xs-6 bt-progress <?php echo isset($inprogress)?'active':null; ?>" data-href="<?php echo site_url('history/') ?>">IN PROGRESS</div>
                  <div class="col-xs-6 bt-progress <?php echo isset($completed)?'active':null; ?>" data-href="<?php echo site_url('history/completed') ?>">COMPLETED</div>
                </div>
            </div>
            
            <?php if(empty($booking)){ ?>
              <center><span>Tidak ada data</span></center>
            <?php }else{ ?>
              <?php foreach ($booking as $key => $value) { ?>
            <div class="col-xs-9 box-green no-pointer no-padding">
                <div class="col-xs-4 t-bold"><?php echo $value['nama_ruangan']; ?></div>
                <div class="col-xs-8 t-white green-dark"><?php echo ucwords($value['nama_gedung'])." <span class='col-lantai'>".$value['nama_lantai']."</span>" ; ?></div>
            </div>
            <div class="col-xs-3 box-side <?php echo ($value['status']==2)?'rejected t-white':null; ?> <?php echo ($value['status']==3)?'completed t-white':null; ?>">
            <?php 
            if ($value['status']==3) {
              echo "<b>Completed</b>";
            } else if ($value['status']==2){
              echo "<b>Rejected</b>";
            }
            ?>
          </div>
          <?php 
              $no = 1;
              foreach ($det_booking as $keyx => $valuex) { 
                if ($valuex['id_booking']==$value['id_booking']) {
            ?>
            <div class="col-xs-12 " >
                <div class="col-xs-1 box-green t-white t-center border-right"><?php echo $no; ?></div>
                <div class="col-xs-11 box-green padding t-white ">
                  <span class="f-left"><?php echo $valuex['jam_awal'].' - '.$valuex['jam_akhir'] ?></span>
                  <span class="f-right"><?php echo date('d M Y',strtotime($value['waktu'])); ?></span>
                </div>
            </div>
            <?php 
                $no++; 
                }
              } 
            ?>
            <div class="col-xs-12">
              <div class="col-xs-1"></div>
              <div class="col-xs-11 no-padding">
                <textarea class="form-control textarea" rows="5" id="t_description" disabled><?php echo $value['deskripsi'] ?></textarea>
              </div>  
            </div>
          <div class="col-xs-12 separator-line"></div>
          <?php 
              }
            }
           ?>
            
            
      </div>
    </div>


<?php $this->load->view('template/new_foot_frontend'); ?>