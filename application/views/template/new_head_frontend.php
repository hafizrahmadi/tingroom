<!DOCTYPE html>
<html>
<head>
  <title>Tingroom - Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
    <link href="<?php echo base_url('assets/css/jquery.mobile.datepicker.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/jquery.mobile.datepicker.theme.css') ?>" rel="stylesheet" type="text/css" />

  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/tingroom.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/datepicker.css') ?>" rel="stylesheet" media="screen">
    <link rel="icon" href="<?php echo base_url('assets/img/icons/favico-no-box.png') ?>">

    <style>
    .accepted{
      background-color:#f1c40f;
    }
    .rejected{
      background-color:#BA0000;
    }
    .completed{
      background-color:#292B2C;
    }

    </style>
</head>
<body class="bg-img">
  <div class="container-fluid no-padding container-grey">
    <div class="col-md-12 col-sm-12 nav-top navbar-fixed-top">
      <ul class="nav nav-pills pull-right">
              <a href="<?php echo site_url('Apps/') ?>" ><i class="fa fa-home fa-2x"></i> <?php echo $session['nama'] ?></a>
          </ul>
          <ul class="nav nav-pills pull-left">
              <li><a href="<?php echo site_url('Apps/') ?>" class="logo-xl-axiata"></a></li>
          </ul>
    </div>
    
    <div class="col-md-3  col-sm-4 no-padding container-side-nav">
      <div class="fixed-side-nav">
        <div class="side-nav-logo"></div>
        <div class="side-nav <?php echo isset($apps)?'active':null; ?>" >
          <div class="nav-box" data-href="<?php echo site_url('Apps/') ?>">Booking</div>
          <div class="nav-icon nav-chair"><i class="fa fa-bookmark fa-lg"></i></div>
        </div>
        <div class="side-nav <?php echo isset($history)?'active':null; ?>">
          <div class="nav-box" data-href="<?php echo site_url('History/') ?>">History 
          <?php if(isset($notifUnread[0]['notif'])&&($notifUnread[0]['notif']>0)){ ?>
              <span class="badge red"><?php echo $notifUnread[0]['notif']; ?></span>
            <?php } ?>
          </div>
          <div class="nav-icon nav-chair"><i class="fa fa-clock-o fa-lg"></i></div>
        </div>
        <div class="side-nav <?php echo isset($setting)?'active':null; ?>">
          <div class="nav-box" data-href="<?php echo site_url('Setting/') ?>">Setting</div>
          <div class="nav-icon nav-chair"><i class="fa fa-gear fa-lg"></i></div>
        </div>
      </div>
    </div>

    <div class="col-md-5 col-md-offset-2 col-sm-7 col-sm-offset-0 col-xs-12 main-content">
      <div class="container-tittle-bar">
      <?php if(isset($apps)){?>

            <div class="tittle-bar">Booking</div>
            <div class="tittle-icon"><i class="fa fa-gear fa-lg"></i></div>

        <?php }else if(isset($history)){?>

            <div class="tittle-bar">History</div>
            <div class="tittle-icon"><i class="fa fa-clock-o fa-lg"></i></div>

          <?php }else if(isset($setting)){?>
            <div class="tittle-bar">Setting</div>
            <div class="tittle-icon"><i class="fa fa-gear fa-lg"></i></div>
          <?php } ?>
        
      </div>
      <div class=" col-sm-12 container-button">
            <div class="col-xs-4 col-sm-4 button-menu">
              <a href="<?php echo site_url('Apps/') ?>" ><i class="fa fa-bookmark fa-fw <?php echo isset($apps)?'fa-active':null; ?>"></i>Booking</a>
            </div>
            <div class="col-xs-4 col-sm-4  button-menu">
                <a href="<?php echo site_url('History/') ?>" ><i class="fa fa-clock-o fa-fw <?php echo isset($history)?'fa-active':null; ?>"></i>History 
                <?php if(isset($notifUnread[0]['notif'])&&($notifUnread[0]['notif']>0)){ ?>
              <span class="badge red relative"><?php echo $notifUnread[0]['notif']; ?></span>
                <?php } ?>
            </div>
            <div class="col-xs-4 col-sm-4 button-menu">
                <a href="<?php echo site_url('Setting/') ?>" ><i class="fa fa-gear fa-fw <?php echo isset($setting)?'fa-active':null; ?>"></i>Setting</a>
            </div>
          </div>