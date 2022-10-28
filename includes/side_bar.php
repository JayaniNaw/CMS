<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method ="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name ="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="btn_search">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->

                 
                </div>

                

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                    $query = "Select* from categories";
                                    $result = mysqli_query($con,$query);
                
                                    while($row = mysqli_fetch_assoc($result)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<li>
                                            <a href='category.php?category={$cat_id};'>{$cat_title}</a>
                                        </li>";
                                    }
                                
                                ?>
                            
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
                   <!-- Login form -->
                   <div class="well">
                    <h2>Login</h2>
                    <form action="includes/login.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="User Name" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="password">
                                </div>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success" name="btn_login"> Login </button>
                            </span> 
                        </div>
                        </form>
                </div>
                
                

                </div>
                
                


                </div>
<!-- /.row -->




        <hr>
