<!--------------Blog carousel------------->
<section>
            <div class="blog">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                         <?php
                         include 'config.php';
                         $sql = "SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.username,post.category,post.post_img,post.author FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    ORDER BY post.post_id DESC LIMIT 0,3";
                             $result = mysqli_query($conn,$sql) or die("query unsuccesful");
                             if(mysqli_num_rows($result) > 0){
                                 while($row = mysqli_fetch_assoc($result)){
                         ?>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                        <img src="<?php echo  'admin/upload/' . $row['post_img']; ?>" alt="card" class="img">
                            <div class="blog-title">
                                <h3><?php echo $row['title']; ?></h3>
                                <button class="btn blog-btn"><?php echo $row['category_name']; ?></button>
                                <span>2 minuites</span>
                            </div>
                        </div>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fa fa-arrow-circle-left"></i></span>
                        <span class="owl-nav-next"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                    <?php }
                                  } ?>
                </div>
            </div>
        </section>
        <!--------------Blog carousel------------->