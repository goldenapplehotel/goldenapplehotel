<!-- slider -->
<div id="slider">
    <div class="callbacks_container">
        <ul class="rslides pic_slider">
            <?php foreach ($data_banner->result() as $value){?>
            <li>
                <div class="text-wrap ">
                    <div class="inner ">
                        <div class="mid">
                            <h3>The Best Value</h3>
                            <h1>Under The Sun</h1>
                            <div class="desc">
                              <?php echo  $value->en_description?>
                            </div>
                        </div>
                    </div>

                </div>
                <img src="<?php echo BASE_URL;?>assets/img/banner/<?php echo $value->url?>" alt="">
            </li>
<?php }?>

        </ul>
    </div>
</div>
<!-- slider close -->

