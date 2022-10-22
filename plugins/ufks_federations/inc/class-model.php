<?php
class UfksFederationsModel {

public $id;      // (int)
public $name;    // название (tinytext)
public $address; // адрес (tinytext)
public $phone;   // телефон (tinytext)
public $email;   // e-mail (tinytext)
public $site_url;// сайт (tinytext)
public $chief_fullname;      // ФИО руководителя (tinytext)
public $image_attachment_id; // фото (int)


/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_FEDERATIONS_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->name 	= is_null($row->name) ? '' : $row->name;
	$this->address  = is_null($row->address) ? '' : $row->address;
	$this->phone 	= is_null($row->phone) ? '' : $row->phone;
	$this->email 	= is_null($row->email) ? '' : $row->email;
	$this->site_url = is_null($row->site_url) ? '' : $row->site_url;
	$this->chief_fullname 	   = is_null($row->chief_fullname) ? '' : $row->chief_fullname;
	$this->image_attachment_id = is_null($row->image_attachment_id) ? '' : $row->image_attachment_id;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_FEDERATIONS_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
}

public function get_image_attachment_filepath($image_attachment_id){
	if (is_null($image_attachment_id) || empty($image_attachment_id) || ($image_attachment_id == 0))
		return plugins_url( UFKS_FEDERATIONS_PLUGIN_NAME . '/static/images/no-avatar.png' ) ;
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
				UFKS_FEDERATIONS_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

protected function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				UFKS_FEDERATIONS_DB_TABLE_NAME,
				[
					'name' 		=> $this->name,
					'address'   => $this->address,
					'phone'     => $this->phone,
					'email' 	=> $this->email,
					'site_url'  => $this->site_url,
					'chief_fullname'      => $this->chief_fullname,
					'image_attachment_id' => $this->image_attachment_id
				]
			);
	return $rows_affected;
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
				UFKS_FEDERATIONS_DB_TABLE_NAME,
				[
					'name' 		=> $this->name,
					'address'   => $this->address,
					'phone'     => $this->phone,
					'email' 	=> $this->email,
					'site_url'  => $this->site_url,
					'chief_fullname'      => $this->chief_fullname,
					'image_attachment_id' => $this->image_attachment_id
				],
				[
					'id' => $this->id
				]
			);
}

}
