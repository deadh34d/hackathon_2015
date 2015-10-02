<div class="panel panel-primary filter left">
    <div class="text-center panel-heading" id="dream-home">
        <h3 class="panel-title"><i class="fa fa-home"></i> Home Search</h3>
    </div>

    <form action="<?php echo $app_path . '/browse'; ?>" method="post" role="form" id="filter">
        <input type="hidden" name="action" value="search_homes">
        <!--        <div class="row">-->
        <div class="panel-body table-responsive">
            <table class="table">
                <tr>
                    <td><label for="price-from"><i class="fa fa-money"></i>&nbsp;Price:</label></td>
                    <td>
                        <select id="price-from" name="min_price">
                            <option value="any">Any</option>
                            <?php
                            $current_min_price = filter_input(INPUT_POST, 'min_price', FILTER_SANITIZE_STRING);
                            foreach ($prices as $price) {
                                if (isset($current_min_price) && $price['price'] == $current_min_price) {
                                    ?>
                                    <option value="<?php echo $price['price']; ?>" class="price-from"
                                            selected="selected"><?php echo $price['price']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $price['price']; ?>"
                                        class="price-from"><?php echo $price['price']; ?></option>
                                <?php }
                            } ?>
                        </select>
                        <label for="price-to"> to </label>
                        <select id="price-to" name="max_price">
                            <option value="any">Any</option>
                            <?php
                            $current_max_price = filter_input(INPUT_POST, 'max_price', FILTER_SANITIZE_STRING);
                            foreach ($prices as $price) {
                                if (isset($current_max_price) && $price['price'] == $current_max_price) {
                                    ?>
                                    <option value="<?php echo $price['price']; ?>" class="price-to"
                                            selected="selected"><?php echo $price['price']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $price['price']; ?>"
                                        class="price-to"><?php echo $price['price']; ?></option>
                                <?php }
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td><label for="sqft-from"><i class="fa fa-square"></i>&nbsp;&nbsp;Square Feet: </label></td>
                    <td>
                        <select id="sqft-from" name="min_sqft">
                            <option value="any">Any</option>
                            <?php
                            $current_min_sqft = filter_input(INPUT_POST, 'min_sqft', FILTER_SANITIZE_STRING);
                            foreach ($sqfts as $sqft) {
                                if (isset($current_min_sqft) && $sqft['sqft'] == $current_min_sqft) {
                                    ?>
                                    <option value="<?php echo $sqft['sqft']; ?>"
                                            selected="selected"><?php echo $sqft['sqft']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $sqft['sqft']; ?>"><?php echo $sqft['sqft']; ?></option>
                                <?php }
                            } ?>
                        </select>
                        <label for="sqft-to"> to </label>
                        <select id="sqft-to" name="max_sqft">
                            <option value="any">Any</option>
                            <?php
                            $current_max_sqft = filter_input(INPUT_POST, 'max_sqft', FILTER_SANITIZE_STRING);
                            foreach ($sqfts as $sqft) {
                                if (isset($current_max_sqft) && $sqft['sqft'] == $current_max_sqft) {
                                    ?>
                                    <option value="<?php echo $sqft['sqft']; ?>"
                                            selected="selected"><?php echo $sqft['sqft']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $sqft['sqft']; ?>"><?php echo $sqft['sqft']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="bedrooms-from"><i class="fa fa-bed"></i>&nbsp;Bedrooms: </label></td>
                    <td>

                        <select id="bedrooms-from" name="min_bedrooms">
                            <option value="any">Any</option>
                            <?php
                            $current_beds = filter_input(INPUT_POST, 'min_bedrooms', FILTER_SANITIZE_STRING);
                            foreach ($beds as $bed) {
                                if (isset($current_beds) && $current_beds == $bed['bed']) {
                                    ?>
                                    <option value="<?php echo $bed['bed']; ?>"
                                            selected="selected"><?php echo $bed['bed']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $bed['bed']; ?>"><?php echo $bed['bed']; ?></option>
                                <?php }
                            } ?>
                        </select>

                        <label for="bedrooms-to"> to </label>
                        <select id="bedrooms-to" name="max_bedrooms">
                            <option value="any">Any</option>
                            <?php
                            $current_beds = filter_input(INPUT_POST, 'max_bedrooms', FILTER_SANITIZE_STRING);
                            foreach ($beds as $bed) {
                                if (isset($current_beds) && $current_beds == $bed['bed']) {
                                    ?>
                                    <option value="<?php echo $bed['bed']; ?>"
                                            selected="selected"><?php echo $bed['bed']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $bed['bed']; ?>"><?php echo $bed['bed']; ?></option>
                                <?php }
                            } ?>
                        </select>


                    </td>
                </tr>
                <tr>
                    <td><label for="location"><i class="state state-ga"></i>&nbsp;Location:</label></td>
                    <td>
                        <select id="location" name="location">
                            <option value="any">Any</option>
                            <?php
                            rsort($locations);
                            $current_location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
                            foreach ($locations as $location) {
                                if (isset($current_location) && ucwords($current_location) == ucwords($location['city'])) {
                                    ?>
                                    <option value="<?php echo strtolower($location['city']); ?>"
                                            selected="selected"><?php echo $location['city'] . ", " . $location['state']; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo strtolower($location['city']); ?>"><?php echo $location['city'] . ", " . $location['state']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>
</div>
