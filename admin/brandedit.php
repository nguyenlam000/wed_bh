<?php include "../classes/brand.php"; ?>
<?php
$brand = new Brand();
$brandId = $_GET['brandId'];
$brandName = $_GET['brandName'];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $result_insert = $brand->edit_brand($brandId, $_POST['brandName']);
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit brand</h2>
        <div class="block copyblock">
            <?php
             if($_SERVER['REQUEST_METHOD'] === "POST"){
                 echo $result_insert;
             }
            ?>
            <form action="brandedit.php?brandId=<?php echo $brandId;?>&brandName=<?php echo $brandName?>" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text"  value="<?php if(!isset($_POST['submit'])){echo $brandName;}?>" name="brandName" placeholder="Enter Brand Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Edit" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>