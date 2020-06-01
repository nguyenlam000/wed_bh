<?php include_once realpath(__DIR__)."/../helpers/format.php"; ?>
<?php include_once realpath(__DIR__)."/../lib/database.php"; ?>
<?php
class Product
{
    private $fm;
    private $db;

    function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    public function insert_product($data,$file)
    {
         $productName = $this->fm->validation($data['productName']);
         $select_category = $this->fm->validation($data['select_category']);
         $select_brand = $this->fm->validation($data['select_brand']);
         $desc = $this->fm->validation($data['desc']);
         $price = $this->fm->validation($data['price']);
         $select_type = $this->fm->validation($data['select_type']);

         $file_tmp = $file['upload']['tmp_name'];
         $file_name = $file['upload']['name'];
         $file_error = $file['upload']['error'];
         $arry_file_name = explode(".", $file_name);
         $file_ext = strtolower(end($arry_file_name));
         $file_image = substr(md5(time()), 0, 10).".".$file_ext;
         $file_upload = "upload/".$file_image;
        if($productName == "" || $select_category == "" || $select_brand == "" || $select_type == "" || $desc == "" || $price == "" || $file_error != 0){
            $alert = "<span class='error'>Field not be empty</span>";
            return $alert;
        }else{
            move_uploaded_file($file_tmp, $file_upload);
            $query = "INSERT INTO tbl_product(productName, product_code, productQuantity, product_soldout, product_remain, catId, brandId, product_desc, type_product, price, image_product) VALUES (N'$productName','M','10','0','10',N'$select_category',N'$select_brand',N'$desc', '$select_type',N'$price','$file_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Insert product successful</span>";
                return $alert;
            }
            else{
                return; "<span class='error'>Insert product fail</span>";
            }
        }
    }

    //show product into interface admin
    function show_product (){
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC ";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }else{
            return false;
        }   
    }

    function edit_product($data, $file, $productId){
        $productName = $this->fm->validation($data['productName']);
        $select_category = $this->fm->validation($data['select_category']);
        $select_brand = $this->fm->validation($data['select_brand']);
        $desc = $this->fm->validation($data['desc']);
        $select_type = $this->fm->validation($data['select_type']);
        $price = $this->fm->validation($data['price']); 

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $select_category = mysqli_real_escape_string($this->db->link, $select_category);
        $select_brand = mysqli_real_escape_string($this->db->link, $select_brand);
        $desc = mysqli_real_escape_string($this->db->link, $desc);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $select_type = mysqli_real_escape_string($this->db->link, $select_type);
        $file_tmp = $file['upload']['tmp_name'];
        $file_name = $file['upload']['name'];
        $arry_file_name = explode(".", $file_name);
        $file_ext = strtolower(end($arry_file_name));
        $file_image = substr(md5(time()), 0, 10).".".$file_ext;
        $file_upload = "upload/".$file_image;
        $file_error = $file['upload']["error"];

        if($productName == "" || $select_category == "" || $select_brand == "" || $select_type == "" || $desc == "" || $price == "" || $file_error != 0){
            return "<span class = 'error'>Field must be not empty</span>";
        }else{
            $query = "UPDATE tbl_product SET productName = '$productName', catId = '$select_category', brandId = '$select_brand', product_desc = '$desc', type_product = '$select_type', price = '$price', image_product = '$file_image' WHERE productId = '$productId'";
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

    function delete_product($product_id){
        $query = "DELETE FROM tbl_product WHERE productId = $product_id";
        $result = $this->db->delete($query);
        return $result;
    }

    function show_product_feature(){
        $query = "SELECT * FROM tbl_product WHERE type_product = 0";
        $result = $this->db->select($query);
        return $result;
    }

}
?>
