<?php include('user_header.php'); ?>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Change Password.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div>
<div class="container  mtb" >
<div class="row">
<div class="col-md-6 col-md-offset-3">


  <?php echo form_open('user/val_changePassword',['class=> form-horizontal']); ?>

<!--      <legend>Login</legend>-->
        <div class="col-md-10">
      <div class="form-group">


            <?php echo form_password(['name'=>'old_password','class'=>'form-control active','placeholder'=>'Old Password']);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('old_password','<div class=" text-danger">','</div>'); ?>

      </div>
      <div class="form-group">
        

            <?php echo form_password(['name'=>'password','class'=>'form-control active','placeholder'=>'New Password'])."<br>";?>
            <?php echo form_error('password','<div class="text-danger">','</div>'); ?>

            </div>
            <div class="form-group">


            <?php echo form_password(['name'=>'confirm_password','class'=>'form-control active','placeholder'=>'Confirm Password'])."<br>";?>
            <?php echo form_error('confirm_password','<div class="text-danger">','</div>'); ?>

            </div>
  
      <div class="form-group">

           <input type="hidden" value="<?php echo $dataArray['0'];?>" name="mode">
           <input type="hidden" value="<?php echo $dataArray['1'];?>"name="email">

            <?php echo form_reset(['value'=>'Reset','class'=>'btn btn-default']);?>
          <!--  <button type="reset" class="btn btn-default">Cancel</button> -->
            <?php echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-primary']);?>
            <?php echo form_close(); ?>
            <?php
            $this->load->library('session');
            if($this->session->flashdata('password_mismatch')!='')
            {
                echo "<div class='text-danger'>".$this->session->flashdata("password_mismatch")."</div>";
            }
            ?>

      </div>
        </div>


</div>
</div>
</div>
<?php include('user_footer.php'); ?>
