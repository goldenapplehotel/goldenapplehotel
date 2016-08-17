<!-- subheader begin -->
<div id="subheader">
    <h1>Contact</h1>
    <h3>Get In Touch</h3>
</div>
<!-- subheader close -->

<div id="map-container">
    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=16+Riverside+Rd,+Singapore&amp;sll=-2.547988,118.037109&amp;sspn=29.394918,50.756836&amp;ie=UTF8&amp;geocode=Fb8IFgAdu40vBg&amp;split=0&amp;hq=&amp;hnear=16+Riverside+Rd,+Singapore&amp;ll=1.444031,103.779771&amp;spn=0.014522,0.024784&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=false"></iframe>
</div>

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12">
                    <h3>Get in touch with us now!</h3>
                    Feel free to contact us by contact to get more information.<br />
                    <br />
                </div>
                <div class="contact_form_holder">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" id="full_name" placeholder="Your Name" />
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" />
                        </div>

                        <div class="col-md-12">
                            <textarea cols="10" rows="10" name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>

                            <div id="alert-box"></div>
                            <p id="btnsubmit">
                                <input type="submit" onclick="sendEmail()" id="send" value="Send" class="btn btn-custom"/>
                            </p>
                        </div>

                </div>

            </div>

            <div id="sidebar" class="col-md-4">
                <!-- widget text -->

                <div class="widget widget-text">
                    <address>
                        <h4>Golden Apple Hotel Phnom Penh</h4>
                        <span>No. 596, Road No. 4, Confederation de la Russie (110), Porsenchey, Choumchao, Phnom Penh, Cambodia. Phnom Penh</span>
                        <span><strong>Phone:</strong>+85511 609 998</span>
                        <span><strong>Fax:</strong>(200) 333 8892</span>
                        <span><strong>Email:</strong>info@goldenapplehotelpp.com</span>
                        <span><strong>Web:</strong><a href="www.goldenapplehotelpp.com">www.goldenapplehotelpp.com</a></span>
                    </address>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- content close -->


<script>


    function sendEmail(){
        $('#icon-send-mail').hide();
        $('#closet-loading-gif').show();
        $('#alert-box').html('');
        var full_name = $('#full_name').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var resultData = '';
        if(full_name == '',email=='',message==''){
            resultData += '<div class="alert alert-warning">';
            resultData += '<strong>Oop!</strong> Please fill your content.';
            resultData += '</div>';
            $('#alert-box').append(resultData);

            $('#icon-send-mail').show();
            $('#closet-loading-gif').hide();
        }else {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>cms/sendEmail",
                data: {

                    full_name: full_name,
                    email: email,
                    message: message
                },
                success: function (results) {
                    console.log(results);
                    $('#icon-send-mail').show();
                    $('#closet-loading-gif').hide();

                    resultData += '<div class="alert alert-success">';
                    resultData += '<strong>Success! Your email has been sent successfully.</strong>.';
                    resultData += '</div>';

                    $('#alert-box').append(resultData);
                }
            });
        }
    }


</script>