<?php require_once(APPPATH.'views/inc/header.php'); ?> <br><br>
<h3 class="center">Forgot you password?</h3>
<p class="center">Don't worry, it happens to the best of us!</p>
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
      <?php echo form_open('userlogin/forgotpwd', ['novalidate' => '',  'class' => "needs-validation"]); ?>
        <div class="input-group">
          <!-- <label>Email</label> -->
          <input type="email" id="login" class="fadeIn login-field second form-control" name="email" placeholder="Enter your email address" required> 
          <div class="invalid-feedback">Please enter proper email.</div>
        </div>
        <input type="submit" class="fadeIn fourth" value="Reset Password">
      </form>
    
    <!-- Remind Password -->
    <div id="formFooter"> 
      <a class="" href="<?php echo base_url('userlogin'); ?>">Login</a>
    </div>

  </div>
</div> 
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<?php include_once(APPPATH.'views/inc/footer.php'); ?>