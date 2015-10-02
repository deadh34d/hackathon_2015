<?php include('view/header.php'); ?>
<?php $page = "view_plan"; ?>

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
        <div class="row text-center" id="plan-description">
            <?php if (isset($plan['description']) && !empty($plan['description'])) { ?>
                <p><?php echo htmlspecialchars($plan['description']); ?></p>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <tr>
                    <?php if (isset($plan['street_name']) && isset($plan['street_number']) && isset($plan['state']) &&
                        isset($plan['city']) && isset($plan['zip_code'])

                        && !empty($plan['street_name']) &&
                        !empty($plan['street_number']) && !empty($plan['zip_code']) && !empty($plan['state']) && !empty($plan['city'])
                    ) { ?>
                        <td>Address</td>

                        <td id="address">
                            <?php echo htmlspecialchars($plan['street_number'] . ' ' . $plan['street_name']
                                . ' - ' . $plan['city'] . ', ' . $plan['state']
                                . ' ' . $plan['zip_code']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['subdivision']) && !empty($plan['subdivision'])) { ?>
                        <td>Subdivision</td>

                        <td><?php echo htmlspecialchars($plan['subdivision']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['lot']) && !empty($plan['lot'])) { ?>
                        <td>Lot</td>

                        <td> <?php echo htmlspecialchars($plan['lot']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Availability</td>
                    <?php if ($plan['sold'] != 0) : ?>
                        <td> Sold / Off-Market</td>
                    <?php else : ?>
                        <td> Available</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <?php if (isset($plan['plan_name']) && !empty($plan['plan_name'])) { ?>
                        <td>Plan Type</td>

                        <td><?php echo htmlspecialchars($plan['plan_name']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['sales_price']) && !empty($plan['sales_price'])) { ?>
                        <td>Sales Price</td>

                        <td><?php echo htmlspecialchars($plan['sales_price']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['elevation']) && !empty($plan['elevation'])) { ?>
                        <td>Elevation</td>

                        <td><?php echo htmlspecialchars($plan['elevation']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['finish']) && !empty($plan['finish'])) { ?>
                        <td>Finish</td>

                        <td><?php echo htmlspecialchars($plan['finish']); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($plan['mls']) && !empty($plan['mls'])) { ?>
                        <td>MLS Listing Page</td>
                        <td><a href="<?php echo htmlspecialchars($plan['mls']); ?>">Link</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php if (isset($realtor) && !empty($realtor)) : ?>
                        <?php foreach ($realtor as $real) : ?>
                        <td>Realtor</td>
                        <td><a href="<?php echo htmlspecialchars($real['url']); ?>"><?php echo htmlspecialchars( $real['name']); ?></a></td>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
