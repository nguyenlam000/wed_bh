<?php 
    include_once realpath(__DIR__)."/../lib/database.php";
    include_once realpath(__DIR__)."/../helpers/format.php";
?>
<?php
class Brand
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    //insert brand into database
    public function insert_brand($brand)
    {
        $brand = $this->fm->validation($brand);
        $brand = mysqli_real_escape_string($this->db->link, $brand);

        if(empty($brand)){
            $alert = "<span class='error'>brand empty</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_brand(brandName) VALUES (N'$brand') ";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Insert brand successful</span>";
                return $alert;
            }
            else{
                return; "<span class='error'>Insert brand fail</span>";
            }
        }
    }

    //show brand into interface admin
    function show_brand (){
        $query = "SELECT * FROM tbl_brand ORDER BY brandID DESC ";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    function edit_brand($brand_id, $brand_name){
        $brand_name = $this->fm->validation($brand_name);
        $brand_name = stripslashes($brand_name);
        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
        if(empty($brand_name)){
            return "<span class = 'error'>brand must be not empty</span>";
        }else{
            $query = "UPDATE tbl_brand SET brandName = '$brand_name' where brandID = $brand_id";
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

    function delete_brand($brand_id){
        $query = "DELETE FROM tbl_brand WHERE brandID = $brand_id";
        $result = $this->db->delete($query);
        return $result;
    }

    function getBrand($brand_Id){
        $query = "SELECT brandName FROM tbl_brand WHERE brandID = $brand_Id";
        $result = $this->db->getX($query);
        return $result['brandName'];
    }
}
?>