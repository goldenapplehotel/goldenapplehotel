

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
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=16+Riverside+Rd,+Singapore&amp;sll=-2.547988,118.037109&amp;sspn=29.394918,50.756836&amp;ie=UTF8&amp;geocode=Fb8IFgAdu40vBg&amp;split=0&amp;hq=&amp;hnear=16+Riverside+Rd,+Singapore&amp;ll=1.444031,103.779771&amp;spn=0.014522,0.024784&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=false"></iframe>


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

