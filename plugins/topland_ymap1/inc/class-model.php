<?php
class ToplandYmapModel {

public $id;      // (int)
public $name;    // название (tinytext)
public $url;     // сайт (tinytext)
public $image_attachment_id; // фото (int)

/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . TOPLAND_YMAP_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->name 	= is_null($row->name) ? '' : $row->name;
	$this->url 		= is_null($row->url) ? '' : $row->url;
	$this->image_attachment_id = is_null($row->image_attachment_id) ? '' : $row->image_attachment_id;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . TOPLAND_YMAP_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
}

public function get_image_attachment_filepath($image_attachment_id){
	if (is_null($image_attachment_id) || empty($image_attachment_id) || ($image_attachment_id == 0))
		return plugins_url( TOPLAND_YMAP_PLUGIN_NAME . '/static/images/no-avatar.png' ) ;
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
				TOPLAND_YMAP_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

protected function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				TOPLAND_YMAP_DB_TABLE_NAME,
				[
					'name' 		=> $this->name,
					'url'   	=> $this->url,
					'image_attachment_id' => $this->image_attachment_id
				]
			);
	return $rows_affected;
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
				TOPLAND_YMAP_DB_TABLE_NAME,
				[
					'name' 		=> $this->name,
					'url'   	=> $this->url,
					'image_attachment_id' => $this->image_attachment_id
				],
				[
					'id' => $this->id
				]
			);
}

}
