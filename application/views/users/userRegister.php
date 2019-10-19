<?php include_once(APPPATH.'views/inc/header.php'); ?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
<br>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo base_url('uploads/logo-011.png'); ?>" id="icon" alt="User Icon" width="150px"/> 
    </div>
<br>

<form method="post" action="<?php echo base_url(); ?>register/validation">
     <div class="form-group">
      <label>Enter Your Name</label>
      <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" />
      <span class="text-danger"><?php echo form_error('username'); ?></span>
     </div>
     <div class="form-group">
      <label>Enter Your Valid Email Address</label>
      <input type="text" name="useremail" class="form-control" value="<?php echo set_value('useremail'); ?>" />
      <span class="text-danger"><?php echo form_error('useremail'); ?></span>
     </div>
     <div class="form-group">
      <label>Enter Password</label>
      <input type="password" name="userpassword" class="form-control" value="<?php echo set_value('userpassword'); ?>" />
      <span class="text-danger"><?php echo form_error('userpassword'); ?></span>
     </div>
     <div class="form-group">
      <input type="submit" name="register" value="Register" class="btn btn-info" />
     </div>
    </form>

</div>
</div>
<?php include_once(APPPATH.'views/inc/footer.php'); ?>