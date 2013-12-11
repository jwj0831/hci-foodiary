<div id="foods_page" class="mainWrapper">
	<div id="container" class="container">
		<div id="products" class="row list-group">
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
	            <div class="thumbnail">
	                <img id="food_img" class="group list-group-image" src="<?php echo $thumb_img; ?>" alt="" />
	                <div class="caption">
	                    <div class="row">
	                        <div class="col-xs-12 col-md-6">
	                            <p class="food_names"><?php echo $lt->food_name; ?></p>
	                        </div>
	                        <div class="col-xs-12 col-md-6 pull-right">
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
<?php
}
?>
	    </div><!-- #products -->
	</div><!-- #container -->
</div><!-- #mainWrapper -->