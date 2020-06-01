
<?php include_once realpath(__DIR__)."/../config/config.php"; ?>
<?php
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $dbname = DB_NAME;
    public $pass = DB_PASS;

    public $link; //save connect database
    public $error; //return connect database error

    //construct get connect
    public function __construct()
    {
        $this->connectDB();
    }

    //create connect to db
    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }

    //select or read data return result in database
    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //insert data to db
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    //update data on db
    public function update($query)
    {
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    //delete data on db
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }

    public function getX($query){
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if($result){
            return $result->fetch_assoc();
        }
        return $result;
       
    }
}
?>