<div id="foods_page" class="mainWrapper">
	<div id="food_container">
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
	        <div class="item  col-xs-4 col-lg-4">
	            <div class="thumbnail" id="grid_thumb">
	               <a href="<?php echo '/hci-foodiary/foods/record/'.$lt->id ?>" class="food_record_link">
	               		<img id="food_img" class="group list-group-image" src="<?php echo $thumb_img; ?>" alt="" />
	               </a>
	                <div class="caption">
	                    <div class="row">
	                        <div class="col-md-7">
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
	                            <p class="food_names"><?php echo $food_name; ?></p>
	                        </div>
	                        <div class="col-md-5">
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