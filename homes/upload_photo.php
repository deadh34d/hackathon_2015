<?php
/**
 * Created by PhpStorm.
 * User: exati_000
 * Date: 9/8/2015
 * Time: 5:09 PM
 */
require('../config.php');
include('view/header.php');

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php include('view/footer.php');?>