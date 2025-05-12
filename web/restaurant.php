<?php
  
if(isset($_POST['submit'])){
    $cus_name = $_POST['cus_name'];
    $cus_phone = $_POST['cus_phone'];
    $guests = $_POST['guests'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $cus_msg = "Requirement from Restaurent Page. ".$_POST['cus_msg'];


    $sql = "insert into tbl_customer_requirements (cus_phone, event_name,event_date,guests,cus_msg,	cus_name) values (?, ?, ?, ?, ?, ?)";
    $stmt = $DB_LINK->prepare($sql);
    
    if($stmt->execute([$cus_phone, $event_name,$event_date,$guests,$cus_msg,	$cus_name])){
        $_SESSION['success'] = "Query Submitted, We will get back to you soon!!";
    }else{
        $_SESSION['error'] = "Query not submitted, try again later!!";
    }
  
      
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/web/images/fav.png">
       <?php require("include/header_link.php") ?>
    <title>RESTAURANT | <?php echo $SITE_NAME?></title>
    
</head>

<body class="restaurant-page">
    <!-- Show message if set -->
    <?php if (isset($_SESSION['success'])): ?>
    <div id="popup-message" class="success">
         <?= $_SESSION['success']; ?> 
    </div>
    <?php unset($_SESSION['success']); ?>
<?php elseif (isset($_SESSION['error'])): ?>
    <div id="popup-message" class="error">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
    <!-- <div class="main-loader">
        <div id="loader-wrapper">
            <div class="loader">
                <span class="welcome-text">Atithi Devo Bhava</span>
            </div>
        </div>
    </div> -->

    <!-- =======================
             navbar section
        ======================== -->
<div class="main-div">
        <?php require("include/transparent_nav.php") ?>

        <!-- =======================
                       slider section
                 ======================== -->
        <section class="hero-slider hero-style">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                     <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=154 and status=1 order by ord asc  ";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                    <!-- ============S1============== -->
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <!-- <h1 class="slider-welcome">Explore</h1> -->
                                    <h1 class="slider-room-h2" style="font-size: 2.5rem;word-spacing: 0.5rem;"><?php echo $row['title_hi']; ?>
                                    </h1>
                                    <img src="assets/web/images/RestaurentHeroSlider/restaurentLogo.png" alt="">
                                    <h1 class="slider-room-h2 room-slider-fonts"
                                        style="padding-top: 17rem;   word-spacing: 0.5rem;"><?php echo $row['ext_link']; ?>
                                    </h1>
                                    <br><br>
                                    <h2 data-aos="fade-up" data-aos-duration="3000"
                                        style="  word-spacing: 0.5rem;  word-spacing: 0.5rem;"><?php echo $row['ext_link2']; ?>
                                    </h2>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <!-- end slide-inner -->
                        <div class="slider-blend-bg"></div>
                    </div>
                    <?php } ?>
                </div>
                <!-- end swiper-wrapper -->
                <!-- swipper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- <div class="line-to-line"></div> -->
        </section>

        <!-- =======================
               cuisines section
         ======================== -->

        <section class="cuisines">
            <div class="cuisines-headings">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Cuisines <span>offered</span>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <div class="container cuisines-food-img">
                <div class="cuisines-row grid grid-three-cols">
                     <?php 
                     $sql = "select * from tbl_category where parent_id=159 and status=1 order by ord asc ";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     {   
                    ?>
                      <div class="cuisines-box-img">
                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                        <p><?php echo $row['title']; ?></p>
                   
                </div>
                <?php } ?>
                </div>
            </div>  
        </section>


        <!-- =======================
        Our Menu section
        ======================== -->
        <section class="our-menu">
            <div class="menu-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Our <span>signature dishes</span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <!-- ============ -->

            <div class="container">
                <div class="tab-container">
                    <div class="tab-filter-container">
                          <?php 
                          $sanjeev=0;
                     $sql = "select * from tbl_category where parent_id=166 and status=1 order by ord asc ";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     {   

                    ?>
                        <li class="filter-btn <?php if($sanjeev==0) echo 'active';?> " data-tab="<?php echo $row['url']; ?>" data-aos="fade-right" data-aos-duration="1000">
                            <?php echo $row['title']; ?>
                        </li>
                        <?php
                    $sanjeev++;
                    } ?>
           
                    </div>
                    <div class="tab-filter-item-container">
                    
                    <?php 
                          $sanjeev=0;
                     $sql = "select * from tbl_category where parent_id=166  order by ord asc ";
                     $qry1=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     $direction_l = "left";
                     $direction_r = "right";
                     $d = 1;
                     $c=0;
                     foreach($qry1 as $row1)
                     {   

                    ?>

                        <div class="tab-item <?php echo $row1['url']; ?> <?php if($sanjeev==0) echo 'select_tab';?>">
                            <?php if($c == 0){ ?>
                            <div class="tab-content-left" data-aos="fade-down" data-aos-duration="1000">
                            
                                    <?php 
                                      $sql2 = "select * from tbl_category where parent_id='".$row1['id']."' and status=0 order by ord asc ";
                                    $qry2=mysqli_query($DB_LINK,$sql2) or die(mysqli_error($DB_LINK));
                                    $row2=mysqli_fetch_assoc($qry2);

                                        $sql3 = "select * from tbl_category where parent_id='".$row2['id']."'order by ord asc ";
                                    $qry3=mysqli_query($DB_LINK,$sql3) or die(mysqli_error($DB_LINK));
                                    $style = "";
                                    $xx = 1;
                                    $cc = 0;
                                    foreach($qry3 as $row3)
                                    {    $cc+=1;
                                          if($xx == 1){
                                         $style = "margin-left: auto;";
                                         $xx = 0;
                                         }else{
                                            $style = "";
                                            $xx = 1;
                                         }
                                    ?>
                                <div class="food<?php echo $cc; ?>"
                                    style="background-image: url('<?php echo $row3['image_url'] ?><?php echo $row3['images'] ?>'); width: 210px;height: 210px; background-position: center;<?php echo $style; ?>">
                                </div>
                                <?php };?>

                            </div>
                            <div class="tab-content-right">
                                
                                <?php 
                                $sql = "select * from tbl_category where parent_id='".$row1['id']."' and status=1 order by ord asc ";
                                $qry3=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                                
                                $duration = 800;
                                foreach($qry3 as $row3)
                                {    
                                    $duration+=200;
                                ?>
                                    <div class="tab-content-right-data" data-aos="fade-up" data-aos-duration="<?php echo $duration;?>">
                                        <div>
                                            <h1 class="tab-heading"><?php echo $row3['title']; ?><span style="color: #AB8965;">
                                                    <?php echo $row3['ext_link']; ?></span>
                                            </h1>

                                        </div>
                                        <div>
                                            <p><?php echo $row3['ext_link2']; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                <?php };?>
                               

                            </div>
                            <?php $c=1; }else{ ?>
                            <div class="tab-content-right">
                                
                                <?php 
                                $sql = "select * from tbl_category where parent_id='".$row1['id']."' and status=1 order by ord asc ";
                                $qry3=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                                
                                $duration = 800;
                                foreach($qry3 as $row3)
                                {    
                                    $duration+=200;
                                ?>
                                    <div class="tab-content-right-data" data-aos="fade-up" data-aos-duration="<?php echo $duration;?>">
                                        <div>
                                            <h1 class="tab-heading"><?php echo $row3['title']; ?><span style="color: #AB8965;">
                                                    <?php echo $row3['ext_link']; ?></span>
                                            </h1>

                                        </div>
                                        <div>
                                            <p><?php echo $row3['ext_link2']; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                <?php };?>
                               

                            </div>
                            <div class="tab-content-left" data-aos="fade-down" data-aos-duration="1000">
                            
                                    <?php 
                                      $sql2 = "select * from tbl_category where parent_id='".$row1['id']."' and status=0 order by ord asc ";
                                    $qry2=mysqli_query($DB_LINK,$sql2) or die(mysqli_error($DB_LINK));
                                    $row2=mysqli_fetch_assoc($qry2);

                                        $sql3 = "select * from tbl_category where parent_id='".$row2['id']."'   order by ord asc ";
                                    $qry3=mysqli_query($DB_LINK,$sql3) or die(mysqli_error($DB_LINK));
                                    $style = "";
                                    $xx = 1;
                                    $cc = 0;
                                    foreach($qry3 as $row3)
                                    {    $cc+=1;
                                          if($xx == 1){
                                         $style = "margin-left: auto;";
                                         $xx = 0;
                                         }else{
                                            $style = "";
                                            $xx = 1;
                                         }
                                    ?>
                                <div class="food<?php echo $cc; ?>"
                                    style="background-image: url('<?php echo $row3['image_url'] ?><?php echo $row3['images'] ?>'); width: 210px;height: 210px; background-position: center;<?php echo $style; ?>">
                                </div>
                                <?php };?>

                            </div>
                            <?php $c=0; }?>
                            <!-- ========= -->
                        </div>

                    <?php
                $sanjeev++;
                }; ?>
                        <!-- =========== -->
                        <!-- <div class="tab-item soups-and-salads">
                            <div class="tab-content-right">
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Thupka <span style="color: #AB8965;"> (V/NV)</span>
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹165/₹195</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">⁠Tomato dhaniya</h1>

                                    </div>
                                    <div>
                                        <p>₹190</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">⁠Manchow <span style="color: #AB8965;"> (V/NV)</span>
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹165 / ₹195</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Russian salad
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹180</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Greek Salad</h1>

                                    </div>
                                    <div>
                                        <p>₹225</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-left">
                                <div class="food1"
                                    style="background-image: url('assets/RestaurentMenu/soupSalad/ss1.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food2"
                                    style="background-image: url('assets/RestaurentMenu/soupSalad/ss2.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                                 
                                <div class="food3"
                                    style="background-image: url('assets/RestaurentMenu/soupSalad/ss3.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food4"
                                    style="background-image: url('assets/RestaurentMenu/soupSalad/ss4.png'); width: 210px;height: 210px; background-position: center;">
                                </div>
                            </div>

                        </div> -->
                        <!-- ======= -->
                        <!-- <div class="tab-item main-course">

                            <div class="tab-content-left">
                                <div class="food1"
                                    style="background-image: url('assets/RestaurentMenu/main/m1.png'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                
                                <div class="food2"
                                    style="background-image: url('assets/RestaurentMenu/main/m2.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                                
                                <div class="food3"
                                    style="background-image: url('assets/RestaurentMenu/main/m3.webp'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                
                                <div class="food4"
                                    style="background-image: url('assets/RestaurentMenu/main/m4.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Aloo dum Banarasi</h1>

                                    </div>
                                    <div>
                                        <p>₹275</p>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Diwani handi</h1>

                                    </div>
                                    <div>
                                        <p>₹295</p>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Pasta <span style="color: #AB8965;"> (V/NV)</span>
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹255 / ₹295</p>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Pizza Overload <span style="color: #AB8965;">
                                                (V/NV)</span>
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹270 / ₹335</p>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Street chowmein <span style="color: #AB8965;">
                                                (V/NV)</span>
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹180 / ₹225</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- =========== -->
                        <!-- <div class="tab-item favourites">
                            <div class="tab-content-right">
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Ghee Gunpowder Idli with <br> Chutney & Sambhar</h1>

                                    </div>
                                    <div>
                                        <p>₹180</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Poori Bhaji</h1>

                                    </div>
                                    <div>
                                        <p>₹165</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Chole Bhature</h1>

                                    </div>
                                    <div>
                                        <p>₹165</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Sev Poha
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹135</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Vegetable Cheela
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹125</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-left">
                                <div class="food1"
                                    style="background-image: url('assets/RestaurentMenu/favorates/f1.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                
                                <div class="food2"
                                    style="background-image: url('assets/RestaurentMenu/favorates/f2.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                                 
                                <div class="food3"
                                    style="background-image: url('assets/RestaurentMenu/favorates/f3.webp'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food4"
                                    style="background-image: url('assets/RestaurentMenu/favorates/f4.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                            </div>
                        </div> -->

                        <!-- ========== -->
                        <!-- <div class="tab-item beverages">
                            <div class="tab-content-left">
                                <div class="food1"
                                    style="background-image: url('assets/RestaurentMenu/Beverages/b1.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food2"
                                    style="background-image: url('assets/RestaurentMenu/Beverages/b2.webp'); width: 210px;height: 210px; background-position: center;">
                                </div>
                                 
                                <div class="food3"
                                    style="background-image: url('assets/RestaurentMenu/Beverages/b3.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food4"
                                    style="background-image: url('assets/RestaurentMenu/Beverages/b4.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Milk Shakes
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹155</p>
                                    </div>
                                </div>

                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Sweet Lassi
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹155</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Tea / Coffee
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹80 / ₹160</p>
                                    </div>
                                </div>
                               
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Fresh Juice
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹120</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Butter Milk
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹135</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- ========== -->
                        <!-- <div class="tab-item desserts">
                            <div class="tab-content-right">
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Gulab Jamun
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹120</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Shahi Tukda
                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹130</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Rasmalai</h1>

                                    </div>
                                    <div>
                                        <p>₹170</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Semiya Kheer

                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹130</p>
                                    </div>
                                </div>
                                 
                                <br>
                                <div class="tab-content-right-data">
                                    <div>
                                        <h1 class="tab-heading">Moong Dal Halwa

                                        </h1>

                                    </div>
                                    <div>
                                        <p>₹170</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-left">
                                <div class="food1"
                                    style="background-image: url('assets/RestaurentMenu/Desserts/d1.png'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food2"
                                    style="background-image: url('assets/RestaurentMenu/Desserts/d2.png'); width: 210px;height: 210px; background-position: center;">
                                </div>
                                 
                                <div class="food3"
                                    style="background-image: url('assets/RestaurentMenu/Desserts/d3.jpg'); width: 210px;height: 210px; background-position: center;margin-left: auto;">
                                </div>
                                 
                                <div class="food4"
                                    style="background-image: url('assets/RestaurentMenu/Desserts/d4.jpg'); width: 210px;height: 210px; background-position: center;">
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <!-- =======view menu pdf============ -->
                <div class="common-btn-tour" style="text-align: center; margin-top: 5rem;" data-aos="fade-up"
                    data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">

                    <img src="./assets/web/images/restaurant-menu-btn-line.png"
                        alt="">
                    <a class="all-btn" href="https://drive.google.com/file/d/13JK-ucaZeeSc-Ovfalf1vC43GBf-XvCR/view?usp=sharing"
                        target="_blank">View Detailed Menu<i class="ri-arrow-right-up-line"></i></a>
                    <img src="./assets/web/images/restaurant-menu-btn-line.png"
                        alt="">

                </div>
            </div>
        </section>
        <!-- =======================
        Host Event section
======================== -->
        <section class="event">
            <div class="event-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Events <span>We Cater</span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
                <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; padding-top: 2rem;">
                    <img src="<?php echo show_content('209', 'image_url',$DB_LINK);?><?php echo show_content('209', 'images',$DB_LINK);?>" alt=""
                        style="width: 30px;height: 30px;border-radius: 50%;">
                    <h3 style=" text-transform: uppercase; font-weight: 400; letter-spacing: 0.1rem;"> <?php echo show_content("209", "title", $DB_LINK)?>
                    </h3>
                </div>
            </div>
            <div class="event-list">
                <div class="container grid grid-two-cols">
                    <!-- ======= -->
                        <?php 
                     $sql = "select * from tbl_category where parent_id=210 and status=1 order by ord asc limit 0,20";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     $data_duration = 800;
                     foreach($qry as $row)
                     { 
                         $data_duration+=200;
                    ?>
                    <div class="event-box" style="background-image: url('<?php echo $row['image_url'] ?><?php echo $row['images'] ?>');  "
                        data-aos="fade-up" data-aos-duration="<?= $data_duration; ?>" data-aos-easing="ease-in-sine">
                        <h2><?php echo $row['title'] ?> <span style="font-size: 2rem;"><?php echo $row['title_hi'] ?></span>
                    </h2>
                       
                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                        <div class="common-btn resturen-btnn">
                            <a class="all-btn resturent-all-btn" href="#res-contact-filed">Book Now <i
                                    class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                <?php } ?>
                     
                </div>
            </div>
        </section>
        <!-- =======================
        EXPLORE OUR LATEST ADVENTURES 
 section
======================== -->

        <section class="explore-video">
            <div class="video-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    EXPLORE OUR <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i> <br> <span><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> LATEST
                        ADVENTURES </span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <div class="explore-video-box">
               
                <div class="container">

                    <div class="owl-carousel video-carousel">
                        <div class="item">
                            <video autoplay loop muted src="assets/web/images/RestaurentVideo/v1.mp4"></video>
                        </div>
                        <div class="item">
                            <video autoplay loop muted src="assets/web/images/RestaurentVideo/v2.mp4" frameborder="0"
                                allowfullscreen></video>
                        </div>
                        <div class="item">
                            <video autoplay loop muted src="assets/web/images/RestaurentVideo/v3.mp4" frameborder="0"
                                allowfullscreen></video>
                        </div>
                        <div class="item">
                            <video autoplay loop muted src="assets/web/images/RestaurentVideo/v4.mp4" frameborder="0"
                                allowfullscreen></video>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- =======================
        Restuarent Gallery 
       section
======================== -->
        <section class="res-gallery">
            <div class="res-gallery-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    PHOTO <span>GALLERY </span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <!-- ====== -->
            <div class="res-gallery-box">
                 <div class="container">
            <?php 
            $sql4 = "SELECT * FROM tbl_category WHERE parent_id=217 ORDER BY ord ASC";
            $qry4 = mysqli_query($DB_LINK, $sql4) or die(mysqli_error($DB_LINK));
            $images = [];
            while ($row = mysqli_fetch_assoc($qry4)) {
                $images[] = $row['image_url'].$row['images']; // Assuming `image_path` is the column name for the image.
            }


            // Split images into groups of three
            $imageGroups = array_chunk($images, 3);

            $counter = 0; // To track the number of sections

            foreach ($imageGroups as $group) {
                $counter++;
                // Check alignment: Odd sections -> Big Image Left; Even sections -> Big Image Right
                $isBigImageLeft = $counter % 2 != 0;
            ?>
                <div class="res-gallery-flex">
                    <?php if ($isBigImageLeft): ?>
                        <!-- Big image on the left -->
                        <?php if (!empty($group[0])): ?>
                            <div class="res-gallery-left" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine">
                                <a href="<?php echo $group[0]; ?>" data-lightbox="gallery">
                                    <img src="<?php echo $group[0]; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="res-gallery-right">
                            <?php for ($i = 1; $i < count($group); $i++): ?>
                                <div class="res-gallery-rImg1" data-aos="fade-right" data-aos-duration="<?php echo 1200 + ($i - 1) * 200; ?>" data-aos-easing="ease-in-sine">
                                    <a href="<?php echo $group[$i]; ?>" data-lightbox="gallery">
                                        <img src="<?php echo $group[$i]; ?>" alt="">
                                    </a>
                                </div>
                                <br><br>
                            <?php endfor; ?>
                        </div>
                    <?php else: ?>
                        <!-- Big image on the right -->
                        <div class="res-gallery-right">
                            <?php for ($i = 1; $i < count($group); $i++): ?>
                                <div class="res-gallery-rImg1" data-aos="fade-left" data-aos-duration="<?php echo 1200 + ($i - 1) * 200; ?>" data-aos-easing="ease-in-sine">
                                    <a href="<?php echo $group[$i]; ?>" data-lightbox="gallery">
                                        <img src="<?php echo $group[$i]; ?>" alt="">
                                    </a>
                                </div>
                                <br><br>
                            <?php endfor; ?>
                        </div>

                        <?php if (!empty($group[0])): ?>
                            <div class="res-gallery-left" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
                                <a href="<?php echo $group[0]; ?>" data-lightbox="gallery">
                                    <img src="<?php echo $group[0]; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <br><br>
            <?php } ?>
            </div>
            </div>
        </section>



        <!-- =======================
                    testimonial section       
                 ======================== -->
         <div class="testimonial  res-testimonial">
            <div class="testimonial-heading-main">
                <div class="testimonial-text container">

                    <h1 class="line-testimonial"><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> “What <span>
                            Clients Say” <i class="ri-star-s-line icon-star"></i><i
                                class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i></span>
                    </h1>
                </div>
                <div class="testimonial-line"></div>
            </div>

            <div class="testimonial-section">
                <div class="container">
                    <div class="owl-carousel owl-theme testimonials-container" data-aos="zoom-out"
                        data-aos-duration="1000" data-aos-easing="ease-in-out">
                         <?php 
                     $sql = "select * from tbl_category where parent_id=228 and status=1 order by ord asc limit 0,20";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                        <!-- Item1 Starts -->
                        <div class="item testimonial-card">
                            <main class="test-card-body">
                                <div class="quote">
                                    <i class="ri-double-quotes-r"></i>
                                </div>
                                <p><?php echo $row['description']; ?>
                                </p>
                            </main>
                            <div class="profile">
                                <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                                <div class="profile-desc">
                                    <span><?php echo $row['title']; ?></span>
                                    <br>
                                    <br>

                                </div>
                            </div>
                        </div>
                      <?php } ?>
                      

                    </div>
                    <div class="testi-fix-img">

                        <a href=" https://www.swiggy.com/direct/brand/572152?source=swiggy-direct&subSource=generic"
                            style="margin-right: 2rem;" target="_blank"><img src="assets/web/images/swiggyLogo.png" alt=""></a>

                        <a href=" https://link.zomato.com/xqzv/rshare?id=89031406305633c9" target="_blank"><img
                                src="assets/web/images/zomatologo.png" alt=""></a>

                    </div>
                </div>
            </div>
        </div>




    
          <!-- =======================
        Restuarent opening Hours 
       section
