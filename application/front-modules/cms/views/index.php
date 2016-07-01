
<div class="clearfix"></div>
<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <div class="fx custom-carousel-1">
        <?php foreach ($get_room->result() as $value){?>
        <div class="room-item item">
            <div class="overlay">
                <a href="single-room.html">
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
                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="fa fa-bell-o"></i>
                        <div class="text">
                            <h3>Room Services</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="fa fa-coffee"></i>
                        <div class="text">
                            <h3>Free Coffee</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="fa fa-car"></i>
                        <div class="text">
                            <h3>Free Parking</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="fa fa-dropbox"></i>
                        <div class="text">
                            <h3>Deposit Box</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


</div>