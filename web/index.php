<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/images/fav.png">
   
    <!-- *******  Owl Carousel Links  ******* -->
 
    <?php require("include/header_link.php") ?>

    <title>HOME | <?php echo $SITE_NAME?></title>
</head>

<body class="index-page">
    <div class="main-loader">
        <div id="loader-wrapper">
            <div class="loader">
                <span class="welcome-text">Atithi Devo Bhava</span>
            </div>
        </div>
    </div>
    <!-- <div id="popup">
        <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1730889576/v1pcyz8pg7egiyz8yocw.png"
            alt="Popup Image">
    </div> -->
    <!-- =======================
             navbar section
        ======================== -->
    <div class="main-div">

      <?php require('include/transparent_nav.php') ?>
     
     <!-- =======================
     slider section
     ===========***Dynamic***============= -->
        <section class="hero-slider hero-style">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=2 and status=1 order by ord asc limit 0,4";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                    <!-- ===========  -->
                     <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" loading="lazy"
                            data-background="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h1 class="slider-welcome"><?php echo $row['ext_link']; ?></h1>
                                    <h1 class="slider-h2"><?php echo $row['ext_link2']; ?></h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="slider-blend-bg"></div>
                    </div>
                    
                    <?php };?>
                    <!-- =========== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/web/images/heroSlider/hs1.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h1 class="slider-welcome">Experience</h1>
                                    <h1 class="slider-h2">Varanasi</h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="slider-blend-bg"></div>
                    </div> -->
                    <!-- =========== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/web/images/heroSlider/hs3.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h1 class="slider-welcome">Experience</h1>
                                    <h1 class="slider-h2">Varanasi</h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="slider-blend-bg"></div>
                    </div> -->

                    <!-- =========== -->
                    <!-- =========== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/web/images/heroSlider/hs4.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h1 class="slider-welcome">Experience </h1>
                                    <h1 class="slider-h2">Varanasi</h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                     
                        <div class="slider-blend-bg"></div>
                    </div> -->
                    <!-- =========== -->


                </div>
                <!-- end swiper-wrapper -->
                <!-- swipper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="line-to-line"></div>
        </section>
         
        <!-- =======================
            welcome section       
         ======================== -->
         
        <div class="main-welcome">
            <div class="welcome-text-main">
                <div class="welcom-text container">
                    <p class="line-para"><span>WELCOME TO</span></p>
                    <h1 class="line"><span>Alokah Kashi</span></h1>
                    <h3 class="line"><img src="assets/web/images/welcomeTextLineimg/line.png" alt=""> Premium 3 Star hotel <img
                            src="assets/web/images/welcomeTextLineimg/line.png" alt=""></h3>
                </div>
            </div>
        </div>
        
 <!-- =======================
            welcome image section       
         ============***Dynamic***============ -->
        <div class="welcome-main-image">
            <div class="image-welcome">
                <!-- Existing animation for desktop -->
                <div class="img-welcome-ani" style="background-image: url(<?php echo show_content('7', 'image_url',$DB_LINK);?><?php echo show_content('7', 'images',$DB_LINK);?>)"></div>

                <!-- Mobile view images for smaller screens -->
                <div class="mobile-img img-welcome-ani-1" style="background-image: url(<?php echo show_content('8', 'image_url',$DB_LINK);?><?php echo show_content('8', 'images',$DB_LINK);?>)"></div>
                <div class="mobile-img img-welcome-ani-2" style="background-image: url(<?php echo show_content('9', 'image_url',$DB_LINK);?><?php echo show_content('9', 'images',$DB_LINK);?>)"></div>
            </div>
        </div>




        <div class="common-bg-design"></div>
        <!-- =============         -->
        <div class="scrolling-text ">
            <div class="rail">
                <h4 data-aos="fade-right" data-aos-duration="1000">Relax.</h4>
                <h4 data-aos="fade-right" data-aos-duration="1500">Reflect.</h4>
                <h4 data-aos="fade-right" data-aos-duration="2000">Awaken.</h4>

            </div>
        </div>


        <!-- =======================
            our offering section       
         ============***Dynamic***============ -->
        <div class="offering-bg">
            <div class="offering">
                <div class="offering-heading-main">
                    <div class="offering-text container">
                        <h1 class="line-offering"> <i class="ri-star-s-line icon-star"></i><i
                                class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> OUR <span>
                                OFFERINGS <i class="ri-star-s-line icon-star"></i><i
                                    class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i></span>
                        </h1>
                    </div>
                </div>
                <div class="offering-line"></div>
            </div>

            <!-- ====Room====== -->
            <section class="room-box">
                <div class="container">
                    <div class="room-flex">
                        <div class="room-left">
                            <h2><?php echo show_content("11", "title", $DB_LINK)?></h2>

                            <p>
                                <?php echo show_content("11", "description", $DB_LINK)?>
                            </p>

                            <div class="common-btn">
                                <a class="all-btn" href="room.html">View Rooms <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                        <div class="room-right" data-aos="fade-left" data-aos-duration="1000">
                            <!-- <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/f_auto,q_auto/jxp1mjz7uo32kcqxgjjg"
                                alt=""> -->
                            <div class="custom-slider">
                                <div class="slider-wrapper">
                                 <!-- //For looping the children from parent -->
                                <?php 
                                $sql = "select * from tbl_category where parent_id=11 and status=1 order by ord asc limit 0,4";
                                $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                                foreach($qry as $row)
                                { 
                                    
                                ?>
                                    <div class="slider-slide">
                                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="Image 1">
                                    </div>
                                  
                                    <!-- Add more slides as needed -->
                                    <?php }?>
                                </div>
                                <!-- Pagination Dots -->
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="offering-border"></div>
            <!-- =====Restaurant===== -->
            <section class="restaurent-box">
                <div class="container">
                    <div class="restaurent-flex">
                        <div class="restaurent-right" data-aos="fade-right" data-aos-duration="1000">
                            <!-- <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/f_auto,q_auto/gofqermuejjr36p1ea7e"
                                alt=""> -->
                            <div class="custom-slider">
                                <div class="slider-wrapper">
                                         <!-- //For looping the children from parent -->
                                <?php 
                                $sql = "select * from tbl_category where parent_id=19 and status=1 order by ord asc limit 0,4";
                                $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                                foreach($qry as $row)
                                { 
                                    
                                ?>
                                    <div class="slider-slide">
                                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="Image 1">
                                    </div>
                                     
                                    <!-- Add more slides as needed -->
                                    <?php }?>
                                </div>
                                <!-- Pagination Dots -->
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                        <!-- === -->
                        <div class="restaurent-left">
                            <h2><?php echo show_content("19", "title", $DB_LINK)?></h2>




                            <p>
                                <?php echo show_content("19", "description", $DB_LINK)?>

                            </p>

                            <div class="common-btn">

                                <a class="all-btn" href="restaurant.html">View Restaurent <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="offering-border"></div>
            <!-- ====Banquet Hall====== -->
               <section class="Banquet-box">
                <div class="container">
                    <div class="Banquet-flex">
                        <div class="Banquet-left">
                            <h2><?php echo show_content("23", "title", $DB_LINK)?></h2>
                            <!-- <h4>Open For Reservation</h4> -->
                            <!-- <p>- Capacity to hold 300 PAX.</p> -->

                            <p><?php echo show_content("23", "description", $DB_LINK)?></p>
                            <div class="common-btn">
                                <a class="all-btn" href="banquethall.html">View Banquet <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                        <div class="Banquet-right" data-aos="fade-left" data-aos-duration="1000">
                            <img src="<?php echo show_content('24', 'image_url',$DB_LINK);?><?php echo show_content('24', 'images',$DB_LINK);?>" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ========== -->


        <div class="common-btn-tour" style="text-align: center;" data-aos="fade-up"
            data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">

            <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729078508/uenqsb0f39dw8fac73v2.png" alt="">
            <a class="all-btn" href="gallery.html">View Hotel Tour <i class="ri-arrow-right-up-line"></i></a>
            <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729078508/uenqsb0f39dw8fac73v2.png" alt="">

        </div>

        <!-- =======================
                    facility section       
        =======***Dynamic***======== -->

         <section class="Facilities" style="background-color: #fff;">
            <div class="Facilities-heading-main">
                <div class="Facilities-text container">

                    <h1 class="line-Facilities"><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> OUR
                        <span>FACILITIES <i class="ri-star-s-line icon-star"></i><i
                                class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i></span>
                    </h1>
                </div>
            </div>
            <div class="Facilities-line"></div>
            <div class="facilities-container">
                <div class="container-facilities grid grid-four-cols">
                     <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=15 and status=1 order by ord asc";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     $x = 1;
                     $upDown = "";
                     foreach($qry as $row)
                     { 
                        if($x === 1){
                            $upDown = "fade-down";
                            $x = 0;
                        }else{
                            $upDown = "fade-up";
                            $x = 1;
                        }
                         
                    ?>
                    <!-- ====24/7=== -->
                    <div class="facilities-box" data-aos="<?php echo $upDown; ?>" data-aos-duration="1000">
                        <div class="facilities-img">
                            <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                        </div>
                        <div class="facilities-data">
                            <h4><?php echo $row['title'] ?></h4>
                        </div>
                    </div>
                 <?php } ?>
                    




                </div>
            </div>


        </section>

        <!-- =======================
            testimonial section       
         ======================== -->
      
     <?php require("include/testimonial.php") ?>

        <!-- =======================
    Benefits of direct booking with us section       
        ======================== -->

        <section class="booking-benefits" style="background-color: #fff;">

            <div class="booking-heading-main">
                <div class="booking-text container">

                    <h1 class="line-booking"><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> Direct
                        <span>
                            Booking Benefits <i class="ri-star-s-line icon-star"></i><i
                                class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i></span>
                    </h1>
                </div>
                <div class="booking-line"></div>
            </div>

            <!-- ===========booking benefits data======= -->
            <div class="booking-benefits-main">
                <div class="container grid grid-four-cols">
                   

                    <?php 
                     $sql = "select * from tbl_category where parent_id=36 and status=1 order by ord asc";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     $x = 1;
                     $upDown = "";
                     foreach($qry as $row)
                     { 
                        if($x === 1){
                            $upDown = "fade-down";
                            $x = 0;
                        }else{
                            $upDown = "fade-up";
                            $x = 1;
                        }
                         
                    ?>

                    <div class="booking-benefits-box" data-aos="<?php echo $upDown; ?>" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                        <p><span class="booking-off"><?php echo $row['ext_link'] ?></span> <?php echo $row['ext_link2'] ?>
                        </p>
                    </div>
                    
                    <?php } ?>


                </div>
                <div class="booking-button" style="text-align: center;" data-aos="fade-up"
                    data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
                    <a
                        href="https://app.axisrooms.com/beV2/searchHotel.html?paxInfo=2%7C0%7C%7C&allHotels=true&newBe=true&productId=196558&bookingEngineId=4717&rooms=1&searchId=-1&searchNumber=1">Book
                        Now <i class="ri-arrow-right-up-line"></i></a>
                </div>
            </div>

        </section>

        <!-- =======================
                    google map section       
                 ======================== -->
    <section class="google-main">
            <div class="google-heading-main">
                <div class="google-text container">

                    <h1 class="line-google"><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i> OUR <span>
                            Location <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                                class="ri-star-s-line icon-star"></i></span></h1>
                </div>
                <div class="google-line"></div>
            </div>
            <div class="google-map">
                <div class="container grid grid-two-cols">
                    <div class="googleMap-left" data-aos="fade-down" data-aos-duration="1500">
                        <iframe
                            src="<?php echo $MAP?>"
                            width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="googleMap-btn " style="text-align: center;" data-aos="fade-up"
                            data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
                            <a href="https://www.google.com/maps/place/Hotel+Alokah+Kashi/@25.3575465,83.0085465,17z/data=!3m1!4b1!4m9!3m8!1s0x398e2f1ee9ec07bb:0x79096ea60f5baf16!5m2!4m1!1i2!8m2!3d25.3575417!4d83.0111214!16s%2Fg%2F11w3167s47?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank">Find us on Google Maps </a>
                        </div>
                    </div>

                    <div class="googleMap-grid-data-right" data-aos="fade-up" data-aos-duration="2000">
                        <div class="googleMap-data-right grid grid-two-cols">
                    <?php 
                     $sql = "select * from tbl_category where parent_id=41 and status=1 order by ord asc limit 0,10";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                            <!-- ==========1=========== -->
                            <div class="map-location-data">
                                <div class="location-data">

                                    <h3><?php echo $row['ext_link']; ?>  </h3>
                                    <p class="location-line">|</p>
                                    <p><?php echo $row['ext_link2']; ?> </p>
                                </div>
                            </div>
                            <?php }?>
                            

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
                    google map location section       
                 ======================== -->


        <!-- =======================
            footer section       
         ======================== -->
        <?php require("include/footer.php") ?>
        <!-- <button id="backToTop" title="Go to top"><i class="ri-arrow-up-fill"></i></button> -->
        
    </div>

    <!-- ++++++++++++++++++++++++++++++++++++++++++++ -->

 
    <?php require("include/js_link.php") ?>
 
</body>

</html>