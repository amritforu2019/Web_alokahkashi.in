  <div class="testimonial">
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
                           <!-- //For looping the children from parent -->
                     <?php 
                     $sql = "select * from tbl_category where parent_id=17 and status=1 order by ord";
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
                                <p><?php echo $row['description']; ?></p>
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
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0LDc2NDMvNjE3YLRSNagwtrRINUozTE21TE02ME9KsjKoMLc0sDRLTTQzSDNNSkwzNPMSysgvSc1RSMzJz07MUMhOLM7IBAD0URXl&q=hotel+alokah+kashi&oq=hotel+alokah+&gs_lcrp=EgZjaHJvbWUqEwgBEC4YrwEYxwEYgAQYmAUYmQUyBggAEEUYOTITCAEQLhivARjHARiABBiYBRiZBTIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIKCAYQABiABBiiBDIKCAcQABiABBiiBDIKCAgQABiABBiiBNIBCTg1MDhqMGoxNagCCLACAQ&sourceid=chrome&ie=UTF-8#lrd=0x398e2f1ee9ec07bb:0x79096ea60f5baf16,1"
                            target="_blank"><img src="assets/web/images/googleReviesImg/gr.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>