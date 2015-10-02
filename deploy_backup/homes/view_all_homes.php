<?php
require_once('model/search_params_db.php');
include('view/header.php');

$page = 'browse'; ?>
<div class="container">
    <?php
    if (isset($_SESSION['edit_homes']) || isset($_SESSION['delete_homes'])) {
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
    sort($homes);
    foreach ($homes as $home): ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail pad-top">
                <?php $thumbnail = $image_object->get_thumbnail($home['id']) ?>
                <img
                    src="<?php

                    if (isset($thumbnail['url'])) {
                        echo $thumbnail['url'];
                    } elseif (isset($thumbnail['local_url'])) {
                        echo $protocol . $domain . $app_path . "/" . $thumbnail['local_url'];
                    } else {
                        echo "http://nyvi52c8ifu2di1xv3m1zfn1.wpengine.netdna-cdn.com/wp-content/plugins/blankslate-user-profile/images/no_photo_listing.jpg";
                    }; ?>"
                    alt="<?php if (isset($home['plan_name'])) {
                        echo $home['plan_name'];
                    } else{
                        echo '&nbsp;';
                    }?>">

                <div class="text-center caption">

                    <?php if (isset($home['state'])) { ?>
                        <span id="street"><?php echo $home['street_number'] . " " . $home['street_name']; ?></span>
                    <?php }else {?>
                        <span id="street">&nbsp;</span>
                    <?php } ?>

                    <?php if (isset($home['state'])) { ?>
                        <span id="city"><?php echo $home['city'] . ", "; ?></span>
                    <?php }else {?>
                        <span id="city">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($home['state'])) { ?>
                        <span id="state"><?php echo $home['state']; ?></span>
                    <?php }else {?>
                        <span id="state">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($home['sales_price'])) { ?>
                        <span id="price"><?php echo toMoney($home['sales_price']); ?></span>
                    <?php }else {?>
                        <span id="price">&nbsp;</span>
                    <?php } ?>


                    <?php if (isset($home['square_footage'])) { ?>
                        <span id="sqft"><?php echo $home['square_footage'] . " sq. ft" ?> </span>
                    <?php }else {?>
                        <span id="sqft">&nbsp;</span>
                    <?php } ?>

                    <span id="short-description">
                            <?php
                            if (strlen($home['description']) >= 100) {
                                echo substr($home['description'], 0, 99) . " ... ";
                            } elseif (isset($home['description'])) {
                                echo $home['description'];
                            }
                            ?>
                        </span><br>


                    <?php if (isset($_SESSION['user']) && isset($_SESSION['edit_homes'])) { ?>
                        <p><a href="<?php echo $app_path . '/home/' . $home['id'] . "/edit"; ?>"
                              class="btn btn-info btn-block" role="button">Edit</a></p>
                    <?php } elseif (isset($_SESSION['user']) && isset($_SESSION['delete_homes'])) { ?>
                        <p><a href="<?php echo $app_path . '/home/' . $home['id'] . "/delete"; ?>"
                              class="btn btn-danger btn-block" role="button">Delete</a></p>
                    <?php } else { ?>
                        <p><a href="<?php echo $app_path . '/home/' . $home['id']; ?>"
                              class="btn btn-primary btn-block" role="button">View</a></p>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php $i++; endforeach; ?>

    <?php include('view/footer.php'); ?>
