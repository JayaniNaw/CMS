<table class="table table-stripped">

                            <tr>
                                <td>ID</td>
                                <td>User Name</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                
                                <td>Role</td>
                                
                               
                                <td colspan="2">Operation</td>
                              
                            </tr>


                            <tr>


                            <?php
                                $query = "select* from users";
                                $users = mysqli_query($con,$query);

                                while($row=mysqli_fetch_assoc($users)){

                                    
                            ?>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_role']; ?></td>
                                
                                
                                <td><a href="users.php?del=<?php echo $row['user_id']; ?>" class= "btn btn-danger"><span class="fa fa-trash"></span></td>
                                <td><a href="users.php?opt=edit_user&p_id=<?php echo $row['user_id']; ?>" class= "btn btn-success"><span class="fa fa-pencil"></span></td>
                                
                            </tr>
                            <?php   

                                }

                            ?>

                        </table>
                        
                        <?php
                            if(isset($_GET['del'])){
                                    $Del_ID=$_GET['del'];
                                    $sql = "delete from users where user_id='$Del_ID'";
                                    $result = mysqli_query($con,$sql);

                                    if($result){
                                        
                                        header("location: users.php");
                                    }
                            }
                        
                        ?>


