<h1><?php echo $title; ?></h1>
<!-- <p>By adding new marina</p> 
<p>The marina will receive an email on the email address given below. </p>
<p>Marina Rates will be created.</p>
<p>Marina will have 1 user created for it using the username given below with a static password (marina@123)</p> -->
<!-- <pre>
	<?php //print_r($data[0]); ?>
</pre> -->
<br>
<?php echo $msg; ?>
<?php echo "<br>"; echo validation_errors(); echo "<br>"; ?>
<br>
<div class="row">
	<?php 
	  $attributes = array('class' => 'needs-validation col-md-8', 'novalidate' => '');
	  echo form_open('marinas/submitmarina', $attributes);
	?> 
	  <div class="form-group"> 
		<label for="appname">App Name</label>
		<input type="text" name="appname" class="form-control" id="appname" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="welcometo">Welcome to</label>
		<input type="text" name="welcometo" class="form-control" id="welcometo" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="weatherlocation">Weather location No.</label>
		<input type="text" name="weatherlocation" class="form-control" id="weatherlocation" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="appicon">Upload App Icon</label>
		<input type="file" name="appicon" class="form-control" id="appicon" placeholder="User Name for Marina" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="marinaicons">Upload Marina Icons</label>
		<input type="file" name="marinaicons" class="form-control" id="marinaicons" placeholder="User Name for Marina" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="csvgenerator">Upload Tides and Locks CSV Generator</label>
		<input type="file" name="csvgenerator" class="form-control" id="csvgenerator" placeholder="User Name for Marina" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="username">User Name</label>
		<input type="text" name="username" onblur="this.value=removeSpaces(this.value);" class="form-control" id="username" placeholder="User Name for Marina" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="marinaname">Marina Name</label>
		<input type="text" name="marinaname" class="form-control" id="marinaname" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="address">Address</label>
		<input type="text" name="address" class="form-control" id="address" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="contactname">Contact Name</label>
		<input type="text" name="contactname" class="form-control" id="contactname" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="phone">Phone</label>
		<input type="text" name="phone" class="form-control" id="phone" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="email">email</label>
		<input type="email" name="email" class="form-control" id="email" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="web">Web Address</label>
		<input type="text" name="web" class="form-control" id="web" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="facebook">Facebook page link</label>
		<input type="text" name="facebook" class="form-control" id="facebook" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="flickr">Flickr link</label>
		<input type="text" name="flickr" class="form-control" id="flickr" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="twitter">Twitter link</label>
		<input type="text" name="twitter" class="form-control" id="twitter" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-row">
	  	<h4 class="col-sm-12">Opening Hours</h4>
	  	<div class="col-sm-4">
			<label for="mon-fri">Monday to Friday</label>
			<input type="text" name="mon-fri" class="form-control" id="mon-fri" required>
			<div class="invalid-feedback">
				Please fill this field.
			</div> 
		</div>
		<div class="col-sm-4">
			<label for="sat">Saturday</label>
			<input type="text" name="sat" class="form-control" id="sat" required>
			<div class="invalid-feedback">
				Please fill this field.
			</div> 
		</div>
		<div class="col-sm-4">
			<label for="sun">Sunday</label>
			<input type="text" name="sun" class="form-control" id="sun" required>
			<div class="invalid-feedback">
				Please fill this field.
			</div>
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="lat">latitude</label>
		<input type="text" name="lat" class="form-control" id="lat" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="lon">Longitude</label>
		<input type="text" name="lon" class="form-control" id="lon" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="security">Security</label>
		<input type="text" name="security" class="form-control" id="security" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="channel">Channel</label>
		<input type="text" name="channel" class="form-control" id="channel" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <div class="form-group"> 
		<label for="position">Position</label>
		<input type="text" name="position" class="form-control" id="position" required>
		<div class="invalid-feedback">
			Please fill this field.
		</div>
	  </div>
	  <button class="btn btn-primary" type="submit">Add Marina</button>
	<?php form_close(); ?>
</div>

<script>
	function removeSpaces(string) {
	  var data = string.split(' ').join('');
	  return data.toLowerCase();
	}
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