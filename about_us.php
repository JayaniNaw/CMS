
<?php require_once "includes/db.php" ?>
<style>
/* Three image containers (use 25% for four, and 50% for two, etc) */

.row {
  display: flex;
}

.column {
  flex: 30%;
  padding: 50px;
  
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 50px 50px;
  border: 1px solid #ccc;
  border-top: none;
  text-align :center;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


</style>


    <!-- Navigation -->
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            $query = "Select * from about_banner";
        $data = mysqli_query($con,$query);

        while($row = mysqli_fetch_assoc($data)){

                $banner_id = $row['banner_id'];
                $banner_img = $row['banner_img'];
    ?>
            <div class="hero-image">
                <div class="hero-text">
                    <img  class="img-responsive" src="imgs/<?php echo  $banner_img ?>" height="380" width="1360" padding-top="0">
                </div>
                 </div>
                 <?php }   ?>
            
            
           
            
            <?php
        
        $query = "Select * from about";
        $data = mysqli_query($con,$query);

        while($row = mysqli_fetch_assoc($data)){

                $about_id = $row['about_id'];
                $post_title = $row['post_title'];
                $post_img = $row['post_img'];
                $post_description = $row['post_description'];
                $post_button_text = $row['post_button_text'];
                $post_link = $row['post_link'];

                
    
    ?>
    
    
       
                

                <div class="row" >
                        <div class="column">
                            <img class="img-responsive" src="imgs/<?php echo  $post_img ?>" style="width: 600px;">
                        </div>
                        <div class="column" >
                            <h2 ><?php echo $post_title?></h2>
                            <p><?php echo $post_description ?></p>
                            <a class="button" href="<?php echo  $post_link?>"><?php echo $post_button_text ?> <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                </div>
                
                        
                        
                
               
                <hr>
                
                <?php }   ?>
                
                
        

        </div>

        

       
   
