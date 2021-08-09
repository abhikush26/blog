<aside class="sidebar">
                    <div class="categories">
                        <h2>Categories</h2>
                        <ul class="categories_list">
                        <?php
                              include 'config.php';
                              $sql = "SELECT * FROM category";
                              $result = mysqli_query($conn,$sql) or die('query unsuccesful');
                              if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                              ?>
                            <li data-aos="fade-left" class="list_item">
                                <a href="category.php?cat=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a><span>(<?php echo $row['post']; ?>)</span>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="popular_post">
                        <h2>Popular</h2>
                        <?php
                    include 'config.php';
                    $sql1 = "SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.username,post.category,post.post_img,post.author FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    ORDER BY post.post_id DESC LIMIT 0,5";
                        $result1 = mysqli_query($conn,$sql1) or die("query unsuccesful");
                        if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                        ?>
                        <div class="post-content" data-aos="flip-up">
                            <div class="post-image">
                                <div>
                                <img src="<?php echo  'admin/upload/' . $row1['post_img']; ?>" alt="" class="img">
                                </div>
                                <div class="post-info">
                                <span><i class="fa fa-calendar text-gray">&nbsp;&nbsp;<?php echo $row1['post_date'];?></i></span>
                                <span>3 Comments</span>
                            </div>
                            </div>
                            <div class="post-title">
                            <a href="single.php?page=<?php echo $row1['post_id'];?>"><?php echo $row1['title'];?></a>
                        </div>
                        </div>
                        <?php }
                             } ?>
                    </div>
                    <div class="newsletter" data-aos="fade-up" data-aos-delay="100">
                        <h2>NewsLetter</h2>
                        <div class="form_element">
                            <form action="">
                                <input type="text" class="input_element" placeholder="Email">
                                <button class="btn form_btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="popular_tag">
                        <h2>Popular Tags</h2>
                        <div class="tags">
                            <span data-aos="flip-up" data-aos-delay="100" class="tag">Software</span>
                            <span data-aos="flip-up" data-aos-delay="200" class="tag">Shopping</span>
                            <span data-aos="flip-up" data-aos-delay="300" class="tag">Lifestyle</span>
                            <span data-aos="flip-up" data-aos-delay="400" class="tag">Travel</span>
                            <span data-aos="flip-up" data-aos-delay="500" class="tag">Design</span>
                            <span data-aos="flip-up" data-aos-delay="600" class="tag">Illustration</span>
                            <span data-aos="flip-up" data-aos-delay="700" class="tag">Love</span>
                            <span data-aos="flip-up" data-aos-delay="800" class="tag">Project</span>
                        </div>
                    </div>
                </aside>