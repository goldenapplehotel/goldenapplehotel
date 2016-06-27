
<div class="well well-sm">
   Add New Promotions
</div>
<?php echo form_open_multipart('Promotions/update_Promotions');?>
<input type="hidden" value="<?php echo $data->Id;?>" name="values[Id]">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[en_title]" value="<?php echo $data->en_title;?>"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[ch_title]" value="<?php echo $data->ch_title;?>"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">English Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[en_description]" ><?php echo $data->en_description;?></textarea></div>
        <div class="col-md-2">Chines Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[ch_description]" ><?php echo $data->ch_description;?></textarea></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Percent Off</div>
        <div class="col-md-4"><input type="number" class="form-control" name="values[_percent]" value="<?php echo $data->_percent;?>"></div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('Rooms/list_room_type')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>