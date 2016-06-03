<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="EXPIRES" CONTENT=0>
    

    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/main.css">
    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font-awesome.css">

    <script src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.isotope.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/easing.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.lazyload.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.ui.totop.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/selectnav.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/ender.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/responsiveslides.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/custom.js"></script>
    
</head>

<body>

    <?php
    $this->load->view('front-modules/nav-top');
    $this->load->view($banner);
    $this->load->view($main_content);
    $this->load->view('front-modules/footer'); 
    ?>

<script>
    /**
     * Created by Chanda on 5/29/2016.
     */
    function myFacebookLogin() {
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', {fields: 'name,email,picture'}, function(response) {
                    console.log(response);
                    $.ajax({

                        type : 'POST',
                        url  : '<?php echo BASE_URL;?>users/facebook_login',
                        data : {
                            'id':response.id,
                            'username':response.name,
                            'email':response.email,
                            'profile':response.picture.data.url
                        },

                        success :  function(data)
                        {
                            if(data.sms == 'success'){
                                window.location ='<?php echo BASE_URL?>mypage/index'

                            }
                            console.log(data);
                        }
                    });
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1611985699092060',
            xfbml      : true,
            version    : 'v2.6'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Only works after `FB.init` is called



    (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1611985699092060";
            fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>
</body>
</html>