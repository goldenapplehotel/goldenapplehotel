

<!-- subheader begin -->
<div id="subheader">
    <h1>News</h1>
    <h3>Latest Info</h3>
</div>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-read">
                    <?php foreach ($news->result() as $value){?>


                        <div class="preview">
                            <img src="<?php echo base_url();?>assets/img/news/<?php echo $value->img;?>" alt="">
                            <h6>
                                <?php
                                $timestamp = strtotime($value->date_news);
                                $formattedDate = date('F d, Y', $timestamp);
                                echo $formattedDate;
                                ?>
                            </h6>
                            <h3 class="blog-title">  <?php echo $value->title;?></h3>
                            <p><?php echo $value->des;?></p>
                            <hr>


                        </div>

                    <?php }?>
                    <div class="meta-info">By: <a href="#">Admin</a> </div>
                </div>

                <div id="blog-comment">
                    <div class="fb-comments" data-href="http://goldenapplehotelpp.com/cms/news" data-numposts="5"></div>
                </div>

            </div>

            <div id="sidebar" class="col-md-4">


                <!-- widget tags -->


                <!-- widget text -->
                <div class="widget widget-text">
                    <h3>Our Address</h3>
                    <iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=11%C2%B032'44.3%22N%20104%C2%B050'12.8%22E&key=AIzaSyAamVMPmk0OPeO3AsC_RHuOv_sSNFUnFVo" allowfullscreen></iframe>


                    <address>
                        <span>No. 596, Road No. 4, Confederation de la Russie (110), Porsenchey, Choumchao, Phnom Penh, Cambodia. Phnom Penh</span>
                        <span><strong>Phone:</strong>+85585 288 188</span>
                        <span><strong></strong>+85590 288 188</span>
                        <span><strong></strong>+85510 288 188</span>
                        <span><strong>Email:</strong><a href="in@goldenapplehotelpp.com">in@goldenapplehotelpp.com</a></span>
                        <span><strong>Web:</strong><a href="http://goldenapplehotelpp.com/">http://goldenapplehotelpp.com/</a></span>
                    </address>

                </div>

            </div>
        </div>

        <div class="map">
        </div>

    </div>
</div>

