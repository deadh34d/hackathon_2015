<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <div class="panel-title">Edit Home</div>
        </div>
        <div class="panel-body">
            <form action="<?php echo $app_path . '/admin/index.php'; ?>" method="POST" class="form-horizontal"
                  autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="subdivision" class="col-sm-2 control-label">Subdivision (ex. Blanchard)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='subdivision'
                               placeholder="Subdivision"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                               name="subdivision"
                            <?php if (isset($home['subdivision'])){ ?>
                               value="<?php echo $home['subdivision']; ?>">
                        <?php } ?>
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
                    <label for="lot" class="col-sm-2 control-label">Lot (ex. 1234)</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control"
                               type="number"
                               inputmode="numeric"
                               name="lot"
                               placeholder="Lot number"
                               required="required"
                               pattern="^[0-9]+"
                            <?php if (isset($home['lot'])){ ?>
                               value="<?php echo $home['lot']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sold" class="col-sm-2 control-label">Sold</label>


                    <?php if ($home['sold'] == '1') {
                        $checked = 'checked="checked"';
                    } else {
                        $checked = '';
                    } ?>
                    <div class="col-sm-10">
                        <input type="checkbox" id="sold" data-toggle="toggle" data-width="100%" data-height="30"
                               data-on="Sold" data-off="Not Sold" data-onstyle="success" data-offstyle="danger"
                               name="sold" <?php echo $checked; ?> />
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_number" class="col-sm-2 control-label">Street Number (ex. 1234)</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control"
                               type="number"
                               inputmode="numeric"
                               id="street_number"
                               name="street_number"
                               placeholder="Street Number"
                               min="1" max="99999"
                               required="required"
                            <?php if (isset($home['street_number'])){ ?>
                               value="<?php echo $home['street_number']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_name" class="col-sm-2 control-label">Street Name (ex. Kate Drive)</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control"
                               type="text"
                               id="street_name"
                               name="street_name"
                               placeholder="Street Name"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                            <?php if (isset($home['street_name'])){ ?>
                               value="<?php echo $home['street_name']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City (ex. Evans)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='city'
                               placeholder="City"
                               name="city"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                            <?php if (isset($home['city'])){ ?>
                               value="<?php echo $home['city']; ?>">
                        <?php } ?>
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
                    <label for="state" class="col-sm-2 control-label"><i class="state state-ga"></i>&nbsp;State (ex.
                        Georgia)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='state'
                               placeholder="Plan Name"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                               name="state"
                            <?php if (isset($home['state'])){ ?>
                               value="<?php echo $home['state']; ?>">
                        <?php } ?>
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
                    <label for="zip" class="col-sm-2 control-label"><i class="zip zip-ga"></i>&nbsp;Zip (ex.
                        30809)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='zip'
                               placeholder="Plan Name"
                               min="1" max="99999"
                               required="required"
                               name="zip_code"
                            <?php if (isset($home['zip_code'])){ ?>
                               value="<?php echo $home['zip_code']; ?>">
                        <?php } ?>
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
                    <label for="plan_name" class="col-sm-2 control-label">Plan Name (ex. 8855)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='plan_name'
                               placeholder="Plan Name"
                               required="required"
                               pattern="^[a-zA-Z0-9 ]+"
                               name="plan_name"
                            <?php if (isset($home['plan_name'])){ ?>
                               value="<?php echo $home['plan_name']; ?>">
                        <?php } ?>
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
                    <label for="sales_price" class="col-sm-2 control-label">Sales Price (ex. 320000)</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control"
                               type="number"
                               inputmode="numeric"
                               id="sales_price"
                               name="sales_price"
                               placeholder="Sales Price"
                               required="required"
                               pattern="^[0-9,\$]+"
                            <?php if (isset($home['sales_price'])){ ?>
                               value="<?php echo $home['sales_price']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elevation" class="col-sm-2 control-label">Elevation (ex. B)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='elevation'
                               placeholder="Elevation"
                               required="required"
                               pattern="^[a-zA-Z]"
                               name="elevation"
                            <?php if (isset($home['elevation'])){ ?>
                               value="<?php echo $home['elevation']; ?>">
                        <?php } ?>
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
                    <label for="finish" class="col-sm-2 control-label">Finish (ex. Stone Accent)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='finish'
                               placeholder="Finish"
                               required="required"
                               pattern="^[a-zA-Z0-9 ]+"
                               name="finish"
                            <?php if (isset($home['finish'])){ ?>
                               value="<?php echo $home['finish']; ?>">
                        <?php } ?>
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
                    <label for="square_footage" class="col-sm-2 control-label">Square Footage (ex. 2345)</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control"
                               type="number"
                               inputmode="numeric"
                               id="square_footage"
                               name="square_footage"
                               placeholder="Square Footage"
                               required="required"
                               pattern="^[0-9,\$]+"
                            <?php if (isset($home['square_footage'])){ ?>
                               value="<?php echo $home['square_footage']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bed" class="col-sm-2 control-label">Beds (ex. 3)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='bed'
                               placeholder="Plan Name"
                               name="beds"
                               required="required"
                               min="1"
                               max="20"
                            <?php if (isset($home['beds'])){ ?>
                               value="<?php echo $home['beds']; ?>">
                        <?php } ?>

                        <datalist id='bed'>
                            <?php foreach ($beds as $bed): ?>
                                <option value="<?php echo $bed['bed']; ?>"><?php echo $bed['bed']; ?></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bath" class="col-sm-2 control-label">Baths</label>

                    <div class="col-sm-10">
                        <input type='text' class="form-control" list='bath' placeholder="Baths" name="baths"
                               required="required"
                               min="1"
                               max="20"
                            <?php if (isset($home['square_footage'])){ ?>
                               value="<?php echo $home['square_footage']; ?>">
                        <?php } ?>
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
                <div id="links">
                    <div class="well">
                        <?php foreach ($images as $image) { ?>
                            <?php

                            if (isset($image['url'])) {
                                echo $image['url'];
                            } elseif (isset($image['local_url'])) {
                                $image_url = $protocol . $domain . $app_path . "/" . $image['local_url'];
                            }

                            ?>
                            <img src="<?php echo $image_url; ?>" style="max-height:15vh"/>
                            <label for="delete"></label>
                            <input type="checkbox" id="delete" name="delete-<?php echo $image['local_url'] ?>">
                            <br>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-6 col-xs-offset-5">
                    <input type="file" name="photo" multiple="multiple"/>
                </div>
                <br>
                <input type="hidden" name="action" value="commit_home"/>
                <button type="submit" class="btn btn-primary btn-block">Edit Home</button>
            </form>


        </div>
    </div>

</div>

<?php include('../view/footer.php'); ?>
