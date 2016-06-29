
<div class="well well-sm">
    New Rooms
</div>
<?php echo form_open_multipart('rooms/save_room');?>

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
            <select class="form-control" name="values[type_id]">
                <?php

                foreach ($room_type->result() as $key => $value)
                {?>
                    <option value="<?php echo $value->Id;?>">
                        <?php

                        if($value->ch_name){
                            echo $value->en_name.' / '. $value->ch_name;
                        }else{
                            echo $value->en_name;
                        }

                        ?>

                    </option>
                <?php   } ?>
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
        <div class="col-md-2">Default Image<span class="red">*</span></div>
        <div class="col-md-4"><input type="file" name="file_name" class="form-control" required></div>
        <div class="col-md-2">Promotions</div>
        <div class="col-md-4">
            <select class="form-control" name="values[promotion_id]">
                <option value=""></option>
                <?php

                foreach ($Promotion->result() as $key => $value)
                {?>
                    <option value="<?php echo $value->Id;?>">
                        <?php

                        if($value->ch_title){
                            echo $value->en_title.' / '. $value->ch_title;
                        }else{
                            echo $value->ch_title;
                        }

                        ?>

                    </option>
                <?php   } ?>
            </select>
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
                        Features
                    </legend>
                </div>
                <?php

                foreach ($room_feature->result() as $key => $value)
                {?>
                    <div class="col-md-3">
                        <div class="checkbox checkbox-warning">
                            <input id="checkbox<?php echo $key;?>" type="checkbox" name="sch_checkbox[]"  value="<?php echo $value->Id;?>" class="styled" >
                            <label for="checkbox<?php echo $key;?>">
                                <?php
                                if($value->ch_feature){
                                    echo $value->en_feature.' / '.$value->ch_feature;
                                }
                                echo $value->en_feature;
                                ?>
                            </label>
                        </div>
                    </div>
                <?php   } ?>
            </fieldset>
        </div>
        <div class="row mg-top-10">
            <fieldset>
                <div class="col-md-12">
                    <legend>
                        Room Thumbnail
                    </legend>
                </div>
                <div class="col-md-12">
                    <div class="mg-top-10 col-md-2">Thumbnail</div>
                    <!-- <div class="col-md-4"><input type="file" name="file_name" class="form-control" multiple="multiple"></div> -->
                    <div class="col-md-10">
                        <? for($ifile=1; $ifile <=2; $ifile ++){ ?>
                            <div class="mg-top-10 col-md-5">
                                <input type="file" name="file_namethum[]" class="form-control" multiple="multiple" />
                                <? if($ifile == 10){ ?>
                                    <div style="color:red;">only more than ie10 or chrome, safari, firefox browser.</div>
                                <? }?>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </fieldset>
        </div>



        <hr>

        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('rooms/list_room')?>" type="button" class="btn btn-default btn-xs pull-right">Cancel</a>
                <button type="submit" class="btn btn-primary btn-xs pull-right mg-right">Save</button>

            </div>
        </div>
    </div>
</div>
</form>



