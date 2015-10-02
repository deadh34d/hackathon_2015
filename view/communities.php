<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/19/2015
 * Time: 6:06 PM
 */
require('../config.php');
include('view/header.php');

$page = "bare"; ?>

    <div class="container">
<?php include('view/sidebar.php'); ?>

    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1 class="panel-title">Our Communities</h1>

            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h6 class="panel-title">Chastain Place</h6>
                    </div>
                    <div class="panel-body">
                        <img class="col-md-3 col-xs-12" src="<?php echo $app_path; ?>/img/chastainplace.png">

                        <p>
                            Chastain Place is one of Blanchard & Calhoun's newest
                            neighborhoods in Columbia County, Georgia. Conveniently
                            located just minutes from I-20, this beautiful neighborhood
                            features streetlights and sidewalks throughout. We also have
                            a community swimming pool and poolhouse.
                            Located just over a mile from Grovetown High School and the
                            new Baker Place Elementary.
                        </p>
                    </div>
                </div>
                <br>

                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h6 class="panel-title">Bartram Trail</h6>
                    </div>
                    <div class="panel-body">
                        <img class="col-md-3 col-xs-12" src="<?php echo $app_path; ?>/img/bartramtrail.png">

                        <p>
                            Known as the first American botanist and naturalist,
                            responsible for cataloging virtually all of the native
                            plants, trees and wildlife in the Southeastern United
                            States, William Bartram is equally appreciated for
                            his beautifully written and illustrated accountings of nature and of native American
                            peoples. Bartram's path throughout his travels is known as the Bartram Trail, traversing the
                            lower South,up the Savannah River through Augusta, to it headwaters in the mountains of
                            North Carolina.
                            <br>
                            Today, a new community has been planned along the periphery of the most documented portions
                            of the Bartram Trail. In the early 1990s a group of Augustans recognized the extraordinary beauty
                            of the property located just west of Augusta on Columbia Road. The result of their discovery is a
                            master-planned community in the truest sense, offering an outstanding recreational environment for
                            families of all ages and configurations.
                            <br>

                            Bartram Trail is a community with a purpose, providing residents and the surrounding
                            community
                            an
                            opportunity to be part of something even larger. Bartram Trail offers the Augusta area the
                            first
                            residential
                            alternative where together, quality of life and preservation are the focus.
                            <br>
                            Bartram Trail is conveniently located just minutes away from Augusta and Evans's thriving
                            medical
                            community, the area's best shopping, dining, civic and cultural events, recreational areas
                            and
                            the city's
                            business district. Located in Columbia County, Georgia, one of the state's fastest growing
                            areas, Bartram
                            Trail also boasts one of the county's best school districts.
                        </p>
                    </div>
                </div>

                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h6 class="panel-title">Blanchard Estates</h6>
                    </div>
                    <div class="panel-body">
                        <img class="col-md-3 col-xs-12" src="<?php echo $app_path; ?>/img/blanchardestates.jpg">

                        <p>
                            Located in the heart of Evans, Blanchard Estates offers close
                            proximity to all of life's conveniences including recreation,
                            dining, and shopping. Homes boasting 4-5 bedroom floor plans
                            with over 2800 sqft of living space are positioned with large
                            lots in the 35 home neighborhood. Situated less than 5
                            minutes away is Blanchard Woods Park which contains walking
                            trails, playgrounds, soccer fields, and much more. You will
                            enjoy our spacious homes built by some of the best local
                            builders in the area! Come see us today and call Blanchard Estates home!
                            <br>
                            Surrounded by a beautiful 140-acre nature preserve, Tudor Branch offers a
                            unique community environment where greenspace, historically-based
                            architecture, and walkability are the resounding themes. Come experience the
                            harmony of nature and architecture at Tudor Branch today
                        </p>

                    </div>
                </div>

            </div>


        </div>
    </div>

<?php include('view/footer.php'); ?>