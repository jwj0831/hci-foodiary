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
		$data = $this->input->post('data', true);
		$data = json_decode($data);
		$offset = $data->offset;
		$num_of_records = 9;
		$data = $this->foodiary_m->get_food_records('food_records', $offset, $num_of_records);
		$this->returnFoods($data);
	}
	
	function returnFoods($data)
	{
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
			echo '<div class="item  col-xs-4 col-lg-4">
					<div class="thumbnail">
						<a href="/hci-foodiary/foods/record/'.$lt->id.'" class="food_record_link">
							<img id="food_img" class="group list-group-image" src="'.$thumb_img.'" alt="" />
						</a>
							<div class="caption">
								<div class="row">
									<div class="col-md-7">';
			if (mb_strlen($lt->food_name, "utf-8") > 14 )
        	{
        		$food_name = mb_substr($lt->food_name, 0, 14, "utf-8");
				$food_name = $food_name."...";
        	}
			else 
			{
				$food_name = $lt->food_name;
			}
			echo 						'<p class="food_names">'.$food_name.'</p>
									</div>
	                        		<div class="col-md-5">
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