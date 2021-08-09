<?php include 'header.php'; ?>

    <main>
    <!--------------site content------------>
    <section class="container">
            <div class="site-content">
                <div class="posts">
                    <?php
                    include 'config.php';
                    $page = $_GET['page'];

                    $sql = "SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.first_name,post.category,post.post_img FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    WHERE post.post_id = {$page}";
                        $result = mysqli_query($conn,$sql) or die("query unsuccesful");
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="post-content" data-aos="zoom-in">
                        <div class="post-image">
                            <div>
                                <img src="<?php echo  'admin/upload/' . $row['post_img']; ?>" alt="" class="img">
                            </div>
                            <div class="post-info">
                                <span><i class="fas fa-user text-gray">&nbsp;&nbsp;<?php echo $row['first_name'];?></i></span>
                                <span><i class="fa fa-calendar text-gray">&nbsp;&nbsp;<?php echo $row['post_date'];?></i></span>
                                <span>3 Comments</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#"><?php echo $row['title'];?></a>
                            <p><?php echo $row['description'];?></p>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <!-- ------------sidebar------------ -->
                <?php include 'sidebar.php'; ?>
            </div>
        </section>
    </main>
        <?php include 'footer.php'; ?>