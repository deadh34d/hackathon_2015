<?php
require_once('model/search_params_db.php');
require_once('model/home.class.php');
$prices = get_prices();
$sqfts = get_sqfts();
$beds = get_beds();
$baths = get_baths();
$states = get_states();
$cities = get_cities();
$elevations = get_elevations();
$subdivisions = get_subdivisions();
$finishes = get_finishes();
$plan_names = get_plan_names();
$zipcodes = get_zips();
$locations = get_locations();
$street_names = get_street_names();

$home_object = new Home();
$all_homes = $home_object->get_homes();
if (isset($page)) { ?>
    <?php if ($page == "home"): ?>
        <div class="row">
            <div class="col-lg-6 left">
                <?php include('view/filter.php'); ?>
            </div>
            <div class="col-lg-6 right">
                <?php include('view/infobuttons.php'); ?>
            </div>

        </div>
                <?php include('view/why-idk.php'); ?>
                <br>
                <!--            --><?php //include('view/share.php'); ?>

    <?php elseif ($page == 'bare'): ?>
        <div id="sidebar" class="small-hide">
            <?php include('view/filter.php'); ?>
            <?php include('view/infobuttons.php'); ?>
            <!--            --><?php //include('view/share.php'); ?>
        </div>
    <?php elseif ($page == 'browse'): ?>
        <div id="sidebar">
            <?php include('view/filter.php'); ?>
            <?php include('view/infobuttons.php'); ?>

            <?php //include('view/googlemap.php'); ?>
            <!--            --><?php //include('view/share.php'); ?>
        </div>
    <?php elseif ($page == 'admin_panel'): ?>
        <?php include('view/filter.php'); ?>
        <?php include('view/infobuttons.php'); ?>
        <!--        --><?php //include('view/share.php'); ?>

        <?php
    else:
        ?>
        <div id="sidebar">
            <?php include('view/filter.php'); ?>
            <?php include('view/infobuttons.php'); ?>
            <!--            --><?php //include('view/share.php');
            ?>
        </div>
        <?php
    endif;
}

?>
