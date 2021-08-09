<?php
include 'config.php';

$page = basename($_SERVER['PHP_SELF']);
switch($page){
    case 'single.php';
    if(isset($_GET['page'])){
        $sql_title = "SELECT * FROM post WHERE post.post_id = {$_GET['page']}";
        $result_title = mysqli_query($conn,$sql_title) or die('title query failed');
        $row = mysqli_fetch_assoc($result_title);
        $title = $row['title'];
    }else{
        echo 'no post found';
    }
    break;
    case 'author.php';
    if(isset($_GET['author'])){
        $sql_title = "SELECT * FROM user WHERE user.user_id = {$_GET['author']}";
        $result_title = mysqli_query($conn,$sql_title) or die('title query failed');
        $row = mysqli_fetch_assoc($result_title);
        $title = 'News By ' . $row['first_name'] . ' ' . $row['last_name'];
    }else{
        echo 'no post found';
    }
    break;
    case 'category.php';
    if(isset($_GET['cat'])){
        $sql_title = "SELECT * FROM category WHERE category.category_id = {$_GET['cat']}";
        $result_title = mysqli_query($conn,$sql_title) or die('title query failed');
        $row = mysqli_fetch_assoc($result_title);
        $title = $row['category_name'] . ' Blog';
    }else{
        echo 'no post found';
    }
    break;
    case 'search.php';
    if(isset($_GET['search'])){
        $title = 'Showing Result For ' . $_GET['search'];
    }else{
        echo 'no post found';
    }
    break;
    default:
    $title = "Abhishek's Blog";

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <!-- owl crousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <!--------navigation------->
    <nav class="nav">
        <div class="nav_menu flex_row">
            <div class="nav_brand">
                <a href="index.php">Blogger</a>
            </div>
            <div class="toggle_collapse">
                <div class="toggle_icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav_items">
                    <li class="nav_link">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="nav_link">
                        <a href="#">Categories</a>
                    </li>
                    <li class="nav_link">
                        <a href="#">Archive</a>
                    </li>
                    <li class="nav_link">
                        <a href="#">Pages</a>
                    </li>
                    <li class="nav_link">
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="search_bar">
                <form action="search.php" method="GET">
                <div class="form_element">
                    <input name="search" type="text" placeholder="Search here..."><button type="submit"><i class="fa fa-search"></i></button>
                </div>
                </form>
            </div>
            <div class="social text_gray">
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>
    </nav>
    <!--------navigation------->