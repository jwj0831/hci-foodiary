<div id="me_page" class="mainWrapper">
	<div id="me_container">
		<div id="me_title">
			<div>About your Profile</div>
		</div>
		<div class="me_body">
			<div>
				<img id="user_login_thumb" src="https://graph.facebook.com/<?php echo $ses_user['id']; ?>/picture" /> <label id="user_name"><?php echo $ses_user['name']; ?></label>	
			</div>
			<div>
				<?php echo $ses_user['name']; ?>
			</div>
			<div>
				<?php echo $ses_user['email']; ?>
			</div>
			<div>
				<?php echo $ses_user['email']; ?>
			</div>
			<div>
				<?php echo $ses_user['link']; ?>
			</div>
			v
		</div><!--#me_body-->
	</div><!-- #me_container -->
</div><!-- #me_page -->