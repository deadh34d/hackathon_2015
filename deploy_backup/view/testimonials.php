<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/19/2015
 * Time: 6:06 PM
 */
require_once('../config.php');
include('view/header.php');

$page = "bare"; ?>

<?php
$testimonials = array(
    array("Alan and Katy", "My husband and I recently purchased a beautiful IDK Home in Grovetown, GA. Being our first new home we were
     very nervous getting started. Working with IDK Homes was an easy and excellent experience from start to finish.
      It means a lot that Ron and his entire staff made us feel like friends instead of customers. We really felt
       comfortable knowing that our house was being built by experts who meticulously made sure that our questions were
        answered throughout the process. IDK Home&#39;s attention to detail and outstanding value put our mind at ease.
         We would highly recommend IDK Homes!"),
    array("Jeff", "Our IDK Home is exactly what we were looking for. We found a great new house in Evans, GA that was
                perfect for us to down size into as we near retirement. IDK gave us a great number of options to choose
                from that really let customize our home to the way we wanted. I would highly recommend that if you are
                building in the Augusta area that you talk to IDK Homes."),
    array("Brenda", "All of my experiences with the IDK team have been very positive and I think they do an excellent
                job. They addressed my needs and concerns in a timely, and professional manner. Everyone who comes see
                my new home is very impressed and I always tell them to talk to IDK if they are considering building
                a house on their own property."),
    array("Katy", "The Project Manager was very professional and helped me throughout the process. The sales agent in
                model was very helpful and did an outstanding job helping me though the building process. She knows
                IDK  products well and focused on helping me as a client instead of just a another sale"),
    array("Cindy and David", "The builder warranty process was easy to go through. IDK Homes was very quick to respond
                to my issues and made everything right. The warranty technician was the absolute best we have ever
                worked with and we&#39;ve bought 7 newly constructed homes! "),
);
?>


    <div class="container">
        <?php include('view/sidebar.php');?>
        <h1 class="text-center">Testimonials</h1>

        <div class="col-xs-12">
            <?php foreach ($testimonials as $testimonial) { ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?php echo $testimonial[0]; ?></h6>
                    </div>
                    <p class="panel-body">
                            <?php echo $testimonial[1]; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
<?php include('view/footer.php'); ?>