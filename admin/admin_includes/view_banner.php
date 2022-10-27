<table class="table table-stripped">

                            <tr>
                                <td>ID</td>
                                <td>Image</td>
                                <td colspan="1">Operation</td>
                              
                            </tr>


                            <tr>


                            <?php
                                $query = "select* from about_banner";
                                $result = mysqli_query($con,$query);

                                while($row=mysqli_fetch_assoc($result)){

                                    $old = $row['banner_img'];

                                    
                            ?>
                                <td><?php echo $row['banner_id']; ?></td>
                                <td><img width ="250" class="img-responsive" src="../imgs/<?php echo $row['banner_img']; ?>"></td>
                                
                                <td><a href="view_banner.php?opt=edit_banner&p_id=<?php echo $row['banner_id']; ?>" class= "btn btn-success"><span class="fa fa-pencil"></span></td>

                                
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


