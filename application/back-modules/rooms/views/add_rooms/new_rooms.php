
<div class="well well-sm">
   New Rooms
</div>
<?php echo form_open_multipart('Rooms/save_room');?>

<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[en_title]"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[ch_title]"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Price</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[price]"></div>
        <div class="col-md-2">Room Type</div>
        <div class="col-md-4">
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">English Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[ch_description]"></textarea></div>
        <div class="col-md-2">Chines Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[ch_description]"></textarea></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Photo<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control" required></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 red">
          Note* please select image with dimensions width= 1600px , Height= 620px.
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
                    Basic
                </legend>
            </div>
            <?php
       
            foreach ($data->result() as $key => $value)
            {?>
            <div class="col-md-3">
                <div class="checkbox checkbox-warning">
                    <input id="checkbox<?php echo $key;?>" type="checkbox" name="sch_checkbox[]"  value="<?php echo $value->Id;?>" class="styled" >
                    <label for="checkbox<?php echo $key;?>">
                        <?php echo $value->en_feature;?> / <?php echo $value->ch_feature;?>
                    </label>
                </div>
            </div>
            <?php   } ?>
        </fieldset>
    </div>

    <hr>
    
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('contents/banner')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



