<!-- subheader begin -->
<div id="subheader">
    <h1>The Room</h1>
    <h3>Modern & Spaciuos</h3>
</div>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row room-list">
            <?php foreach ($get_room->result() as $value){?>
            <!-- room begin -->
                <div class="col-md-6">
                    <div class="room-item item">
                        <div class="overlay">
                            <a href="single-room.html">
                                <h1><?php echo $value->title?></h1>
                            </a>
                            <div class="desc">
                               <?php echo $value->description;?>
                                <div class="price">$<?php echo $value->price;?><span>/night</span></div>
                                <a href="<?php echo BASE_URL.'cms/hotel/view/'.$value->Id.'/'.$lang; ?>" class="btn-border">View Details</a>
                            </div>
                        </div>
                        <img src="<?php echo BASE_URL.'assets/img/room/'.$value->url;?>" alt="">
                    </div>
                </div>
            <!-- room close -->
            <?php }?>
        </div>
    </div>
</div>
<!-- content close -->
