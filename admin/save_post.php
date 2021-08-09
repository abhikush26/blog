<?php
    include 'config.php';
    if(isset($_FILES['fileToUpload'])){
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_size = $_FILES['fileToUpload']['size'];
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
    session_start();
    $title = mysqli_real_escape_string($conn,$_POST['post_title']);
    $desc = mysqli_real_escape_string($conn,$_POST['post_desc']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $date = date("d M,Y");
    $author = mysqli_real_escape_string($conn,$_SESSION['userid']);
    $sql = "INSERT INTO post(title,description,category,post_date,author,post_img) VALUES ('{$title}','{$desc}','{$category}','{$date}','{$author}','{$file_name}');";
    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = $category";
    mysqli_multi_query($conn, $sql) or die('query usuccessful');
    header("Location: http://localhost/blog/admin/post.php");
?>