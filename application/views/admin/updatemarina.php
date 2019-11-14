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

	  echo form_open_multipart('marinas/updateMarina', $attributes);

	?> 

		<input type="text" name="id" value="<?php echo $data['id']; ?>" style="display: none;">
		<input type="text" name="username" value="<?php echo $data['username']; ?>" style="display: none;">
	  <div class="form-group"> 
		<label for="appname">App Name</label>

		<input type="text" name="appname" value="<?php echo $data['appname']; ?>" class="form-control" id="appname" >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="welcometo">Welcome to</label>

		<input type="text" name="welcometo" value="<?php echo $data['welcometo']; ?>" class="form-control" id="welcometo" >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="weatherlocation">Weather location No.</label>

		<input type="text" name="weatherlocation" value="<?php echo $data['weatherlocation']; ?>" class="form-control" id="weatherlocation" >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="appicon">Upload App Icon</label>

		<input type="file" name="appicon" value="<?php echo $data['appicon']; ?>" class="form-control" id="appicon" placeholder="User Name for Marina" ><br>
		<input type="hidden"  id="old"  name="old"  value="<?=$data['appicon'];?>">
        <div class="img-show">  <img src="<?= base_url($data['appicon'])?>" alt=""  style="max-width: 60px;"></div>
		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="marinaicons">Upload Marina Icons</label>

		<input type="file" name="marinaicons" value="<?php echo $data['marinaicons']; ?>" class="form-control" id="marinaicons" placeholder="User Name for Marina" ><br>
        <input type="hidden"  id="old"  name="old_marina"  value="<?=$data['marinaicons'];?>">
		<div class="img-show">  <img src="<?= base_url($data['marinaicons'])?>" alt=""  style="max-width: 60px;"></div>

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div> 

	  <div class="form-group"> 

		<label for="marinaname">Marina Name</label>

		<input type="text" name="marinaname" value="<?php echo $data['marinaname']; ?>" class="form-control" id="marinaname">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="address">Address</label>

		<input type="text" name="address" value="<?php echo $data['address']; ?>" class="form-control" id="address">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div><div class="form-group"> 

		<label for="address">Address2</label>

		<input type="text" name="address2" value="<?php echo $data['address2']; ?>" class="form-control" id="address2">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="address">Address3</label>

		<input type="text" name="address3" value="<?php echo $data['address3']; ?>" class="form-control" id="address3">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="address">Post code</label>

		<input type="text" name="postcode" value="<?php echo $data['postcode']; ?>" class="form-control" id="postcode">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="contactname">Contact Name</label>

		<input type="text" name="contactname" value="<?php echo $data['contactname']; ?>" class="form-control" id="contactname">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="phone">Phone</label>

		<input type="text" name="phone" value="<?php echo $data['phone']; ?>" class="form-control" id="phone">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="email">email</label>

		<input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" id="email">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="web">Web Address</label>

		<input type="text" name="web" value="<?php echo $data['web']; ?>" class="form-control" id="web">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="facebook">Facebook page link</label>

		<input type="text" name="facebook" value="<?php echo $data['facebook']; ?>" class="form-control" id="facebook">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="flickr">Flickr link</label>

		<input type="text" name="flickr" value="<?php echo $data['flickr']; ?>" class="form-control" id="flickr">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="twitter">Twitter link</label>

		<input type="text" name="twitter" value="<?php echo $data['twitter']; ?>" class="form-control" id="twitter">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-row">

	  	<h4 class="col-sm-12">Opening Hours</h4>

	  	<div class="col-sm-4">

			<label for="mon-fri">Monday to Friday</label>

			<input type="text" name="mon-fri" value="<?php echo $data['mon-fri']; ?>" class="form-control" id="mon-fri">

			<div class="invalid-feedback">

				Please fill this field.

			</div> 

		</div>

		<div class="col-sm-4">

			<label for="sat">Saturday</label>

			<input type="text" name="sat" value="<?php echo $data['sat']; ?>" class="form-control" id="sat">

			<div class="invalid-feedback">

				Please fill this field.

			</div> 

		</div>

		<div class="col-sm-4">

			<label for="sun">Sunday</label>

			<input type="text" name="sun" value="<?php echo $data['sun']; ?>" class="form-control" id="sun">

			<div class="invalid-feedback">

				Please fill this field.

			</div>

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="lat">latitude</label>

		<input type="text" name="lat" value="<?php echo $data['lat']; ?>" class="form-control" id="lat">

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="lon">Longitude</label>

		<input type="text" name="lon" value="<?php echo $data['lon']; ?>" class="form-control" id="lon"    >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="security">Security</label>

		<input type="text" name="security" value="<?php echo $data['security']; ?>" class="form-control" id="security"   >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="channel">Channel</label>

		<input type="text" name="channel" value="<?php echo $data['channel']; ?>" class="form-control" id="channel"  >

		<div class="invalid-feedback">

			Please fill this field.

		</div>

	  </div>

	  <div class="form-group"> 

		<label for="position">Position</label>

		<input type="text" name="position" value="<?php echo $data['position']; ?>" class="form-control" id="position"  >

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