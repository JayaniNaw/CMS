<!DOCTYPE html>
<html>
<head>
<style>
.button3 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 24px;
  margin: 4px 2px;
  cursor: pointer;
}

.button3 {width: 100%;}
</style>
</head>
<body>


<?php require_once ('./admin_includes/header.php')?>
<body>

    <div id="wrapper">

    <?php require_once ('./admin_includes/nav.php')?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>About Us</small>
                        </h1>
                        <div class="form-group">
                                <a href="view_banner.php">
                                <div class="form-group">
                                <button action=""width="1550" class="button3" type="submit" name="btn_add_post">Banner Section</button>
                        </a>
                            </div>
                        

                        <div class="form-group">
                                <a href="./about_us.php">
                                <div class="form-group">
                                <button width="1550" class="button3" type="submit" name="btn_add_post">View All Details</button>
                        </a>
                            </div>
                     
                        <div class="form-group">
                                <a href="about_us.php?opt=add_details">
                                <button width="1550" class="button3" type="submit" name="btn_add_post">Add New Details</button>
                        </a>
                            </div>
                        
                    </div>
                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

                <?php require_once ('./admin_includes/footer.php')?>
