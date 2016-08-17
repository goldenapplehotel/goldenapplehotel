
<div class="well well-sm">
    <!-- <a href="<?php echo base_url('tools/new_nav')?>" type="button" class="btn btn-primary btn-xs"></a> -->
    <a href=""  type="button" class="btn btn-primary btn-xs"><div id="chk" class="btn btn-primary btn-xs navbar-right"></div></a>
</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>N</th>
            <th>Title (En)</th>
            <th>Title (Ch)</th>
            <th>Price</th>
            <th>Description (En)</th>
            <th>Description (Ch)</th>
            <th>Photo</th>
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
                <td><?php echo $value->price;?></td>
                <td><?php echo character_limiter($value->en_description,10);?></td>
                <td><?php echo character_limiter($value->ch_description,10);?></td>
                <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/room/<?php echo $value->url?>"> </td>
                <td align="center">
                    <div class="checkbox checkbox-warning checkbox-tbl">
                    <input id="checkbox<?php echo $key;?>" type="checkbox" name="sch_checkbox[]" value="<?php echo $value->Id;?>" class="styled" <?php 
                    echo func_checkbox_check($value->front_status);?> >
                    <label for="checkbox<?php echo $key;?>">
                        
                    </label>
                </div>
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
            url:"tools/tools_status_update",
            type:"post",
            data:{"Id":this.value,"front_status":1},
            success:function(response){
                console.log(response);
            }
        });
    }else{
        $.ajax({
            url:"tools/tools_status_update",
            type:"post",
            data:{"Id":this.value,"front_status":0},
            success:function(response){
                console.log(response);
            }
        });
    }
    
} );
</script>

