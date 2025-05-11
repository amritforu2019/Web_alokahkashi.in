<?php

if (isset($_POST['submit'])) {
    $cus_name = $_POST['cus_name'];
    $cus_phone = $_POST['cus_phone'];
    $guests = $_POST['guests'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $cus_msg = "Requirement from Contact Page. " . $_POST['cus_msg'];


    $sql = "insert into tbl_customer_requirements (cus_phone, event_name,event_date,guests,cus_msg,	cus_name) values (?, ?, ?, ?, ?, ?)";
    $stmt = $DB_LINK->prepare($sql);

    if ($stmt->execute([$cus_phone, $event_name, $event_date, $guests, $cus_msg,    $cus_name])) {
        $_SESSION['success'] = "Query Submitted, We will get back to you soon!!";
    } else {
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

    <title>Alokah Kashi</title>
</head>

<body class="gallery-page">
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

    <!--*** =======================
             navbar section
       *** ======================== ***-->
    <?php require("include/fill_nav.php") ?>


    <!-- =======================
           contact map section
         ======================== -->

    <!-- <section class="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.4107584074645!2d83.00854111093163!3d25.357546525093948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2f1ee9ec07bb%3A0x79096ea60f5baf16!2sHotel%20Alokah%20Kashi!5e0!3m2!1sen!2sin!4v1728157156115!5m2!1sen!2sin"
            width="100%" height="600" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section> -->


    <!-- =======================
           contact Details section
         ======================== -->

    <!-- <sction class="contact-details">
    <div class="container grid grid-three-cols">
        <div class="contact-box">
            <i class="ri-phone-line"></i>
            <h3>Call Us</h3>
            <p>+91-000000000</p>
        </div>
        <div class="contact-box">
            <i class="ri-mail-line"></i>
            <h3>Email Us :-</h3>
            <p>info@alokahkashi.in</p>
        </div>
        <div class="contact-box">
            <i class="ri-map-pin-line"></i>
            <h3>visit us :-</h3>
            <p>Paharia Rd, opposite Hero Motocorp Showroom, Akhtha, Sarnath, Varanasi, Uttar Pradesh 221007</p>
        </div>
    </div>
</sction> -->

    <!-- =======================
           contact form section
         ======================== -->
    <!-- <section class="contact-form">
            <div class="container">
                <form action="">
                    <input type="text" placeholder="Name*">
                    <br>
                    <input type="text" placeholder="Email*">
                    <br>
                    <input type="tel" placeholder="Mobile No*">
                    <br>
                    <textarea name="" id="" placeholder="Message If any"></textarea>

                </form>
            </div>
         </section> -->

    <section class="res-contact" style="margin-top: 16rem;" id="res-contact-filed">
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
                            <button class="all-btn" style="display: inline-block; text-align: right;" name="submit" type="submit"> Submit
                                <i class="ri-arrow-right-up-line"></i></button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- ============ -->
            <div class="res-contact-right">
                <div class="res-contact-right-box">
                    <h3 data-aos="fade-up" data-aos-duration="1000">Call Us :-</h3>

                    <p id="res-cont-no" data-aos="fade-up" data-aos-duration="1800"> <?php echo show_content("306", "title_hi", $DB_LINK) ?></p>
                </div>
                <div class="res-contact-right-box">
                    <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="2200">Email Us :-</h3>
                    <p id="res-cont-event" data-aos="fade-up" data-aos-duration="2600">
                        <?php echo show_content("306", "ext_link", $DB_LINK) ?></p>

                </div>
                <div class="res-contact-right-box">
                    <h3 style="padding-top: 2rem;" data-aos="fade-up" data-aos-duration="3000">visit us :-</h3>
                    <p id="res-cont-event" data-aos="fade-up" data-aos-duration="3000"><?php echo show_content("306", "ext_link2", $DB_LINK) ?></p>

                </div>
            </div>
        </div>
    </section>


    <!-- =======================
            footer section       
         ======================== -->
    <?php require("include/footer.php") ?>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++ -->

    <!-- =======================
                         aos js
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

</html>