<table class="table table-stripped">

                            <tr>
                                <td>Comment ID</td>
                                <td>Comment Post ID</td>
                                <td>Comment Author</td>
                                <td>Comment Status</td>
                                <td>Comment Email</td>
                                <td>Comment Content</td>
                                <td>Response to</td>
                                <td>Approve</td>
                                <td>unApprove</td>
                                <td>Comment Date</td>
                                <td colspan="2">Operation</td>
                              
                            </tr>


                            <tr>


                            <?php
                                $query = "select* from comments";
                                $comment = mysqli_query($con,$query);

                                while($row=mysqli_fetch_assoc($comment)){

                                    
                            ?>
                                <td><?php echo $row['comment_id']; ?></td>
                                <td><?php echo $row['comment_post_id']; ?></td>
                                <td><?php echo $row['comment_author']; ?></td>
                                <td><?php echo $row['comment_status']; ?></td>
                                <td><?php echo $row['comment_email']; ?></td>
                                <td><?php echo $row['comment_content']; ?></td>
                                <td><p>Somthing</p></td>
                                <td><a href = "#">Approve</a></td>
                                <td><a href = "#">unApprove</a></td>
                                <td><?php echo $row['comment_date']; ?></td>
                                <td><a href="posts.php?del=>" class= "btn btn-danger"><span class="fa fa-trash"></span></td>

                                
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


