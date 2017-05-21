<?php $this->load->view('template/new_head_frontend') ?>
    <div class="content-booking-2">
        <div class="box-dgrey no-padding-top-bot menu-history">
                <div class="row no-padding">
                  <div class="col-xs-6 bt-progress <?php echo isset($setedit)?'active':null ?>" data-href="<?php echo site_url('setting/') ?>">EDIT</div>
                  <div class="col-xs-6 bt-progress <?php echo isset($setlogout)?'active':null ?>" data-href="<?php echo site_url('setting/logout') ?>">LOGOUT</div>
                </div>
            </div>
            
            <div class="col-xs-12 soft-grey">
                    <form action="<?php echo site_url('Setting/proses_editprofile') ?>" method="post">
                        <?php echo form_error('nama'); ?>
                        <div class='input-group signup' style="margin-bottom:10px">
                            <span class="input-group-addon btn-green"><i class="fa fa-user fa-fw "></i> </span> 
                            <input type="text"  class="form-control " placeholder="Name" name="nama" 
                            value="<?php 
                            if (isset($user[0]['nama'])) {
                                echo $user[0]['nama'];
                            }else if(isset($nama)){
                                echo $nama;
                            }
                            ?>" /> 
                        </div>
                        <?php echo form_error('no_hp'); ?>
                        <div class='input-group signup' style="margin-bottom:10px">
                            <span class="input-group-addon btn-green"><i class="fa fa-mobile-phone fa-fw "></i> </span>
                            <input type="text"  class="form-control " placeholder="Mobile phone" name="no_hp" 
                            value="<?php 
                            if (isset($user[0]['no_hp'])) {
                                echo $user[0]['no_hp'];
                            }else if(isset($no_hp)){
                                echo $no_hp;
                            }
                            ?>" /> 
                        </div>
                        <button class="btn btn-green btn-block " type="submit">UPDATE PROFILE</button>
                    </form>
                </div>
                  
                

                

            </div>
        </div>
<?php $this->load->view('template/new_foot_frontend') ?>