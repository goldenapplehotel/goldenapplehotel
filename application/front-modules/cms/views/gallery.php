<div id="subheader">
    <h1>Gallery</h1>
    <h3>Five Stars Hotel</h3>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul id="filters">
                    <li><a href="#" data-filter="*" class="selected">show all</a></li>
                    <?php foreach ($main_gallery->result() as $value) {?>

                        <li><a href="#" data-filter=".<?php echo preg_replace('/\s+/', '', $value->en_name)?>"><?php echo  $value->en_name?></a></li>

                   <?php }?>


                </ul>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="gallery" class="gallery">

                    <?php foreach ($gallery->result() as $value_new) {?>
                    <!-- <h4>Gallery Title -->
                    <div class="item <?php echo preg_replace('/\s+/', '',$value_new->en_name)?>">
                        <a class="preview" href="<?php echo BASE_URL;?>assets/img/gallery/<?php echo $value_new->url;?>" data-gal="prettyPhoto" title="Your Title">
                            <img src="<?php echo BASE_URL;?>assets/img/gallery/<?php echo $value_new->url;?>" alt="" class="img-responsive">
                        </a>
                        <h4><?php echo $value_new->title?></h4>
                        <span>November 10, 2013</span>
                    </div>
                    <!-- close <h4>Gallery Title -->
                    <?php }?>

                </div>

            </div>
        </div>
    </div>
</div>

