<table class="table table-stripped">

                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>Button Text</td>
                                <td>Button Url</td>
                                <td colspan="2">Operation</td>
                              
                            </tr>


                            <tr>


                            <?php
                                $query = "select* from about";
                                $result = mysqli_query($con,$query);

                                while($row=mysqli_fetch_assoc($result)){

                                    $old = $row['post_img'];

                                    
                            ?>
                                <td><?php echo $row['about_id']; ?></td>
                                <td><?php echo $row['post_title']; ?></td>
                                <td><img width ="100" class="img-responsive" src="../imgs/<?php echo $row['post_img']; ?>"></td>
                                <td><?php echo $row['post_description']; ?></td>
                                <td><?php echo $row['post_button_text']; ?></td>
                                <td><?php echo $row['post_link']; ?></td>
                                <td><a href="about_us.php?del=<?php echo $row['about_id']; ?>" class= "btn btn-danger"><span class="fa fa-trash"></span></td>
                                <td><a href="about_us.php?opt=edit_post&p_id=<?php echo $row['about_id']; ?>" class= "btn btn-success"><span class="fa fa-pencil"></span></td>

                                
                            </tr>
                            <?php   

                                }

                            ?>

                        </table>
                        
                        <?php
                            if(isset($_GET['del'])){
                                    $Del_ID=$_GET['del'];
                                    $sql = "delete from about where about_id='$Del_ID'";
                                    mysqli_query($con,$sql);

                                    if($result){
                                        unlink("../imgs/$old");
                                        header("location: about_us.php");
                                    }
                            }
                        
                        ?>


