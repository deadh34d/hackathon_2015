<?php include('view/header.php'); ?>
<?php $page = "view_home"; ?>

<div class="container">
    <?php include('view/sidebar.php'); ?>
    <div class="jumbotron">
        <?php if (isset($images) && count($images) > 0) { ?>
        <div class="row carousel-row">
            <div class="col-xs-12  slide-row">
                <div class="carousel slide slide-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = $j = 0; ?>
                        <?php foreach ($images as $image) { //this is all required for the first element getting the 'active' class.
                            // Otherwise, images won't show up.
                            if ($i == 0) {
                                ?>
                                <li data-target=".carousel" data-slide-to="0" class="active"></li>
                            <?php } else { ?>
                                <li data-target=".carousel" data-slide-to="<?php echo $i; ?>"></li>
                            <?php }
                            $i++;
                            $j++;
                        } ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        if (isset($images)){
                        $i = 0; //same with all of this
                        foreach ($images as $image) {
                        if ($i == 0) {
                        ?>
                        <div class="item active">
                            <?php } else {
                            ?>
                            <div class="item">
                                <?php }
                                $i++;



                                if (isset($image['url'])) {
                                    $image_url = $image['url'];;
                                } elseif (isset($image['local_url'])) {
                                    $image_url = $app_path . '/' . $image['local_url'];
                                } else {
                                    $image_url = null;
                                }



                                ?>

                                <img src="<?php echo $image_url ?>" alt="<?php echo $image['description']; ?>"/>

                                <div class="carousel-caption">
                                    <h3><?php echo $image['title']; ?></h3>
                                    <span><?php echo $image['description']; ?></span>
                                </div>

                            </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <h1 class="text-center">No Images Available</h1>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row text-center" id="home-description">
            <?php if (isset($home['description']) && !empty($home['description'])) { ?>
                <p><?php echo $home['description']; ?></p>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <tr>
                    <?php if (isset($home['street_name']) && isset($home['street_number']) && isset($home['state']) &&
                        isset($home['city']) && isset($home['zip_code'])

                        && !empty($home['street_name']) &&
                        !empty($home['street_number']) && !empty($home['zip_code']) && !empty($home['state']) && !empty($home['city'])
                    ) { ?>
                        <td>Address</td>

                        <td id="address">
                            <?php echo $home['street_number'] . ' ' . $home['street_name']
                                . ' - ' . $home['city'] . ', ' . $home['state']
                                . ' ' . $home['zip_code']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['subdivision']) && !empty($home['subdivision'])) { ?>
                        <td>Subdivision</td>

                        <td><?php echo $home['subdivision']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['lot']) && !empty($home['lot'])) { ?>
                        <td>Lot</td>

                        <td> <?php echo $home['lot']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Availability</td>
                    <?php if ($home['sold'] != 0) : ?>
                        <td> Sold / Off-Market</td>
                    <?php else : ?>
                        <td> Available</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <?php if (isset($home['plan_name']) && !empty($home['plan_name'])) { ?>
                        <td>Plan Type</td>

                        <td><?php echo $home['plan_name']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['sales_price']) && !empty($home['sales_price'])) { ?>
                        <td>Sales Price</td>

                        <td><?php echo $home['sales_price']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['elevation']) && !empty($home['elevation'])) { ?>
                        <td>Elevation</td>

                        <td><?php echo $home['elevation']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['finish']) && !empty($home['finish'])) { ?>
                        <td>Finish</td>

                        <td><?php echo $home['finish']; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($home['mls']) && !empty($home['mls'])) { ?>
                        <td>MLS Listing Page</td>
                        <td><a href="<?php echo $home['mls']; ?>">Link</a></td>
                    <?php } ?>
                </tr>

            </table>
        </div>
    </div>

    <div class="container">
        <div class="col-xs-12">
            <?php include('view/googlemap.php'); ?>
        </div>

    </div>


</div>
<?php include('view/footer.php'); ?>
