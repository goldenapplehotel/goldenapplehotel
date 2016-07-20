
<div class="well well-sm">
    <a href="<?php echo base_url('rooms/new_room_type')?>" type="button" class="btn btn-primary btn-xs">New</a>
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
                <td><?php echo $key+1 ;?></td>
                <td><?php echo $value->en_name;?></td>
                <td><?php echo $value->ch_name;?></td>
                <td>
                    <?php if($value->_status ==1){

                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }else{
                        echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                    }
                    ?>

                </td>
                <td>
                    <a href="<?php echo base_url()?>rooms/edit_room_type/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'rooms/delete_room_type/'.$value->Id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>

        <?php   } ?>
        </tbody>
    </table>

