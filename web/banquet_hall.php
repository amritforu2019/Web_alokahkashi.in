<?php
  
if(isset($_POST['submit'])){
    $cus_name = $_POST['cus_name'];
    $cus_phone = $_POST['cus_phone'];
    $guests = $_POST['guests'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $cus_msg = "Requirement from Banqet Hall. ".$_POST['cus_msg'];


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
    <title>BANQUETHALL | <?php echo $SITE_NAME?></title>
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
                     <?php 
                     $sql = "select * from tbl_category where parent_id=241 and status=1 order by ord asc  ";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                    <!-- ============S1============== -->
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                            data-background="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>">
                            <div class="container-slider-text">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <!-- <h1 class="slider-welcome">Explore</h1> -->
                                    <!-- <h1 class="slider-room-h2">Seera restaurant
                                    </h1> -->

                                    <h1 class="room-slider-fonts" style="color: #fff;padding-top: 2rem;"><?php echo $row['ext_link']; ?></h1>

                                    <a href="#quotes" class="down-arrow "></a>

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
        quote  section
======================== -->
        <section class="quote-banquet" id="quotes">
            <div class="container">
                <div class="quote-data" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img src="<?php echo show_content('244', 'image_url',$DB_LINK);?><?php echo show_content('244', 'images',$DB_LINK);?>" alt="">

                    <br>
                    <br><br><br>
                    <h1><?php echo show_content("244", "title_hi", $DB_LINK)?>
                    </h1>
                    <h1><?php echo show_content("244", "ext_link", $DB_LINK)?></h1>
                    <h1><?php echo show_content("244", "ext_link2", $DB_LINK)?></h1>

                    <br>
                    <br><br><br>

                </div>
            </div>
        </section>




        <!-- =======================
        Host Event section
======================== -->

        <section class="event banquat-quotes-bg">
            <div class="event-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Events <span>We Cater</span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
                <div
                    style="display: flex; align-items: center; justify-content: center; padding-top: 2rem; gap: 1rem; word-spacing: 0.5rem;">
                    <img src="<?php echo show_content('326', 'image_url',$DB_LINK);?><?php echo show_content('326', 'images',$DB_LINK);?>" alt=""
                        style="width: 30px;height: 30px;border-radius: 50%;">
                    <h3 style=" text-transform: uppercase; font-weight: 400;"> <?php echo show_content("326", "title", $DB_LINK)?>
                    </h3>
                </div>
            </div>
            <div class="event-list">
                <div class="container grid grid-two-cols">
                    <!-- ======= -->
                        <?php 
                     $sql = "select * from tbl_category where parent_id=245 and status=1 order by ord asc limit 0,20";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                      $data_duration = 1000;
                     foreach($qry as $row)
                     { $data_duration+=200;
                          
                    ?>
                    <div class="event-box" style="background-image: url('<?php echo $row['image_url'] ?><?php echo $row['images'] ?>')"
                        data-aos="fade-up" data-aos-duration="<?= $data_duration; ?>" data-aos-easing="ease-in-sine">
                        <h2><?php echo $row['title']; ?><span style="font-size: 2.5rem;"><?php echo $row['ext_link']; ?></span></h2>
                        <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                        <div class="common-btn resturen-btnn">
                            <a class="all-btn resturent-all-btn" href="#res-contact-filed">Book Now <i
                                    class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- ======= -->
                   

                    
                </div>
            </div>
        </section>

        <!-- =======================
        Restuarent Gallery 
       section
======================== -->
        <!-- <section class="res-gallery">
            <div class="res-gallery-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    PHOTO <span>GALLERY </span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            
           <div class="res-gallery-box">
                <div class="container">
                    <div class="res-gallery-flex">
                      
                        <div class="res-gallery-left" data-aos="fade-right" data-aos-duration="1000"
                            data-aos-easing="ease-in-sine">
                            <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                data-lightbox="gallery">
                                <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    alt="">

                            </a>
                        </div>
                       
                        <div class="res-gallery-right">
                            <div class="res-gallery-rImg1" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                            <br>
                            <br>
                            <div class="res-gallery-rImg1" data-aos="fade-right" data-aos-duration="1400"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="res-gallery-flex">
                       
                        <div class="res-gallery-right">
                            <div class="res-gallery-rImg1" data-aos="fade-left" data-aos-duration="1400"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                            <br>
                            <br>
                            <div class="res-gallery-rImg1" data-aos="fade-left" data-aos-duration="1200"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                        </div>
                      
                        <div class="res-gallery-left" data-aos="fade-left" data-aos-duration="1000"
                            data-aos-easing="ease-in-sine">
                            <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                data-lightbox="gallery">
                                <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    alt="">
                            </a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="res-gallery-flex">
              
                        <div class="res-gallery-left" data-aos="fade-right" data-aos-duration="1000"
                            data-aos-easing="ease-in-sine">
                            <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                data-lightbox="gallery">
                                <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    alt="">

                            </a>
                        </div>
              
                        <div class="res-gallery-right">
                            <div class="res-gallery-rImg1" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                            <br>
                            <br>
                            <div class="res-gallery-rImg1" data-aos="fade-right" data-aos-duration="1400"
                                data-aos-easing="ease-in-sine">
                                <a href="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                    data-lightbox="gallery">
                                    <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1729538279/gdweg1fk2aze8m9xatdh.png"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

        </section> -->


        <!-- =======================
            testimonial section       
         ======================== -->
      <?php require("include/testimonial.php") ?>
        <!-- =======================
            Get in Touch section       
         ======================== -->
        <!-- <section class="res-contact banquat-quotes-contact" id="res-contact-filed">
            <div class="res-contact-heading" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Get in Touch
                    <span>with us! </span> <i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <div class="container res-contact-flex">
                <div class="res-contact-left">
                    <div class="form-flex">
                        <form action="">
                            <div class="form-flex-input-one">
                                <input type="text" placeholder="Full Name" data-aos="fade-up" data-aos-duration="1000">
                                <input type="tel" placeholder="Mobile No" data-aos="fade-up" data-aos-duration="1400">
                            </div>
                            <div class="form-flex-input-one">
                                <select id="Event" name="Event" data-aos="fade-up" data-aos-duration="1800">
                                    <option value="" disabled selected>Select an Event</option>
                                    <option value="Event1">Kids birthday party</option>
                                    <option value="Event2">Kitty Party</option>
                                    <option value="Event3">Corporate lunch</option>
                                    <option value="Event4">Sangeet</option>
                                    <option value="Event5">Other</option>
                                </select>

                            
                                <input type="text" placeholder="Select Date"
                                    onfocus="this.type='date'; this.placeholder=''"
                                    onblur="if(!this.value) { this.type='text'; this.placeholder='Select Date'; }"
                                    id="event" name="event" data-aos="fade-up" data-aos-duration="2200">
                            </div>

                            <input type="text" placeholder="Number of Guests" data-aos="fade-up"
                                data-aos-duration="2600">
                            <textarea name="" placeholder="Message If any" id="" data-aos="fade-up"
                                data-aos-duration="3000"></textarea>

                            <div class="common-btn" style="margin-top:0rem; text-align:center;" data-aos="fade-up"
                                data-aos-duration="3000">
                                <a class="all-btn" style="display: inline-block; text-align: right;" href="#">Submit
                                    <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="res-contact-right">
                    <div class="res-contact-right-box">
                        <h3 data-aos="fade-up" data-aos-duration="1000">Call Us :-</h3>

                        <p id="res-cont-no" data-aos="fade-up" data-aos-duration="1800">+91 91514 54305 / 306</p>
                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="2200">Email Us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="2600">reservations@alokahkashi.in
                        </p>

                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="3000">visit us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="3000">Paharia Road, Akhtha,
                            Varanasi. Opp Hero Motocorp - Uttar Pradesh 221007</p>

                    </div>
                </div>
            </div>
        </section> -->


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

                        <p id="res-cont-no" data-aos="fade-up" data-aos-duration="1800"> <?php echo show_content("256", "title_hi", $DB_LINK)?></p>
                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="2200">Email Us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="2600">
                            <?php echo show_content("256", "ext_link", $DB_LINK)?></p>

                    </div>
                    <div class="res-contact-right-box">
                        <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="3000">visit us :-</h3>
                        <p id="res-cont-event" data-aos="fade-up" data-aos-duration="3000"><?php echo show_content("256", "ext_link2", $DB_LINK)?></p>

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

    <!-- =======================
                 hero slider swiper js
                 ======================== -->
       <?php require("include/js_link.php") ?>
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