
<div class="well well-sm">
   New Rooms
</div>
<?php echo form_open_multipart('Rooms/update_feature');?>
<input type="hidden" id="" name="Id" value="<?php echo $row->Id;?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="en_feature" value="<?php echo $row->en_feature?>"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="ch_feature" value="<?php echo $row->ch_feature?>"></div>
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
            <a href="<?php echo base_url('contents/banner')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>