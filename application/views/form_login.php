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
    <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Favicons -->
    <link href="<?php echo base_url('assets/img/LogoTingroomIcon.png') ?>" rel="shortcut icon">

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
              <a href="./index.html">
                <img class="img-logo" src="<?php echo base_url('assets/img/logo tingroom.png') ?>" alt="">
              </a>
            </figure> <!-- /.text-center -->
            
          </div> <!-- /.col-md-12 -->

        </div> <!-- /.row -->




        <section class="sign-in-up-content">

          <div class="row">

            <div class="col-md-12">

              <form class="sign-in-up-form" action="<?php echo site_url('auth/login') ?>" method="post" role="form">
                <!-- <h4 class="text-center" style="font-size: 16px;">Masukkan Email dan Password</h4> -->
                <?php echo isset($error_message)?'<center><span style="color:#FF0000;">'.$error_message.'</span></center>':null; ?>
                <!-- Input 1 -->
                <?php echo form_error('email') ?>
                <div class="input-group">                 
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-envelope fa-fw"></i></span>
                  <input class="form-control" id="exampleInputEmail2" name="email" type="email" 
                    value="<?php echo isset($email)?$email:null; ?>" 
                    placeholder="Enter email address" >
                </div> <!-- /.form-group -->

                <!-- Input 2 -->
                <?php echo form_error('password') ?>
                <div class="input-group">                 
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-unlock-alt fa-fw"></i></span>
                  <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
                </div> <!-- /.form-group -->

                <!-- Button -->
                <button class="btn btn-default btn-block" type="submit" style="background-color: #C7C7C8">Sign In</button>

                <!-- Checkbox -->
                <!-- <section class="text-center">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked> Keep me logged in
                    </label> -->
                  <!-- </div> /.checkbox -->
                <!-- </section> /.text-center -->

                <!-- Sign In/Sign Up links -->
                <section class="sign-in-up-links text-center">
                  <p><a href="./forgot-password.html">Forgot email or password?</a></p>
                </section> <!-- /.sign-in-up-links -->
                
              </form> <!-- /.sign-in-up-form
              
            </div> <!-- /.col-md-12 -->

          </div> <!-- /.row -->
          
        </section> <!-- /.sign-in-up-content -->




        <div class="row">

          <div class="col-md-12">

            <section class="footer-copyright text-center" style="padding: 0px 15px;">

              <a href="<?php echo site_url('auth/signup') ?>"><button class="btn btn-success btn-block" type="submit">Sign Up</button></a>
              
            </section> <!-- /.footer-section -->
            
          </div> <!-- /.col-md-12 -->

        </div> <!-- /.row -->
        
      </div> <!-- /.container -->

    </section> <!-- /.sign-in-up-section -->
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
  </body>
</html>
