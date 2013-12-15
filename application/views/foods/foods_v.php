<div id="foods_page" class="mainWrapper">
	<div id="foods_container">
		<div id="foods" class="row list-group">
<?php
$i=1;
foreach ($list as $lt)
{
	$file_info = explode(".", $lt->file_name);
	if(is_file('./uploads/'.$file_info[0]."_thumb.".$file_info[1]))
	{
		$thumb_img = '/hci-foodiary/uploads/'.$file_info[0]."_thumb.".$file_info[1];
	}
	else
	{
		$thumb_img = '/hci-foodiary/uploads/'.$lt->file_name;
	}
?>
			<div class="item col-md-4">
	        	<div class="thumb" id="grid_thumb">
	        		<div class="btn-toolbar hidden_btn">
					  	<div class="btn-group">
					  		<button type="button" value="<?php echo $lt->id."&".$lt->user_name; ?>" class="btn btn-default thumbs_btn" role="button"><i class="fa fa-thumbs-up"></i></button>
					  		<button type="button" value="<?php echo $lt->id; ?>" class="btn btn-default share_btn"><i class="fa fa-share-square"></i></button>
					  	</div>
					  	<div class="btn-group">
					  		<button type="button" value="<?php echo $lt->id; ?>" class="btn btn-default del_btn"><i class="fa fa-trash-o"></i></button>
					  	</div>
					</div>
	        		
	            	<a href="<?php echo '/hci-foodiary/foods/record/'.$lt->id ?>" class="food_record_link">
	                	<img id="food_img" class="img-rounded" src="<?php echo $thumb_img; ?>" alt="" />
	               	</a>
	               	<div class="caption user_info_area">
	               		<div class="row">
		               		<div class="col-md-6 col-xs-6">
		               			<img src="<?php echo $lt->user_img; ?>" alt="user_img" class="user_thumb" />
		               			<label for="" class="user_name">
		               				<?php echo $lt->user_name; ?>
		               			</label>
		               			
		               		</div>
		               		<div class="col-md-6 col-xs-6 like_div">
		               			<label class="like_label"><span class="badge like_num"><?php echo $lt->like_num; ?></span> likes</label>
		               		</div>
		               	</div>
	               	</div>
	                <div class="caption food_info_area">
	                    <div class="row">
	                        <div class="col-md-6 col-xs-6">
	                        	<?php 
	                        	if (mb_strlen($lt->food_name, "utf-8") > 14 )
	                        	{
	                        		$food_name = mb_substr($lt->food_name, 0, 14, "utf-8");
									$food_name = $food_name."...";
	                        	}
								else 
								{
									$food_name = $lt->food_name;
								}
	                        	?>
	                        	<span class="label label-primary">Name</span>
	                            <label class="food_names"> <?php echo $food_name; ?></label>
	                        </div>
	                        <div class="col-md-6 col-xs-6">
	                        	<div id="rating bar" class="pull-right">
<?php
$i=0;
for($i=0; $i <$lt->ratings; $i++)
{
	echo '<span class="glyphicon glyphicon-star"></span>';
}
for(; $i < 5; $i++)
{
	echo '<span class="glyphicon glyphicon-star-empty"></span>';
}
?>
								</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
<?php
}
?>
	    </div><!-- #products -->
	</div><!-- #container -->
</div><!-- #mainWrapper -->