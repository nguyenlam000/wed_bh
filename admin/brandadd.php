
<?php include "../classes/brand.php";?>
<?php 
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $result_insert = $brand->insert_brand($_POST['brandName']);
    }
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
               <?php 
                    if(isset($result_insert)){
                        echo $result_insert;
                    }
               ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>