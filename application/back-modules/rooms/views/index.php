
<div class="well well-sm">
    <a href="<?php echo base_url('rooms/new_room')?>" type="button" class="btn btn-primary btn-xs">New</a>
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
       
        $n = 1;
        foreach ($data->result() as $value)
        {?>

            <tr>
                <td><?php echo $n;?></td>
                <td><?php echo $value->en_title;?></td>
                <td><?php echo $value->ch_title;?></td>
                <td><?php echo $value->en_comfortable_title;?></td>
                <td><?php echo character_limiter($value->en_description,10);?></td>
                <td><?php echo character_limiter($value->ch_description,10);?></td>
                <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/banner/<?php echo $value->url?>"> </td>
                <td>
                    <?php if($value->_status ==0){

                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }else{
                        echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                    }
                    ?>

                </td>
                <td>
                    <a href="<?php echo base_url()?>contents/edit_banner/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>

        <?php $n++;  } ?>
        </tbody>
    </table>

