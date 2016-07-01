
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
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2>Welcome To</h2>
                    </div>
                    
                </div>
                <hr>
                <div class="col-md-6">
                    <p class="alg-justify">Golden Apple — the first and only Airport Hotel -star boutique hotel. The hotel is small, but it
certainly has an impeccable style, unique architecture, unique interior design and high quality service.
Are cost-effective location — in International Airport, a 3-minute walk from the Phnom Penh Airport
and 25-minute from Downtown, as well as trendy restaurants and clubs, Sky bar. Golden Apple three
luxurious rooms of seven categories, including one suites. Each of our rooms is decorated in a certain
color of the rainbow, and in finishing rooms organically using natural materials — wood, marble, slate.
Author of the project — the Cambodian architect Round the clock access to trained personnel, business
center will make your stay a comfortable and memorable, and memories of Airport Hotel— very
pleasant.</p>
                </div>
                <div class="col-md-6">
                    <h2>Hotel Services</h2>
                    <div class="room-specs">
                        <ul>
                            <li class="no-border">24 Hours Front Desk</li>
                            <li class="no-border">Lobby</li>
                            <li class="no-border">Wireless Internet access ( Wi-Fi)</li>
                            <li class="no-border">Investment Consultant Services</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <!--  <section>

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
    </section> -->


</div>

<style type="text/css"></style>