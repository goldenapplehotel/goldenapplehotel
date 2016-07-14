<div id="subheader">
    <h1>BOOKING</h1>
    <h3>Five Stars Hotel</h3>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact_form_holder">
                    <form name="contactForm" id='booking_form' method="post" action='reservation.php'>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" />
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
                                <option>Select Room</option>
                                <option>Single Room</option>
                                <option>Double Room</option>
                                <option>Triple Room</option>
                                <option>Elegant Room</option>
                            </select>
                        </div>



                        <div class="col-md-12">
                            <textarea cols="10" rows="8" name="message" id="message" class="form-control" placeholder="Any Messages?"></textarea>
                            <div id="error_message" class="error">Please check your message</div>
                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>

                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>

                            <p id="btnsubmit">
                                <input type="submit" id="send" value="Send" class="btn btn-custom" />
                            </p>
                        </div>


                    </form>
                </div>

            </div>

            <div id="sidebar" class="col-md-4">
                <!-- widget -->
                <div class="widget widget-text">
                    <h3>Our Address</h3>
                    <div class="map-small">
                        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=16+Riverside+Rd,+Singapore&amp;sll=-2.547988,118.037109&amp;sspn=29.394918,50.756836&amp;ie=UTF8&amp;geocode=Fb8IFgAdu40vBg&amp;split=0&amp;hq=&amp;hnear=16+Riverside+Rd,+Singapore&amp;ll=1.444031,103.779771&amp;spn=0.014522,0.024784&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=false"></iframe>
                    </div>

                    <address>
                        <h4>Corsiva South Beach</h4>
                        <span>20 Main Street, Melbourne</span>
                        <span><strong>Phone:</strong>(200) 333 8890</span>
                        <span><strong>Fax:</strong>(200) 333 8892</span>
                        <span><strong>Email:</strong><a href="mailto:contact@example.com">contact@example.com</a></span>
                        <span><strong>Web:</strong><a href="#test">http://example.com</a></span>
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