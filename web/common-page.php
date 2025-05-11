<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/fav.png">
         <?php require("include/header_link.php") ?>
    <title> <?php echo $get_data_common_page['title'] ?> | <?php echo $SITE_NAME;?></title>
</head>

<body class="gallery-page" style="background-color: #fdebd041;">
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
    <?php require('include/fill_nav.php') ?>
    <!-- ***common heading  -->

    <!-- =======================
       gallery section
     ======================== -->

    <div class="privacyPocliy ">
        <div class="heading" style="margin-top: 25rem; text-align: center;">
            <h1>  <?php echo $get_data_common_page['title'] ?></h1>
        </div>
        <div class="container">
            <div class="privacyPocliy-data">
               <?php echo $get_data_common_page['description'] ?>

            </div>
            <!-- <img src="https://res.cloudinary.com/ddgkcvzcq/image/upload/v1730224032/ukdhtr2v9jiknqvd3u6z.png" width="100%" height="auto" alt=""> -->
        </div>
    </div>



    <!-- =======================
            footer section       
         ======================== -->
      <?php require("include/footer.php") ?>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++ -->


    
    <?php require("include/js_link.php") ?>
</body>

</html>