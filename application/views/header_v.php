<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

		<title>Welcome to Foodiary</title>
	
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
						<a href="/hci-foodiary/new_food" id="new_btn" class="navbar-toggle btn-default pull-left"><i class="fa fa-plus"></i></a>
						<a href="/hci-foodiary/recommend" id="recommend_btn" class="navbar-toggle btn-default pull-left"><i class="fa fa-thumbs-o-up"></i></a>
<?php
	if( @$this->session->userdata('logged_in') == TRUE ) {
		$ses_user=$this->session->userdata('User');
?>	

						<a href="/hci-foodiary/me" id="me_btn" class="navbar-toggle pull-right">
							<img id="user_login_thumb" src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" />
						</a>
<?php 
}
else {
?>	
							<a href="/hci-foodiary/facebook_login" id="login_btn" class="navbar-toggle btn-default" ><span class="glyphicon glyphicon-log-in"></span></a>
						</ul>
<?php
}
?>		
						<a class="navbar-brand" href="/hci-foodiary">Foodiary</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav pull">
							<li id="new_menu">
								<a href="/hci-foodiary/new_food"><span class="glyphicon glyphicon-plus"></span> New</a>
							</li>
							<li id="recommend_menu">
								<a href="/hci-foodiary/recommend"><span class="glyphicon glyphicon-thumbs-up"></span> Recommend</a>
							</li>
<?php
	// NOT Logged In?
	if( @$this->session->userdata('logged_in') != TRUE ) {
		
?>				
							<li id="logged_info">
								<a href="/hci-foodiary/facebook_login" id="login_btn" ><span class="glyphicon glyphicon-log-in"></span> LogIn</a>
							</li>
						</ul>
							
<?php 
}
else {
	$ses_user=$this->session->userdata('User');
?>	
							<li id="logged_info">
								<a href="<?php echo $this->session->userdata('logout'); ?>"><span class="glyphicon glyphicon-log-out"></spans> LogOut</a>
							</li>
						</ul>
						<a href="/hci-foodiary/me" class="pull-right" id="me_btn">
							<img id="user_login_thumb" src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" /> <label id="user_name"><?php echo $ses_user['name']; ?></label>
						</a>
<?php
}
?>
					</div><!-- .nav-collapse -->
				</div><!-- .container-top -->
			</div><!-- .navbar -->