<?php include('view/header.php'); ?>
<div class="container">
    <?php include('view/sidebar.php'); ?>
    <div class="row">
        <h1 class="text-center"><?php if($page == 'contact'){ echo 'Contact Us'; }else{ echo 'Careers'; } ?></h1>
        <form role="form" action="<?php if($page == 'contact'){ echo '//formspree.io/about@idkhomes.com'; }else{ echo '//formspree.io/careers@idkhomes.com'; } ?>" method="post" id="contactForm">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="InputName" placeholder="Enter Name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="_replyto">Your E-mail</label>
                        <input type="email" name="_replyto" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="InputMessage">Your Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Enter your message here."
                                  required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary btn-block">
                    </div>

        </form>
    </div>
</div>

</div>

<?php include('view/footer.php'); ?>
