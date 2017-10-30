<?php
/**
 * Created by PhpStorm.
 * User: Vyom Srivastava
 * Date: 14-Aug-17
 * Time: 21:53
 */
include 'dev_header.php';
?>

    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>Your Apps.</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
<!--<h4 class="centered"><a href=" --><?php //echo site_url().'dev/addApp';?><!--">Add a new app<div class="hline"></div></a></h4>-->

    <div  class="col-md-2">

        <?php
        include "sidebar.php";
        ?>


    </div>
<!--<div class=" col-md-10">-->
    <div class="portfoliowrap">




            <!-- <div class='col-md-3 col-sm-12'> -->


            <div class="portfolio-centered">
                <div class="recentitems portfolio">
                    <?php
                    foreach ($dataArray2 as $data)
                    {
                        ?>
                        <div class="portfolio-item graphic-design">
                            <div class="he-wrap tpl6">
                                <img src="<?php echo base_url() . 'uploads/appImages/' . $data['image_name']; ?>" alt=""
                                     style="max-width: 300px;max-height: 200px;height: 100%;width: 100%;">
                                <div class="he-view">
                                    <div class="bg a0" data-animate="fadeIn">
                                        <h3 class="a1" data-animate="fadeInDown"><?php echo $data['name']; ?></h3>
                                        <a href="<?php echo site_url() . 'Dev/addApp/' . $data['id']; ?>"
                                           class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url() . 'Dev/download/' . $data['id'] . '/' . $data['file_name']; ?>"
                                           class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-download"></i></a>
                                    </div><!-- he bg -->
                                </div><!-- he view -->
                            </div><!-- he wrap -->
                        </div><!-- end col-12 -->
                        <?php
                    }
                    ?>
                </div><!-- portfolio -->
            </div>
                <!-- </div> -->


    </div>
<!--    </div>-->


<?php
include 'dev_footer.php';
?>

