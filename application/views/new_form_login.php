<!DOCTYPE html>
<html>
<head>
	<title>Tingroom - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/tingroom.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" media="screen">
    <link rel="icon" href="<?php echo base_url('assets/img/icons/favico-no-box.png') ?>">
</head>
<body>
	<div class="container-fluid bg-img">
		
		<div class="col-md-3 col-sm-5 container-form-login">
			<div class="col-sm-12 logo-mobile-view"></div>
			<form action="<?php echo site_url('auth/login') ?>" method="post">
				<?php echo isset($error_message)?'<center><span style="color:#FF0000;">'.$error_message.'</span></center>':null; ?>

				<?php echo form_error('email') ?>
				<div class="input-group">
	              <span class="input-group-addon addon-green"><i class="fa fa-user fa-fw"></i></span>
	              <input class="form-control form-text login"  name="email" type="email" placeholder="Enter email address" value="<?php echo isset($email)?$email:null; ?>">
	            </div>

	            <?php echo form_error('password') ?>
	            <div class="input-group">
	              <span class="input-group-addon addon-green"><i class="fa fa-lock fa-fw"></i></span>
	              <input class="form-control form-text login"  name="password" type="password" placeholder="Enter password">
	            </div>
	            <button class="btn btn-green btn-block" type="submit">LOG IN</button>
	            <div class="col-md-12 center">
	            	<a href="#" class="link-white link-forgot">Forgot username or password?</a>
	            </div>
	        </form>
	        <!-- <button class="btn btn-orange btn-block btn-sign-up-mobile-view" >SIGN UP</button> -->
		</div>
		<div class="col-md-8 col-md-offset-1 col-sm-7 container-login-logo ">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 logo-tingroom-white"></div>
			<div class="col-md-4 col-md-offset-5 col-sm-6 col-sm-offset-3 tingroom-desc">Tingroom helps you reserve a meeting room effectively to collaborate with team! this platform designed with friendly user interface</div>
			<!-- <div class="col-md-4 col-md-offset-5 col-sm-6 col-sm-offset-3 btn-sign-up"><button class="btn btn-orange btn-block " >SIGN UP</button></div> -->
			
		</div>
	</div>



	<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>