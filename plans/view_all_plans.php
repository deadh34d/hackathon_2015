<?php
require_once('model/search_params_db.php');
include('view/header.php');

$page = 'browse'; ?>
<div class="container">
    <?php
    if (isset($page_action)) {
        include('view/backbutton.php');
        //do nothing
    } else {
        include('view/sidebar.php');
    } ?>
    <?php
    if (!empty($error)) {
        ?>
        <div class="col-sm-12 text-center alert alert-danger">
            <h2>
                <?php echo $error; ?>
            </h2>
        </div>
    <?php } ?>

    <?php
    $i = 0;
    sort($plans);
    foreach ($plans as $plan): ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail pad-top">
                <?php $thumbnail = $image_object->get_thumbnail($plan['id']) ?>
                <img
                    src="<?php

                    if (isset($thumbnail['url'])) {
                        echo $thumbnail['url'];
                    } elseif (isset($thumbnail['local_url'])) {
                        echo $protocol . $domain . $app_path . "/" . $thumbnail['local_url'];
                    } else {
                        echo "http://nyvi52c8ifu2di1xv3m1zfn1.wpengine.netdna-cdn.com/wp-content/plugins/blankslate-user-profile/images/no_photo_listing.jpg";
                    }; ?>"
                    alt="<?php if (isset($plan['plan_name'])) {
                        echo $plan['plan_name'];
                    } else {
                        echo '&nbsp;';
                    } ?>">

                <div class="text-center caption">

                    <?php if (isset($plan['street_name']) && isset($plan['street_number'])) { ?>
                        <span id="street"><?php echo $plan['street_number'] . " " . $plan['street_name']; ?></span>
                        <?php if (isset($plan['sold']) && $plan['sold'] == 1) { ?>
                            <span id="sold">&nbsp;Sold</span>
                        <?php } ?>
                    <?php } else { ?>
                        <span id="street">&nbsp;</span>
                    <?php } ?>

                    <?php if (isset($plan['city'])) { ?>
                        <span id="city"><?php echo $plan['city'] . ", "; ?></span>
                    <?php } else { ?>
                        <span id="city">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($plan['state'])) { ?>
                        <span id="state"><?php echo $plan['state']; ?></span>
                    <?php } else { ?>
                        <span id="state">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($plan['sales_price'])) { ?>
                        <span id="price"><?php echo toMoney($plan['sales_price']); ?></span>
                    <?php } else { ?>
                        <span id="price">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($plan['square_footage'])) { ?>
                        <span id="sqft"><?php echo $plan['square_footage'] . " sq. ft" ?> </span>
                    <?php } else { ?>
                        <span id="sqft">&nbsp;</span>
                    <?php } ?>

                    <span id="short-description">
                            <?php
                            if (strlen($plan['description']) >= 100) {
                                echo substr($plan['description'], 0, 99) . " ... ";
                            } elseif (isset($plan['description'])) {
                                echo $plan['description'];
                            }
                            ?>
                        </span><br>


                    <?php if (isset($_SESSION['user']) && isset($page_action) && $page_action == 'edit') { ?>
                        <p><a href="<?php echo $app_path . '/plan/' . $plan['id'] . "/edit" . "_plan"; ?>"
                              class="btn btn-info btn-block" role="button">Edit</a></p>
                    <?php } elseif (isset($_SESSION['user']) && isset($page_action) && $page_action == 'delete') { ?>
                        <p><a href="<?php echo $app_path . '/plan/' . $plan['id'] . "/delete" . "_plan"; ?>"
                              class="btn btn-danger btn-block" role="button">Delete</a></p>
                    <?php } else { ?>
                        <p><a href="<?php echo $app_path . '/plan/' . $plan['id']; ?>"
                              class="btn btn-primary btn-block" role="button">View</a></p>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php $i++; endforeach; ?>

    <?php include('view/footer.php'); ?>
