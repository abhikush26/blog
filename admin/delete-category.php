<?php
if($_SESSION['userrole'] == 0){
    header("Location: http://localhost/blog/admin/post.php");
};
include 'config.php';
$cat_id = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id = {$cat_id}";

mysqli_query($conn,$sql) or die('query unsuccesful');

header("Location: http://localhost/blog/admin/category.php");

mysqli_close($conn);

?>