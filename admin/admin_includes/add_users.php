<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        <!--Get the information from the database-->
            <?php 
            
                if(isset($_POST['btn_add_user'])){
                    $first_name=$_POST['first_name'];
                    $last_name=$_POST['last_name'];
                    $user_role=$_POST['user_role'];
                    $user_name=$_POST['user_name'];
                    $user_email=$_POST['user_email'];
                    $user_password=$_POST['user_password'];

                    

                    $sql = "insert into users (user_name,user_password,first_name,last_name,user_email,user_role,randSalt ) 
                    values ('$user_name','$user_password','$first_name','$last_name','$user_email', '$user_role', now())" ; 

                    $result = mysqli_query($con,$sql);
                    if($result){
                       
                        echo '<p class = "alert alert-success">Post Added: ) </p>';
                    }
                    else{
                        echo "Query Failed";
                    }
                   
                }

            ?>

            <div class="container-fluid">

                <!-- Edit form -->
                <div class="row">
                    <div class="col">
                       
                    <form action= "" method ="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" placeholder="First Name" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" placeholder="Last Name" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <select name="user_role" id="">
                                <option name="subscriber" id="" > Select User</option>
                                <option name="admin" id="" > Admin</option>
                                <option name="subscriber" id="" > subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input name="user_name" placeholder="User Name" class="form-control mb-2" >
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="email" name="user_email" placeholder="Email" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>User Password</label>
                                <input type="password" name="user_password" placeholder="Password" class="form-control mb-2">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btn_add_user">Add User</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


                <?php require_once ('./admin_includes/footer.php')?>
