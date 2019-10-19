<?php require_once(APPPATH.'views/inc/header.php'); ?> 
<br>
<h3 class="center">Reset you password.</h3>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
<br>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo base_url('uploads/logo-011.png'); ?>" id="icon" alt="User Icon" width="150px"/> 
    </div>
<br>
    <!-- Login Form -->
    <?php echo $msg; ?>
    <?php echo validation_errors(); ?>

    <span class="text-danger"><?php echo $this->session->flashdata('error_msg'); ?></span>
      <?php echo validation_errors('<div class="text-danger">', '</div>'); ?>
      <?php echo form_open('userlogin/insertnewpwd'); ?>

        <input type="password" id="password1" class="fadeIn login-field second" name="password1" placeholder="Password"  pattern=".{4,12}" required title="4 to 12 characters">
        <span class="text-danger"><?php form_error('username'); ?></span>

        <input type="password" id="password2" class="fadeIn login-field third" name="password2" placeholder="Confirm Passowrd"  pattern=".{4,12}" required title="4 to 12 characters">
        <span class="text-danger"><?php form_error('password'); ?></span>
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
    
    <!-- Remind Passowrd -->
     <div id="formFooter"> 
      <a class="" href="<?php echo base_url('userlogin'); ?>">Login</a>
    </div>

  </div>
</div> 

<?php include_once(APPPATH.'views/inc/footer.php'); ?>