<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <div class="panel-title">Add Home</div>
        </div>
        <div class="panel-body">
            <form action="." method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="subdivision" class="col-sm-2 control-label">Subdivision (ex. Blanchard)</label>

                    <div class="col-sm-10">
                        <input type='text'
                               class="text-center form-control"
                               list='subdivision'
                               placeholder="Subdivision"
                               required="required"
                               pattern="^[a-zA-Z ]+"
                               name="subdivision">
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
                    <label for="lot" class="col-sm-2 control-label">Lot</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control" type="number" inputmode="numeric" name="lot" required="required"
                               pattern="^[0-9]+"
                               placeholder="Lot number"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sold" class="col-sm-2 control-label">Sold</label>
                    <?php $current_sold = filter_input(INPUT_POST, 'sold', FILTER_SANITIZE_STRING);?>
                    <?php if ($current_sold['sold'] == '1') {
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
                    <label for="street_number" class="col-sm-2 control-label">Street Number</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control" type="number" inputmode="numeric" id="street_number"
                               name="street_number"
                               placeholder="Street Number"
                               min="1" max="99999"
                               required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_name" class="col-sm-2 control-label">Street Name</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control" type="text" id="street_name" name="street_name"
                               placeholder="Street Name"
                               required="required"
                               pattern="^[a-zA-Z ]+"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='city' placeholder="City" name="city" required="required"
                               pattern="^[a-zA-Z ]+">
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
                    <label for="state" class="col-sm-2 control-label"><i class="state state-ga"></i>&nbsp;State</label>

                    <div class="col-sm-10">
                        <select class="form-control text-center" id="state" name="state" >
                            <?php
                            foreach ($states as $state) {
                                if (isset($current_state) && $current_state == $states['states']) {
                                    ?>
                                    <option value="<?php echo $state['state']; ?>"
                                            selected="selected"><?php echo $state['state']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $state['state']; ?>"><?php echo $state['state']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zip" class="col-sm-2 control-label"><i class="zip zip-ga"></i>&nbsp;zip</label>

                    <div class="col-sm-10">
                        <select class="form-control text-center" id="zip" name="zip_code">
                            <?php
                            foreach ($zipcodes as $zip) {
                                if (isset($current_zip) && $current_zip == $zipcodes['zip']) {
                                    ?>
                                    <option value="<?php echo $zip['zip']; ?>"
                                            selected="selected"><?php echo $zip['zip']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $zip['zip']; ?>"><?php echo $zip['zip']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="plan_name" class="col-sm-2 control-label">Plan Name</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='plan_name' placeholder="Plan Name"
                               name="plan_name" required="required"
                               pattern="^[a-zA-Z0-9 ]+">
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
                    <label for="sales_price" class="col-sm-2 control-label">Sales Price</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control" type="number" inputmode="numeric" id="sales_price"
                               name="sales_price"
                               placeholder="Sales Price" required="required"
                               pattern="^[0-9,\$]+"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elevation" class="col-sm-2 control-label">Elevation</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='elevation' placeholder="Elevation"
                               name="elevation" required="required"
                               pattern="^[a-zA-Z]">
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
                    <label for="finish" class="col-sm-2 control-label">Finish</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='finish' placeholder="Finish" name="Finish" required="required"
                               pattern="^[a-zA-Z0-9 ]+">
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
                    <label for="square_footage" class="col-sm-2 control-label">Square Footage</label>

                    <div class="col-sm-10">
                        <input class="text-center form-control" type="number" inputmode="numeric" id="square_footage"
                               name="square_footage"
                               placeholder="Square Footage" required="required"
                               pattern="^[0-9,\$]+"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bed" class="col-sm-2 control-label">Beds</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='bed' placeholder="Plan Name" name="bed" required="required"
                               min="1"
                               max="20">
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
                    <label for="bath" class="col-sm-2 control-label">Baths</label>

                    <div class="col-sm-10">
                        <input type='text' class="text-center form-control" list='bath' placeholder="Baths" name="bath" required="required"
                               min="1"
                               max="20">
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
                <br>
                <div class="col-xs-6 col-xs-offset-5">
                    <input type="file" name="photo" multiple="multiple"/>
                </div>
                <br>
                <input type="hidden" name="action" value="commit_home"/>
                <button type="submit" class="btn btn-primary btn-block">Add Home</button>
            </form>
        </div>
    </div>

</div>

<?php include('../view/footer.php'); ?>
