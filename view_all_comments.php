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
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    
                            ?>
                                <td><?php echo $row['comment_id']; ?></td>
                                <td><?php echo $row['comment_post_id']; ?></td>
                                <td><?php echo $row['comment_author']; ?></td>
                                <td><?php echo $row['comment_status']; ?></td>
                                <td><?php echo $row['comment_email']; ?></td>
                                <td><?php echo $row['comment_content']; ?></td>

                                <?php
                                    $query = "select* from posts where post_id = '$comment_post_id'";
                                    $result = mysqli_query($con,$query);

                                    while($value = mysqli_fetch_assoc($result)){
                                        $post_id = $value['post_id'];
                                        $post_title = $value['post_title'];
                                    
                                ?>
                                    <td><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></td>
                                <?php
                                    }
                                
                                ?>

                                
                                <td><a href = "#">Approve</a></td>
                                <td><a href = "#">unApprove</a></td>
                                <td><?php echo $row['comment_date']; ?></td>
                                <td><a href="comments.php?del=<?php echo $comment_post_id ?>" class= "btn btn-danger"><span class="fa fa-trash"></span></td>

                                
                            </tr>
                            <?php   

                                }

                                if(isset($_GET['del'])){
                                    $comment_id = $_GET['del'];
                                    $sql_comment = "delete from commments where comment_id = '$comment_id'";
                                    $comment_query = mysqli_query($con,$sql_comment);

                                    if($comment_query){
                                        header("location: comments.php");
                                    }
                                }

                            ?>

                        </table>
                        

