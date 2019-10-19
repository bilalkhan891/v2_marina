<?php require_once(APPPATH.'views/inc/header.php'); ?> 
<h2 class="center">Marina Login</h2>
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
    <?php echo $this->session->flashdata('msg'); ?>
    <span class="text-danger"><?php echo $this->session->flashdata('error_msg'); ?></span>
      <?php echo validation_errors('<div class="text-danger">', '</div>'); ?>
      <?php echo form_open('userlogin/loginValidation'); ?>
        <input type="text" id="login" class="fadeIn login-field second" name="username" placeholder="login">
        <span class="text-danger"><?php form_error('username'); ?></span>
        <input type="password" id="password" class="fadeIn login-field third" name="password" placeholder="password">
        <span class="text-danger"><?php form_error('password'); ?></span>
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
    
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="" href="<?php echo base_url('userlogin/forgotpwd'); ?>">Forgot Password?</a>
      <a class="" href="<?php echo base_url('login'); ?>">Login as Admin?</a>
    </div>

  </div>
</div> 

<?php include_once(APPPATH.'views/inc/footer.php'); ?>