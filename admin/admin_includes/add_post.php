<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
            <?php 
            
                if(isset($_POST['btn_add_post'])){
                    $post_title=$_POST['post_title'];
                    $post_author=$_POST['post_author'];

                    $post_image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];

                    $post_content=$_POST['post_content'];
                    $post_tag=$_POST['post_tag'];

                    $post_cat_id=$_POST['cat_name'];

                    $sql = "insert into posts (post_title,post_author,post_date,post_img,post_content,post_tags,post_cat_id,post_status ) values ('$post_title','$post_author',now(),'$post_image','$post_content','$post_tag', '$post_cat_id','draft')" ; 

                    $result = mysqli_query($con,$sql);
                    if($result){
                        move_uploaded_file($post_temp, "../imgs/$post_image");
                        echo '<p class = "alert alert-success">Post Added: ) </p>';
                    }
                    else{
                        echo "Query Failed";
                    }
                   
                }

            ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                       
                    <form action= "" method ="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" name="post_title" placeholder="post_title" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Author</label>
                                <input type="text" name="post_author" placeholder="post_author" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Image</label>
                                <input type="file" name="image" placeholder="image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <textarea name="post_content" class="form-control" id ="editor" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Post Tag</label>
                                <input type="text" name="post_tag" placeholder="post_tag" class="form-control mb-2">
                            </div>
                            </div>
                            <div class="form-group">
                                <label>Post Categroy</label>
                                
                            <select name="cat_name" id="">
                            <?php
                            
                                $sql = "select* from categories";
                                $value = mysqli_query($con,$sql);

                                while($row = mysqli_fetch_assoc($value)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                            ?>
                                <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                            <?php
                                }

                            ?></select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btn_add_post">Add Post</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


                <?php require_once ('./admin_includes/footer.php')?>
