<?php
class ToplandReviewsModel {

public $id;     // (int)
public $name;  // имя (tinytext)
public $last_name;// фамилия(tinytext)
public $position;  // должность (tinytext)
public $text;    // текст (text)



/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . TOPLAND_REVIEWS_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->name 	= is_null($row->name)   ? '' : $row->name;
	$this->last_name  = is_null($row->last_name) ? '' : $row->last_name;
	$this->position 	= is_null($row->position)   ? '' : $row->position;
	$this->text 	= is_null($row->text)   ? '' : $row->text;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . TOPLAND_REVIEWS_DB_TABLE_NAME . "`";
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
				TOPLAND_REVIEWS_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

protected function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				TOPLAND_REVIEWS_DB_TABLE_NAME,
				[
					'name' 	=> $this->name,
					'last_name'   => $this->last_name,
					'position'     => $this->position,
					'text' 		=> $this->text					
				]
			);
	return $rows_affected;
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
				TOPLAND_REVIEWS_DB_TABLE_NAME,
				[
					'name' 	=> $this->name,
					'last_name'   => $this->last_name,
					'position'     => $this->position,
					'text' 		=> $this->text
				],
				[
					'id' => $this->id
				]
			);
}

}
