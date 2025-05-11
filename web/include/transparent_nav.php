 <nav>
     <!-- -------------- -->
     <div class="top-nav">
         <div class="left-top-nav">
             <div class="top-nav-contact">
                 <div class="top-nav-contact-data">
                     <i class="ri-phone-line"></i>
                     <?php
                        if (basename($_SERVER['REQUEST_URI']) == 'restaurant.html') {
                        ?>
                         <p><?php
                            echo show_content("239", "title_hi", $DB_LINK) ?>
                         </p>
                     <?php } else { ?>
                         <p>
                             <?php echo $MOBILE2 ?>
                         </p>
                     <?php } ?>
                 </div>
                 <div class="top-nav-email-data">
                     <i class="ri-mail-open-line"></i>
                     <?php
                        if (basename($_SERVER['REQUEST_URI']) == 'restaurant.html') {
                        ?>
                         <p><?php echo show_content("239", "ext_link", $DB_LINK) ?></p>
                     <?php } else { ?>
                         <p><?php echo $EMAIL_ID ?></p>
                     <?php } ?>
                 </div>
             </div>
         </div>
         <div class="right-top-nav">
             <div class="top-nav-socialLinks">
                 <a href="<?php echo $F ?>"><i class="ri-facebook-line"></i></a>
                 <a href="<?php echo $Y ?>"><i class="ri-youtube-line"></i></a>
                 <a href="<?php echo $I ?>"><i class="ri-instagram-line"></i></a>
                 <a href="<?php echo $W ?>"><i class="ri-whatsapp-line"></i></a>
             </div>
         </div>
     </div>
     <!-- -------------- -->

     <div class="nav1">
         <div class="nav1-left">
             <a href="#" id="menu-toggle">
                 <i class="ri-menu-line icons"></i>
                 <p>Menu</p>
             </a>
         </div>
         <div class="nav1-center">
             <a href="index.html">
                 <img src="assets/web/images/all-logo.svg" alt="Logo" />
             </a>
         </div>
         <div class="nav1-right">
             <a href=" https://app.axisrooms.com/beV2/searchHotel.html?paxInfo=2%7C0%7C%7C&allHotels=true&newBe=true&productId=196558&bookingEngineId=4717&rooms=1&searchId=-1&searchNumber=1 "
                 target="_blank">
                 <p>Book <span style="margin-left: 0.3rem;"> Now</span></p>
                 <i class="ri-shopping-bag-4-line icons"></i>
             </a>
         </div>
     </div>
     <div class="nav2">
         <!-- <a href="index.html">Home</a> -->
         <a href="about.html">About Us</a>
         <a href="room.html">Rooms</a>
         <a href="restaurant.html">Restaurant</a>
         <a href="banquet_hall.html">Banquet Hall</a>
         <a href="gallery.html">Gallery </a>
         <a href="#explore-varanasi">Explore Varanasi</a>
         <a href="contact.html">Contact Us</a>
     </div>
 </nav>
 <!-- =======================
       responsive navbar section
     ======================== -->
 <div id="overlay-menu" class="overlay">
     <a href="#" class="close-btn" id="close-menu">
         <i class="ri-close-line mobile-close"></i>
         <!-- Remix Icon for close -->
     </a>
     <div class="overlay-content">
         <div class="left-menu">
             <ul>

                 <li><a href="index.html"> I. Home</a></li>
                 <li><a href="about.html"> I. About Us</a></li>
                 <li><a href="room.html"> II. Rooms</a></li>
                 <li><a href="restaurant.html"> III. Restaurant</a></li>
                 <li><a href="banquethall.html">VI. Banquet Hall</a></li>
                 <li><a href="gallery.html"> IV. Gallery </a></li>
                 <li><a href=""> V. Explore Varanasi</a></li>
                 <li><a href="contact.html"> VII. Contact</a></li>
             </ul>
         </div>
         <div class="right-content">
             <div class="mobile-responsive-logo">
                 <img src="assets/web/images/all-logo.svg" alt="" />
                 <br>
                 <p style=" padding-top: 2rem;color: #fff;"> <img
                         style="width: 19px;height: 1px;     margin-left: 6rem;" src="assets/web/images/whiteLine.png"
                         alt=""> Premium 3 Star hotel <img style="width: 19px;height: 1px;"
                         src="assets/web/images/whiteLine.png" alt=""></p>
             </div>
             <div class="mobile-responsive-data">


                 <p>
                     <i class="ri-map-pin-line"></i> <?php echo $ADDRESS ?></span>
                 </p>
                 <p> <i class="ri-phone-line"></i> <?php echo $MOBILE2 ?> </p>
                 <p> <i class="ri-mail-send-line"></i> <?php echo $EMAIL_ID ?></p>
                 <p class="responsive-a">
                     <a href="tel: 9151454301">Contact Us <i class="ri-arrow-right-line"></i></a>
                 </p>
             </div>
             <div class="mobile-responsive-social">
                 <a href="<?php echo $F ?>"><i class="ri-facebook-line"></i></a>
                 <a href="<?php echo $Y ?>"><i class="ri-youtube-line"></i></a>
                 <a href="<?php echo $I ?>"><i class="ri-instagram-line"></i></a>
                 <a href="<?php echo $W ?>"><i class="ri-whatsapp-line"></i></a>
             </div>
         </div>
     </div>
 </div>