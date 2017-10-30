<?php
include 'user_header.php';
?>

    <!-- *****************************************************************************************************************
     BLUE WRAP
     ***************************************************************************************************************** -->
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>Sign Up.</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->

    <!-- *****************************************************************************************************************
     CONTACT WRAP
     ***************************************************************************************************************** -->

    <!-- <div id="contactwrap"></div> -->

    <!-- *****************************************************************************************************************
     CONTACT FORMS
     ***************************************************************************************************************** -->

    <div class="container mtb">
        <div class="row">
            <div class="col-lg-8">
                <h4>Become a member at WeBox!</h4>
                <div class="hline"></div>

                <form role="form" action="<?php echo base_url().'user/val_signup';?> " method='post'>
                    <div class="form-group">
                        <label for="InputName1">Your Name</label>
                        <input type="text" class="form-control" name="name">
                        <?php echo form_error('name','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail1">Email address</label>
                        <input type="email" class="form-control"  name="email">
                        <?php echo form_error('email','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group">
                        <label for="InputSubject1">Password</label>
                        <input type="password" class="form-control"  name="password">
                        <?php echo form_error('password','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group">
                        <label for="InputSubject1">Confirm Password</label>
                        <input type="password1" class="form-control" name="password1">
                        <?php echo form_error('password','<div class="text-danger">','</div>');?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="message1">Message</label>
                        <textarea class="form-control" id="message1" rows="3"></textarea>
                    </div> -->
                    <button type="submit" class="btn btn-theme">Submit</button>
                </form>
            </div><! --/col-lg-8 -->

            <!-- <div class="col-lg-4">
                <h4>Our Address</h4>
                <div class="hline"></div>
                    <p>
                        Some Ave, 987,<br/>
                        23890, New York,<br/>
                        United States.<br/>
                    </p>
                    <p>
                        Email: hello@solidtheme.com<br/>
                        Tel: +34 8493-4893
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div> -->
        </div><! --/row -->
    </div><! --/container -->





<?php
include 'user_footer.php';
?>