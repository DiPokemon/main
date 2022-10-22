<?php
class UfksSportsFacilitiesModel {

public $id;     // (int)
public $title;  // название (tinytext)
public $address;// адрес (tinytext)
public $phone;  // телефон (tinytext)
public $lat;    // широта (double(16, 10))
public $lng;	// долгота (double(16, 10))


/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_SPORTSFACILITIES_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->title 	= is_null($row->title)   ? '' : $row->title;
	$this->address  = is_null($row->address) ? '' : $row->address;
	$this->phone 	= is_null($row->phone)   ? '' : $row->phone;
	$this->lat 	= is_null($row->lat)   ? '' : $row->lat;
	$this->lng 	= is_null($row->lng)   ? '' : $row->lng;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_SPORTSFACILITIES_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
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
				UFKS_SPORTSFACILITIES_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

protected function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				UFKS_SPORTSFACILITIES_DB_TABLE_NAME,
				[
					'title' 	=> $this->title,
					'address'   => $this->address,
					'phone'     => $this->phone,
					'lat' 		=> $this->lat,
					'lng'  		=> $this->lng
				]
			);
	return $rows_affected;
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
				UFKS_SPORTSFACILITIES_DB_TABLE_NAME,
				[
					'title' 	=> $this->title,
					'address'   => $this->address,
					'phone'     => $this->phone,
					'lat' 		=> $this->lat,
					'lng'  		=> $this->lng
				],
				[
					'id' => $this->id
				]
			);
}

}
