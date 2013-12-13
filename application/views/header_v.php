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
		
		<!-- Font Awesome's CDN -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="/hci-foodiary/static/css/global.css" >
		<link rel="stylesheet" type="text/css" href="/hci-foodiary/static/css/foodiary_w.css" >
		


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		
		<!-- Front Page -->
	</head>

	<body>
		<div id="wrapper">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/hci-foodiary">Foodiary</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav pull">
							<li>
								<a href="/hci-foodiary/new_food"><i class="fa fa-plus"></i> New</a>
							</li>
							<li>
								<a href="/hci-foodiary/me"><i class="fa fa-user"></i> Me</a>
							</li>
						</ul>
						<div id="login_info" class="pull-right">
<?php
	if( @$this->session->userdata('loggded_in') == TRUE ) {
		$ses_user=$this->session->userdata('User');
?>
							<img src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" width="30" height="30"/> <p><?php echo $ses_user['name']; ?></p>';	
							<a href="'.$this->session->userdata('logout').'">Logout</a>';
<?php 
}
else {
?>
							<a href="/hci-foodiary/facebook_login" id="login_btn"  class="btn btn-default" role="button">Log In</a>
<?php
}
?>
						</div>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		
		
