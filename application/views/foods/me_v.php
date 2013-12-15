<?php
	$ses_user=$this->session->userdata('User');
?>
<div id="me_page" class="mainWrapper">
	<div id="me_container">
		<div id="me_title">
			<div>About your Profile</div>
		</div>
		<div class="me_body">
			<div class="row">
				<div id="me_user_img" class="col-md-3">
					<img id="user_login_thumb" class="img-circle" src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" />	
				</div>
				<div class="col-md-9">
					<i class="fa fa-user"></i> <?php echo $ses_user['name']; ?>
				</div>
				<div class="col-md-9">
					<i class="fa fa-envelope-o"></i> <?php echo $ses_user['email']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
              		<div class="hero-widget well well-sm">
          				<div class="hero-widget well well-sm">
	          				<div class="icon">
			                     <i class="fa fa-pencil-square-o"></i>
			                </div>
			                <div class="text">
			                    <var><?php echo $liked; ?></var>
			                    <label class="text-muted">records</label>
			                </div>
	  					</div>
  					</div>
  				</div>
  				<div class="col-md-6">
              		<div class="hero-widget well well-sm">
          				<div class="icon">
		                     <i class="fa fa-thumbs-o-up"></i>
		                </div>
		                <div class="text">
		                    <var><?php echo $records; ?></var>
		                    <label class="text-muted">page likes</label>
		                </div>
  					</div>
  				</div>
			</div>
			
			
			
		</div><!--#me_body-->
	</div><!-- #me_container -->
</div><!-- #me_page -->