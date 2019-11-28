<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/userlist.css'); ?>">
<div>
  <h1 class=" "><?php echo $title ?></h1>
  <a href="#!" class="btn btn-info float-right"  data-toggle="modal" data-target=".bd-example-modal-lg">Add User</a>
<?php echo $this->session->flashdata('msg'); ?>
</div><br>
<br>

<table class="table table-striped table-hover" >
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th> 
      <th scope="col">Phone</th> 
      <th scope="col">Registration Date</th> 
      <th scope="col">Status</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; foreach ($data as $row) { ?>
      <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td> 
        <td><?php echo $row['date']; ?></td>
        <td class="<?php if($row['status'] == 'Approved') {echo 'approved';} else {echo 'unapproved';} ?>"><?php echo $row['status']; ?></td>
        <td class="row">
        	<?php if($i != 1) { ?>
	        	<a class="col-md-5 bg-info" href="#!" onclick="editRecord( '<?php echo $row['id']?>', '<?php echo $row['username']?>', '<?php echo $row['email']?>', '<?php echo $row['phone']?>', '<?php echo $row['status']; ?>', '<?php echo $row['name']; ?>',  '<?php echo $row['ContactDetails']?>' ,  '<?php echo $row['BerthingRates']?>' ,  '<?php echo $row['UpdateBerthingRates']?>' ,  '<?php echo $row['LockClosures']?>' ,  '<?php echo $row['TideTimes']?>' ,  '<?php echo $row['PushNotifications']?>' ,  '<?php echo $row['TidesLocksGenerator']?>' ,  '<?php echo $row['ManageUser']?>' )" title="Edit" data-toggle="modal" data-target=".update"><i class="fas fa-edit center text-white" type="javascript:;"></i></a>
	        	<a class="col-md-5 bg-danger" href="<?php echo base_url('usermain/deleteuser/'.$row['id']); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash center text-white"></i></a>
	        <?php } ?>
        </td>
      </tr>
    <?php $i++; } ?> 
  </tbody>
</table>

<script type="text/javascript">


  function removeSpaces(string) {
    var data = string.split(' ').join('');
    return data.toLowerCase();
  }

  function editRecord(id, username, email, phone, status, name, ContactDetails, BerthingRates, UpdateBerthingRates, LockClosures, TideTimes, PushNotifications, TidesLocksGenerator, ManageUser){
    $('.update #id').val(id); 
    $('.update #name').val(name); 
    $('.update #username').val(username); 
    $('.update #email').val(email); 
    $('.update #phone').val(phone); 
//alert(ManageUser); da kho tik dy kna
if(ContactDetails == 'yes'){
  $('input[name="ContactDetails"]').attr('checked', 'checked');
}
if(BerthingRates == 'yes'){
  $('input[name="BerthingRates"]').attr('checked', 'checked');
}
if(UpdateBerthingRates == 'yes'){
  $('input[name="UpdateBerthingRates"]').attr('checked', 'checked');
}
if(LockClosures == 'yes'){
  $('input[name="LockClosures"]').attr('checked', 'checked');
}
if(TideTimes == 'yes'){
  $('input[name="TideTimes"]').attr('checked', 'checked');
}
if(PushNotifications == 'yes'){
  $('input[name="PushNotifications"]').attr('checked', 'checked');
}
if(TidesLocksGenerator == 'yes'){
  $('input[name="TidesLocksGenerator"]').attr('checked', 'checked');
}
if(ManageUser == 'yes'){
  $('input[name="ManageUser"]').attr('checked', 'checked');
}
 


    //$('.update #phone').val(phone);  
  }
</script>

