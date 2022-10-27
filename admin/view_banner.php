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
                            <small>Author</small>
                        </h1>  
                    <?php
                    
                        if(isset($_GET['opt'])){
                            $opt = $_GET['opt'];
                        }
                        else{
                            $opt='';
                        }
                        switch($opt){
                            
                            case 'edit_banner':
                                require_once('admin_includes/edit_banner.php');
                            break;
                            default:
                                require_once('admin_includes/view_banner.php');
                            break;

                        }
                    ?>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

                <?php require_once ('./admin_includes/footer.php')?>
