<?php //this is not a controller. It's not even dynamic, honestly
require_once('../config.php');
include('view/header.php');
?>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <span class="panel-title">BuilderTREND Login</span>
            </div>
            <div class="panel-body">
                <!-- Login Box -->
                <div class="col-xs-12">
                    <iframe src="http://www.buildertrend.net/NewLoginFrame.aspx?builderID=8225"
                            style="border:0px;height:200px;margin-top:1em;width:100%;" frameborder="0"></iframe>
                </div>
                <!-- /Login Box -->
            </div>
        </div>
    </div>
<?php include('view/footer.php'); ?>