<?php 
if($this->session->userdata('admin_id')) :
     redirect("Main/index");
   endif;
?><!DOCTYPE html>
<html>
<head>
	<title><?= $Title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/style.css') ?>">
</head>
<body>

<div class="modal fade"  data-keyboard="false" data-backdrop="static" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
					 <p style="color:red"><?php echo $this->session->flashdata('error'); ?></p> 

				  <form action="<?= $action ?>" method="<?= $method ?>">
					<input type="text" name="email" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(function (){
$('#login-modal').modal('show'); 
  })
  </script>
</html>

