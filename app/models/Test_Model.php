<?php

class Test extends Model {

    function __construct()
    {
        parent::__construct();
    }
    

    function getData() {
        $query = "SELECT * from users";
        return $this->db->searchQuery($query);
    }
}
?>