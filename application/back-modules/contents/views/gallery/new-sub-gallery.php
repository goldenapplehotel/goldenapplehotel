
<div class="well well-sm">
    New sub gallery
</div>
<?php echo form_open_multipart('contents/save_sub_gallery');?>
<input type="hidden" id="" name="Id" value="<?php echo $this->uri->segment(3);;?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="title"></div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Date for celebrate</div>
        <div class="col-md-4"><input type="" class="form-control" name="create_date"></div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Photo<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control" required></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Status</div>
        <div class="col-md-4"><input type="checkbox" name="status"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 red">
            Note* please select image with dimensions width= 800px , Height= 600px.
        </div>

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



