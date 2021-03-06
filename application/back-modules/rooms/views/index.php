
<div class="well well-sm">
    <?php 
        $row = $room_type->num_rows();
        if($row >0){
            echo '<a href="'.base_url('rooms/new_room').'" type="button" class="btn btn-primary btn-xs">New</a>';
        }else{
            echo '<a href="'.base_url('rooms/new_room_type').'" type="button" class="btn btn-primary btn-xs">please set up room type before set up Room</a>';
        }
    ?>
    
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
                <td><?php echo $value->price;?></td>
                <td><?php echo character_limiter($value->en_description,10);?></td>
                <td><?php echo character_limiter($value->ch_description,10);?></td>
                <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/room/<?php echo $value->url?>"> </td>
                <td align="center">
                    <?php if($value->_status ==1){

                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }else{
                        echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                    }
                    ?>

                </td>
                <td>
                    <a href="<?php echo base_url()?>rooms/edit_room/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'rooms/delete_room/'.$value->Id.'/'.$value->url;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

