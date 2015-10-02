<?php
//require_once('model/search_params_db.php');
include('view/header.php');

$page = 'browse'; ?>
<div class="container">
    <?php
    if ($page_action == 'edit' || $page_action == 'add') {
        //do nothing
        include('view/backbutton.php');
    } else {
        //include('view/sidebar.php');
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
    sort($sliders);
    foreach ($sliders as $slider): ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail pad-top">
                <?php //$thumbnail = $image_object->get_thumbnail($slider['id']) ?>
                <img
                    src="<?php

                    if (isset($slider['url'])) {
                        echo $slider['url'];
                    } elseif (isset($slider['local_url'])) {
                        echo $slider['local_url'];
                    } else {
                        echo "http://nyvi52c8ifu2di1xv3m1zfn1.wpengine.netdna-cdn.com/wp-content/plugins/blankslate-user-profile/images/no_photo_listing.jpg";
                    }; ?>"
                    alt="<?php if (isset($slider['title'])) {
                        echo $slider['title'];
                    } else {
                        echo '&nbsp;';
                    } ?>">

                <div class="text-center caption">

                    <?php if (isset($slider['title'])) { ?>
                        <span id="street"><?php echo $slider['title']; ?></span>
                    <?php } else { ?>
                        <span id="street">&nbsp;</span>
                    <?php } ?>


                    <span id="short-description">
                            <?php
                            if (strlen($slider['description']) >= 100) {
                                echo substr($slider['description'], 0, 99) . " ... ";
                            } elseif (isset($slider['description'])) {
                                echo $slider['description'];
                            }
                            ?>
                        </span><br>


                    <?php if (isset($_SESSION['user']) && isset($page_action) && $page_action == 'edit') { ?>
                        <p><a href="<?php echo $app_path . '/admin/index.php?action=edit_slider_form&id=' . $slider['id']; ?>"
                              class="btn btn-info btn-block" role="button">Edit</a></p>
                    <?php } elseif (isset($_SESSION['user']) && isset($page_action) && $page_action == 'delete') { ?>
                        <p><a href="<?php echo $app_path . '/admin/index.php?action=delete_slider&id=' . $slider['id']; ?>"
                              class="btn btn-danger btn-block" role="button">Delete</a></p>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php $i++; endforeach; ?>

    <?php include('view/footer.php'); ?>
