
<div class="well well-sm">
    Edit Main Gallery
</div>
<?php echo form_open_multipart('contents/process_edit_main_gallery');?>
<input type="hidden" id="" name="Id" value="<?php echo $this->uri->segment(3);?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="en_title" value="<?php echo $main_gallery->en_name?>"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="ch_title" value="<?php echo $main_gallery->ch_name?>"></div>
    </div>

    <div class="row mg-top-10">
        <div class="col-md-2">Status</div>
        <div class="col-md-10">
            <input type="checkbox" <?php echo func_checkbox_check($main_gallery->_status);?> name="status">
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('contents/main_gallery')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



