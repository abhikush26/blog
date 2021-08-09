<?php
if($_SESSION['userrole'] == 0){
    header("Location: http://localhost/blog/admin/post.php");
};
include 'config.php';
$user_id = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = {$user_id}";

mysqli_query($conn,$sql) or die('query unsuccesful');

header("Location: http://localhost/blog/admin/users.php");

mysqli_close($conn);

?>