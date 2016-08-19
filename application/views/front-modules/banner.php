<!-- slider -->
<div id="slider">
    <div class="callbacks_container">
        <ul class="rslides pic_slider">
            <?php foreach ($data_banner->result() as $value){?>
            <li>
                <img src="<?php echo BASE_URL;?>assets/img/banner/<?php echo $value->url?>" alt="">
            </li>
<?php }?>

        </ul>
    </div>
</div>
<!-- slider close -->

