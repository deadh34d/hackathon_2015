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
    sort($admins);
    foreach ($admins as $admin): ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail pad-top">
                <?php //$thumbnail = $image_object->get_thumbnail($admin['id']) ?>
                <img
                    src="<?php

                    if (isset($admin['url'])) {
                        echo $admin['url'];
                    } elseif (isset($admin['local_url'])) {
                        echo $protocol . $domain . $app_path . "/" . $admin['local_url'];
                    } else {
                        echo "https://pbs.twimg.com/profile_images/573692360263004161/gOvizBEP.jpeg";
                    }; ?>"
                    alt="<?php if (isset($admin['username'])) {
                        echo $admin['username'];
                    } else {
                        echo '&nbsp;';
                    } ?>">

                <div class="text-center caption">

                    <?php if (isset($admin['username'])) { ?>
                        <span id="street"><?php echo $admin['username']; ?></span>
                    <?php } else { ?>
                        <span id="street">&nbsp;</span>
                    <?php } ?>


                    <span id="short-description">
                            <?php
                            if (strlen($admin['email']) >= 100) {
                                echo substr($admin['email'], 0, 99) . " ... ";
                            } elseif (isset($admin['email'])) {
                                echo $admin['email'];
                            }
                            ?>
                        </span><br>


                    <?php if (isset($_SESSION['user']) && isset($page_action) && $page_action == 'edit') { ?>
                        <p><a href="<?php echo $app_path . '/admin/index.php?action=edit_admin_form&id=' . $admin['id']; ?>"
                              class="btn btn-info btn-block" role="button">Edit</a></p>
                    <?php } elseif (isset($_SESSION['user']) && isset($page_action) && $page_action == 'delete') { ?>
                        <p><a href="<?php echo $app_path . '/admin/index.php?action=delete_admin&id=' . $admin['id']; ?>"
                              class="btn btn-danger btn-block" role="button">Delete</a></p>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php $i++; endforeach; ?>

    <?php include('view/footer.php'); ?>