<div class="modal fade update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          $attributes = array('class' => 'needs-validation', 'novalidate' => '');
          echo form_open('usermain/updateuser', $attributes);
        ?> 
          <div class="">
            <div class="form-row">
              <label for="username">User Name</label>
              <input type="hidden" name="id" class="form-control" id="id" placeholder="" value="" required>
              <input type="text" name="username" class="form-control" id="username" placeholder="" value=""  onblur="this.value=removeSpaces(this.value);"  pattern=".{4,12}" required title="4 to 12 characters">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="form-row">
              <label for="name">Full Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="form-row">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="form-row">
              <label for="phone">Phone Number</label>
              <div class="input-group"> 
                <input type="text" class="form-control" name="phone" id="phone" placeholder="" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="status">Status</label>
              <div class="input-group">
                <select class="custom-select custom-select-sm" name="status" required>
                  <option value="Approved">Approved</option>
                  <option value="Unapproved">Unapproved</option> 
                </select>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>

<br>
              <h5>Assign below roles for marina user.</h5>

<br>
             <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="ManageUser" class="form-check-input" value="yes">
                Manage Users</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="ContactDetails" class="form-check-input" value="yes">
                Contact Details</label>
              </div>

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="BerthingRates" class="form-check-input" value="yes">
                Berthing Rates</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="UpdateBerthingRates" class="form-check-input" value="yes">
                 Update Berthing Rates</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="LockClosures" class="form-check-input" value="yes">
                Lock Closures</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="TideTimes" class="form-check-input" value="yes">
                Tide Times</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="PushNotifications" class="form-check-input" value="yes">
                Push Notifications</label>
              </div>

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="TidesLocksGenerator" class="form-check-input" value="yes">
                Tides & Locks Generator</label>
              </div>


          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div> 
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          $attributes = array('class' => 'needs-validation validate-password', 'novalidate' => '');
          echo form_open('usermain/adduser', $attributes);
        ?>  
          <div class="">
            
            <div class="form-row">
              <label for="name">First Name</label>
              <input type="text" name="fname" class="form-control" id="fname" placeholder="" value="" required>
               
            </div>
            <div class="form-row">
              <label for="name">Last Name</label>
              <input type="text" name="lname" class="form-control" id="lname" placeholder="" value="" required>
              
            </div>
            <div class="form-row">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required>
               
            </div>
            <div class="form-row">
              <label for="phone">Phone Number</label>
              <div class="input-group"> 
                <input type="text" class="form-control" name="phone" id="phone" placeholder="" aria-describedby="inputGroupPrepend" required>
                 
              </div>
            </div>
            <div class="form-row">
              <label for="username">Create Username</label>
              <input type="text" name="username" onblur="this.value=removeSpaces(this.value);" class="form-control" id="username" placeholder="" value="" required>
               
            </div> 
               
            <div class="form-row"> 
              <label for="password">Create Password</label>
              <div class="input-group"> 
                <input type="text" class="form-control" name="password" id="password" placeholder="" aria-describedby="inputGroupPrepend" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <div class="invalid-feedback">
                  Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                </div>
              </div>
            </div>
            <p>All checkmarks must turn green in order to proceed</p>
            <div id="password-info">
              <ul>
                <li id="length" class="invalid clearfix">
                  <span class="icon-container">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>
                  At least 8 characters
                </li>
                <li id="capital" class="invalid clearfix">
                  <span class="icon-container">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>
                  At least 1 uppercase letter
                </li>
                <li id="lowercase" class="invalid clearfix">
                  <span class="icon-container">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>
                  At least 1 lowercase letter
                </li>
                <li id="number-special" class="invalid clearfix">
                  <span class="icon-container">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>
                  At least 1 number or <span title="&#96; &#126; &#33; &#64; &#35; &#36; &#37; &#94; &#38; &#42; &#40; &#41; &#43; &#61; &#124; &#59; &#58; &#39; &#34; &#44; &#46; &#60; &#62; &#47; &#63; &#92; &#45;" class="special-characters tip">special character</span>
                </li>
              </ul>
            </div>


<br>
             <h5>Assign below roles for marina user.</h5>
