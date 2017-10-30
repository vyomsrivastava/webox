<?php include('dev_header.php'); ?>
<div class= " row">

<div class= "col-md-6 col-md-offset-3">


  <?php echo form_open('dev/val_signup',['class=> form-horizontal']); ?>
    <fieldset>
      <legend>Sign Up</legend>
      <div class="form-group">
          
        <div class="col-lg-10">
        <label>Name:</label>
             <?php echo form_input('name',set_value('name'),['class'=>'form-control active','placeholder'=>'Name']);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('name','<div class=" text-danger">','</div>'); ?>
          </div>
      </div>
        <div class="form-group">

        <div class="col-lg-10">
            <?php echo form_input(['name'=>'email','class'=>'form-control active','placeholder'=>'Email','value'=>set_value('email')]);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('email','<div class=" text-danger">','</div>'); ?>
          </div>
      </div>
        <div class="form-group">

        <div class="col-lg-10">
            <?php echo form_input(['name'=>'username','class'=>'form-control active','placeholder'=>'Choose a username','value'=>set_value('username')]);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('username','<div class=" text-danger">','</div>'); ?>
          </div>
      </div>
      
      <div class="form-group">
        
        <div class="col-lg-10">
            <?php echo form_password(['name'=>'password','class'=>'form-control active','placeholder'=>'Password'])."<br>";?>
            <?php echo form_error('password','<div class="text-danger">','</div>'); ?>
          </div>
          </div>
          
      <div class="form-group">
        
        <div class="col-lg-10">
            <?php echo form_password(['name'=>'password1','class'=>'form-control active','placeholder'=>'Confirm Password'])."<br>";?>
            <?php echo form_error('password1','<div class="text-danger">','</div>'); ?>
          </div>
          </div>
          <div class="form-group">

        <div class="col-lg-10">
            <?php echo form_input(['name'=>'company','class'=>'form-control active','placeholder'=>'Company','value'=>set_value('company')]);?>
        <!--  <input type="text" class="form-control active" id="inputEmail" placeholder="Email"> -->
        <?php echo form_error('company','<div class=" text-danger">','</div>'); ?>
          </div>
      </div>
      <div class="checkbox">
          <label>
            <input type="checkbox"> <p>Android Apps</p>
          </label>
        </div>
      
      <div class="checkbox">
          <label>
            <input type="checkbox"> <p>Windows Apps</p>
          </label>
        </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <?php echo form_reset(['value'=>'Reset','class'=>'btn btn-default']);?>
          <!--  <button type="reset" class="btn btn-default">Cancel</button> -->
            <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']);?>
          
        </div>
      </div>
    </fieldset>
            
  <?php echo form_close(); ?>

</div>
</div>





<?php include('dev_footer.php'); ?>
