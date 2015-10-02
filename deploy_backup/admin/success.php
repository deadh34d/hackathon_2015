<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-success text-center">
        <div class="panel-heading">
            <div class="panel-title"><h1>Success!</h1></div>
        </div>
        <div class="panel-body">
            <div class="text-center"></div>
            <div class="text-center">
                <?php if ($_SESSION['edit_homes']) { ?>
                    <span>You have successfully edited the home in the database.</span>
                <?php } else { ?>
                    <span>You have successfully inserted a home in to the database.</span>
                <?php } ?>
                <br/>
                <a href="<?php

                if (isset($_SESSION['lastId'])) {
                    $id = $_SESSION['lastId'];
                } else {
                    $id = $_SESSION['id'];
                }
                echo $app_path . '/home/' . $id ?>">View Home</a>
                <br/>
                <a href="<?php echo $app_path . '/browse/'; ?>">View All Homes</a>
                <br/>
            </div>
            <div class="text-center"><a href="<?php echo $app_path . '/admin/'; ?>">Admin Panel</a></div>

        </div>
    </div>

</div>
<?php $_SESSION['lastId'] = $_SESSION['id'] = $_SESSION['edit_homes'] = $_SESSION['add_homes'] = null ; ?>
<?php include('../view/footer.php'); ?>
