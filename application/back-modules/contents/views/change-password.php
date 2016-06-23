
<div class="well well-sm">
    Change password
</div>
<form id="change_pass">

    <div class="thumbnail pd-10">
        <div class="row mg-top-10">
            <div class="col-md-2">Current password</div>
            <div class="col-md-4"><input type="password" class="form-control" name="c_pass"></div>
        </div>
        <div class="row mg-top-10">
            <div class="col-md-2">New password</div>
            <div class="col-md-4"><input type="password" class="form-control" name="n_pass"></div>
        </div>
        <div class="row mg-top-10">
            <div class="col-md-2">Confirm password</div>
            <div class="col-md-4"><input type="password" class="form-control" name="con_pass"></div>
        </div>

        <div class="row mg-top-10" style="display: none" id="con_pass_incorrect">
            <div class="col-md-6">
                <div class=" alert alert-warning">
                    <span>Your confirm password incorrect!</span>
                </div>
            </div>

        </div>

        <div class="row mg-top-10" style="display: none" id="current_incorrect">
            <div class="col-md-6">
                <div class=" alert alert-warning">
                    <span>Your current password incorrect!</span>
                </div>
            </div>

        </div>

        <div class="row mg-top-10" style="display: none" id="success">
            <div class="col-md-6">
                <div class=" alert alert-success">
                    <span>Your has been change password succes!</span>
                </div>
            </div>

        </div>

</form>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a onclick="change_passwords()" class="btn btn-primary btn-xs pull-right mg-right">Save</a>
            </div>
        </div>
    </div>



<script>
    function change_passwords()
    {
        var data = $("#change_pass").serialize();

        $.ajax({

            type : 'POST',
            url  : '<?php echo base_url();?>contents/process_change_password',
            data : data,

            success :  function(data)
            {
                if(data.sms == 0){
                    $('#con_pass_incorrect').show();

                }

                if(data.sms == 1){
                    $('#current_incorrect').show();
                }

                if(data.sms == 2){
                    $('#success').show();
                }

                console.log(data);
            }
        });

    }
    $('document').ready(function() {
        $('#login_btn').keypress(function(event){

            if(event.keyCode == '13'){
                submitFormLog();
            }
        });
    });

</script>

