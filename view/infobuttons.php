<?php
//TODO: Optimize this page

if (isset($page)) {
    switch ($page) {

        case !'browse':
            ?>
            <div class="panel panel-primary infobutton">
                <div class="panel-heading text-center">
                    <i class="fa fa-search"></i>
                    <span class="panel-title">Search</span>
                </div>
                <a href="<?php echo $app_path . "/browse" ?>">
                    <div class="panel-body">
                        <h4 class="text-center">Search for your new home now </h4>
                    </div>
                </a>
            </div>
            <?php break;
        case 'home':
            ?>
            <div class="panel panel-primary infobutton toggleable left">
                <div class="panel-heading text-center">
                    <i class="fa fa-search"></i>
                    <span class="panel-title">Search</span>
                </div>
                <a href="<?php echo $app_path . "/browse" ?>">
                    <div class="panel-body">
                        <h4 class="text-center">Search for your new home now </h4>
                    </div>
                </a>
            </div>
<!--            <div class="panel panel-primary toggleable left">-->
<!--                <div class="panel-heading text-center">-->
<!--                    <i class="fa fa-envelope"></i>-->
<!--                    <span class="panel-title">Priority E-mail List</span>-->
<!--                </div>-->
<!--                <a href="--><?php //echo $app_path . "/email" ?><!--">-->
<!--                    <div class="panel-body">-->
<!---->
<!--                        <h4 class="text-center">Get alerts before everyone else - join our mailing list and receive special-->
<!--                            offers</h4>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
            <div class="panel panel-primary toggleable left">
                <div class="panel-heading text-center">
                    <i class="fa fa-heart"></i>
                    <span class="panel-title">Testimonials</span>
                </div>
                <a href="<?php echo $app_path . "/testimonials" ?>">
                    <div class="panel-body">
                        <h4 class="text-center">See what other had to say about our work</h4>
                    </div>
                </a>
            </div>
            </a>
            <?php break;
        default: ?>
<!---->
<!--            <div class="panel panel-primary infobutton toggleable left">-->
<!--                <div class="panel-heading text-center">-->
<!--                    <i class="fa fa-envelope"></i>-->
<!--                    <span class="panel-title">Priority E-mail List</span>-->
<!--                </div>-->
<!--                <a href="--><?php //echo $app_path . "/email" ?><!--">-->
<!--                    <div class="panel-body">-->
<!---->
<!--                        <h4 class="text-center">Get alerts before everyone else - join our mailing list and receive special-->
<!--                            offers</h4>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="panel panel-primary infobutton toggleable left">-->
<!--                <div class="panel-heading text-center">-->
<!--                    <i class="fa fa-heart"></i>-->
<!--                    <span class="panel-title">Testimonials</span>-->
<!--                </div>-->
<!--                <a href="--><?php //echo $app_path . "/testimonials" ?><!--">-->
<!--                    <div class="panel-body">-->
<!--                        <h4 class="text-center">See what other had to say about our work</h4>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            </a>-->
            <?php break;
    }
} else {
    die('<span style="color:red;font-size:5rem;">Error: $page not defined</span>');
} ?>