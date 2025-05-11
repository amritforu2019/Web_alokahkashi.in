<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/web/images/fav.png">
      <?php require("include/header_link.php") ?>


    <title>Rooms | <?php echo $SITE_NAME?></title>
</head>

<body class="index-page">
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
                    <!-- ============S1============== -->
                      <?php 
                     $sql = "select * from tbl_category where parent_id=92 and status=1 order by ord asc limit 0,4";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <!-- <h1 class="slider-welcome">Explore</h1> -->
                                    <h1 class="slider-room-h2 room-slider-fonts"><?php echo $row['ext_link']; ?></h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                         
                        <div class="slider-blend-bg"></div>
                    </div>
                    <?php };?>
                    <!-- =====S2====== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/RoomsSlider/rs2.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                   
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="slider-blend-bg"></div>
                    </div> -->
                     
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/RoomsSlider/rs3.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                   
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                      
                        <div class="slider-blend-bg"></div>
                    </div> -->

                    <!-- ======C1===== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                            data-background="https://res.cloudinary.com/ddgkcvzcq/image/upload/t_C3/kblkxrmftfybqkv50hhg.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                   
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    
                        <div class="slider-blend-bg"></div>
                    </div> -->
                    <!-- =====C2====== -->



                    <!-- =====D1====== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="assets/RoomsSlider/rs4.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                         
                        <div class="slider-blend-bg"></div>
                    </div> -->
                    <!-- =====D2====== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                            data-background="https://res.cloudinary.com/ddgkcvzcq/image/upload/t_D2/cvlddgw2yxvxfhtabpeg.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                      
                        <div class="slider-blend-bg"></div>
                    </div> -->
                    <!-- ======D3===== -->
                    <!-- <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                            data-background="https://res.cloudinary.com/ddgkcvzcq/image/upload/t_D3/aospnnkwdboeerk3e7t4.jpg">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    
                                    <h1 class="slider-room-h2 room-slider-fonts">24 spacious rooms</h1>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    
                        <div class="slider-blend-bg"></div>
                    </div> -->

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
            our offering section       
         ======================== -->
        <div class="room-bg">
            <div class="room-section">
                <div class="room-container container">
                    <!-- ================Room 1========== -->
                     <?php 
                     $sql = "select * from tbl_rooms ";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                    $forDiv = 1;
                    $forContent = 1;
                    $divName = "";
                    $light_box = ["classicRoom", "deluxeRoom"];
                    $light_box_num = 0;
                     foreach($qry as $row)
                     { if($forDiv % 2== 0){
                            $divName = "room-flex-data2";
                            $forDiv+=1;
                        }else{
                            $divName = "room-flex-data";
                            $forDiv+=1;
                        }
                         
                    ?>
                    <div class="<?php echo $divName; ?>">
                        <?php 
                         if($forContent % 2 == 0){
                        ?>
                        <div class="room-right-text classic-room" data-aos="fade-left" data-aos-duration="1400"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="room-right-icons-data">
                                <div class="room-right-icons-data-left">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['guests']; ?></p>
                                </div>
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['rooms']; ?></p>
                                </div>
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['area']; ?></p>
                                </div>
                            </div>
                            <h2><?php echo $row['room_type']; ?></h2>
                            <!-- <h4>Biggest Rooms in Varansai + Private Balcony.</h4> -->
                            <p class="room-right-text-para">
                               <?php echo $row['short_desc']; ?>
                            </p>

                            <div class="common-btn">
                                <a class="all-btn" href="<?php echo $row['url']; ?>">Book Now <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                        <div class="room-left-img classic-room-img" data-aos="fade-right" data-aos-duration="1600"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="all-common-slider" data-interval="5000">
                                <div class="slider-wrapper">
                                    <?php 
                                    $p_id = $row['room_id'];
                                $sql2 = "select * from tbl_project_gallery where project_id=$p_id ";
                                $qry2=mysqli_query($DB_LINK,$sql2) or die(mysqli_error($DB_LINK));
                                foreach($qry2 as $row2)
                                { 
                                    
                                ?>
                                     <div class="slider-slide">
                                        <a href="<?php echo $row2['image_url'] ?><?php echo $row2['image'] ?>" data-lightbox="abc"
                                            data-title="Image 1">
                                            <img src="<?php echo $row2['image_url'] ?><?php echo $row2['image'] ?>" alt="Image 1">
                                        </a>
                                    </div>
                                    <?php }; ?>
                                 
                                </div>
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                        <?php $forContent+=1; }else{?>
                        <!-- ================== -->
                        <div class="room-left-img classic-room-img" data-aos="fade-right" data-aos-duration="1600"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="all-common-slider" data-interval="5000">
                                <div class="slider-wrapper">
                                    <?php 
                                    $p_id = $row['room_id'];
                                $sql2 = "select * from tbl_project_gallery where project_id=$p_id ";
                                $qry2=mysqli_query($DB_LINK,$sql2) or die(mysqli_error($DB_LINK));
                                foreach($qry2 as $row2)
                                { 
                                    
                                ?>
                                     <div class="slider-slide">
                                        <a href="<?php echo $row2['image_url'] ?><?php echo $row2['image'] ?>" data-lightbox="abcd"
                                            data-title="Image 1">
                                            <img src="<?php echo $row2['image_url'] ?><?php echo $row2['image'] ?>" alt="Image 1">
                                        </a>
                                    </div>
                                    <?php }; ?>
                                 
                                </div>
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                        <!-- ======= -->
                        <div class="room-right-text classic-room" data-aos="fade-left" data-aos-duration="1400"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="room-right-icons-data">
                                <div class="room-right-icons-data-left">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['guests']; ?></p>
                                </div>
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['rooms']; ?></p>
                                </div>
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> <?php echo $row['area']; ?></p>
                                </div>
                            </div>
                            <h2><?php echo $row['room_type']; ?></h2>
                            <!-- <h4>Biggest Rooms in Varansai + Private Balcony.</h4> -->
                            <p class="room-right-text-para">
                               <?php echo $row['short_desc']; ?>
                            </p>

                            <div class="common-btn">
                                <a class="all-btn" href="<?php echo $row['url']; ?>">Book Now <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                        <?php $forContent+=1;}?>
                    </div>
                    <br>
                    <br>
                    <?php };?>
                    <!-- ========Room 2=========== -->
                    <!-- <div class="room-flex-data2">
                        <div class="room-right-text siganture-room" data-aos="fade-right" data-aos-duration="1300"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="room-right-icons-data">
                                <div class="room-right-icons-data-left">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> 2 Guests (+1)</p>
                                </div>
                                 
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> 3 Rooms</p>
                                </div>
                                <p>|</p>
                                <div class="room-right-icons-data-right">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> 330 Sqft</p>
                                </div>
                            </div>
                            <h2>Signature Room</h2>
                            
                            <p class="room-right-text-para">
                                The Signature room is our high-end luxury room with a large private
                                balcony and a host of additonal amenities. Available in double and twin arrangements.
                            </p>

                            <div class="common-btn">
                                <a class="all-btn" href="roomdetails.html">Book Now <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                       
                        <div class="room-left-img signature-room-img" data-aos="fade-left" data-aos-duration="1000"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="all-common-slider" data-interval="4000">
                                <div class="slider-wrapper">
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/sig1.png" data-lightbox="signatureRoom"
                                            data-title="Image 1">
                                            <img src="assets/RoomListSlider/sig1.png" alt="Image 1">
                                        </a>
                                    </div>
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/sig2.png" data-lightbox="signatureRoom"
                                            data-title="Image 2">
                                            <img src="assets/RoomListSlider/sig2.png" alt="Image 2">
                                        </a>
                                    </div>
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/sig3.png" data-lightbox="signatureRoom"
                                            data-title="Image 3">
                                            <img src="assets/RoomListSlider/sig3.png" alt="Image 3">
                                        </a>
                                    </div>
                                </div>
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                    </div> -->
                    <br><br>
                    <!-- ================Room 3========== -->
                    <!-- <div class="room-flex-data">
                        <div class="room-left-img family-room-img" data-aos="fade-right" data-aos-duration="1600"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="all-common-slider" data-interval="6000">
                                <div class="slider-wrapper">
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/f1.png" data-lightbox="deluxeRoom"
                                            data-title="Image 1">
                                            <img src="assets/RoomListSlider/f1.png" alt="Image 1">
                                        </a>
                                    </div>
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/f2.png" data-lightbox="deluxeRoom"
                                            data-title="Image 2">
                                            <img src="assets/RoomListSlider/f2.png" alt="Image 2">
                                        </a>
                                    </div>
                                    <div class="slider-slide">
                                        <a href="assets/RoomListSlider/f3.png" data-lightbox="deluxeRoom"
                                            data-title="Image 3">
                                            <img src="assets/RoomListSlider/f3.png" alt="Image 3">
                                        </a>
                                    </div>
                                </div>
                                <div class="slider-dots"></div>
                            </div>
                        </div>
                     
                        <div class="room-right-text family-room" data-aos="fade-left" data-aos-duration="1400"
                            data-aos-easing="ease-in-out" data-aos-mirror="true">
                            <div class="room-right-icons-data">
                                <div class="room-right-icons-data-left">
                                    <p><i class="ri-hotel-bed-line room-bed-icon"></i> 4/5 Guests</p>
                                </div>
                                <p>|</p>
                                <p><i class="ri-hotel-bed-line room-bed-icon"></i> 1/2 Rooms</p>
                                <p>|</p>
                                <p><i class="ri-hotel-bed-line room-bed-icon"></i> 400/425 Sqft</p>

                            </div>


                            <h2>Family Room</h2>
                             
                            <p class="room-right-text-para">
                                Ideal for both solo travellers and families or friends seeking quality time together,
                                our four- and five-bed family rooms (or luxe dormitories) provide the comfort of
                                spacious accommodations, complete with multiple lockers and two private washrooms for
                                added convenience.
                            </p>


                            <div class="common-btn">
                                <a class="all-btn" href="banquatdetails.html">Book Now <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>





        <!-- ========== -->


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