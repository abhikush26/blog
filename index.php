    <!----------------------header--------------->
    <?php include 'header.php'; ?>
    <!-- Main site section -->
    <main>
        <!------------site title-------------->
        <?php include 'site_title.php'; ?>
        <!----------  --site title-------------->
        <!--------------Blog carousel------------->
        <section>
            <div class="blog">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-1.jpg" alt="post1">
                            <div class="blog-title">
                                <h3>London Fasion week's continue the evolution</h3>
                                <button class="btn blog-btn">Fashion</button>
                                <span>2 minuites</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="zoom-in" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-2.jpg" alt="post1">
                            <div class="blog-title">
                                <h3>London Fasion week's continue the evolution</h3>
                                <button class="btn blog-btn">Fashion</button>
                                <span>2 minuites</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-3.jpg" alt="post1">
                            <div class="blog-title">
                                <h3>London Fasion week's continue the evolution</h3>
                                <button class="btn blog-btn">Fashion</button>
                                <span>2 minuites</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <img src="./assets/Blog-post/post-5.png" alt="post1">
                            <div class="blog-title">
                                <h3>London Fasion week's continue the evolution</h3>
                                <button class="btn blog-btn">Fashion</button>
                                <span>2 minuites</span>
                            </div>
                        </div>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fa fa-arrow-circle-left"></i></span>
                        <span class="owl-nav-next"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </div>
            </div>
        </section>
        <!--------------Blog carousel------------->

        <!--------------site content------------>

        <section class="container">
            <div class="site-content">
                <div class="posts">
                    <?php
                    include 'config.php';
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $limit = 3;
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.username,post.category,post.post_img,post.author FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
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
                                <span><i class="fas fa-user text-gray">&nbsp;&nbsp;<a href="author.php?author=<?php echo $row['author'];?>"><?php echo $row['username'];?></a></i></span>
                                <span><i class="fa fa-calendar text-gray">&nbsp;&nbsp;<?php echo $row['post_date'];?></i></span>
                                <span>3 Comments</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="single.php?page=<?php echo $row['post_id']; ?>"><?php echo $row['title'];?></a>
                            <p><?php echo substr($row['description'],0,500) . "...";?></p>
                            <a href="single.php?page=<?php echo $row['post_id']; ?>"><button class="btn post-btn">read more &nbsp;<i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                    <?php
                  include 'config.php';
                  $sql1 = "SELECT * FROM post";
                  $result1 = mysqli_query($conn,$sql1);
                  if(mysqli_num_rows($result1) > 0){
                    $total_record = mysqli_num_rows($result1 );
                    $total_page = ceil($total_record / $limit);
                    echo "<div class='pagination flex_row'>";
                    if($page > 1){
                        echo '<a class="pages" href="index.php?page='.($page - 1).'"><i class="fa fa-chevron-left"></i></a>';
                    };
                    for($i = 1;$i <= $total_page;$i++){
                        if($i == $page){
                            $active = "active1";
                        }else{
                            $active = "";
                        }
                        echo '<a class="pages '.$active.'" href="index.php?page='.$i.'">'.$i.'</a>';
                    }
                    if($page < $total_page){
                        echo '<a class="pages" href="index.php?page='.($page + 1) .'"><i class="fa fa-chevron-right"></i></a>';
                    };
                    echo '</div>';
                  }
                  ?>
                </div>
                <!-- ------------sidebar------------ -->
                <?php include 'sidebar.php'; ?>
            </div>
        </section>
    </main>
    <!---------------------main--------------------->

    <!--------------footer------------- -->

    <?php include 'footer.php'; ?>