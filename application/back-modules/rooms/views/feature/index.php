
<div class="well well-sm">
    <a href="<?php echo base_url('rooms/new_feature')?>" type="button" class="btn btn-primary btn-xs">New</a>
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
                <td><?php echo $value->en_feature;?></td>
                <td><?php echo $value->ch_feature;?></td>
                <td>
                    <?php if($value->_status ==0){

                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }else{
                        echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                    }
                    ?>

                </td>
                <td>
                    <a href="<?php echo base_url()?>rooms/edit_feature/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'rooms/delete_feature/'.$value->Id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>

        <?php   } ?>
        </tbody>
    </table>

