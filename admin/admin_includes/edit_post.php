<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
        <?php
        
        if(isset($_GET['p_id'])){
            $Post_ID = $_GET['p_id'];
            $sql="select* from posts where post_id='$Post_ID'";
            $result = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($result)){

                $post_id= $row['post_id'];
                $post_title= $row['post_title']; 
                $post_author = $row['post_author']; 
                $post_date = $row['post_date'];
                $img = $row['post_img'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_cat_id = $row['post_cat_id'];
                $post_status = $row['post_status'];
            }

        }
        
        //update record 
        if(isset($_POST['btn_edit_post'])){
                    $post_title=$_POST['post_title'];
                    $post_author=$_POST['post_author'];

                    $post_image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];

                    $post_content=$_POST['post_content'];
                    $post_tag=$_POST['post_tag'];

                    $post_cat_id = $_POST['cat_name'];

                    $post_status = $_POST['post_status'];

                    if(empty($post_image)){
                        $query = "select* from posts where post_id='Post_ID'";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($result)){
                            $post_image = $row['post_img'];
                        }
                    }

                    $sql= "update posts set post_title='$post_title', post_author='$post_author',post_img = '$post_image',post_date = now(),post_content = '$post_content', post_tags = '$post_tag', post_cat_id = '$post_cat_id', post_status = '$post_status' where post_id = '$Post_ID' ";
                    $result = mysqli_query($con,$sql);

                    if($result){

                       // header("location: ./posts.php");
                        move_uploaded_file($post_temp, "../imgs/$post_image");
                        echo "<p class= 'alert alert-success'>Post has been successfully updated :). <a href = '../post.php?p_id=$post_id' >View Post</a></p>";

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
                                <label>Post Author</label>
                                <input type="text" name="post_author" placeholder="post_author" class="form-control mb-2" value = "<?php echo $post_author?>">
                            </div>
                            <div class="form-group">
                                <label>Post Image</label>
                                <img width ="50" class="img-responsive" src="../imgs/<?php echo $img; ?>">
                                <input type="file" name="image" placeholder="image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <textarea name="post_content" class="form-control" id ="editor" cols="30" rows="10"><?php echo $post_content ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Post Tag</label>
                                <input type="text" name="post_tag" placeholder="post_tag" class="form-control mb-2" value = "<?php echo $post_tags?>">
                            </div><label>Post Category</label>
                            <div class="form-group">
                            <select name="cat_name" id="" class="form-control">
                                    <?php
                                    
                                        $query = "select * from categories";
                                        $data = mysqli_query($con,$query);

                                        while($row = mysqli_fetch_assoc($data)){
                                    ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_title'] ?></option>
                                    
                                    <?php
                                        }
                                    ?></select>
                            </div>
                            <div class="form-group">
                                <label>Post Status</label>
                                <!-- <input type="text" name="post_status" placeholder="post_status" class="form-control mb-2" value = "<?php echo $post_status?>"> -->
                                <select name = "post_status" class ="form-control">
                                    <option value ="draft"><?php echo $post_status ?></option>

                                    <?php
                                    
                                        if($post_status=="published"){
                                            echo "<option value ='draft'>Draft</option>";

                                        }
                                        else{
                                            echo "<option value ='published'>Published</option>";
                                        }
                                    ?>
                                </select>
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
