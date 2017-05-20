<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="googlebot" content="index,follow">

    <!-- Title -->
    <title>XL Tingroom</title>

    <!-- Templates core CSS -->
    <link href="<?php echo base_url('assets/css/application2.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" rel="stylesheet" type="text/css"> -->

    <link href="<?php echo base_url('assets/css/jquery.mobile.datepicker.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/jquery.mobile.datepicker.theme.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Favicons -->
    <link rel="icon"  href="<?php echo base_url('assets/img/logo-small-icon.png') ?>" >

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

    .button__badge {
      background-color: #fa3e3e;
      border-radius: 2px;
      color: white;
     
      padding: 1px 3px;
      font-size: 10px;
      
      position: absolute; /* Position the badge within the relatively positioned button */
      top: 0;
      right: 0;
    }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Modernizr Scripts -->
    <script src="<?php echo base_url('assets/js/modernizr-2.7.1.min.js') ?>"></script>
  </head>
  <body class="sign-in-up" id="to-top">

    <!-- Sign In/Sign Up section -->
    <section class="sign-in-up-section">

      <div class="container">

        <div class="row">

          <div class="col-md-12">

            <!-- Logo -->
            <figure class="text-center">
              <a href="<?php echo site_url('apps') ?>">
                <img class="img-logo-small" src="<?php echo base_url('assets/img/logo-small.png') ?>" alt="">
              </a>
            </figure> <!-- /.text-center -->
            
          </div> <!-- /.col-md-12 -->

        </div> <!-- /.row -->

        <div class="col-xs-12 container-button">
          <div class="col-xs-4 button-menu">
            <a href="<?php echo site_url('apps/') ?>" ><i class="fa fa-bookmark fa-fw <?php echo isset($apps)?'fa-active':null; ?>"></i>Booking</a>
          </div>
          <div class="col-xs-4 button-menu">
            <a href="<?php echo site_url('history/') ?>" ><i class="fa fa-clock-o fa-fw <?php echo isset($history)?'fa-active':null; ?>">
            <?php if(isset($notifUnread[0]['notif'])&&($notifUnread[0]['notif']>0)){ ?>
              <span class="button__badge"><?php echo $notifUnread[0]['notif']; ?></span>
            <?php } ?>
            </i>History
            </a>
          </div>
          <div class="col-xs-4 button-menu">
            <a href="<?php echo site_url('setting/') ?>" ><i class="fa fa-gear fa-fw <?php echo isset($setting)?'fa-active':null; ?>"></i>Setting</a>
          </div>
        </div>