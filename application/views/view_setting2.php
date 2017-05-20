<?php $this->load->view('template/head_frontend') ?>

<div class="row container-content-2" >
        <div class="col-xs-12 no-padding" >
          <div class="box-dgrey no-padding-top-bot menu-history">
            <div class="row no-padding">
              <div class="col-xs-6 bt-progress <?php echo isset($setedit)?'active':null ?>" data-href="<?php echo site_url('setting/') ?>">EDIT</div>
              <div class="col-xs-6 bt-progress <?php echo isset($setlogout)?'active':null ?>" data-href="<?php echo site_url('setting/logout') ?>">LOGOUT</div>
            </div>
          </div>
          

          
          <div class="col-xs-12 ">
            <figure class="text-center">
              <a href="<?php echo site_url('apps/') ?>">
                <img class="img-logo" src="<?php echo base_url('assets/img/logo-tingroom-s.png') ?>" alt="">
              </a>
            </figure>
            <span class="center-big">Terimakasih</span>
            <div class="col-xs-10 col-xs-offset-1 center-small">Anda telah menggunakan layanan Tingroom dari FM, semoga bisa memudahkan pekerjaan anda</div>
            <a href="<?php echo site_url('auth/logout'); ?>"><button class="btn btn-default btn-block" type="submit" style="background-color: #C7C7C8;font-size: 15px;font-weight: bold;margin-top: 60px;"><i class="fa fa-lock fa-fw "></i> Logout</button></a>
          </div>
          
          
        </div>
      </div>

      
        
       
      
      </div> <!-- /.container -->
     
    
    </section> <!-- /.sign-in-up-section -->

<?php $this->load->view('template/foot_frontend') ?>