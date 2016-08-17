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
                        <div class="price">
                            <?php echo ' $'.$value->price;?><span>/night</span>
                        </div>
                        <?php 
                            if($value->pro_title != NULL){
                                echo '<h4>Protions</h4>';
                                echo '<p>'.$value->pro_description.'</p>';
                                echo '<div class="price">';
                                echo ' $'.$value->pro_percent.'<span>/night</span>';
                                echo '</div>';
                            }
                        ?>
                        
                        <!-- room close -->
                        <?php }?>
                        <a href="javascript:void(0)" id="btbooking" class="btn-border" >Book Now</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="top-booking" id="tbooking" style="display:none;">
    <div class="col-md-12" style="padding-left:0px;">
        <div class="col-md-6 mg-bottom-10">
            <input type="text" class="form-control" name="name" id="full_name" placeholder="Your Name" />
        </div>

        <div class="col-md-6 mg-bottom-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Your Email *" />
            <div id="error_email" class="error">Please check your email</div>
        </div>

        <div class="col-md-6 mg-bottom-10">
            <select name="guest" id="guest" class="form-control">
                <option>Number of Guests</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>>5</option>
            </select>
        </div>
        <div class="col-md-6 mg-bottom-10">
            <input type="text" class="form-control" name="checkin" id="checkin" placeholder="Check In Date" />
            <div id="error_datepicker" class="error">Please check again</div>
        </div>

        <div class="col-md-6 mg-bottom-10">
            <input type="text" class="form-control" name="checkout" id="checkout" placeholder="Check Out Date" />
            <div id="error_person_num" class="error">Please check again</div>
        </div>

        
        <div class="col-md-6">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" />
            <div id="error_person_num" class="error">Please check again</div>
        </div>
        <div class="col-md-12  mg-bottom-10">
            <textarea cols="6" rows="4" name="message" id="message" class="form-control" placeholder="Any Messages?"></textarea>
            <div id="error_message" class="error">Please check your message</div>
            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
            <div id="mail_failed" class="error">Error, email not sent</div>

            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
            <div id="mail_failed" class="error">Error, email not sent</div>
            <div id="alert-box"></div>
        </div>
        <div class="col-md-4  mg-bottom-10">
            <input type="submit" onclick="booking_room()" id="send" value="Send" class="btn btn-custom" />
            <button type="button" class="btn  btn-custom" onclick="removewDiv('tbooking')">Cancel</button>
        </div>

    </div>
</div>
<!-- content close -->

<script>
    jQuery(document).ready(function () {
        jQuery('#checkin').datepicker();
        jQuery('#checkout').datepicker();
    });
    function removewDiv(id){
        console.log('so');
        $( "#"+id ).fadeOut(600,function(){
            
        })
    }
</script>