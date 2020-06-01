<?php 
    include_once realpath(__DIR__)."/../lib/database.php";
    include_once realpath(__DIR__)."/../helpers/format.php";
?>
<?php 
    class User{
        private $fm;
        private $db;

        function __construct()
        {
            $this->fm = new Format();
            $this->db = new Database();
        }
    }
?>