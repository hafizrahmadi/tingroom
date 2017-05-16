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
    <!-- <link href="images/favicon/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
    <link href="images/favicon/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
    <link href="images/favicon/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="114x114"> -->

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

              <form class="sign-in-up-form" action="<?php echo site_url('auth/proses_signup') ?>" method="post" role="form">
                <!-- <h4 class="text-center" style="font-size: 16px;">Masukkan Email dan Password</h4> -->
                <?php echo isset($error_message)?'<center><span style="color:#FF0000;">'.$error_message.'</span></center>':null; ?>
                <!-- Input 1 -->
                
                <div class="form-group">
                  <label for="InputNama">Nama<span style="color:red;">*</span></label> <?php echo form_error('nama'); ?>
                  <div class="input-group">                 
                    <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-user fa-fw"></i></span>
                    <input class="form-control" id="exampleInputNama" name="nama" type="text" 
                      value="<?php echo isset($nama)?$nama:null; ?>" 
                      placeholder="Masukkan nama anda" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="InputEmail">Email<span style="color:red;">*</span></label> <?php echo form_error('email'); ?>
                  <div class="input-group">                 
                    <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-envelope fa-fw"></i></span>
                    <input class="form-control" id="exampleInputEmail2" name="email" type="email" 
                      value="<?php echo isset($email)?$email:null; ?>" 
                      placeholder="Masukkan alamat email" >
                  </div> <!-- /.form-group -->
                </div>

                <!-- Input 2 -->
                <div class="form-group">
                  <label for="InputPassword">Password<span style="color:red;">*</span></label> <?php echo form_error('password'); ?>
                  <div class="input-group">                 
                    <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-unlock-alt fa-fw"></i></span>
                    <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Masukkan password" value="<?php echo isset($password)?$password:null; ?>" >
                  </div> <!-- /.form-group -->
                </div>

                <div class="form-group">
                  <label for="InputConfPassword">Konfirmasi Password<span style="color:red;">*</span></label> <?php echo form_error('conf_password'); ?>
                  <div class="input-group">                 
                    <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-unlock-alt fa-fw"></i></span>
                    <input class="form-control" id="exampleInputConfPassword1" type="password" name="conf_password" placeholder="Masukkan kembali password" value="<?php echo isset($conf_password)?$conf_password:null; ?>" >
                  </div> <!-- /.form-group -->
                </div>
            
                <div class="form-group">
                  <label for="InputNoHp">Nomor Handphone<span style="color:red;">*</span></label> <?php echo form_error('no_hp'); ?>
                <div class="input-group">                 
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-mobile-phone fa-fw"></i></span>
                  <input class="form-control" id="exampleInputNoHP" name="no_hp" type="tel" 
                    value="<?php echo isset($no_hp)?$no_hp:null; ?>" 
                    placeholder="Masukkan nomor handphone" >
                </div>

                <div class="form-group">
                <label for="InputUnit">Unit<span style="color:red;">*</span></label> <?php echo form_error('id_unit'); ?>
                  <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-group fa-fw"></i></span>
                  <select class="form-control" name="id_unit" <?php echo isset($id_lantai)?"disabled='disabled'":null; ?>>
                    <option disabled selected value>Pilih Unit</option>
                      <?php  foreach ($unit as $value) { ?>
                        <option value="<?php  echo $value['id_unit'] ?>" <?php echo (isset($id_unit)&&$id_unit==$value['id_unit'])?"selected=selected":null;?>> <?php  echo $value['nama_unit'] ?></option>
                      <?php  } ?>                  
                  </select>
                  </div>
                </div>

                <div class="form-group">
                <label for="InputUnit">Lokasi<span style="color:red;">*</span></label> <?php echo form_error('id_lantai'); ?>
                  <div class="input-group">                 
                    <span class="input-group-addon" id="basic-addon1" style="background-color: #C7C7C8"><i class="fa fa-map-marker fa-fw"></i></span>
                    <select class="form-control" name="id_lantai" <?php echo isset($id_lantai)?"disabled='disabled'":null; ?>>
                      <option disabled selected value>Pilih lantai</option>
                        <?php  foreach ($lantai as $value) { ?>
                          <option value="<?php  echo $value['id_lantai'] ?>" <?php echo (isset($id_lantai)&&$id_lantai==$value['id_lantai'])?"selected=selected":null;?>> <?php  echo $value['nama_gedung'].' / '.$value['nama_lantai'] ?></option>
                        <?php  } ?>                  
                    </select>
                  </div>
                </div>



                <!-- Button -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>

                <!-- Checkbox -->
                <!-- <section class="text-center">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked> Keep me logged in
                    </label> -->
                  <!-- </div> /.checkbox -->
                <!-- </section> /.text-center -->

                <!-- Sign In/Sign Up links -->
                
                
              </form> <!-- /.sign-in-up-form
              
            </div> <!-- /.col-md-12 -->

          </div> <!-- /.row -->
          
        </section> <!-- /.sign-in-up-content -->

        
      </div> <!-- /.container -->

    </section> <!-- /.sign-in-up-section -->
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
  </body>
</html>