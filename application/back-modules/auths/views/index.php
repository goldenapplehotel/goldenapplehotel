<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>

    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap-theme.css">

    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/admin.css">
</head>

<body>
<?php
echo form_open('auths/validate_credentials');
?>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" method="post">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  type="text" class="form-control" name="user_name" value="" placeholder=" username" autocomplete="off">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input  type="password" class="form-control" name="password" placeholder=" password" autocomplete="on">
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <?php
                            echo form_submit('submit', 'Login', 'class="btn btn-primary btn-xs"');
                            echo form_close();
                            ?>
                        </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>

</div>

<?php if (isset($not_found)){

    echo  'not found';
} ; ?>

</body>
</html