<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IDK Homes</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="<?php echo $app_path; ?>/css/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100,500' rel='stylesheet'
          type='text/css'>

<body>
<div class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i
                        class="glyphicon glyphicon-menu-hamburger"></i></span></button>
            <a class="navbar-brand" href="<?php echo $app_path; ?>"><img
                    src="<?php echo $app_path . "/images/idk-logo-white.png";?>"></a>

        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav"> <?php $links = array('home', 'browse', 'plans', 'about', 'contact', 'careers', 'BuilderTREND-Client-Login', 'testimonials', 'warranty', 'our-communities');
                foreach ($links as $link) { ?>
                    <li class="text-center navlink"><a
                        href='<?php echo $app_path . "/" . $link; ?>'> <?php if($link == 'BuilderTREND-Client-Login'){
                            echo ucwords('BuilderTREND Client Login');
                        }elseif($link == 'our-communities'){
                            echo ucwords('Our Communities');
                        }
                        else{ echo ucfirst($link); }?> </a>
                    </li><?php } ?>
            </ul>
            <?php include('view/share.php'); ?>
        </div>
    </div>
</div>
