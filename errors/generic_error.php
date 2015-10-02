<?php include('view/header.php'); ?>

<div class="container">
    <div class="panel panel-danger text-center">
        <div class="panel-heading">
            <h1>Something went wrong.</h1>
        </div>
        <div class="panel-body">
            <?php echo htmlspecialchars($error); ?>
        </div>
    </div>
</div>

<?php include('view/footer.php'); ?>
