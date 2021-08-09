<?php
    include 'config.php';
    $post_id = $_GET['id'];
    $cat_id = $_GET['cat_id'];

    $sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn,$sql1) or die("query unsuccesful");
    $row = mysqli_fetch_assoc($result);
    
    unlink("upload/" . $row['post_img']);
    
    $sql = "DELETE FROM post WHERE post_id = {$post_id};";
    $sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id}";
    
    mysqli_multi_query($conn,$sql) or die('query unsuccesful');
    
    header("Location: http://localhost/blog/admin/post.php");
    
    mysqli_close($conn);

?>