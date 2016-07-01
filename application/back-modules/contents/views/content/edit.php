
<div class="well well-sm">
    Welcome content
</div>
<?php echo form_open_multipart('contents/update_content');?>

<div class="thumbnail pd-10">
   <?php foreach ($data->result() as $key => $value) {
       echo '<input type="hidden" value="'.$value->Id.'" name="Id">';
    ?>
    <div class="row mg-top-10">
        <div class="col-md-2">English Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[en_title]" ><?php echo $value->en_title;?></textarea></div>
        <div class="col-md-2">Chines Description</div>
        <div class="col-md-4"><textarea class="form-control" name="values[ch_title]" ><?php echo $value->ch_title;?></textarea></div>
    </div>

    <?php  }?>
    <div class="row mg-top-10">
        <div class="col-md-2"> </div>
        <div class="col-md-10 orange">
            <?php echo $result;?>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('contents/welcome')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
            <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

        </div>
    </div>
</div>

</form>



