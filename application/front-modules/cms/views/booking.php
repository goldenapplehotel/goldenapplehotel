<div id="subheader">
    <h1>BOOKING</h1>
    <h3>Five Stars Hotel</h3>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact_form_holder">

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" id="full_name" placeholder="Your Name" />
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Your Email *" />
                            <div id="error_email" class="error">Please check your email</div>
                        </div>

                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="checkin" id="checkin" placeholder="Check In Date" />
                            <div id="error_datepicker" class="error">Please check again</div>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="checkout" id="checkout" placeholder="Check Out Date" />
                            <div id="error_person_num" class="error">Please check again</div>
                        </div>

                        <div class="col-md-4">
                            <select name="room" id="room" class="form-control">

                                <?php foreach ($room_type->result() as $value){?>
                                    <option><?php echo $value->name;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" />
                            <div id="error_person_num" class="error">Please check again</div>
                        </div>


                        <div class="col-md-12">
                            <textarea cols="10" rows="8" name="message" id="message" class="form-control" placeholder="Any Messages?"></textarea>
                            <div id="error_message" class="error">Please check your message</div>
                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>

                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>
                            <div id="alert-box"></div>
                            <p id="btnsubmit">
                                <input type="submit" onclick="booking_room()" id="send" value="Send" class="btn btn-custom" />
                            </p>
                        </div>


                </div>

            </div>

            <div id="sidebar" class="col-md-4">
                <!-- widget -->
                <div class="widget widget-text">
                    <h3>Our Address</h3>
                    <div class="map-small">
                        <iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=11%C2%B032'44.3%22N%20104%C2%B050'12.8%22E&key=AIzaSyAamVMPmk0OPeO3AsC_RHuOv_sSNFUnFVo" allowfullscreen></iframe>
                    </div>

                    <address>
                        <h4>Golden Apple Hotel Phnom Penh</h4>
                        <span>No. 596, Road No. 4, Confederation de la Russie (110), Porsenchey, Choumchao, Phnom Penh, Cambodia. Phnom Penh</span>
                        <span><strong>Phone:</strong>+85585 288 188</span>
                        <span><strong></strong>+85590 288 188</span>
                        <span><strong></strong>+85510 288 188</span>
                        <span><strong>Email:</strong>info@goldenapplehotelpp.com</span>
                        <span><strong>Web:</strong><a href="www.goldenapplehotelpp.com">www.goldenapplehotelpp.com</a></span>
                    </address>


                </div>
                <!-- widget close -->
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('#checkin').datepicker();
        jQuery('#checkout').datepicker();
    });
</script>

<script>


    function booking_room(){

        $('#alert-box').html('');

        var full_name = $('#full_name').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var guest = $('#guest').val();
        var checkin = $('#checkin').val();
        var checkout = $('#checkout').val();
        var room_type = $('#room').val();
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
                    phone:phone
                },
                success: function (results) {
                console.log(results);
                    $('#icon-send-mail').show();
                    $('#closet-loading-gif').hide();

                    resultData += '<div class="alert alert-success">';
                    resultData += '<strong>Success! You has booking room successfully.</strong>.';
                    resultData += '</div>';

                    $('#alert-box').append(resultData);
                }
            });
        }
    }


</script>