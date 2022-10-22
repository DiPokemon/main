<?php
class UfksManagementModel {

public $id;
public $fullname;
public $job_position;
public $phone;
public $image_attachment_id;

/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_MANAGEMENT_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		    = $id;
	$this->fullname     = is_null($row->fullname) ? '' : $row->fullname;
	$this->job_position = is_null($row->job_position) ? '' : $row->job_position;
	$this->phone 	    = is_null($row->phone) ? '' : $row->phone;
	$this->image_attachment_id = is_null($row->image_attachment_id) ? '' : $row->image_attachment_id;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_MANAGEMENT_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
}

public function get_image_attachment_filepath($image_attachment_id){
	if (is_null($image_attachment_id) || empty($image_attachment_id) || ($image_attachment_id == 0))
		return plugins_url( UFKS_MANAGEMENT_PLUGIN_NAME . '/static/images/no-avatar.png' ) ;
	else
		return wp_get_attachment_url($image_attachment_id);
}



public function save(){
	global $wpdb;

	if (is_null($this->id))
		$this->add();
	else
		$this->edit();

	return $this;
}

public function delete($id){
	global $wpdb;

	return  $wpdb->delete(
				UFKS_MANAGEMENT_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

protected function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				UFKS_MANAGEMENT_DB_TABLE_NAME,
				[
					'fullname' 		=> $this->fullname,
					'job_position'  => $this->job_position,
					'phone' 		=> $this->phone,
					'image_attachment_id' => $this->image_attachment_id
				]
			);
	return $rows_affected;
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
				UFKS_MANAGEMENT_DB_TABLE_NAME,
				[
					'fullname' 		=> $this->fullname,
					'job_position'  => $this->job_position,
					'phone' 		=> $this->phone,
					'image_attachment_id' => $this->image_attachment_id
				],
				[
					'id' => $this->id
				]
			);
}

}
