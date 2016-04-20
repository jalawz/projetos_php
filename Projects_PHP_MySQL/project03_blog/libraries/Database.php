<?php

class Database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbName = DB_NAME;
    
    public $link;
    public $error;
    
    /**
     * 
     * Class Constructor
     */
    public function __construct() {        
        // Call Connect Functions
        $this->connect();
    }
    
    /**
     * Connector
     */
    private function connect() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
        
        if(!$this->link) {
            $this->error = "Connection Failed: " . $this->link->connect_error;
            return false;
        }
    }

    /**
     * @param $query
     * @return bool
     * Select Method
     */
    public function select($query) {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    
    /**
     * Insert
     */
    public function insert($query) {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate Insert
        if($insert_row) {
            header("Location: index.php?msg=".urlencode('Record Added'));
            exit();
        } else {
            die('Error: (' . $this->link->errno . '( ' . $this->link->error);
        }
    }
    
    /**
     * Update
     */
    public function update($query) {
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate Update
        if($update_row) {
            header("Location: index.php?msg=".urlencode('Record Updated'));
            exit();
        } else {
            die('Error: (' . $this->link->errno . '( ' . $this->link->error);
        }
    }
    
    /**
     * Delete
     */
    public function delete($query) {
        $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate Deletion
        if($delete_row) {
            header("Location: index.php?msg=".urlencode('Record Deleted'));
            exit();
        } else {
            die('Error: (' . $this->link->errno . '( ' . $this->link->error);
        }
    }
}
