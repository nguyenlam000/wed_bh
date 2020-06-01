<?php include_once "../classes/brand.php" ?>
<?php include_once "../classes/category.php" ?>
<?php include_once "../classes/product.php" ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $product = new Product();
        $result_add = $product->insert_product($_POST, $_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            
            <form action="productadd.php" method="post" enctype="multipart/form-data">
                <?php 
                    if(isset($result_add)){
                        echo $result_add;
                    }
                ?>
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name='productName' placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="select_category">
                                <option value="" >Select Category</option>
                                <?php
                                $category = new Category();
                                $result = $category->show_category();
                                if ($result) {
                                    while ($result_row = $result->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $result_row['catId'] ?>"><?php echo $result_row['catName'] ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="select_brand">
                                <option value="">Select Brand</option>
                                <?php
                                $brand = new Brand();
                                $result = $brand->show_brand();
                                if ($result) {
                                    while ($result_row = $result->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $result_row['brandId'] ?>"><?php echo $result_row['brandName'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="desc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="upload"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="select_type">
                                <option value="">Select Type</option>
                                <option value="0">Featured</option>
                                <option value="1">Non-Featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>