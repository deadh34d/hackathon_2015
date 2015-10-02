<?php include('view/header.php'); ?>

<?php $page = 'home'; ?>
    <div class="container homepage">
    <div class="containing-template">
    <div class="row carousel-row">
        <div class="col-xs-12 col-lg-12 slide-row">
            <div class="carousel slide slide-carousel" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target=".carousel" data-slide-to="0" class="active"></li>
                    <li data-target=".carousel" data-slide-to="1"></li>
                    <li data-target=".carousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo $app_path . '/images/main-banner-min.jpg';?>">
                        <div class="carousel-caption">
<!--                            <h3>Lorem ipsum</h3>-->

<!--                            <p>Lorem ipsum</p>-->
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $app_path . '/images/second-banner-min.jpg';?>">
                        <div class="carousel-caption">
<!--                            <h3></h3>-->

<!--                            <p>Lorem ipsum</p>-->
                        </div>
                    </div>
                    <div class="item">
                        <img
                            src="<?php echo $app_path . '/images/third-banner-min.jpg';?>">
                        <div class="carousel-caption">
<!--                            <h3>Lorem ipsum </h3>-->

<!--                            <p>Lorem ipsum</p>-->
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
<?php include('view/sidebar.php'); ?>
<?php include('view/footer.php'); ?>