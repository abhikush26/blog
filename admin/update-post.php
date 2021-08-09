<?php include "header.php";
include 'config.php';
if($_SESSION['userrole'] == 0){
    $sql2 = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
    $result2 = mysqli_query($conn,$sql2) or die('query unsuccesful : query 1');
    $row2 = mysqli_fetch_assoc($result2);
    if($row2['author'] != $_SESSION['userid']){
        header("Location: http://localhost/blog/admin/post.php");
    }
}



$post_id = $_GET['id'];
$sql = "SELECT * FROM post
LEFT JOIN category ON post.category = category.category_id
WHERE  Post_id = {$post_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="admin-heading">Update Post</h1>
                </div>
                <div class="col-md-offset-3 col-md-6">
                    <!-- Form for show edit-->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <form action="save_update_post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputUsername" value="<?php echo $row['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Description</label>
                                <textarea name="postdesc" class="form-control" required rows="5">
                <?php echo $row['description'] ?>
                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategory">Category</label>
                                <select class="form-control" name="category">
                                    <?php
                                    include 'config.php';
                                    $sql1 = "SELECT * FROM category";
                                    $result1 = mysqli_query($conn, $sql1) or die('query unsuccesful');
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)){
                                            if($row['category'] == $row1['category_id']){
                                                $selected = "selected";
                                            }else{
                                                $selected = "";
                                            }
                                    ?>
                                            <option <?php echo $selected ?> value="<?php echo $row1['category_id']; ?>"><?php echo $row1['category_name']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Post image</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $row['post_img']; ?>" height="150px">
                                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                            <input type="hidden" name="old_category" value="<?php echo $row['category_id']; ?>">
                        </form>
                <?php }
                } ?>
                <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>