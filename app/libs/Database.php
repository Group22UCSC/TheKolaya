<?php

class Database extends PDO{

    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASSWORD);
    }

    //In there you can define database queiries as pre define functions
    public function runQuery($query) {
        $stmt = $this->prepare($query);

        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    public function insertQuery($query){
        $stmt = $this->prepare($query);

        return $stmt->execute();
    }

    public function selectQuery($query) {
        $stmt = $this->prepare($query);

        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteQuery($query){
        $stmt = $this->prepare($query);

        return $stmt->execute();
    }
    public function updateQuery($query){
        $stmt = $this->prepare($query);

        return $stmt->execute();
    }
}

?>