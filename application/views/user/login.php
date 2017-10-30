<?php include('user_header.php'); ?>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Login.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div>
<div class="container  mtb" >
<div class="row">
<div class="col-md-6 col-md-offset-3">


  <?php echo form_open('user/user_login',['class=> form-horizontal']); ?>

<!--      <legend>Login</legend>-->
        <div class="col-md-10">
      <div class="form-group">


            <?php echo form_input(['name'=>'username','class'=>'form-control active','placeholder'=>'Email','value'=>set_value('username')]);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('username','<div class=" text-danger">','</div>'); ?>

      </div>
      <div class="form-group">
        

            <?php echo form_password(['name'=>'password','class'=>'form-control active','placeholder'=>'Password'])."<br>";?>
            <?php echo form_error('password','<div class="text-danger">','</div>'); ?>

            </div>
  
      <div class="form-group">

            <?php echo form_reset(['value'=>'Reset','class'=>'btn btn-default']);?>
          <!--  <button type="reset" class="btn btn-default">Cancel</button> -->
            <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']);?>
            <?php echo form_close(); ?>
            <?php
            $this->load->library('session');
            if($this->session->flashdata('login_failed')!='')
            {
                echo "<div class='text-danger'>".$this->session->flashdata("login_failed")."</div>";
            }
            ?>

      </div>
        </div>


</div>
</div>
</div>
<?php include('user_footer.php'); ?>
