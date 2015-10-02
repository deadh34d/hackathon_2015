<?php
include('view/header.php');
require('view/sidebar.php'); ?>

<?php if (!isset($page_action)) {
    $page_action = 'add';
} ?>
<div class="container">
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <div class="panel-title"><?php echo ucwords($page_action); ?> Slider</div>
        </div>
        <div class="panel-body">
            <form action="<?php echo $app_path . '/admin/index.php'; ?>" method="POST" class="form-horizontal"
                  autocomplete="off" enctype="multipart/form-data">

<!--                <div class="form-group">-->
<!--                    <label for="sold" class="col-sm-4 control-label">Sold</label>-->
<!--                    --><?php //$current_sold = filter_input(INPUT_POST, 'sold', FILTER_SANITIZE_STRING); ?>
<!--                    --><?php //if ($current_sold['sold'] == '1' || (isset($slider['sold']) && $slider['sold'] == 1)) {
//                        $checked = 'checked="checked"';
//                    } else {
//                        $checked = '';
//                    } ?>
<!--                    <div class="col-sm-5">-->
<!--                        <input type="checkbox" id="sold" data-toggle="toggle" data-width="100%" data-height="30"-->
<!--                               data-on="Sold" data-off="Not Sold" data-onstyle="success" data-offstyle="danger"-->
<!--                               name="sold" --><?php //echo $checked; ?><!-- />-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Title</label>

                    <div class="col-sm-5">
                        <input type='text' class="text-center form-control" placeholder="Title" name="title"
                            <?php if (isset($slider['title'])) { ?>
                                value="<?php echo $slider['title']; ?>"
                            <?php } ?>
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="url" class="col-sm-4 control-label">URL, if external image (optional)</label>

                    <div class="col-sm-5">
                        <input type='text' class="text-center form-control" placeholder="URL" name="url"
                            <?php if (isset($slider['url'])) { ?>
                                value="<?php echo $slider['url']; ?>"
                            <?php } ?>
                               >
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description</label>

                    <div class="col-sm-5">
                        <textarea class="form-control" placeholder="Description" name="description"
                                  id="description"><?php if (isset($slider['description'])) {
                                echo $slider['description'];
                            } ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="file" class="col-sm-4 control-label">Upload Image</label>

                    <div class="col-xs-5">
                        <input type="file" class="btn btn-default text-center" style="width:100%;" name="photo" id="photo"/>
                    </div>
                </div>
                <input type="hidden" name="page_action" value="<?php echo $page_action; ?>"/>
                <?php if(isset($id)){?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <?php } ?>

                <input type="hidden" name="action" value="<?php echo $page_action;?>_slider"/>
                <?php if ($page_action == 'edit') { ?>
                    <button type="submit" class="btn btn-primary btn-block">Edit slider</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary btn-block">Add slider</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

</div>

<?php include('../view/footer.php'); ?>