======================== -->
        <section class="openingHours">
            <div class="container grid grid-two-cols">
                <div class="openingHours-left" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Dine in </h2>
                    <div class="openingHours-left-box">
                        <h3 style="text-transform: uppercase;"><?php echo show_content("237", "title_hi", $DB_LINK)?></h3>
                        <div class="openingHours-data-flex">
                            <div class="openingHours-time-left">
                                <p style="padding-top: 2rem;"><?php echo show_content("237", "ext_link", $DB_LINK)?></p>
                                <p style="padding-top: 2rem; padding-bottom: 1rem;"><?php echo show_content("237", "ext_link2", $DB_LINK)?></p>
                                <!-- <h3>22:00</h3> -->
                            </div>
                            <!-- ====== -->


                        </div>
                        <div style="text-align: center;">
                            <p style="color: #fff;">|</p>
                            <p style="color: #fff;">|</p>
                            <p style="color: #fff;">|</p>
                            <!-- <p style="color: #fff;">|</p> -->

                        </div>
                        <br>
                        <div class="common-btn" style="text-align: center; display: block;">
                            <a class="all-btn" style="color: white; border: 1px solid white;"
                                href="#res-contact-filed">MAKE
                                A RESERVATION<i class="ri-arrow-right-up-line"></i></a>
                        </div>
                        <p style="margin-top: 6.3rem; text-align: center; color:#fff;"><?php echo show_content("237", "description", $DB_LINK)?> <br> to make
                            a
                            reservation.</p>
                        <br>

                    </div>
                </div>
                <!-- ======== -->
                <div class="openingHours-right" data-aos="fade-down" data-aos-duration="1400">
                    <h2>Delivery</h2>
                    <div class="openingHours-right-box">
                        <div class="openingHours-right-directOrder">
                            <h3
                                style="  display: flex;align-items: center;justify-content: center;gap: 1rem;padding: 0.5rem;text-transform: uppercase; border-radius: 1rem;">
                                <span><?php echo show_content("238", "title", $DB_LINK)?></span>
                            </h3>
                            <div style="padding: 1.4rem 0rem;   border-radius: 1rem;">
                                <p style="font-weight: 300;"><?php echo show_content("238", "title_hi", $DB_LINK)?></p>
                                <p style="font-weight: 300;"><?php echo show_content("238", "ext_link", $DB_LINK)?></p>
                                <p style="font-weight: 300;"><?php echo show_content("238", "ext_link2", $DB_LINK)?></p>
                                <br>
                                <!-- <p style="font-weight: 300;">Delivery Cost :- 20Rs</p> -->
                                <p style="font-weight: 300; font-size: 2rem;"> <?php echo show_content("238", "description", $DB_LINK)?></p>
                            </div>
                        </div>
                        <div class="openingHours-right-s-z">
                            <div class="openingHours-right-swiggy">
                                <img src="assets/web/images/swiggyLogo.png" alt="">
                                <div class="common-btns" style="text-align: center; display: block;">
                                    <a class="all-btns" target="_blank" style="color: white; border: 1px solid white;"
                                        href="https://www.swiggy.com/direct/brand/572152?source=swiggy-direct&subSource=generic">Click
                                        To Order<i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                            <div class="openingHours-right-swiggy">
                                <img src="assets/web/images/zomatologo.png" alt="">
                                <div class="common-btns" style="text-align: center; display: block;">
                                    <a class="all-btns" target="_blank" style="color: white; border: 1px solid white;"
                                        href=" https://link.zomato.com/xqzv/rshare?id=89031406305633c9">Click To Order<i
                                            class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <!-- =======================
            Get in Touch section       
         ======================== -->
     


    <section class="res-contact" id="res-contact-filed">
            <div class="res-contact-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Get in Touch
                    <span>with us! </span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <!-- ======== -->
            <div class="container res-contact-flex">
                <!-- ========= -->
                <div class="res-contact-left">
                    <div class="form-flex">
                        <form action="" method="post">
                            <div class="form-flex-input-one">
                                <input type="text" name="cus_name" placeholder="Full Name" data-aos="fade-up" data-aos-duration="1000" required>
                                <input type="tel" name="cus_phone" placeholder="Mobile No" data-aos="fade-up" data-aos-duration="1400" required>
                            </div>
                            <div class="form-flex-input-one">
                                <select id="Event" name="event_name" data-aos="fade-up" data-aos-duration="1800">
                                    <option value="" disabled selected>Select an Event</option>
                                    <option value="Kids birthday party">Kids birthday party</option>
                                    <option value="Kitty Party">Kitty Party</option>
                                    <option value="Corporate lunch">Corporate lunch</option>
                                    <option value="Sangeet">Sangeet</option>
                                    <option value="Other">Other</option>
                                </select>

                                <!-- Custom date input with single-click functionality -->
                                <input type="text" name="event_date" placeholder="Select Date"
                                    onfocus="this.type='date'; this.placeholder=''"
                                    onblur="if(!this.value) { this.type='text'; this.placeholder='Select Date'; }"
                                    id="event" name="event" data-aos="fade-up" data-aos-duration="2200" required>
                            </div>

                            <input type="text" name="guests" placeholder="Number of Guests" data-aos="fade-up"
                                data-aos-duration="2600" required>
                            <textarea name="cus_msg" placeholder="Message If any" id="" data-aos="fade-up"
                                data-aos-duration="3000"></textarea>

                            <div class="common-btn" style="margin-top:0rem; text-align:center;" data-aos="fade-up"
                                data-aos-duration="3000">
                                <button class="all-btn" style="display: inline-block; text-align: right;" name="submit" type="submit"  > Submit
                                    <i class="ri-arrow-right-up-line"></i></button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- ============ -->
                <div class="res-contact-right">
                    <div class="res-contact-right-box">
                        <h3 data-aos="fade-up" data-aos-duration="1000">Call Us :-</h3>

                        <p id="res-cont-no" data-aos="fade-up" data-aos-duration="1800"> <?php echo show_content("239", "title_hi", $DB_LINK)?></p>
                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="2200">Email Us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="2600">
                            <?php echo show_content("239", "ext_link", $DB_LINK)?></p>

                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="3000">visit us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="3000"><?php echo show_content("239", "ext_link2", $DB_LINK)?></p>

                    </div>
                </div>
            </div>
    </section>


        <!-- =======================
            footer section       
         ======================== -->
             <?php require("include/footer.php") ?>
        <!-- <button id="backToTop" title="Go to top"><i class="ri-arrow-up-fill"></i></button> -->

    </div>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++ -->

      <?php require("include/js_link.php") ?>

         <script>
        let filter_btn = document.querySelectorAll('.filter-btn');
        let tab_items = document.querySelectorAll('.tab-item');
        let tabContainer = document.querySelector('.tab-filter-item-container');

        // Define fixed heights for different screen sizes
        const fixedHeightDesktop = '506px';
        const fixedHeightMobile = '320px';

        // Function to update the height based on screen size
        function updateTabHeight() {
            if (window.matchMedia('(max-width: 575.98px)').matches) {
                tabContainer.style.height = fixedHeightMobile;
            } else {
                tabContainer.style.height = fixedHeightDesktop;
            }
        }

        // Call the function initially
        updateTabHeight();

        // Add event listener for window resize
        window.addEventListener('resize', updateTabHeight);

        // Add event listeners for filter buttons
        for (let i = 0; i < filter_btn.length; i++) {
            filter_btn[i].addEventListener('click', function () {
                // Remove active class from all filter buttons
                for (let j = 0; j < filter_btn.length; j++) {
                    filter_btn[j].classList.remove('active');
                }

                // Add active class to the clicked button
                let select_tab = filter_btn[i].getAttribute('data-tab');
                filter_btn[i].classList.add('active');

                // Update the height based on screen size
                updateTabHeight();

                // Loop through tab items to show/hide the selected tab
                for (let t = 0; t < tab_items.length; t++) {
                    if (tab_items[t].classList.contains(select_tab)) {
                        tab_items[t].classList.add('select_tab');
                    } else {
                        tab_items[t].classList.remove('select_tab');
                    }
                }
            });
        }
    </script>


    <script>   $(document).ready(function () {
            $('.video-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>


<script>
    // Auto-hide the popup after 3 seconds
    setTimeout(() => {
        const popup = document.getElementById('popup-message');
        if (popup) {
            popup.style.display = 'none';
        }
    }, 5000);
</script>

</body>

</html>