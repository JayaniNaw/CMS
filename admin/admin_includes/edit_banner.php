<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
        <?php
        
        if(isset($_GET['p_id'])){
            $Post_ID = $_GET['p_id'];
            $sql="select* from about_banner where banner_id='$Post_ID'";
            $result = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($result)){

                $banner_id= $row['banner_id'];
                $img = $row['banner_img'];
               
                
            }

        }
        
        //update record 
        if(isset($_POST['btn_edit_post'])){
                   
                

                    $post_image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];

                
                    

                    if(empty($post_image)){
                        $query = "select* from about_banner where banner_id='banner_id'";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($result)){
                            $post_image = $row['banner_img'];
                        }
                    }

                    $sql= "update about_banner set  banner_img = '$post_image' where banner_id = '$Post_ID' ";
                    $result = mysqli_query($con,$sql);

                    if($result){

                       // header("location: ./posts.php");
                        move_uploaded_file($post_temp, "../imgs/$post_image");
                        echo "<p class= 'alert alert-success'>Post has been successfully updated :). <a href = '../about_us.php?p_id=$banner_id' >View Post</a></p>";

                    }
        
                }
        
        ?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                       
                    <form action= "" method ="POST" enctype="multipart/form-data">
                    <div class="form-group">
                                <label>Banner Image</label>
                                <img width ="100" class="img-responsive" src="../imgs/<?php echo $img; ?>">
                                <input type="file" name="image" placeholder="image" class="form-control mb-2">
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
