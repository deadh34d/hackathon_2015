<?php include('view/header.php'); ?>
<?php $page = "view_slider"; ?>
<?php if (isset($slider)){ ?>

<?php if (isset($slider['url'])) {
    $slider_url = $slider['url'];;
} elseif (isset($slider['local_url'])) {
    $slider_url = $app_path . '/' . $slider['local_url'];
} else {
    $slider_url = null;
}
$last_page = $app_path . '/admin/';
?>

<div class="container">
    <?php include('view/backbutton.php');?>
    <div class="panel">
    <div class="panel-body">
        <img src="<?php echo $slider_url ?>" alt="<?php echo $slider['description']; ?>" style="width:100%;"/>
    </div>
        <div class="panel-heading">
            <div class="table">
                <table class="table">
                    <tr>
                        <td>Title</td>
                        <td><?php echo $slider['title']; ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $slider['description']; ?></td>
                    </tr>

                </table>
            </div>
            <?php
            } ?>
        </div>
    </div>

</div>
<div class="container">
    <div class="row text-center" id="slider-description">
        <?php if (isset($slider['description']) && !empty($slider['description'])) { ?>
            <p><?php echo $slider['description']; ?></p>
        <?php } ?>
    </div>
</div>
<?php include('view/footer.php'); ?>
