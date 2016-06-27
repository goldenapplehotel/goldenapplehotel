<!-- subheader begin -->
<div id="subheader">
    <h1>Deluxe</h1>
    <h3>Room</h3>
</div>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="room-single">
                <div class="col-md-8">
                    <ul class="slides single-room-carousel">
                        <?php foreach ($gallery->result() as $key => $value){

                            echo '<li><img src="'.BASE_URL.'assets/img/room/'.$value->url.'" class="img-responsive" alt=""></li>';

                        }
                        ?>

                    </ul>
                </div>

                <div class="col-md-4 ">
                    <div class="inner">
                        <?php foreach ($rooms->result() as $key => $value){?>
                        <!-- room begin -->
                           
                            <div class="text">
                            <h4>Overview</h4>
                            <p><?php echo $value->description;?></p>
                            <div class="room-specs">
                                <h4>Features</h4>
                                <ul>
                                    <?php echo funec_get_list_checkbox($value->feature,$feature); ?>
                                </ul>
                            </div>
                        </div>
                        <!-- room close -->
                        <?php }?>


                        <div class="price">
                            $300<span>/night</span>
                        </div>

                        <a href="#" class="btn-border">Book Now</a>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
<!-- content close -->
