<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/web/images/fav.png">
      <?php require("include/header_link.php") ?>
    <title>ABOUT | <?php echo $SITE_NAME?></title>
</head>

<body class="gallery-page">
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
   <?php require("include/fill_nav.php")?>


    <!-- =======================
       about welcome section
     ======================== -->

    <section class="about-welcome">
        <div class="container grid grid-two-cols">
            <div class="about-welcome-left" data-aos="fade-up" data-aos-duration="1000">
                <h2>About us</h2>
                <p><?php echo show_content("59", "ext_link", $DB_LINK)?>

                </p>
                <p><?php echo show_content("59", "ext_link2", $DB_LINK)?></p>
            </div>
            <!-- ======== -->
            <div class="about-welcome-right" data-aos="fade-down" data-aos-duration="1500">
                <img src="<?php echo show_content('59', 'image_url',$DB_LINK);?><?php echo show_content('59', 'images',$DB_LINK);?>" alt="">
            </div>
        </div>
    </section>
    <!-- =======================
           hostX section
         ======================== -->
    <section class="hostX">
        <div class="container">
            <div class="hostX-headings" data-aos="fade-up" data-aos-duration="1000">
                <h1>
                    <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                    Managed By <span><img src="<?php echo show_content('60', 'image_url',$DB_LINK);?><?php echo show_content('60', 'images',$DB_LINK);?>" alt="" style=" width: 20%; height: auto;"></span> <i
                        class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                        class="ri-star-s-line icon-star"></i>
                </h1>
            </div>
            <div class="hostX-flex">
                <div class="hostX-left" data-aos="fade-left" data-aos-duration="1600">
                    <h3>About hostX</h3>
                    <p> 
                        <?php echo show_content("60", "description", $DB_LINK)?>
                    </p>
                </div>
                <div class="hotsx-line">
                    <p style="opacity: 0.5;">|</p>
                    <p style="opacity: 0.5;">|</p>
                    <p style="opacity: 0.5;">|</p>
                    <p style="opacity: 0.5;">|</p>
                    <p style="opacity: 0.5;">|</p>
                </div>
                <div class="hostX-right" data-aos="fade-right" data-aos-duration="1900">
                    <!-- <h4 style="padding-bottom: 2rem; font-weight: 400; text-transform: uppercase;">For Enquiries, Reach out to </h4> -->
                    <p><span>Contact us :</span> <?php echo show_content("60", "ext_link", $DB_LINK)?></p>
                    <p style="padding-top: 2rem;"><span>Email :</span> <?php echo show_content("60", "ext_link2", $DB_LINK)?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================
           about amenities section
         ======================== -->

    <section class="about-amenities">
        <div class="about-amenities-headings container" data-aos="fade-up" data-aos-duration="1800">
            <h1>
                <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                    class="ri-star-s-line icon-star"></i>
                <span>Amenities</span> <i class="ri-star-s-line icon-star"></i><i
                    class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
            </h1>
        </div>
        <div class="about-amenities-data">
            <div class="container-about-amenities grid grid-four-cols">
                    <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=61 and status=1 order by ord asc limit 0,20";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     foreach($qry as $row)
                     { 
                         
                    ?>
                <!-- ====Cable TV===== -->
                <div class="about-amenities-box" data-aos="fade-up" data-aos-duration="1100">
                    <img src="<?php echo $row['image_url'] ?><?php echo $row['images'] ?>" alt="">
                    <p><?php echo $row['title']; ?></p>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>

    <!-- =======================
           about faq section
         ======================== -->
    <section class="about-faq">
        <div class="about-faq-headings">
            <div class="container">
                <div class="hostX-headings" data-aos="fade-up" data-aos-duration="1000">
                    <h1>
                        <i class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i>
                        <span>FAQ</span> <i class="ri-star-s-line icon-star"></i><i
                            class="ri-star-s-line icon-star"></i><i class="ri-star-s-line icon-star"></i>
                    </h1>
                </div>
            </div>
        </div>
        <!-- ====== -->
        <div class="about-faq-data">
            <div class="container">
                <!-- ========== -->
                  <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=78 and status=1 order by ord asc limit 0,15";
                     $qry=mysqli_query($DB_LINK,$sql) or die(mysqli_error($DB_LINK));
                     $n = 1;
                     foreach($qry as $row)
                     { if($n%2==0){
                        $direc = "fade-right";
                        $n+=1;
                     }else{
                        $direc = "fade-left";
                        $n+=1;
                     }
                         
                    ?>
                <div class="container-faq" data-aos="<?= $direc; ?>" data-aos-duration="1300">
                    <div class="question">
                        <?php echo $row['title']; ?>

                    </div>
                    <div class="answercont">
                        <div class="answer">
                           <?php echo $row['description']; ?>

                        </div>
                    </div>
                </div>

                    <?php } ?>





                <!-- ========== -->
                
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
               <?php require("include/js_link.php")?>
 

</html>