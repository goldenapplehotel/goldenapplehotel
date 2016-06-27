
<div class="well well-sm">
    <a href="<?php echo base_url('contents/new_explore')?>" type="button" class="btn btn-primary btn-xs">New</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>N</th>
        <th>En Title</th>
        <th>Ch Title</th>
        <th>En Description</th>
        <th>Ch Description</th>
        <th>Photo</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $n = 1;
    foreach ($explore->result() as $value)
    {?>

        <tr>
            <td><?php echo $n;?></td>
            <td><?php echo $value->en_title;?></td>
            <td><?php echo $value->ch_title;?></td>
            <td><?php echo character_limiter($value->en_description,10);?></td>
            <td><?php echo character_limiter($value->ch_description,10);?></td>
            <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/explore/<?php echo $value->img?>"> </td>
            <td>
                <?php if($value->_status ==1){

                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                }else{
                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                }
                ?>

            </td>
            <td>
                <a href="<?php echo base_url()?>contents/edit_explore/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>

        <?php $n++;  } ?>
    </tbody>
</table>

