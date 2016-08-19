
<div class="clearfix"></div>
<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <div class="fx custom-carousel-1">
        <?php foreach ($get_room->result() as $value){?>
        <div class="room-item item">
            <div class="overlay">
                <a href="<?php echo BASE_URL.'cms/hotel/view/'.$value->Id.'/'.$lang;?>">
                    <h1><?php echo $value->title?></h1>
                </a>
                <div class="desc">
                   <?php echo $value->description;?>
                    <div class="price">$<?php echo $value->price;?><span>/night</span></div>
                    <a href="<?php echo BASE_URL.'cms/hotel/view/'.$value->Id.'/'.$lang;?>" class="btn-border">View Details</a>
                </div>
            </div>
            <img src="<?php echo BASE_URL.'assets/img/room/'.$value->url;?>" alt="">
        </div>
        <?php }?>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <hr>
                <div class="col-md-12 pd-right-10-media">
                    <h2 class="txt-align-center">Welcome To</h2>
                    <p class="alg-justify pd-right-10">
                        <?php
                            foreach ($welcome->result() as $key => $value) {
                                echo $value->title;
                            }
                        ?>
                    </p>
                </div>
                <div class="col-md-12 pd-right-10-media">
                    <h2 class="txt-align-center">Hotel Services</h2>
                    <div class="room-specs">
                        <ul>
                            <?php
                                foreach ($hotel->result() as $key => $value) {
                                    echo '<li class="no-border">'.$value->title.'</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

</div>
