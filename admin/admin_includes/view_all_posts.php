<table class="table table-stripped">

                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Author</td>
                                <td>Date</td>
                                <td>Image</td>
                                <td>Content</td>
                                <td>Tags</td>
                                <td>Post Category</td>
                                <td>Post Status</td>
                                <td colspan="2">Operation</td>
                              
                            </tr>


                            <tr>


                            <?php
                                $query = "select* from posts";
                                $result = mysqli_query($con,$query);

                                while($row=mysqli_fetch_assoc($result)){

                                    $old = $row['post_img'];

                                    $cat_id=$row['post_cat_id'];
                            ?>
                                <td><?php echo $row['post_id']; ?></td>
                                <td><?php echo $row['post_title']; ?></td>
                                <td><?php echo $row['post_author']; ?></td>
                                <td><?php echo $row['post_date']; ?></td>
                                <td><img width ="100" class="img-responsive" src="../imgs/<?php echo $row['post_img']; ?>"></td>
                                <td><?php echo $row['post_content']; ?></td>
                                <td><?php echo $row['post_tags']; ?></td>
                                <td>
                                <?php
                                    $query = "select* from categories where cat_id = '$cat_id'";
                                    $data = mysqli_query($con,$query);

                                    while($value = mysqli_fetch_assoc($data)){
                                ?>

                                <?php echo $value['cat_title']; ?>
                                <?php
                                    }
                                ?>
                                </td>
                                <td><?php echo $row['post_status']; ?></td>
                                <td><a href="posts.php?del=<?php echo $row['post_id']; ?>" class= "btn btn-danger"><span class="fa fa-trash"></span></td>
                                <td><a href="posts.php?opt=edit_post&p_id=<?php echo $row['post_id']; ?>" class= "btn btn-success"><span class="fa fa-pencil"></span></td>

                                
                            </tr>
                            <?php   

                                }

                            ?>

                        </table>
                        
                        <?php
                            if(isset($_GET['del'])){
                                    $Del_ID=$_GET['del'];
                                    $sql = "delete from posts where post_id='$Del_ID'";
                                    mysqli_query($con,$sql);

                                    if($result){
                                        unlink("../imgs/$old");
                                        header("location: posts.php");
                                    }
                            }
                        
                        ?>


