
<div class="well well-sm">
   New Rooms
</div>
<?php echo form_open_multipart('Rooms/update_room');?>

<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[en_title]" value="<?php echo $data->en_title;?>"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[ch_title]" value="<?php echo $data->ch_title;?>"></div>
        <div style="display:none;"><input type="text" class="form-control" name="values[Id]" value="<?php echo $data->Id;?>"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Price</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[price]" value="<?php echo $data->price;?>"></div>
        <div class="col-md-2">Room Type</div>
        <div class="col-md-4">
            <select class="form-control" name="values[type_id]">
                <option value="<?php echo $data->type_id;?>"><?php echo $data->roomType;?></option>
            <?php
       
            foreach ($room_type->result() as $key => $value)
            {
                if($data->type_id != $value->Id ){
                    echo '<option value="'.$value->Id.'">';
                        if($value->ch_name){
                           echo $value->en_name.' / '. $value->ch_name;
                        }else{
                            echo $value->en_name;
                        }
                        
                    echo ' </option>';
                }
            }
            ?>
            </select>
        </div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">English Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[en_description]" ><?php echo $data->en_description;?></textarea></div>
        <div class="col-md-2">Chines Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[ch_description]" ><?php echo $data->ch_description;?></textarea></div>
    </div>
    <div class="row mg-top-10" >
        <div class="col-md-2">Photo<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control" ></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2"></div>
        <div class="col-md-4 red">
            <img src="<?php echo BASE_URL.'assets/img/room/'.$data->url;?>"  class="cls-pointer img-responsive">
        </div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 red">
          Note* please select image with dimensions width= 640px , Height= 480px.
        </div>

    </div>

    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 orange">
             <?php echo $result;?>
        </div>

    </div>

    <div class="row mg-top-10">
        <fieldset>
            <div class="col-md-12">
                <legend>
                    Features
                </legend>
            </div>
            <?php
       
            foreach ($room_feature->result() as $key => $value)
            {?>
            <div class="col-md-3">
                <div class="checkbox checkbox-warning">
                    <input id="checkbox<?php echo $key;?>" type="checkbox" name="sch_checkbox[]"  value="<?php echo $value->Id;?>" class="styled" <?php 
                    echo func_checkbox_validate($data->feature,$value->Id);?>>
                    <label for="checkbox<?php echo $key;?>" value="<?php echo $value->Id;?>">
                        <?php 
                            if($value->ch_feature){
                                echo $value->en_feature.' / '.$value->ch_feature;
                            }
                            echo $value->en_feature;
                        ?> 
                    </label>
                </div>
            </div>
            <?php   } ?>
        </fieldset>
    </div>
    
    <div class="row mg-top-10">
        <fieldset>
            <div class="col-md-12">
                <legend>
                    Room Thumbnail
                </legend>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>N</th>
                        <th>Room Thumbnail</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $rowCount=0;
                    foreach ($Thumbnail->result() as $key => $value) {  $rowCount = $key;?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><img width="50" href="20" src="<?php echo BASE_URL;?>assets/img/room/<?php echo $value->url?>"> </td>
                            <td></td>
                            <td>
                                <?php if($value->_status ==1){

                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                }else{
                                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                                }
                                ?>

                            </td>
                            <td>
                                <a href="<?php echo base_url().'rooms/delete_room_thun/'.$data->Id.'/'.$value->Id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <?php
                        if($rowCount < 3){
                            for($i=$rowCount+1; $i<=3; $i++){
                                $inx = $i+1;
                                echo '<tr>';
                                echo '<th >'.$inx.'</th>';
                                echo '<th ></th>';
                                echo '<td ><input type="file" name="file_namethum[]" class="form-control" multiple="multiple" /></td>';
                                echo '<th ></th>';
                                echo '<th ></th>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </table>
            </div>
        </fieldset>
    </div>
    
    <hr>
    
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('Rooms/list_room')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



