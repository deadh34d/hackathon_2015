<?php
require_once('../config.php');
include('view/header.php');

$page = 'coming_soon'

?>


<div class="container">
    <?php include('view/sidebar.php');?>
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <div class="panel-title">
                <h1><i class="fa fa-asterisk"></i>&nbsp;Stay tuned&nbsp;<i class="fa fa-asterisk"></i></h1>
            </div>
        </div>
        <div class="panel-body text-center">
            <h2 class="">
                Coming soon
            </h2>
            <br>
            <a href="."><span>Home</span></a>
        </div>
    </div>
</div>

<?php include('view/footer.php');
