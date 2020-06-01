<?php include_once realpath(__DIR__)."/../helpers/format.php";?>
<?php include_once realpath(__DIR__)."/../lib/database.php"?>

<?php
class Category
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    //insert category into database
    public function insert_category($category)
    {
        $category = $this->fm->validation($category);
        $category = mysqli_real_escape_string($this->db->link, $category);

        if(empty($category)){
            $alert = "<span class='error'>Category empty</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_category(catName) VALUES (N'$category') ";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Insert category successful</span>";
                return $alert;
            }
            else{
                return; "<span class='error'>Insert category fail</span>";
            }
        }
    }

    //show category into interface admin
    function show_category (){
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC ";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    function edit_category($category_id, $category_name){
        $category_name = $this->fm->validation($category_name);
        $category_name = stripslashes($category_name);
        $category_name = mysqli_real_escape_string($this->db->link, $category_name);
        $category_id = mysqli_real_escape_string($this->db->link, $category_id);
        if(empty($category_name)){
            return "<span class = 'error'>Category must be not empty</span>";
        }else{
            $query = "UPDATE tbl_category SET catName = '$category_name' where catId = $category_id";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'success'>Edit successful</span>";
                return $alert;
            }
            else{
                $alert = "<span class = 'error'>Edit fail</span>";
                return $alert;
            }
        }
    }

    function delete_category($category_id){
        $query = "DELETE FROM tbl_category WHERE catId = $category_id";
        $result = $this->db->delete($query);
        return $result;
    }

    function getCategory($category_Id){
        $query = "SELECT catName FROM tbl_category WHERE catID = $category_Id";
        $result = $this->db->getX($query);
        return $result['catName'];
    }
}
?>