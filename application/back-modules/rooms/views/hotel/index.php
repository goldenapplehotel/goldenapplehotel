
<div class="well well-sm">
    <a href="<?php echo base_url('rooms/new_hotel_service')?>" type="button" class="btn btn-primary btn-xs">New</a>
    <div id="chk" class="btn btn-primary btn-xs navbar-right"></div>
</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>N</th>
            <th>Title (En)</th>
            <th>Title (Ch)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
       
        foreach ($data->result() as $key => $value)
        {?>

            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $value->en_title;?></td>
                <td><?php echo $value->ch_title;?></td>
                <td align="center">
                    <div class="checkbox checkbox-warning checkbox-tbl" style="margin-top: -8px;">
                        <input id="checkbox<?php echo $key;?>" type="checkbox" name="sch_checkbox[]" value="<?php echo $value->Id;?>" class="styled" <?php 
                        echo func_checkbox_check($value->_status);?> >
                        <label for="checkbox<?php echo $key;?>">
                            
                        </label>
                    </div>
                </td>
                <td>
                    <a href="<?php echo base_url()?>rooms/edite_hotel_service/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'rooms/delete_hotel_service/'.$value->Id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
<script>

var countChecked = function() {
  var n = $( "input:checked" ).length;
  $( "#chk" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
};
countChecked();
 
$( "input[type=checkbox]" ).on( "click",function(){

    countChecked();
    if(this.checked == true){
        $.ajax({
            url:"rooms/update_hotel_service_status",
            type:"post",
            data:{"Id":this.value,"_status":1},
            success:function(response){
                console.log(response);
            }
        });
    }else{
        $.ajax({
            url:"rooms/update_hotel_service_status",
            type:"post",
            data:{"Id":this.value,"_status":0},
            success:function(response){
                console.log(response);
            }
        });
    }
    
} );
</script>
