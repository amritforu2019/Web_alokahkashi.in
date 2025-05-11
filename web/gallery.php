<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/web/images/fav.png">
    <link rel="stylesheet" href="assets/web/css/style.css" />
    <link rel="stylesheet" href="assets/web/css/responsive.css" />

    <!-- ================Rimix icons cdn================  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- ==============Oswald font============== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <!-- ==============hero slider swiper css============== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />



    <!-- ******* Plus Jakarta Sans cdn link  ******* -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <!-- *******  aos cdn link  ******* -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- *******  animista cdn link  ******* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- magnific-popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">


    <!-- *******  Font Awesome Icons Link  ******* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>GALLERY | <?php echo $SITE_NAME ?></title>
</head>

<body class="gallery-page" style="background-color: #fdebd041;">
    <!--*** =======================
             navbar section
       *** ======================== ***-->
    <?php require("include/fill_nav.php") ?>
    <!-- =======================
       gallery section
     ======================== -->
    <div class="gallery">
        <div class="gallery-heading">
            <h1>
                <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                    class="ri-star-s-line icon-star"></i>
                Our <span>Gallery</span> <i class="ri-star-s-line icon-star"></i><i
                    class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
            </h1>
        </div>
        <ul class="controls ">
            <li class="buttons active" data-filter="all">All</li>
            <!-- //For looping the children from parent -->
            <?php
            $sql = "select * from tbl_category where parent_id=257 and status=1 order by ord asc limit 0,20";
            $qry = mysqli_query($DB_LINK, $sql) or die(mysqli_error($DB_LINK));
            foreach ($qry as $row) {     ?>
                <li class="buttons" data-filter="<?php echo $row['url']; ?>"><?php echo $row['title_hi']; ?></li>
            <?php } ?>
        </ul>

        <div class="image-container">
            <?php
            $sql = "select * from tbl_category where parent_id=257 and status=1 order by ord asc limit 0,20";
            $qry = mysqli_query($DB_LINK, $sql) or die(mysqli_error($DB_LINK));
            foreach ($qry as $row) {
            ?>
                <?php
                $sql1 = "select * from tbl_category where parent_id='" . $row['id'] . "' and status=1 order by ord asc ";
                $qry1 = mysqli_query($DB_LINK, $sql1) or die(mysqli_error($DB_LINK));
                foreach ($qry1 as $row1) {
                ?>
                    <a href="<?php echo $row1['image_url'] ?><?php echo $row1['images'] ?>" class="image <?php echo $row['url']; ?>">
                        <img loading="lazy" src="<?php echo $row1['image_url'] ?><?php echo $row1['images'] ?>" alt="">
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <!-- =======================
            footer section       
         ======================== -->

    <?php require("include/footer.php") ?>
    <!-- =======================
                         aos js
              ======================== -->
    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- =======================
                aos js
    ======================== -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <?php require("include/js_link.php") ?>
    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function() {

            $('.buttons').click(function() {

                $(this).addClass('active').siblings().removeClass('active');

                var filter = $(this).attr('data-filter');

                if (filter === 'all') {
                    $('.image').fadeIn(400);
                } else {
                    $('.image').not('.' + filter).fadeOut(200);
                    $('.image').filter('.' + filter).fadeIn(400);
                }

            });

            $('.gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

        });
    </script>
    <script>
        (function(w, d, s, u) {
            w.gbwawc = {
                url: u,
                options: {
                    waId: "+91 9151454301",
                    siteName: "Alokah Kashi",
                    siteTag: "Online ",
                    siteLogo: "https://www.alokahkashi.in/web/assets/images/fev.png",
                    widgetPosition: "LEFT",
                    triggerMessage: "",
                    welcomeMessage: "Welcome To Alokahkashi Hotel, Varanasi’s Pinnacle Of Elegance",
                    brandColor: "#25D366",
                    messageText: "Hi sir, I want to book a",
                    replyOptions: ['Signature Room', 'Classic Room', 'Luxe Dormitory', 'SeeRa Restaurant'],
                },
            };
            var h = d.getElementsByTagName(s)[0],
                j = d.createElement(s);
            j.async = true;
            j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
            h.parentNode.insertBefore(j, h);
        })(window, document, "script", "https://waw.gallabox.com");
    </script>


    <script>
        // Check if user has visited before
        if (!localStorage.getItem("visited")) {
            // Show popup if first visit
            document.getElementById("popup").style.display = "flex";
            // Set visited flag in local storage
            localStorage.setItem("visited", "true");
        }

        // Hide popup on any click
        document.addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });
    </script>

</body>

</html>