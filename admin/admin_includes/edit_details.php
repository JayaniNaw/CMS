<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
        <?php
        
        if(isset($_GET['p_id'])){
            $Post_ID = $_GET['p_id'];
            $sql="select* from about where about_id='$Post_ID'";
            $result = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($result)){

                $about_id= $row['about_id'];
                $post_title= $row['post_title']; 
                $img = $row['post_img'];
                $post_description = $row['post_description'];
                $post_button_text = $row['post_button_text'];
                $post_link = $row['post_link'];
                
            }

        }
        
        //update record 
        if(isset($_POST['btn_edit_post'])){
                    $post_title=$_POST['post_title'];
                

                    $post_image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];

                    $post_description=$_POST['post_description'];
                    $post_button_text=$_POST['post_button_text'];
                    $post_button_link = $_POST['post_link'];

                    

                    if(empty($post_image)){
                        $query = "select* from about where about_id='Post_ID'";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($result)){
                            $post_image = $row['post_img'];
                        }
                    }

                    $sql= "update about set post_title='$post_title', post_img = '$post_image',post_description = '$post_description', post_button_text = '$post_button_text', post_link = '$post_button_link'where about_id = '$Post_ID' ";
                    $result = mysqli_query($con,$sql);

                    if($result){

                       // header("location: ./posts.php");
                        move_uploaded_file($post_temp, "../imgs/$post_image");
                        echo "<p class= 'alert alert-success'>Post has been successfully updated :). <a href = '../about_us.php?p_id=$about_id' >View Post</a></p>";

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
                                <input type="text" name="post_title" placeholder="post_title" class="form-control mb-2" value = "<?php echo $post_title?>" >
                            </div>
                            <div class="form-group">
                                <label>Post Image</label>
                                <img width ="100" class="img-responsive" src="../imgs/<?php echo $img; ?>">
                                <input type="file" name="image" placeholder="image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Description</label>
                                <textarea name="post_description" class="form-control" id ="editor" cols="30" rows="10"><?php echo $post_description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Post Button Text</label>
                                <input type="text" name="post_button_text" placeholder="post button text" class="form-control mb-2" value = "<?php echo $post_button_text?>">
                             </div>
                             <div class="form-group">
                                <label>Post Button Link</label>
                                <input type="text" name="post_link" placeholder="post button link" class="form-control mb-2" value = "<?php echo $post_link ?>">
                             </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btn_edit_post">Edit Post</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


                <?php require_once ('./admin_includes/footer.php')?>
