<?php 
    include 'config.php';
    if(empty($_FILES['new-image']['name'])){
        $file_name = $_POST['old-image'];
    }else{
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_size = $_FILES['new-image']['size'];
        $file_ext = strtolower(end(explode('.',$file_name)));

        $extension = array('jpeg','jpg','png');

        if(in_array($file_ext,$extension) === false){
            $errors[] = "This extention is not allowed, Please choose a jpg or png file.";
        }

        if($file_size > 2097152){
            $errors[] = 'File size must be 2mb or lower';
        }

        if(empty($errors) == true){
            move_uploaded_file($file_tmp,"upload/".$file_name);
        }else{
            header("Location: http://localhost/blog/admin/add-post.php");
            die();
        }
    }
    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $post_desc = $_POST['postdesc'];
    $post_cat = $_POST['category'];

    $sql = "UPDATE post SET post_id = {$post_id}, title = '{$post_title}',description = '{$post_desc}',category = {$post_cat},post_img = '{$file_name}' WHERE post_id = {$post_id};";
    if($_POST['old_category'] != $post_cat){
        $sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old_category']};";
        $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$post_cat};";
    }

    mysqli_multi_query($conn,$sql) or die("query unsuccesful");
        header("Location: http://localhost/blog/admin/post.php");
    
    


?>