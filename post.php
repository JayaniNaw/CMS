
<!--header section-->
<?php require_once "includes/header.php" ?>

    <!-- Navigation -->
    <?php require_once "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

                if(isset($_GET['p_id'])){
                    $Post_ID = $_GET['p_id'];
                }
            
                $query = "Select * from posts where post_id = '$Post_ID'";
                $data = mysqli_query($con,$query);

                while($row = mysqli_fetch_assoc($data)){

                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_img = $row['post_img'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
    
            ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;  ?>"><?php echo $post_title?></a>
                </h2>
                <!-- <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p> -->
                <!-- <p><span class="glyphicon glyphicon-time"></span>Posted on <?php echo $post_date ?></p> -->
                <hr>
                <img class="img-responsive" src="imgs/<?php echo  $post_img ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>
            <?php
            
            
                }
                
            ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

        </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php require_once "includes/side_bar.php" ?>

        <!-- Footer -->
        <?php require_once "includes/footer.php" ?>
