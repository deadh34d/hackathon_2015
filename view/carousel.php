<?php include('view/header.php'); ?>
    <div class="container">
    <div class="row carousel-row">
    <div class="">
        <div class="carousel slide slide-carousel" data-ride="carousel">
            <!-- Indicators -->
            <!--            <ol class="carousel-indicators">-->
            <!--                <li data-target=".carousel" data-slide-to="0" class="active"></li>-->
            <!--                <li data-target=".carousel" data-slide-to="1"></li>-->
            <!--                <li data-target=".carousel" data-slide-to="2"></li>-->
            <!--            </ol>-->
            <?php

            //            $slider_count = count($sliders);

            ?>
            <?php if (isset($sliders) && count($sliders) > 0) { ?>
            <div class="row carousel-row">
                <div class="col-xs-12  slide-row">
                    <div class="carousel slide slide-carousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $i = $j = 0; ?>
                            <?php foreach ($sliders as $slider) { //this is all required for the first element getting the 'active' class.
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
                            if (isset($sliders)){
                            $i = 0; //same with all of this
                            foreach ($sliders as $slider) {
                            if ($i == 0) {
                            ?>
                            <div class="item active">
                                <?php } else {
                                ?>
                                <div class="item">
                                    <?php }
                                    $i++;


                                    if (isset($slider['url'])) {
                                        $slider_url = $slider['url'];
                                    } elseif (isset($slider['local_url'])) {
//                                        $slider_url = $app_path . '/' . $slider['local_url'];
                                        $slider_url = $app_path . $slider['local_url'];
                                    } else {
                                        $slider_url = null;
                                    }
                                    ?>
                                    <img src="<?php echo $slider_url ?>" alt="<?php echo $slider['description']; ?>"/>

                                    <div class="carousel-caption">
                                        <h3><?php echo $slider['title']; ?></h3>
                                        <br>
                                        <span><?php echo $slider['description']; ?></span>
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

            <!-- Wrapper for slides -->
            <!--            <div class="carousel-inner">-->
            <!--                --><?php //foreach ($sliders as $index => $slider): ?>
            <!--                    --><?php //if ($index == 1) {
            //                        $active = "active";
            //                    } else {
            //                        $active = "";
            //                    } ?>
            <!--                    <div class="item --><?php //echo $active; ?><!--">-->
            <!--                        <img src="--><?php //echo $slider['image']; ?><!--">-->
            <!---->
            <!--                        <div class="carousel-caption">-->
            <!--                            <span>--><?php //echo $slider['text']; ?><!--</span>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                --><?php //endforeach; ?>
            <!--            </div>-->

        </div>
    </div>
<?php include('view/sidebar.php'); ?>
<?php include('view/footer.php'); ?>