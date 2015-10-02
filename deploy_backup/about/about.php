<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/19/2015
 * Time: 6:06 PM
 */
include('view/header.php');

$page = "bare"; ?>

<?php
$paragraphs = array(
    array("Our Mission", "A company is only as good as the promises it keeps. Our promise is to build the best quality homes we
                can possibly build.<br/><br/>Quality and consumer satisfaction are the cornerstones of our success. We
                are dedicated to delivering quality satisfaction to all our customers.<br/><br/>Long-term profitability
                depends on consistent customer satisfaction. We believe the delivery of a quality product and superior
                service must be supported by the highest ethical standards in every business transaction.<br/><br/>Integrity
                is essential to satisfying our customers. We desire to be known as individuals of integrity, with an
                obligation to deliver an accurate honest response.<br/><br/>Growth and profitability must be viewed and
                managed from the long-term perspective. We will adhere to our long-range goals and ideals, never
                compromising them for short-term purposes.<br/><br/>Our company thrives on new ideas, new directions,
                new opportunities and challenges. We will embrace opportunity and innovation, with the continual
                objective stabilizing our firm and protecting it from the cynical nature of specific markets."),
    array("Our people are our most valuable asset", "Directing the day to day operations of a company like IDK Homes' scope and magnitude requires a broad
                range
                of talent and knowledge, and the firm fosters an environment which gives employees considerable
                opportunity
                for growth and advancement.<br/><br/>IDK Homes' skilled management team reflects a harmonious blend of
                leaders with diverse educational backgrounds, including advanced degrees in business management, and
                construction management. Throughout the company, future leaders are identified early and trained in the
                intricacies of construction and profit and loss creating a culture of &quot;entrepreneurs&quot; who
                learn
                and live all angles of the business.<br/><br/>A variety of professionals are selected to be managers,
                including recent college graduates, IDK&#x2019;s own home-grown construction veterans. Each is given
                extraordinary autonomy to foster the business goals of the manager and the company.<br/><br/>Effective,
                energetic entrepreneurs, these individuals combine technical skills acquired through years of hands-on
                experience with strong academic and professional qualifications."),
    array("Stability is our strength", "Progressive management systems. Fiscally conservative business practices, and a diversified approach
                to
                corporate planning have established IDK as one of the most stable construction firms in the
                homebuilding
                industry.<br/><br/>To meet ever-changing demands of the industry, IDK has achieved consistent growth
                and
                steady earnings through the formulation of business strategies which anticipate and readily adapt to
                economic cycles and industry trends.<br/><br/>As a result, its long-term financial strength and
                stability
                have earned the confidence and trust of customers, business associates, lenders and venture
                partners."),
    array("Innovative architecture and design", "Innovative and creative homes don't just happen. They are the culmination of years of
                experience, tireless
                dedication and an ability to listen to customer&#x2019;s needs. A considerable part of IDK
                Homes' success is
                in its ability to understand the market and provide high quality housing built to both inspire
                and provide
                all the comforts of quality daily living."),
    array("Home for every budget", "A core Philosophy at IDK Homes is to provide quality housing for all stages of life.
                Offering homes for
                single individuals, young couples, young families, growing families, luxury homes, No matter
                what stage of
                life IDK has a home for you.<br/><br/>From starter homes to estate homes, from first-time
                buyers to empty
                nesters."),
    array("Creating a neighborhood: Land acquisition and development", "A big part of IDK Homes' success is the ability to not only build a quality home, but to
                develop a
                neighborhood environment in which to build. IDK Homes is known for its innovative
                layouts and speed of
                turning raw land into finished Homes.")
);
?>


    <div class="container">
        <?php include('view/sidebar.php');?>
        <h1 class="text-center">Our Mission Statement</h1>

        <div class="col-xs-12">
            <?php foreach ($paragraphs as $paragraph) { ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?php echo $paragraph[0]; ?></h6>
                    </div>
                    <p class="panel-body">
                        <?php echo $paragraph[1]; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
<?php include('view/footer.php'); ?>