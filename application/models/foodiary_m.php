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
	
	function insert_new_food_records($arrays)
	{
		$detail = array (
			'file_size' => (int) $arrays['file_size'],
			'image_width' => $arrays['image_width'],
			'image_height' => $arrays['image_height'],
			'file_ext' => $arrays['file_ext']
		);	
		
		$insert_array = array(
			'user_id' => $arrays['user_id'],
			'file_path' => $arrays['file_path'],
			'file_name' => $arrays['file_name'],
			'original_name' => $arrays['orig_name'],
			'detail_info' => serialize($detail),
			'food_name' => $arrays['food_name'],
			'ratings' => (int) $arrays['ratings'],
			'geo_lat' => (float) $arrays['geo_lat'],
			'geo_long' => (float) $arrays['geo_long'],
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
		$result = $query->result();
		return $result;
	}
	
	function get_food_records($table, $num_of_records)
	{
		$offset = 0;
		$limit_query = ' LIMIT '.$offset.', '.$num_of_records;
		
		$sql = "SELECT id, file_name, food_name, ratings FROM ".$table." ORDER BY id DESC".$limit_query;
   		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	
}

?>

