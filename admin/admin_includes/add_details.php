<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
            <?php 
            
                if(isset($_POST['btn_add_post'])){
                    $post_title=$_POST['post_title'];
                    

                    $post_image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];

                    $post_description=$_POST['post_description'];
                    $post_button_text=$_POST['post_button_text'];

                    $post_link=$_POST['post_link'];

                    $sql = "insert into about (post_title,post_img,post_description,post_button_text,post_link ) 
                    values ('$post_title','$post_image','$post_description','$post_button_text', '$post_link')" ; 

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
                                <input type="text" name="post_title" placeholder="post title" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Image</label>
                                <input type="file" name="image" placeholder="image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Description</label>
                                <textarea name="post_description" class="form-control" id ="editor" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Post Button Text</label>
                                <input type="text" name="post_button_text" placeholder="post Button Text" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Button Link</label>
                                <input type="text" name="post_link" placeholder="post Button Link" class="form-control mb-2">
                            </div>
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
            </body>
