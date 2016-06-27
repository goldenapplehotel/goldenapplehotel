
<div class="well well-sm">
    Edit explores
</div>
<?php echo form_open_multipart('contents/update_explore');?>
<input type="hidden" id="" name="Id" value="<?php echo $explore->Id;?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="en_title" value="<?php echo $explore->en_title;?>"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="ch_title" value="<?php echo $explore->ch_title;?>"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">English Description</div>
        <div class="col-md-4"><textarea class="form-control" name="en_des"><?php echo $explore->en_description;?></textarea></div>
        <div class="col-md-2">Chines Description</div>
        <div class="col-md-4"><textarea class="form-control" name="ch_des"><?php echo $explore->ch_description;?></textarea></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Photo<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control"></div>
    </div>

    <div class="row mg-top-10">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <img width="100" href="50" src="<?php echo BASE_URL;?>assets/img/explore/<?php echo $explore->img?>">
        </div>
    </div>

    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 red">
            Note* please select image with dimensions width= 1600px , Height= 620px.
        </div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Status</div>
        <div class="col-md-4"><input type="checkbox" <?php echo func_checkbox_check($explore->_status);?> name="status"></div>
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
            <a href="<?php echo base_url('contents/explores')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



