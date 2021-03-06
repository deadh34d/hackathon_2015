<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<?php if (!isset($page_action)) {
    $page_action = 'edit';
} ?>
<div class="container">
    <?php include('view/backbutton.php'); ?>
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <div class="panel-title"><?php echo ucwords($page_action); ?> plan</div>
        </div>
        <div class="panel-body">
            <form action="<?php echo $app_path . '/admin/index.php'; ?>" method="POST" class="form-horizontal"
                  autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="subdivision" class="col-sm-4 control-label">Subdivision (ex. Blanchard)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='subdivision'
                               placeholder="Subdivision"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                               name="subdivision"
                            <?php if (isset($plan['subdivision'])) { ?>
                                value="<?php echo $plan['subdivision']; ?>"
                            <?php } ?>>
                        <datalist id='subdivision'>
                            <?php
                            foreach ($subdivisions as $subdivision) {
                                $current_subdivision = filter_input(INPUT_POST, 'subdivision', FILTER_SANITIZE_STRING);
                                if (isset($current_subdivision) && $current_subdivision == $subdivisions['subdivisions']) {
                                    ?>
                                    <option value="<?php echo $subdivision['subdivision']; ?>"
                                            selected="selected"><?php echo $subdivision['subdivision']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $subdivision['subdivision']; ?>"><?php echo $subdivision['subdivision']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lot" class="col-sm-4 control-label">Lot (ex. 1234)</label>

                    <div class="col-sm-5">
                        <input class=" form-control"
                               type="number"
                               inputmode="numeric"
                               name="lot"
                               placeholder="Lot number"
                               required="required"
                               pattern="^[0-9]+"
                            <?php if (isset($plan['lot'])) { ?>
                                value="<?php echo $plan['lot']; ?>"
                            <?php } ?>
                            >
                    </div>
                </div>
                <div class="form-group">
                    <label for="sold" class="col-sm-4 control-label">Sold</label>
                    <?php $current_sold = filter_input(INPUT_POST, 'sold', FILTER_SANITIZE_STRING); ?>
                    <?php if ($current_sold == '1' || (isset($plan['sold']) && $plan['sold'] == 1)) {
                        $checked = 'checked="checked"';
                    } else {
                        $checked = '';
                    } ?>
                    <div class="col-sm-5">
                        <input type="checkbox" id="sold" data-toggle="toggle" data-width="100%" data-height="30"
                               data-on="Sold" data-off="Not Sold" data-onstyle="success" data-offstyle="danger"
                               name="sold" <?php echo $checked; ?> />
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_number" class="col-sm-4 control-label">Street Number (ex. 1234)</label>

                    <div class="col-sm-5">
                        <input class=" form-control" type="number" inputmode="numeric" id="street_number"
                               name="street_number"
                               placeholder="Street Number"
                               min="1" max="99999"
                               required="required"
                            <?php if (isset($plan['street_number'])) { ?>
                                value="<?php echo $plan['street_number']; ?>"
                            <?php } ?>
                            >
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_name" class="col-sm-4 control-label">Street Name (ex. Kate Drive)</label>

                    <div class="col-sm-5">
                        <input class=" form-control"
                               type="text"
                               list="street_name"
                               name="street_name"
                               placeholder="Street Name"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                            <?php if (isset($plan['street_name'])) { ?>
                                value="<?php echo $plan['street_name']; ?>"
                            <?php } ?>
                            >
                        <datalist id='street_name'>
                            <?php
                            foreach ($street_names as $street_name) {
                                $current_street_name = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
                                if (isset($current_street_name) && $current_street_name == $street_names['street_name']) {
                                    ?>
                                    <option value="<?php echo $street_name['street_name']; ?>"
                                            selected="selected"><?php echo $street_name['street_name']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $street_name['street_name']; ?>"><?php echo $street_name['street_name']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label">City (ex. Evans)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='city'
                               placeholder="City"
                               name="city"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                            <?php if (isset($plan['city'])) { ?>
                                value="<?php echo $plan['city']; ?>"
                            <?php } ?>
                            >
                        <datalist id='city'>
                            <?php
                            foreach ($cities as $city) {
                                $current_city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
                                if (isset($current_city) && $current_city == $cities['cities']) {
                                    ?>
                                    <option value="<?php echo $city['city']; ?>"
                                            selected="selected"><?php echo $city['city']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $city['city']; ?>"><?php echo $city['city']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-sm-4 control-label"><i class="state state-ga"></i>&nbsp;State (ex.
                        Georgia)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='state'
                               placeholder="State"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                               name="state"
                            <?php if (isset($plan['state'])) { ?>
                                value="<?php echo $plan['state']; ?>"
                            <?php } ?>
                            >
                        <datalist id='state'>
                            <?php
                            foreach ($states as $state) {
                                $current_state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
                                if (isset($current_state) && $current_state == $states['states']) {
                                    ?>
                                    <option value="<?php echo $state['state']; ?>"
                                            selected="selected"><?php echo $state['state']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $state['state']; ?>"><?php echo $state['state']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zip" class="col-sm-4 control-label"><i class="zip zip-ga"></i>&nbsp;Zip (ex.
                        30809)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='zip'
                               placeholder="Zip"
                               min="1" max="99999"
                               required="required"
                               name="zip_code"
                            <?php if (isset($plan['zip_code'])) { ?>
                                value="<?php echo $plan['zip_code']; ?>"
                            <?php } ?>
                            >
                        <datalist id='zip'>
                            <?php
                            foreach ($zipcodes as $zip) {
                                $current_zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
                                if (isset($current_zip) && $current_zip == $zipcodes['zipcodes']) {
                                    ?>
                                    <option value="<?php echo $zip['zip']; ?>"
                                            selected="selected"><?php echo $zip['zip']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $zip['zip']; ?>"><?php echo $zip['zip']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="plan_name" class="col-sm-4 control-label">Plan Name (ex. 8855)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='plan_name'
                               placeholder="Plan Name"
                               required="required"
                               pattern="^[a-zA-Z0-9 ]+"
                               name="plan_name"
                            <?php if (isset($plan['plan_name'])) { ?>
                                value="<?php echo $plan['plan_name']; ?>"
                            <?php } ?>
                            >
                        <datalist id='plan_name'>
                            <?php
                            foreach ($plan_names as $plan_name) {
                                $current_plan_name = filter_input(INPUT_POST, 'plan_name', FILTER_SANITIZE_STRING);
                                if (isset($current_plan_name) && $current_plan_name == $plan_names['plan_names']) {
                                    ?>
                                    <option value="<?php echo $plan_name['plan_name']; ?>"
                                            selected="selected"><?php echo $plan_name['plan_name']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $plan_name['plan_name']; ?>"><?php echo $plan_name['plan_name']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sales_price" class="col-sm-4 control-label">Sales Price (ex. 320000)</label>

                    <div class="col-sm-5">
                        <input class=" form-control"
                               type="number"
                               inputmode="numeric"
                               id="sales_price"
                               name="sales_price"
                               placeholder="Sales Price"
                               required="required"
                               pattern="^[0-9,\$]+"
                            <?php if (isset($plan['sales_price'])) { ?>
                                value="<?php echo $plan['sales_price']; ?>"
                            <?php } ?>
                            >
                    </div>
                </div>
                <div class="form-group">
                    <label for="elevation" class="col-sm-4 control-label">Elevation (ex. B)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='elevation'
                               placeholder="Elevation"
                               required="required"
                               pattern="^[a-zA-Z]"
                               name="elevation"
                            <?php if (isset($plan['elevation'])) { ?>
                                value="<?php echo $plan['elevation']; ?>"
                            <?php } ?>
                            >
                        <datalist id='elevation'>
                            <?php
                            foreach ($elevations as $elevation) {
                                $current_elevation = filter_input(INPUT_POST, 'elevation', FILTER_SANITIZE_STRING);
                                if (isset($current_elevation) && $current_elevation == $elevations['elevations']) {
                                    ?>
                                    <option value="<?php echo $elevation['elevation']; ?>"
                                            selected="selected"><?php echo $elevation['elevation']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $elevation['elevation']; ?>"><?php echo $elevation['elevation']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="finish" class="col-sm-4 control-label">Finish (ex. Stone Accent)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='finish'
                               placeholder="Finish"
                               required="required"
                               pattern="^[a-zA-Z0-9 ]+"
                               name="finish"
                            <?php if (isset($plan['finish'])) { ?>
                                value="<?php echo $plan['finish']; ?>"
                            <?php } ?>
                            >
                        <datalist id='finish'>
                            <?php
                            foreach ($finishes as $finish) {
                                $current_finish = filter_input(INPUT_POST, 'finish', FILTER_SANITIZE_STRING);
                                if (isset($current_finish) && $current_finish == $finishes['finish']) {
                                    ?>
                                    <option value="<?php echo $finish['finish']; ?>"
                                            selected="selected"><?php echo $finish['finish']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $finish['finish']; ?>"><?php echo $finish['finish']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="square_footage" class="col-sm-4 control-label">Square Footage (ex. 2345)</label>

                    <div class="col-sm-5">
                        <input class=" form-control"
                               type="number"
                               inputmode="numeric"
                               id="square_footage"
                               name="square_footage"
                               placeholder="Square Footage"
                               required="required"
                               pattern="^[0-9,\$]+"
                            <?php if (isset($plan['square_footage'])) { ?>
                                value="<?php echo $plan['square_footage']; ?>"
                            <?php } ?>
                            >
                    </div>
                </div>
                <div class="form-group">
                    <label for="bed" class="col-sm-4 control-label">Beds (ex. 3)</label>

                    <div class="col-sm-5">
                        <input type='text'
                               class=" form-control"
                               list='bed'
                               placeholder="Beds"
                               name="beds"
                               required="required"
                               min="1"
                               max="20"
                            <?php if (isset($plan['beds'])) { ?>
                                value="<?php echo $plan['beds']; ?>"
                            <?php } ?>
                            >

                        <datalist id='bed'>
                            <?php
                            foreach ($beds as $bed) {
                                $current_bed = filter_input(INPUT_POST, 'bed', FILTER_SANITIZE_STRING);
                                if (isset($current_bed) && $current_bed == $beds['bed']) {
                                    ?>
                                    <option value="<?php echo $bed['bed']; ?>"
                                            selected="selected"><?php echo $bed['bed']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $bed['bed']; ?>"><?php echo $bed['bed']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bath" class="col-sm-4 control-label">Baths (ex. 2.5)</label>

                    <div class="col-sm-5">
                        <input type='text' class=" form-control" list='bath' placeholder="Baths" name="baths"
                               required="required"
                               min="1"
                               max="20"
                            <?php if (isset($plan['baths'])) { ?>
                                value="<?php echo $plan['baths']; ?>"
                            <?php } ?>
                            >
                        <datalist id='bath'>
                            <?php
                            foreach ($baths as $bath) {
                                $current_bath = filter_input(INPUT_POST, 'bath', FILTER_SANITIZE_STRING);
                                if (isset($current_bath) && $current_bath == $baths['bath']) {
                                    ?>
                                    <option value="<?php echo $bath['bath']; ?>"
                                            selected="selected"><?php echo $bath['bath']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $bath['bath']; ?>"><?php echo $bath['bath']; ?></option>
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="realtor_id" class="col-sm-4 control-label">Realtor ID</label>

                    <div class="col-sm-5">

                        <select id="realtor_id" class="col-sm-5 form-control">
                            <?php
                            $current_realtor = filter_input(INPUT_POST, 'realtor_id', FILTER_SANITIZE_STRING);
                            $selected = "selected='selected'";
                            foreach ($realtors as $realtor) {
                                if (isset($realtor['realtor_id'])) {?>
                                    <option value="<?php echo $realtor['realtor_id']; ?>"><?php echo $realtor['name']; ?></option>
                                <?php }elseif (isset($current_realtor) && $current_realtor == $realtor['realtor_id']){ ?>
                                    <option value="<?php echo $realtor['realtor_id']; ?>" <?php echo $selected;?>><?php echo $realtor['name']; ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description</label>

                    <div class="col-sm-5">
                        <textarea class="form-control" placeholder="Description" name="description"
                                  id="description"><?php if (isset($plan['description'])) {
                                echo $plan['description'];
                            } ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mls" class="col-sm-4 control-label">MLS Listing URL</label>

                    <div class="col-sm-5">
                        <input type='text' class=" form-control" list='mls'
                               placeholder="Multiple Listing Service URL" name="mls"
                            <?php if (isset($plan['mls'])) { ?>
                                value="<?php echo $plan['mls']; ?>"
                            <?php } ?>
                            >
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-4 control-label">Upload Image(s)</label>

                    <div class="col-xs-5 ">
                        <input type="file" class="" name="photos[]"
                               multiple="multiple" id="photo"/>
                    </div>
                </div>
                <input type="hidden" name="page_action" value="<?php echo $page_action; ?>"/>
                <?php if (!isset($id)) {
                    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                } ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="action" value="commit_plan"/>
                <?php if ($page_action == 'edit') { ?>
                    <button type="submit" class="btn btn-primary btn-block">Edit plan</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary btn-block">Add plan</button>
                <?php } ?>

            </form>
            <?php if (isset($images) && count($images) > 0) { ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Current plan's Image(s)</span>
                </div>

                <div class="panel-body">
                    <?php foreach ($images as $image) { ?>
                        <div class="col-xs-6">
                            <?php
                            if (isset($image['url'])) {
                                $image_url = $image['url'];
                            } elseif (isset($image['local_url'])) {
                                $image_url = $protocol . $domain . $app_path . "/" . $image['local_url'];
                            } else {
                                $image_url = null;
                            }
                            if (isset($plan)) {
                                $id = $plan['id'];
                            };
                            $preview_style = '';
                            if ($image['is_preview_image']) {
                                $preview_style = "border:3px dashed steelblue";
                            }
                            ?>
                            <img src="<?php echo $image_url; ?>" style="width:100%; <?php echo $preview_style; ?>"
                                 class="image-<?php echo $image['id']; ?>"/>
                            <button class="btn <?php if ($image['is_preview_image']) {
                                echo 'btn-primary';
                            } else {
                                echo 'btn-danger';
                            } ?> btn-delete-image" value="<?php echo $image['id'] ?>"
                                    style="width:100%;border-top-left-radius: 0;border-top-right-radius: 0;">
                                Delete <?php if ($image['is_preview_image']) {
                                    echo 'preview image';
                                }; ?></button>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
</div>

</div>

<?php include('../view/footer.php'); ?>
