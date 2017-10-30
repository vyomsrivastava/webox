<?php
/**
 * Created by PhpStorm.
 * User: Vyom Srivastava
 * Date: 28-Aug-17
 * Time: 20:40
 */
include 'dev_header.php';
?>
<div class="container mtb">
    <div  class="col-md-2">
        <?php
        include "sidebar.php";
        ?>
    </div>
    <?php
    if($dataArray2>0)
    {
        foreach ($dataArray2 as $data)
        {
            $id=$data['id'];
        }

    }
    else
        $id=null;
    ?>
    <form role="form" action="<?php echo base_url().'dev/addAppdetails/'.$id;?> " method='post' enctype="multipart/form-data">
        <div class="col-md-6">
            <h4>Your App Details.</h4>
            <div class="hline"></div>


            <div class="form-group">
                <label for="InputName1">App Name</label>
                <input type="text" class="form-control" name="appname" value="<?php if($dataArray2>0){foreach ($dataArray2 as $data) echo $data['name'];} else{set_value('appname');} ?>">
                <?php echo form_error('appname','<div class="text-danger">','</div>');?>
            </div>
            <div class="col-md-6 form-group">

                <label for="InputEmail1">App Platform</label>
                <div class="radio">
                    <label><input type="radio" value="windows" name="platform">Windows</label>
                </div>
                <div class="radio">
                    <label><input type="radio" value="android" name="platform">Android</label>
                </div>
<!--                <div class="radio disabled">-->
<!--                    <label><input type="radio" name="optradio" disabled>Option 3</label>-->
<!--                </div>-->
<!--                <input type="email" class="form-control"  name="email">-->
                <?php echo form_error('platform','<div class="text-danger">','</div>');?>
            </div>
            <div class="col-md-6 form-group">

                <label for="InputEmail1">App Category</label>
                <div class="checkbox">
                    <label><input type="checkbox" value="Games" name="category[]">Games</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="Entertainment" name="category[]">Entertainment</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="Music" name="category[]">Music/Video</label>
                </div>
                <div class="checkbox ">
                    <label><input type="checkbox" value="Social" name="category[]" >Social</label>
                </div>
<!--                <input type="email" class="form-control"  name="email">-->
                <?php echo form_error('category','<div class="text-danger">','</div>');?>
            </div>

            <div class="form-group">
                <label for="InputSubject1">App Description</label>
                <textarea class="form-control" id="message1" name="description" rows="4" ><?php if($dataArray2>0){foreach ($dataArray2 as $data) echo $data['description'];} else set_value('description');?></textarea>

                <?php echo form_error('description','<div class="text-danger">','</div>');?>
            </div>
            <div class="form-group">
                <label for="InputSubject1">Upload App Pic</label>
                <input type="file" class="form-control" name="app_pic">
                <?php echo form_error('app_pic','<div class="text-danger">','</div>');?>
                <?php
                if($dataArray2>0) {
                    ?>
                    <input type="hidden" value="<?php foreach ($dataArray2 as $data) echo $data['image_name'];?>" name="old_pic">
                    <?php
                }
                ?>
            </div>
            <div class="form-group">

                <label for="InputSubject1">Upload App File</label>
                <input type="file" class="form-control" name="file">
                <?php echo form_error('file','<div class="text-danger">','</div>');?>
                <input type="hidden" value="<?php if($dataArray2>0){ foreach ($dataArray2 as $data) echo $data['file_name'];}?>" name="old_app">

            </div>
            <!-- <div class="form-group">
                <label for="message1">Message</label>
                <textarea class="form-control" id="message1" rows="3"></textarea>
            </div> -->
            <button type="submit" class="btn btn-theme"><?php if($dataArray2 > 0) echo "Update Details"; else echo "Add App";?></button>

        </div>
        <?php if ($dataArray2>0)
        {  ?>
        <div class="col-md-3">
            <h4>Current App Pic.</h4>
            <div class="hline"></div>
            <div id="portfoliowrap">
                <div class="portfolio-centered">
                    <div class="recentitems portfolio">
                        <div class="portfolio-item graphic-design">
                            <div class="he-wrap tpl6"

                                     <input type="hidden" value="<?php foreach ($dataArray2 as $data) echo $data['id'];?>" name="id">
                                <img src="<?php echo base_url();?>uploads/appImages/<?php foreach($dataArray2 as $data) echo $data['image_name'];?>" >


<!--                                <div class="he-view">-->
<!--                                    <div class="bg a0" data-animate="fadeIn">-->
<!--                                        <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>-->
<!--                                        <a data-rel="prettyPhoto" href="img/portfolio/portfolio_09.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>-->
<!--                                        <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>-->
<!--                                    </div><!-- he bg -->
<!--                                </div><!-- he view -->
                            </div><!-- he wrap -->
                        </div><!-- end col-12 -->
                    </div>
                </div>
            </div>
        <?php }; ?>
        </div> <!--col-lg-8 -->
    </form>

</div>


<?php
    include 'dev_footer.php';
?>
