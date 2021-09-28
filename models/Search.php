<?php

class Search extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function searchData($id) {
        $query = "SELECT * FROM user WHERE user_id='$id'";
        return $this->db->searchQuery($query);
    }
    
}
?>