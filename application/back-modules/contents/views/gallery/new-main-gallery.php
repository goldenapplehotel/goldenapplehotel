
<div class="well well-sm">
    New Main Gallery
</div>
<?php echo form_open_multipart('contents/save_main_gallery');?>

<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">English Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="en_title"></div>
        <div class="col-md-2">Chines Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="ch_title"></div>
    </div>

    <div class="row mg-top-10">
        <div class="col-md-2">Status</div>
        <div class="col-md-10">
            <input type="checkbox" name="status">
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



