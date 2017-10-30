<?php
/**
 * Created by PhpStorm.
 * User: Vyom Srivastava
 * Date: 22-Oct-17
 * Time: 21:41
 */
include 'user_header.php';
?>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3><?php foreach ($dataArray as $data) echo $data['name'];?>.</h3>
        </div>
    </div>
</div>
    <div class="container mt">
        <div class="row">
            <?php
            if(!empty($this->session->flashdata()))
            {?>
                <div class="alert alert-danger">
                    <strong>Alert!</strong> <?php echo $this->session->flashdata('download'); ?>
                </div>

            <?php }
            ?>
            <div class="col-lg-12 col-md-12   centered">
                <div id="carousel-example-generic" class="carousel slide align-center" data-ride="carousel">
                    <!-- Indicators -->
<!--                    <ol class="carousel-indicators">-->
<!--                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--                    </ol>-->
                    <div class="carousel-inner">
                        <div class="item active">
                            <?php
                            foreach ($dataArray as $data)
                            {
                                ?>
                                <img src="<?php echo base_url() .'uploads/appImages/'. $data['image_name']; ?>"  alt="">
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-1">
                <div class="spacing"></div>
                <h4>Introduction.</h4>
                <div class="hline"></div>
                <p><?php foreach ($dataArray as $data) echo $data['description'];?></p>
            </div>
            <div class="col-lg-4 col-lg-offset-1">
                <div class="spacing"></div>
                <h4>Application Details</h4>
                <div class="hline"></div>
                <p><b>Developer:</b> <?php foreach ($dataArray as $data) echo $data['dev_db_name'];?></p>
                <p><b>Category:</b><?php foreach ($dataArray as $data) echo $data['category'];?></p>
                <p><b>Downloads:</b><?php foreach ($dataArray as $data) echo $data['downloads'];?></p>

                <?php
                foreach ($dataArray as $data) {
                    ?>
                    <a href="<?php echo site_url() . 'Dev/download/' .$data['id'].'/'.$data['file_name'];?> "><button class="btn btn-success btn-block">Download!</button></a>
                    <?php
                }
                ?>

            </div>

        </div>
    </div>

    <!-- *****************************************************************************************************************
     PORTFOLIO SECTION
     ***************************************************************************************************************** -->

<div id="portfoliowrap">
    <div class="portfolio-centered">
        <h3>Related Apps.</h3>
        <div class="recentitems portfolio">
            <?php
            foreach ($dataArray2 as $data) {
                ?>
                <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
                        <img src="<?php echo base_url().'uploads/appImages/'.$data['image_name']; ?>" alt="">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown"><?php echo $data['name'];?></h3>
                                <a href="<?php echo site_url().'Dev/download/'.$data['id'].'/'.$data['file_name'];?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-download"></i></a>
                                <a href="<?php echo site_url().'User/appProfile/'.$data['id'];?>" class="dmbutton a2" data-animate="fadeInUp"><i
                                            class="fa fa-info-circle"></i></a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                </div><!-- end col-12 -->

                <?php
            }
            ?>
        </div><!-- portfolio -->
    </div><!-- portfolio container -->
</div><!--/Portfoliowrap -->


</div>











<?php
include 'user_footer.php';
?>
