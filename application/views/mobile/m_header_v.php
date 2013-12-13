<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

		<title>Starter Template for Bootstrap</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap-theme.min.css">

		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="/hci-foodiary/static/css/global.css" >
		<link rel="stylesheet" type="text/css" href="/hci-foodiary/static/css/foodiary_m.css" >
		<!--
		<script>
			$(document).ready(function(){
				$('ahref="' + this.location.pathname + '"]'.parent().addClass('active');
			})
			
		</script>
		-->
		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav pull">
							<li>
								<a href="/hci-foodiary/new_food"><i class="fa fa-plus"></i> New</a>
							</li>
							<li>
								<a href="/hci-foodiary/me"><i class="fa fa-user"></i> Me</a>
							</li>
						</ul>
						
<?php
	if( @$this->session->userdata('logged_in') == TRUE ) {
		$ses_user=$this->session->userdata('User');
?>
					<div id="logged_info" class="login_out_info col-md-3 pull-right">
							<img src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" width="30" height="30"/> <label id="user_name"><?php echo $ses_user['name']; ?></label>	
							<a href="<?php echo $this->session->userdata('logout'); ?>" id="logout_btn"  class="btn btn-default" role="button">Log Out</a>
					</div>
<?php 
}
else {
?>						<div id="login_info" class="login_out_info pull-right">
							<a href="/hci-foodiary/facebook_login" id="login_btn"  class="btn btn-default" role="button">Log In</a>
						</div>
<?php
}
?>
						
					</div><!--/.nav-collapse -->
				</div>
			</div>