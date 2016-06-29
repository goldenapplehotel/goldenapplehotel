
<div class="well well-sm">
   Edit Room TYpe
</div>
<?php echo form_open_multipart('rooms/update_room_type');?>
<input type="hidden" id="" name="Id" value="<?php echo $data->Id;?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[en_name]" value="<?php echo $data->en_name;?>" ></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="values[ch_name]" value="<?php echo $data->ch_name;?>" ></div>
    </div>
    

    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 orange">
             <?php echo $result;?>
        </div>

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