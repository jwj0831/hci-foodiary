<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxFood extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('foodiary_m');
	}

	function index()
	{
		
	}
	
	function likeFood() {
		$data = $this->input->post('data', true);
		$data = json_decode($data);
		$food_id = $data->food_id;
		$user_name = $data->user_name;
		
		$check_val = $this->foodiary_m->get_like_food_num($user_name, $food_id);
		
		if($check_val > 0) {
			//echo "You Already Checked!";
		}
		else {
			$updated_like_num = $this->foodiary_m->update_like_num_in_food($food_id);
			$data = $this->foodiary_m->add_like_food($user_name, $food_id);
			echo $updated_like_num;
		}
	}
	
	
	function getMoreFoods()
	{
		$data = $this->input->post('data', true);
		$data = json_decode($data);
		$offset = $data->offset;
		$num_of_records = 9;
		$data = $this->foodiary_m->get_food_records('food_records', $offset, $num_of_records);
		
		$i=1;
		foreach ($data as $lt)
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
			echo '<div class="item col-md-4">
					<div class="thumbnail">
		        		<div class="btn-toolbar hidden_btn">
						  	<div class="btn-group hover_grp first_hover_grp">
						  		<button type="button" value="'.$lt->id.'&'.$lt->user_name.'" class="btn btn-default thumbs_btn hover_btn" role="button"><i class="fa fa-thumbs-up"></i></button>
					  			<button type="button" value="'.$lt->id.'" class="btn btn-default share_btn hover_btn"><i class="fa fa-share-square"></i></button>
					  		</div>
					  		<div class="btn-group hover_grp">';
							$del_url = "location.href='/hci-foodiary/foods/delete/".$lt->id."'";
		    echo				'<button type="button" onclick="'.$del_url.'" class="btn btn-default del_btn hover_btn"><i class="fa fa-trash-o"></i></button>
					  		</div>
						</div>
	        		
	            		<a href="/hci-foodiary/foods/record/'.$lt->id.'" class="food_record_link">
							<img class="food_img img-rounded" src="'.$thumb_img.'" alt="" />
						</a>
							<div class="caption user_info_area">
								<div class="row">
									<div class="col-md-6 col-xs-6">
		               					<img src="'.$lt->user_img.'" alt="user_img" class="user_thumb" />
		               					<label for="" class="user_name">';
		               					echo $lt->user_name;
		    echo 					   '</label>
		               			
		               				</div>
		               				<div class="col-md-6 col-xs-6 like_div">
		               					<label class="like_label"><span class="badge like_num">'.$lt->like_num.'</span> likes</label>
		               				</div>
		               			</div>
	               			</div>
	                		<div class="caption food_info_area">
	                    		<div class="row">
	                        		<div class="col-md-8 col-xs-7">';
			if (mb_strlen($lt->food_name, "utf-8") > 14 )
        	{
        		$food_name = mb_substr($lt->food_name, 0, 14, "utf-8");
				$food_name = $food_name."...";
        	}
			else 
			{
				$food_name = $lt->food_name;
			}
			echo 					   '<span class="label label-primary">Name</span>
	                           	 		<label class="food_names">'.$food_name.'</label>
	                       		 	</div>
	                        		<div class="col-md-4 col-xs-5">
	                        			<div id="rating bar" class="pull-right">';
			$i=0;
			for($i=0; $i <$lt->ratings; $i++)
			{
				echo 						'<span class="glyphicon glyphicon-star"></span>';
			}
			for(; $i < 5; $i++)
			{
				echo 						'<span class="glyphicon glyphicon-star-empty"></span>';
			}			
			echo 						'</div>
	                        		</div>
	                    		</div>
	                		</div>
	        			</div>
	        		</div>';				
		}
								
	}
	
}