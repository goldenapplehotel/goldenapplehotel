
<div class="well well-sm">
    Edit sub gallery
</div>
<?php echo form_open_multipart('contents/save_edit_sub_gallery');?>
<input type="hidden" id="" name="Id" value="<?php echo $this->uri->segment(3);?>">
<input type="hidden" id="" name="Id_Re" value="<?php echo $this->uri->segment(4);?>">
<div class="thumbnail pd-10">
    <div class="row mg-top-10">
        <div class="col-md-2">Title</div>
        <div class="col-md-4"><input type="text" class="form-control" name="title" value="<?php echo $sub_gallery->title?>"></div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Date for celebrate</div>
        <div class="col-md-4"><input type="" class="form-control" name="create_date" value="<?php echo $sub_gallery->create_date?>"></div>

    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Photo<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2">Status</div>
        <div class="col-md-4"><input type="checkbox" <?php echo func_checkbox_check($sub_gallery->_status);?> name="status"></div>
    </div>
    <div class="row mg-top-10">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <img width="100" href="50" src="<?php echo BASE_URL;?>assets/img/gallery/<?php echo $sub_gallery->url?>">
        </div>
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
            <a href="<?php echo base_url('contents/sub_gallery/'.$this->uri->segment(3))?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



