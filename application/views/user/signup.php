<?php include ('user_header.php'); ?>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Sign Up.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div>
<div class="container mtb">
<div class="row">

<div class=" col-md-10 col-md-offset-1">
<h1 class="text-center" >Which profile would you like to create?</h1><br>
<a href="<?php echo site_url('user/user_signup'); ?>" class="btn btn-primary btn-lg btn-block">Sign Up as User</a>
<a href="<?php echo site_url('dev/signup'); ?>" class="btn btn-success btn-lg btn-block">Sign Up as Devloper</a>
</div>
</div>

</div>
<?php include ('user_footer.php'); ?>
