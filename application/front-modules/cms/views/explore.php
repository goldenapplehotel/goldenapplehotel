<div id="subheader">    <h1>EXPLORE</h1>    <h3>The Best Place</h3></div><div id="content" class="no-top no-bottom">    <?php foreach ($explores->result() as $key=>$value){?>    <section id="explore-1" class="side-bg">        <div class="col-md-6 col-md-offset-6 <?php echo $key % 2 ==0?'pull-right':'pull-left'?> image-container">            <div class="background-image"><img class="img-responsive" src="<?php echo base_url();?>assets/img/explore/<?php echo $value->img;?>"> </div>        </div>        <div class="container">            <div class="row">                <div class="col-md-5 <?php echo $key %2 ==0?' ':'col-md-offset-7'?>">                    <div class="inner-padding">                        <h2> <?php echo $value->title;?></h2>                        <?php echo $value->description;?>                        <div class="small-border"></div>                    </div>                </div>            </div>        </div>    </section>    <?php }?>    </div>