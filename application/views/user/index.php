<?php include('user_header.php'); ?>
<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Apps Library.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->
<!-- *****************************************************************************************************************
	 TITLE & CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container ">
	 	<div class="row">
		 	<div class="col-lg-8 col-lg-offset-2 centered">
                <?php

                if(isset($heading) && $heading=='search')
                    echo "<h2>Search Results.</h2>";
                elseif(isset($heading) && $heading=='windows')
                    echo "<h2>Most Popular Windows Apps.</h2>";
                elseif(isset($heading) && $heading=='android')
                    echo "<h2>Most Popular Android Apps.</h2>";
                else
                    echo "<h2>Most popular apps.</h2>";
                ?>


		 		
		 		<div class="hline"></div>
		 	</div>
	 	</div>
	 </div>
	 <!-- *****************************************************************************************************************
	 IMAGES SECTION
	 ***************************************************************************************************************** -->
<?php
if(!empty($this->session->flashdata()))
{?>
<div class="alert alert-danger">
    <strong>Alert!</strong> <?php echo $this->session->flashdata('download'); ?>
</div>

<?php }
?>
    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
                <?php
                foreach ($dataArray2 as $data) {
                ?>
                <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
                        <img src="<?php echo base_url().'uploads/appImages/'.$data['image_name'];?>" alt="" style="max-width: 300px;max-height: 200px;height: 100%;width: 100%;">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown"><?php echo $data['name'];?></h3>
                                <a  href="<?php echo site_url().'User/appProfile/'.$data['id'];?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-info-circle"></i></a>
                                <a href="<?php echo site_url().'Dev/download/'.$data['id'].'/'.$data['file_name'] ;?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-download"></i></a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                </div><!-- end col-12 -->
                    <?php
                }
                ?>
            </div><!-- portfolio -->
        </div><!-- portfolio container -->
    </div>
<?php
if(isset($dataArray4))
{
    ?>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 centered">
                 <h2>Most Downloaded Apps.</h2>
                <div class="hline"></div>
            </div>
        </div>
    </div>
    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
                <?php
                foreach ($dataArray4 as $data) {
                    ?>
                    <div class="portfolio-item graphic-design">
                        <div class="he-wrap tpl6">
                            <img src="<?php echo base_url() . 'uploads/appImages/' . $data['image_name']; ?>" alt=""
                                 style="max-width: 300px;max-height: 200px;height: 100%;width: 100%;">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown"><?php echo $data['name']; ?></h3>
                                    <a href="<?php echo site_url() . 'User/appProfile/' . $data['id']; ?>"
                                       class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-info-circle"></i></a>
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
        </div><!-- portfolio container -->
    </div><!--/Portfoliowrap -->
    <?php
}
?>
<?php include('user_footer.php'); ?>
