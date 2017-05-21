<?php $this->load->view('template/new_head_frontend') ?>
    <div class="content-booking-2">
        <div class="box-dgrey no-padding-top-bot menu-history">
                <div class="row no-padding">
                  <div class="col-xs-6 bt-progress <?php echo isset($setedit)?'active':null ?>" data-href="<?php echo site_url('setting/') ?>">EDIT</div>
                  <div class="col-xs-6 bt-progress <?php echo isset($setlogout)?'active':null ?>" data-href="<?php echo site_url('setting/logout') ?>">LOGOUT</div>
                </div>
            </div>
            
            <div class="col-xs-12 soft-grey">
                <div class="col-xs-12 name-big" ><?php echo $user[0]['nama'] ?></div>
                <div class="col-xs-12 name-email"><?php echo $user[0]['email'] ?></div>
                <div class="col-xs-12">
                    <div class="f-left"><?php echo $user[0]['no_hp'] ?></div>
                    <div class="f-right link-turquoise" data-href="http://google.com">EDIT</div>
                </div>
            </div>
              
              <div class="col-xs-12 soft-grey" style="margin-top: 20px;">
            
              <div class="col-xs-2"><i class="fa fa-question fa-fw "></i></div>
              <div class="col-xs-10 line-bot">FAQ</div>

              <div class="col-xs-2"><i class="fa fa-lock fa-fw "></i></div>
              <div class="col-xs-10 line-bot">Change Password</div>
<!-- 
              <div class="col-xs-2"><i class="fa fa-language fa-fw "></i></div>
              <div class="col-xs-10 line-bot">Change Language</div>

              <div class="col-xs-2"><i class="fa fa-map-marker fa-fw "></i></div>
              <div class="col-xs-10 ">Floor Location</div> -->
            
            
          </div>

              

      </div>
    </div>
<?php $this->load->view('template/new_foot_frontend') ?>