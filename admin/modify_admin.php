<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<?php if (!isset($page_action)) {
    $page_action = 'add';
} ?>
<div class="container">
    <div class="panel panel-default text-center">
        <?php
        if(isset($_POST['error'])){
            $error = filter_input(INPUT_POST, 'error', FILTER_SANITIZE_STRING);
        }elseif(isset($_GET['error'])) {
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
        }
        if(isset($error)){?>
            <div class="panel-danger panel">
                <div class="panel-heading">
                    <span>Error: <?php echo base64_decode($error);?></span>
                </div>
            </div>
        <?php } ?>
        <div class="panel-heading">
            <div class="panel-title"><?php echo ucwords($page_action); ?> admin</div>
        </div>
        <div class="panel-body">
            <form action="<?php echo $app_path . '/admin/index.php'; ?>" method="POST" class="form-horizontal" autocomplete="off">
                <div class="form-group">
                    <label for="enabled" class="col-sm-4 control-label">Enabled</label>
                    <?php $current_enabled = filter_input(INPUT_POST, 'enabled', FILTER_SANITIZE_STRING); ?>
                    <?php if ($current_enabled['enabled'] == '1' || (isset($admin['enabled']) && $admin['enabled'] == 1)) {
                        $checked = 'checked="checked"';
                    } else {
                        $checked = '';
                    } ?>
                    <div class="col-sm-5">
                        <input type="checkbox" id="enabled" data-toggle="toggle" data-width="100%" data-height="30"
                               data-on="enabled" data-off="Not enabled" data-onstyle="success" data-offstyle="danger"
                               name="enabled" <?php echo $checked; ?> />
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Username</label>

                    <div class="col-sm-5">
                        <input type='text' class="text-center form-control" placeholder="username" name="username"
                            <?php if (isset($admin['username'])) { ?>
                                value="<?php echo $admin['username']; ?>"
                            <?php } ?>
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>

                    <div class="col-sm-5">
                        <input type='password' class="text-center form-control" placeholder="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-5">
                        <textarea class="form-control" placeholder="email" name="email"
                                  id="email"><?php if (isset($admin['email'])) {
                                echo $admin['email'];
                            } ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="page_action" value="<?php echo $page_action; ?>"/>
                <?php if(isset($id)){?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <?php } ?>

                <input type="hidden" name="action" value="<?php echo $page_action;?>_admin"/>
                <?php if ($page_action == 'edit') { ?>
                    <button type="submit" class="btn btn-primary btn-block">Edit admin</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary btn-block">Add admin</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

</div>

<?php include('../view/footer.php'); ?>
