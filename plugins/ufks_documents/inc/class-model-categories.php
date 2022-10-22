<?php
class UfksDocumentsModelCategories {

    public $id;
    public $name;

    /**
     * Run
     */
    public function __construct(){

    }



    public function get($id){
        global $wpdb;

        $query = "SELECT * FROM `" . UFKS_DOCUMENTS_DB_TABLE_NAME_CATEGORIES . "` WHERE id = '" . $id . "' LIMIT 1";
        $row = $wpdb->get_row($query, 'OBJECT');

        $this->id = $id;
        $this->name = is_null($row->name) ? '' : $row->name;

        return $this;
    }

    public function get_list(){
        global $wpdb;

        $query = "SELECT * FROM `" . UFKS_DOCUMENTS_DB_TABLE_NAME_CATEGORIES . "`";
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
            UFKS_DOCUMENTS_DB_TABLE_NAME_CATEGORIES,
            [
                'id' => $id
            ]
        );
    }

    protected function add(){
        global $wpdb;

        return $wpdb->insert(
            UFKS_DOCUMENTS_DB_TABLE_NAME_CATEGORIES,
            [
                'name' => $this->name
            ]
        );
    }

    protected function edit(){
        global $wpdb;

        return 	$wpdb->update(
            UFKS_DOCUMENTS_DB_TABLE_NAME_CATEGORIES,
            [
                'name' => $this->name
            ],
            [
                'id' => $this->id
            ]
        );
    }

}
