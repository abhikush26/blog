<?php include "header.php";
if ($_SESSION['userrole'] == 0) {
    header("Location: http://localhost/blog/admin/post.php");
};
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                include 'config.php';
                $cat = $_GET['id'];
                $sql1 = "SELECT * FROM category WHERE  category_id = {$cat}";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="cat_id" class="form-control" value="<?php echo $row['category_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>" placeholder="" required>
                            </div>
                            <?php
                            if(isset($_POST['submit'])) {
                                include 'config.php';
                                $cat_id = $_POST['cat_id'];
                                $cat_name = $_POST['cat_name'];
                                $sql = "UPDATE category SET category_id = {$cat_id} ,category_name = '{$cat_name}' WHERE category_id = {$cat_id}";
                                if (mysqli_query($conn, $sql)) {
                                    header("Location: http://localhost/blog/admin/category.php");
                                }
                            }
                            ?>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>