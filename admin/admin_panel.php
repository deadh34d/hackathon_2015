<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/28/2015
 * Time: 10:31 PM
 */
$page = 'admin_panel';
?>
<?php include('view/header.php'); ?>

    <div class="container">
<!--        --><?php //include('view/sidebar.php'); ?>
        <div class="panel panel-default col-xs-12">
            <?php
            if(isset($_POST['error'])){
                $error = filter_input(INPUT_POST, 'error', FILTER_SANITIZE_STRING);
            }elseif(isset($_GET['error'])) {
                $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
            }
            if(isset($error)){?>
            <div class="panel-danger panel">
                <div class="panel-heading">
                    <span>Error: <?php echo base64_decode($error);?></span>
                </div>
            </div>
            <?php } ?>
            <h1 class="text-center">Admin Panel - Welcome,
                <?php
                try {
                    if (isset($_SESSION['user']['username'])) {
                        echo ucwords($_SESSION['user']['username']);
                    } else {
                        echo ucwords($_SESSION['user']);
                    }
                } catch (Exception $e) { //try-catching this, because it was giving me trouble with either index set
                    echo "Administrator";
                }
                ?></h1> <a
                href="<?php echo $app_path . '/admin/?action=logout'; ?>">
                <button class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i>Logout</button>
            </a>

            <div class="panel-default panel col-xs-12">
                <table class="table">
                    <?php $items = ['home', 'slider', 'admin']; ?>
<!--                    //TODO: Add cards-->
                    <?php foreach($items as $item){?>
                        <?php ucfirst($item); ?>
                        <tr>
                            <td><?php echo ucfirst($item);?> Options</td>
                            <td><a href=".?action=add_<?php echo $item . '_page';?>"><span class="text-center">Add <?php echo ucfirst($item);?></span></a></td>
                            <td><a href=".?action=edit_<?php echo $item . '_page';?>"><span class="text-center">Edit <?php echo ucfirst($item);?></span></a></td>
                            <td><a href=".?action=delete_<?php echo $item . '_page';?>"><span class="text-center">Delete <?php echo ucfirst($item);?></span></a></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>


<?php include('view/footer.php'); ?>