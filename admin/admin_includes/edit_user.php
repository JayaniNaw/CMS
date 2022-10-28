<?php require_once ('./admin_includes/header.php')?>
<body>

    <?php require_once ('./admin_includes/nav.php')?>
        
        <?php
        
        if(isset($_GET['p_id'])){
            $User_ID = $_GET['p_id'];
            $sql="select* from users where user_id='$User_ID'";
            $result = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($result)){

                $user_id= $row['user_id'];
                $user_name= $row['user_name']; 
                $user_password = $row['user_password'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                
            }

        }
        
        //update record 
        if(isset($_POST['btn_edit_user'])){
                    $first_name=$_POST['first_name'];
                    $last_name=$_POST['last_name'];
                    $user_role = $_POST['user_role'];
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_password = $_POST['user_password'];

                    

                

                    $sql= "update users set user_name='$user_name', user_password = '$user_password',first_name = '$first_name', last_name = '$last_name', user_email = '$user_email', user_role='$user_role' where user_id = '$User_ID' ";
                    $result = mysqli_query($con,$sql);

                    if($result){

                       // header("location: ./posts.php");
                        
                        header("location: users.php");

                    }else{
                        echo "Something is wrong";
                    }
        
                }
        
        ?>


<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col">
       
    <form action= "" method ="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="First Name" class="form-control mb-2" value = "<?php echo $first_name?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name" class="form-control mb-2" value = "<?php echo $last_name?>">
            </div>
            <div class="form-group" >
                <select name="user_role" id="">
                <option name="subscriber" id=""> <?php echo $user_role?></option>
                <option name="admin" id="" > Admin</option>
                <option name="subscriber" id="" > subscriber</option>
                </select>
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input name="user_name" placeholder="User Name" class="form-control mb-2" value = "<?php echo $user_name?>" >
            </div>
            <div class="form-group">
                <label>User Email</label>
                <input type="email" name="user_email" placeholder="Email" class="form-control mb-2" value = "<?php echo $user_email?>">
            </div>
            <div class="form-group">
                <label>User Password</label>
                <input type="password" name="user_password" placeholder="Password" class="form-control mb-2" value = "<?php echo $user_password?>">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="btn_edit_user">Edit User</button>
            </div>
        </form>

    </div>

</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


                <?php require_once ('./admin_includes/footer.php')?>
