
<div class="well well-sm">
    <a href="<?php echo base_url('contents/new_content')?>" type="button" class="btn btn-primary btn-xs">New</a>
</div>
<div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 orange">
            <?php echo $result;?>
        </div>

    </div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>N</th>
        <th>En Title</th>
        <th>Ch Title</th>
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
            <td><?php echo character_limiter($value->en_title,50);?></td>
            <td><?php echo character_limiter($value->ch_title,50);?></td>
            <td>
                <?php if($value->_status ==1){

                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                }else{
                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                }
                ?>

            </td>
            <td>
                <a href="<?php echo base_url()?>contents/edit_content/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo base_url()?>contents/delete_content/<?php echo $value->Id?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>

        <?php $n++;  } ?>
    </tbody>
</table>

