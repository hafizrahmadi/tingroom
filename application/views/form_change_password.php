<?php $this->load->view('template/new_head_frontend') ?>
    <div class="content-booking-2">
        <div class="box-dgrey no-padding-top-bot menu-history">
                <div class="row no-padding">
                  <div class="col-xs-6 bt-progress <?php echo isset($setedit)?'active':null ?>" data-href="<?php echo site_url('setting/') ?>">EDIT</div>
                  <div class="col-xs-6 bt-progress <?php echo isset($setlogout)?'active':null ?>" data-href="<?php echo site_url('setting/logout') ?>">LOGOUT</div>
                </div>
            </div>
            
            <div class="col-xs-12 soft-grey">
                <form action="<?php echo site_url('Setting/proses_changepassword') ?>" method="post">
                <?php echo form_error('old_password'); ?>
            <div class='input-group signup' style="margin-bottom:10px">
                    <span class="input-group-addon btn-green"><i class="fa fa-unlock fa-fw "></i> </span>
                    <input type="password"  class="form-control " name="old_password" placeholder="Old password"  /> 
                </div>
                <?php echo form_error('password'); ?>
                <div class='input-group signup' style="margin-bottom:10px">
                    <span class="input-group-addon btn-green"><i class="fa fa-lock fa-fw "></i> </span>
                    <input type="password"  class="form-control " name="password" placeholder="New password"  /> 
                </div>
                <?php echo form_error('conf_password'); ?>
                <div class='input-group signup' style="margin-bottom:10px">
                    <span class="input-group-addon btn-green"><i class="fa fa-lock fa-fw "></i> </span>
                    <input type="password"  class="form-control " name="conf_password" placeholder="Retype password"  /> 
                </div>
                <button class="btn btn-green btn-block " type="submit">CHANGE PASSWORD</button>
            </form>
            </div>
              
              

              

      </div>
    </div>
<?php $this->load->view('template/new_foot_frontend') ?>