<br>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="ManageUser" class="form-check-input" value="yes">
                Manage Users</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="ContactDetails" class="form-check-input" value="yes">
                Contact Details</label>
              </div>

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="BerthingRates" class="form-check-input" value="yes">
                Berthing Rates</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="UpdateBerthingRates" class="form-check-input" value="yes">
                 Update Berthing Rates</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="LockClosures" class="form-check-input" value="yes">
                Lock Closures</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="TideTimes" class="form-check-input" value="yes">
                Tide Times</label>
              </div>
              

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="PushNotifications" class="form-check-input" value="yes">
                Push Notifications</label>
              </div>

               <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="TidesLocksGenerator" class="form-check-input" value="yes">
                Tides & Locks Generator</label>
              </div>




          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div> 
    </div>
  </div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
<script>


  // pass roles
  // Tooltips
  // -----------------------------------------

  // Only initialise tooltips if devices is non touch
  // if (!('ontouchstart' in window)) {
  //   $('.tip').tooltip();
  // }

  // Password Validation
  // -----------------------------------------

  $(function passwordValidation() {

    var pwdInput = $('#password');
    var pwdInputText = $('#password'); // This is the input type="text" version for showing password
    var pwdValid = false;

    function validatePwdStrength() {

      var pwdValue = $(this).val(); // This works because when it's called it's called from the pwdInput, see end

      // Validate the length
      if (pwdValue.length > 7) {
        $('#length').removeClass('invalid').addClass('valid');
        pwdValid = true;
      } else {
        $('#length').removeClass('valid').addClass('invalid');
      }

      // Validate capital letter
      if (pwdValue.match(/[A-Z]/)) {
        $('#capital').removeClass('invalid').addClass('valid');
        pwdValid = pwdValid && true;
      } else {
        $('#capital').removeClass('valid').addClass('invalid');
        pwdValid = false;
      }

      // Validate lowercase letter
      if (pwdValue.match(/[a-z]/)) {
        $('#lowercase').removeClass('invalid').addClass('valid');
        pwdValid = pwdValid && true;
      } else {
        $('#lowercase').removeClass('valid').addClass('invalid');
        pwdValid = false;
      }

      // Validate number or special character
      if (pwdValue.match(/[\d`~!@#$%\^&*()+=|;:'",.<>\/?\\\-]/)) {
        $('#number-special').removeClass('invalid').addClass('valid');
        pwdValid = pwdValid && true;
      } else {
        $('#number-special').removeClass('valid').addClass('invalid');
        pwdValid = false;
      }
    }

    function validatePwdValid(form, event) {
      if (pwdValid === true) {
        form.submit();
      } else {
        $('#alert-invalid-password').removeClass('hide');
        event.preventDefault();
      }
    }

    pwdInput.bind('change keyup input', validatePwdStrength); // Keyup is a bit unpredictable
    pwdInputText.bind('change keyup input', validatePwdStrength); // This is the input type="text" version for showing password

    // jQuery Validation
    $(".validate-password").validate({
      // Add error class to parent to use Bootstrap's error styles
      highlight: function(element) {
        $(element).parent('.form-group').addClass('error');
      },
      unhighlight: function(element) {
        $(element).parent('.form-group').removeClass('error');
      },

      rules: {
        // Ensure passwords match
        "passwordCheckMasked": {
          equalTo: "#password"
        }
      },

      errorPlacement: function(error, element) {
        if (element.attr("name") == "password" || element.attr("name") == "passwordMasked") {
          error.insertAfter("#password");
        } else {
          error.insertAfter(element);
        }
        if (element.attr("name") == "passwordCheck" || element.attr("name") == "passwordCheckMasked") {
          error.insertAfter("#input-password-check");
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form, event) {
        //this runs when the form validated successfully
        validatePwdValid(form, event);
      }
    });

  }); // END passwordValidation()
  // .pass roles

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

<script>
  $(document).ready(function(){
    $('#lname').change(function(){
      
      var fname=$('#fname').val();
      var fnme=fname.charAt(0).toUpperCase()+fname.slice(1);
      
     var lname=$(this).val();
     var lnme= lname.charAt(0).toUpperCase()+lname.slice(1);
      

     var fl=fnme + lnme;
  
   $('#username').val(fl);
   });
});
</script>