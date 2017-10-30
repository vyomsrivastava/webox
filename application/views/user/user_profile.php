<?php
/**
 * Created by PhpStorm.
 * User: Vyom Srivastava
 * Date: 26-Aug-17
 * Time: 13:25
 */

include "user_header.php";

?>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Profile.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<div class="container mtb">
    <div  class="col-md-2">
<!--    --><?php
//    include "sidebar.php";
//    ?>
    </div>
    <form role="form" action="<?php echo base_url().'User/updateProfile';?> " method='post' enctype="multipart/form-data" >
        <div class="col-md-6">
            <h4>Your Profile.</h4>
            <div class="hline"></div>

            <?php
            print_r($dataArray);
            ?>
                <div class="form-group">
                    <label for="InputName1">Your Name</label>
                    <input type="text" class="form-control" name="name" value="<?php foreach($dataArray as $data)
                        echo $data['name'];
                        ?>">
                    <?php echo form_error('name','<div class="text-danger">','</div>');?>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="InputSubject1">Company</label>-->
<!--                    <input type="text" class="form-control"  name="company" value="--><?php //foreach($dataArray as $data)
//                        echo $data['company'];
//                    ?><!--">-->
<!--                    --><?php //echo form_error('company','<div class="text-danger">','</div>');?>
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="InputSubject1">Skills</label>-->
<!--                    <input type="text" class="form-control" name="skills" value="--><?php //foreach($dataArray as $data)
//                        echo $data['skills'];
//                    ?><!--">-->
<!--                    --><?php //echo form_error('skills','<div class="text-danger">','</div>');?>
<!--                </div>-->
                <div class="form-group">
                    <label for="InputSubject1">Profile Pic</label>
                    <input type="file" class="form-control" name="pic">
                    <input type="hidden" value="<?php foreach ($dataArray as $data) echo $data['profile_pic'];?>" name="old_pic">
                    <?php echo form_error('pic','<div class="text-danger">','</div>');?>
                </div>

                <button type="submit" class="btn btn-theme">Update Profile</button>
            <?php
            foreach ($dataArray as $data)
            {?>
                <a href="<?php echo base_url() . 'User/changePassword/'.'1/'.$this->session->userdata('user_id'); ?>"><button type="button" class="btn btn-warning">Change Password</button></a>
            <?php
            }
            ?>
        </div>
        <div class="col-md-3">
            <h4>Your Current Profile Pic.</h4>
            <div class="hline"></div>
            <div id="portfoliowrap">
                <div class="portfolio-centered">
                    <div class="recentitems portfolio">
                        <div class="portfolio-item graphic-design">
                            <div class="he-wrap tpl6">
                                <img src="<?php echo base_url();?>uploads/<?php foreach($dataArray as $data) echo $data['profile_pic'];?>" alt="">

                                <div class="he-view">
                                    <div class="bg a0" data-animate="fadeIn">
                                        <h3 class="a1" data-animate="fadeInDown"><?php foreach ($dataArray as $data) echo $data['name'];?></h3>
<!--                                        <h3 class="a1" data-animate="fadeInDown">--><?php //foreach ($dataArray as $data) echo $data['company'];?><!--</h3>-->
<!--                                        <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_09.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>-->
<!--                                        <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>-->
                                    </div><!-- he bg -->
                                </div><!-- he view -->
                            </div><!-- he wrap -->
                        </div><!-- end col-12 -->
                    </div>
                </div>
            </div>
        </div> <! --/col-lg-8 -->
    </form>


    </div>

</div>




<?php
include "user_footer.php";
?>
