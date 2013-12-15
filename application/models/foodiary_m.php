<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Foodiary Model 
 */
class Foodiary_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function add_like_food($user_name, $food_id)
	{
		$insert_array = array(
			'user_name' => $user_name,
			'food_id' => $food_id
		);
		$this->db->insert('like_records', $insert_array);	
	}
	
	function get_like_food_num($user_name, $food_id)
	{
		if($user_name == ""){
			$sql = "SELECT id FROM like_records WHERE food_id='".$food_id."'";
		}
		else {
			$sql = "SELECT id FROM like_records WHERE user_name='".$user_name."' AND food_id='".$food_id."'";
		}
		
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	
	function update_like_num_in_food($id)
	{
		$sql = "SELECT like_num FROM food_records WHERE id='".$id."'";
   		$query = $this->db->query($sql);
		$result = $query->row();
		$cuurent_like_num = $result->like_num;
		$updated_like_num = $cuurent_like_num + 1;
		$data = array(
			'like_num' => $updated_like_num
		);
		
		$this->db->where('id', $id);
		$this->db->update('food_records', $data); 
		
		return $updated_like_num;
	}
	
	function insert_new_food_records($arrays)
	{
		$detail = array (
			'file_size' => (int) $arrays['file_size'],
			'image_width' => $arrays['image_width'],
			'image_height' => $arrays['image_height'],
			'file_ext' => $arrays['file_ext']
		);	
		
		$insert_array = array(
			'user_name' => $arrays['user_name'],
			'user_img' => $arrays['user_img'],
			'file_path' => $arrays['file_path'],
			'file_name' => $arrays['file_name'],
			'original_name' => $arrays['orig_name'],
			'detail_info' => serialize($detail),
			'food_name' => $arrays['food_name'],
			'ratings' => (int) $arrays['ratings'],
			'like_num' => (int) $arrays['like_num'],
			'geo_lat' => $arrays['geo_lat'],
			'geo_long' => $arrays['geo_long'],
			'comments' => $arrays['comments'],
			'reg_date' => date("Y-m-d H:i:s")
		);
		
		$this->db->insert('food_records', $insert_array);
		//$result = $this->db->insert_id();
	}
	
	function get_food($table, $id)
	{
		$sql = "SELECT * FROM ".$table." WHERE id='".$id."'";
   		$query = $this->db->query($sql);
		$result = $query->row();
		return $result;
	}
	
	function get_my_liked_records($table, $offset, $num_of_records, $user_name)
	{
		$limit_query = ' LIMIT '.$offset.', '.$num_of_records;
		
		$sql = "SELECT food_id FROM ".$table." WHERE user_name='".$user_name."' ORDER BY id DESC".$limit_query;
   		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	
	
	function get_food_records($table, $offset, $num_of_records)
	{
		$limit_query = ' LIMIT '.$offset.', '.$num_of_records;
		
		$sql = "SELECT id, user_name, user_img, file_name, food_name, ratings, like_num FROM ".$table." ORDER BY id DESC".$limit_query;
   		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	
}

