<?php
class UfksDocumentsModel {

public $id;
public $attachment_id;
public $category_id;

/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_DOCUMENTS_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id = $id;
	$this->attachment_id = is_null($row->attachment_id) ? '' : $row->attachment_id;
	$this->category_id = is_null($row->category_id) ? '' : $row->category_id;

	return $this;
}

public function get_list($category_id){
	global $wpdb;

	$query = "SELECT * FROM `" . UFKS_DOCUMENTS_DB_TABLE_NAME . "` WHERE category_id = '" . $category_id . "'";
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
        UFKS_DOCUMENTS_DB_TABLE_NAME,
        [
            'id' => $id
        ]
    );
}

protected function add(){
	global $wpdb;

    return $wpdb->insert(
        UFKS_DOCUMENTS_DB_TABLE_NAME,
        [
            'attachment_id' => $this->attachment_id,
            'category_id' => $this->category_id
        ]
    );
}

protected function edit(){
	global $wpdb;

	return 	$wpdb->update(
        UFKS_DOCUMENTS_DB_TABLE_NAME,
        [
            'attachment_id' => $this->attachment_id,
            'category_id' => $this->category_id
        ],
        [
            'id' => $this->id
        ]
    );
}

}
