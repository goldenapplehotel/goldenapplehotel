
<div class="well well-sm">
    Main gallery
    <a href="<?php echo base_url('contents/new_main_gallery')?>" type="button" class="btn btn-primary btn-xs pull-right">New</a>
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
    foreach ($main_gallery->result() as $value)
    {?>

        <tr>
            <td><?php echo $n;?></td>
            <td><?php echo $value->en_name;?></td>
            <td><?php echo $value->ch_name;?></td>
            <td>
                <?php if($value->_status ==0){

                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                }else{
                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                }
                ?>

            </td>
            <td>
                <a href="<?php echo base_url()?>contents/sub_gallery/<?php echo $value->Id?>" class="btn btn-primary btn-xs">sub gallery</i></a>
                <a href="<?php echo base_url()?>contents/edit_banner/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>

        <?php $n++;  } ?>
    </tbody>
</table>

