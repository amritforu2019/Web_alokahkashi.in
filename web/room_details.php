<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/web/images/fav.png">
     <?php require("include/header_link.php") ?>

    <title><?php echo $data_services['room_type']?> || <?php echo $SITE_NAME?></title>
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

       <?php require("include/fill_nav.php") ?>
        <!-- =======================
           Room Details section       
         ======================== -->
        <div class="room-details-slider">
            <div class="owl-carousel owl-theme owl-carousel-room">
                <?php 
                $id = $data_services['room_id'];
                $sql = "select * from tbl_detailed_gallery where project_id=$id ";
                $qry = mysqli_query($DB_LINK, $sql);
                foreach($qry as $row){
                ?>
                <div class="item">
                    <img src="<?php echo $row['image_url'].$row['image']; ?>" alt="">
                </div>
                <?php }; ?>
            </div>
        </div>
        <!-- =======================
               Room data section       
             ======================== -->
        <div class="room-details-data">
            <div class="container  ">
                <div class="room-details-data-left">
                    <div class="room-details-heading" data-aos="fade-up" data-aos-duration="1000">
                        <h2><?php echo $data_services['room_type']?></h2>
                        <p><?php echo $data_services['short_desc']?></p>
                    </div>
                    <div class="room-details-amenities" data-aos="fade-up" data-aos-duration="1500">
                        <h3>Room Amenities</h3>
                        <div class="grid room-amenities-grid-four-cols">
                            <!-- ====Cable TV===== -->
                            <?php 
                                $id = $data_services['room_id'];
                                $sql = "select * from tbl_amenities_icons where project_id=$id ";
                                $qry = mysqli_query($DB_LINK, $sql);
                                foreach($qry as $row){
                            ?>
                            <div class="room-amenities-data">
                                <img src="<?php echo $row['image_url'].$row['image']; ?>" alt="">
                                <p><?php echo $row['icon_name']; ?>
                                </p>
                            </div>
                            <?php }; ?>
                             
                        </div>
                    </div>
                    <div class="common-btn  room-details-book-btn ">
                        <a class="all-btn resturent-all-btn"
                            href=" https://app.axisrooms.com/beV2/searchHotel.html?paxInfo=2%7C0%7C%7C&allHotels=true&newBe=true&productId=196558&bookingEngineId=4717&rooms=1&searchId=-1&searchNumber=1"
                            target="_blank">Book
                            Now <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
                <!-- ======right section======== -->
                <div class="room-details-data-right" data-aos="zoom-in-up" data-aos-duration="1500">



                </div>
                <!-- ====end room-details-right-box====== -->
            </div>
        </div>



        <!-- =======================
            footer section       
         ======================== -->
     <?php require("include/footer.php") ?>
       
        <!-- <button id="backToTop" title="Go to top"><i class="ri-arrow-up-fill"></i></button> -->

    </div>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++ -->


    <!-- =======================
         top slider swiper js
         ======================== -->

    <!--   *****   JQuery Link   *****   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!--   *****   Owl Carousel js Link  *****  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- =======================
                aos js
    ======================== -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


    <script src="script.js"></script>
    
     
    <?php require("include/js_link.php") ?>
    

</body>

</html>