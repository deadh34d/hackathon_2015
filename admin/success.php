<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<div class="container">
    <div class="panel panel-success text-center">
        <div class="panel-heading">
            <div class="panel-title"><h1><i class="glyphicon glyphicon-ok"></i>&nbsp;Success</h1></div>
        </div>
        <div class="panel-body">
            <div class="text-center">
                <?php
                $success_message = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if (isset($success_message)) {
                    $success_message = base64_decode($success_message);
                    echo $success_message;
                }
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                ?>
                <br/>
                <br/>
                <a href="<?php echo $app_path . '/browse/'; ?>">
                    <button class="btn btn-default btn-block"><i class="glyphicon glyphicon-home"></i>&nbsp;View All
                        Homes
                    </button>
                </a>
                <br>

                <?php if (isset($id) && $id != 0) { ?>
                    <a href="<?php echo $app_path . '/home/' . $id; ?>">
                        <button class="btn btn-default btn-block"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;View
                            Home
                        </button>
                    </a>
                    <br>
                    <div class="well">
                        <a href="<?php echo $app_path . '/admin/?action=add_home_page'; ?>">
                            <button class="btn btn-default  btn-block"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add
                                a
                                home
                            </button>
                        </a>
                        <br>
                        <a href="<?php echo $app_path . '/admin/?action=edit_home_page'; ?>">
                            <button class="btn btn-default btn-block"><i class="fa fa-pencil"></i>&nbsp; Edit
                                a
                                home
                            </button>
                        </a>
                        <br>
                        <a href="<?php echo $app_path . '/admin/?action=delete_home_page'; ?>">
                            <button class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i>&nbsp;
                                Delete
                                a
                                home
                            </button>
                        </a>

                    <br><br>
                    <h2>Forgot something?</h2>
                    <br>
                    <a href="<?php echo $app_path . '/home/' . $id . '/edit_home'; ?>">
                        <button class="btn btn-primary  btn-block"><i class="glyphicon glyphicon-menu-left"></i>&nbsp;Edit
                            Home Again
                        </button>
                    </a>
                <?php } else { ?>
                    <br>
                    <a href="<?php echo $app_path . '/admin/'; ?>">
                        <button class="btn btn-default btn-block">Admin Panel</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
<?php $_SESSION['lastId'] = $_SESSION['id'] = $_SESSION['edit_homes'] = $_SESSION['add_homes'] = null; ?>
<?php include('view/footer.php'); ?>
