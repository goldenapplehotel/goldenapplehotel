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
                             <h2 style="margin-top:0px;"><?php echo $value->title?></h2>
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
                        <div class="col-md-12 dis-none pd-all-0" id="dis_none">
                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <input type="text" class="form-control" name="name" id="full_name" placeholder="Your Name" />
                                <input type="hidden" class="form-control" name="title" value="<?php echo $value->title?>" id="full_title" />
                                <input type="hidden" class="form-control" name="room_code" value="<?php echo $value->Id?>" id="room_code" />
                            </div>

                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your Email *" />
                                <div id="error_email" class="error">Please check your email</div>
                            </div>

                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <select name="guest" id="guest" class="form-control">
                                    <option value="">Number of Guests</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" />
                                <div id="error_person_num" class="error">Please check again</div>
                            </div>
                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <input type="text" class="form-control" name="checkin" id="checkin" placeholder="Check In Date" />
                                <div id="error_datepicker" class="error">Please check again</div>
                            </div>

                            <div class="col-md-12 mg-bottom-10 pd-all-0">
                                <input type="text" class="form-control" name="checkout" id="checkout" placeholder="Check Out Date" />
                                <div id="error_person_num" class="error">Please check again</div>
                            </div>
                            
                            <div class="col-md-12  mg-bottom-10 pd-all-0">
                                <textarea cols="6" rows="4" name="message" id="message" class="form-control" placeholder="Any Messages?"></textarea>
                                <div id="error_message" class="error">Please check your message</div>
                                <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                <div id="mail_failed" class="error">Error, email not sent</div>

                                <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                <div id="mail_failed" class="error">Error, email not sent</div>
                                <div id="alert-box"></div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" id="btbooking" class="btn-border dis-none dis-block" >Book Now</a>
                        <a href="javascript:void(0)" onclick="booking_room()"  id="btsubmit" class="btn-border dis-none" >Book</a>
                        <a href="javascript:void(0)" id="btbookingcancel" class="btn-border dis-none" >Cacnel</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('#checkin').datepicker();
        jQuery('#checkout').datepicker();
        jQuery('#btbooking').click(function() {
            $(this).toggleClass('dis-block');
            $('#btsubmit').toggleClass('dis-none');
            
            $('#dis_none').toggleClass( "dis-block", 8000);
            $('#btbookingcancel').toggleClass( "dis-none");
            $('#alert-box').html('');
        });
        jQuery('#btbookingcancel').click(function() {
            $('#btbooking').toggleClass('dis-block');
            $('#btsubmit').toggleClass('dis-none');
            
            $('#dis_none').toggleClass( "dis-block", 8000);
            $(this).toggleClass( "dis-none");
            $('#alert-box').html('');
        });
    });
    
</script>
<script>
    
    function booking_room(){

        $('#alert-box').html('');

        var full_name = $('#full_name').val();
        var title = $('#full_title').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var guest = $('#guest').val();
        var checkin = $('#checkin').val();
        var checkout = $('#checkout').val();
        var room_type = $('#room_code').val();
        var phone = $('#phone').val();

        var resultData = '';
        if(full_name == ''||email==''||message==''||guest==''||checkin==''||checkout==''||room_type==''){
            resultData += '<div class="alert alert-warning">';
            resultData += '<strong>Oop!</strong> Please fill your information.';
            resultData += '</div>';
            $('#alert-box').append(resultData);

            $('#icon-send-mail').show();
            $('#closet-loading-gif').hide();
        }else {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>cms/room_booking",
                data: {

                    full_name: full_name,
                    email: email,
                    message: message,
                    checkin :checkin,
                    checkout :checkout,
                    room_type :room_type,
                    guest:guest,
                    phone:phone,
                    title:title,
                },
                success: function (results) {
                console.log(results);
                    $('#icon-send-mail').show();
                    $('#closet-loading-gif').hide();
                    $('#btbooking').toggleClass('dis-block');
                    $('#btsubmit').toggleClass('dis-none');
                    
                    $('#dis_none').toggleClass( "dis-block");
                    $('#btbookingcancel').toggleClass( "dis-none");

                    resultData += '<div class="alert alert-success">';
                    resultData += '<strong>Success! You has booking room successfully.</strong>.';
                    resultData += '</div>';

                    $('#alert-box').append(resultData);
                }
            });
        }
    }


</script>