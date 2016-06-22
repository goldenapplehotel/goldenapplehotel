
<div class="well well-sm">
    <a href="<?php echo base_url('contents/main_gallery')?>">Main gallery</a>:<?php echo $main_gallery->en_name;?>
    <a href="<?php echo base_url('')?>contents/new_sub_gallery/<?php echo $this->uri->segment(3)?>" type="button" class="btn btn-primary btn-xs pull-right">New</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>N</th>
        <th>Title</th>
        <th>Gallery date</th>
        <th>Photo</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $n = 1;
    foreach ($sub_gallery->result() as $value)
    {?>

        <tr>
            <td><?php echo $n;?></td>
            <td><?php echo $value->title;?></td>
            <td><?php echo $value->create_date;?></td>
            <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/gallery/<?php echo $value->url?>"> </td>
            <td>
                <?php if($value->_status ==0){

                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                }else{
                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                }
                ?>

            </td>
            <td>

                <a href="<?php echo base_url()?>contents/edit_sub_gallery/<?php echo $value->Id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>

        <?php $n++;  } ?>
    </tbody>
</table>

