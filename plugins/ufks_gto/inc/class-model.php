<?php
class UfksGtoModel {

public $id;
public $attachment_id;

/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_GTO_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id = $id;
	$this->attachment_id = is_null($row->attachment_id) ? '' : $row->attachment_id;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_GTO_DB_TABLE_NAME . "`";
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

	return $wpdb->delete(
        UFKS_GTO_DB_TABLE_NAME,
        [
            'id' => $id
        ]
    );
}

protected function add(){
	global $wpdb;

    return $wpdb->insert(
        UFKS_GTO_DB_TABLE_NAME,
        [
            'attachment_id' => $this->attachment_id
        ]
    );
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
        UFKS_GTO_DB_TABLE_NAME,
        [
            'attachment_id' => $this->attachment_id
        ],
        [
            'id' => $this->id
        ]
    );
}

}
