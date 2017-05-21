<?php $this->load->view('template/new_head_frontend') ?>
    <div class="content-booking-2">
        <div class="box-dgrey no-padding-top-bot menu-history">
                <div class="row no-padding">
                  <div class="col-xs-6 bt-progress <?php echo isset($setedit)?'active':null ?>" data-href="<?php echo site_url('setting/') ?>">EDIT</div>
                  <div class="col-xs-6 bt-progress <?php echo isset($setlogout)?'active':null ?>" data-href="<?php echo site_url('setting/logout') ?>">LOGOUT</div>
                </div>
            </div>
            
            
              
              <div class="col-xs-8 col-xs-offset-2 ">
                <div class="logo-tingroom"></div>
                <span class="center-big">Terimakasih</span>
                <div class="col-xs-12  center-small">Anda telah menggunakan layanan Tingroom dari FM, semoga bisa memudahkan pekerjaan anda</div>
                <a href="<?php echo site_url('auth/logout'); ?>"><button class="btn btn-block btn-turquoise" type="submit" style="background-color: #C7C7C8;font-size: 15px;font-weight: bold;margin-top: 60px;"><i class="fa fa-lock fa-fw "></i> Logout</button></a>
            </div>

      </div>
    </div>

<?php $this->load->view('template/new_foot_frontend') ?>