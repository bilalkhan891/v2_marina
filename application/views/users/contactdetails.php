<h1><?php echo $title; ?></h1>
<!--  <pre>
	<?php print_r($data[0]); ?>
</pre> -->
<div class="row">
  <div id="loading"><?php echo $msg; ?></div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="float-right"> 
      <?php if ($data[0]['apicheck'] != 'yes'): ?>
        <a  href="javascript:;" onclick="pushToApp()"  class="btn btn-info text-black ba-btn"  style="padding: 3px 30px;">Send new updates to app 
          <i class="fas fa-paper-plane text-white"></i>
        </a>
      <?php else: ?>
        <a href="#!" class="btn btn-success text-black ba-btn">App is updated
          <i class="fas fa-clipboard-check"></i>
        </a>
            
      <?php endif ?>  
      <a class="btn btn-info white-text ba-btn" href="#!" data-toggle="modal" data-target="#updateContact" style="padding: 3px 30px;">Edit <i class="fas fa-edit text-white"></i></a>
       
    </div>  
  </div>
</div> 
 <br>
<br>
<table class="table table-hover"> 
  <tbody> 
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $data[0]['marinaname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $data[0]['address'].', '.$data[0]['address2'].', '.$data[0]['address3'].', '.$data[0]['postcode']; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone</th>
      <td><a href="tel:<?php echo $data[0]['phone']; ?>"><?php echo $data[0]['phone']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><a href="mailto:<?php echo $data[0]['email']; ?>"><?php echo $data[0]['email']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">web</th>
      <td><a href="<?php echo $data[0]['web']; ?>"><?php echo $data[0]['web']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">facebook</th>
      <td><a href="<?php echo $data[0]['facebook']; ?>"><?php echo $data[0]['facebook']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">flickr</th>
      <td><a href="<?php echo $data[0]['flickr']; ?>"><?php echo $data[0]['flickr']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">twitter</th>
      <td><a href="<?php echo $data[0]['twitter']; ?>"><?php echo $data[0]['twitter']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Out of Hours Security</th>
      <td><a href="tel:<?php echo $data[0]['security']; ?>"><?php echo $data[0]['security']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">VHF Channel</th>
      <td><?php echo $data[0]['channel']; ?></td>
    </tr>
    <tr>
      <th scope="row">Waypoint position</th>
      <td><?php echo $data[0]['position']; ?></td>
    </tr>
    <tr><td>-</td></tr>
    
    <tr>
      <th scope="row">Opening Hours</th>
      <td>

        <table style="min-width: 50%; "> 
          <thead>
            <th>Days </th>
            <th>Timing </th>
          </thead>
          <tbody>
            <tr><td scope="row">Monday - Friday</td><td><?php echo $data[0]['mon-fri']; ?></td></tr>
            <tr><td scope="row">Saturday</td><td><?php echo $data[0]['sat']; ?></td></tr>
            <tr><td scope="row">Sunday</td><td><?php echo $data[0]['sun']; ?></td></tr>
          </tbody> 
        </table>
      </td>
    </tr>
    <tr><td>-</td></tr>
    <tr>
      <th scope="row">Lat</th>
      <td><?php echo $data[0]['lat']; ?></td>
    </tr>
    <tr>
      <th scope="row">Long</th>
      <td><?php echo $data[0]['lon']; ?></td>
    </tr>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="updateContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php 
            $attributes = array('class' => 'needs-validation col-md-8', 'novalidate' => '');
            echo form_open('usermain/updateContact', $attributes);
          ?>  
            <div class="form-group"> 
              <label for="marinaname">Marina Name</label>
              <input type="text" value="<?php echo $data[0]['marinaname']; ?>" name="marinaname" style="text-transform: capitalize;" class="form-control" id="marinaname" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="address">Address Line 1</label>
              <input type="text" value="<?php echo $data[0]['address']; ?>" name="address" style="text-transform: capitalize;" class="form-control" id="address" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="address2">Address Line 2</label>
              <input type="text" value="<?php echo $data[0]['address2']; ?>" name="address2" style="text-transform: capitalize;" class="form-control" id="address2" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="address3">Address Line 3</label>
              <input type="text" value="<?php echo $data[0]['address3']; ?>" name="address3" style="text-transform: capitalize;" class="form-control" id="address3" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="postcode">postcode</label>
              <input type="text" value="<?php echo $data[0]['postcode']; ?>" name="postcode" style="text-transform: uppercase;" class="form-control" id="postcode" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="contactname">Contact Name</label>
              <input type="text" value="<?php echo $data[0]['contactname']; ?>" name="contactname" class="form-control" id="contactname" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="phone">Phone</label>
              <input type="text" value="<?php echo $data[0]['phone']; ?>" name="phone" style="text-transform: capitalize;" class="form-control" id="phone" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="email">email</label>
              <input type="email" value="<?php echo $data[0]['email']; ?>" name="email" class="form-control" id="email" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="web">Web Address</label>
              <input type="text" value="<?php echo $data[0]['web']; ?>" name="web" class="form-control" id="web" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="facebook">Facebook page link</label>
              <input type="text" value="<?php echo $data[0]['facebook']; ?>" name="facebook" class="form-control" id="facebook" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="flickr">Flickr link</label>
              <input type="text" value="<?php echo $data[0]['flickr']; ?>" name="flickr" class="form-control" id="flickr" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="twitter">Twitter link</label>
              <input type="text" value="<?php echo $data[0]['twitter']; ?>" name="twitter" class="form-control" id="twitter" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-row">
              <h4 class="col-sm-12">Opening Hours</h4>
              <div class="col-sm-4">
              <label for="mon-fri">Monday to Friday</label>
              <input type="text" value="<?php echo $data[0]['mon-fri']; ?>" name="mon-fri" class="form-control" id="mon-fri" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div> 
            </div>
            <div class="col-sm-4">
              <label for="sat">Saturday</label>
              <input type="text" value="<?php echo $data[0]['sat']; ?>" name="sat" class="form-control" id="sat" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div> 
            </div>
            <div class="col-sm-4">
              <label for="sun">Sunday</label>
              <input type="text" value="<?php echo $data[0]['sun']; ?>" name="sun" class="form-control" id="sun" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            </div>
            <div class="form-group"> 
              <label for="lat">latitude</label>
              <input type="text" value="<?php echo $data[0]['lat']; ?>" name="lat" class="form-control" id="lat" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="lon">Longitude</label>
              <input type="text" value="<?php echo $data[0]['lon']; ?>" name="lon" class="form-control" id="lon" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="security">Security</label>
              <input type="text" value="<?php echo $data[0]['security']; ?>" name="security" class="form-control" id="security" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="channel">Channel</label>
              <input type="text" value="<?php echo $data[0]['channel']; ?>" name="channel" class="form-control" id="channel" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <div class="form-group"> 
              <label for="position">Position</label>
              <input type="text" value="<?php echo $data[0]['position']; ?>" name="position" class="form-control" id="position" required>
              <div class="invalid-feedback">
                Please fill this field.
              </div>
            </div>
            <button class="btn btn-primary" type="submit">Update Details</button>
          <?php form_close(); ?>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  function pushToApp(){

    $('#loading').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Sending Data....</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

    $.get( "<?php echo base_url('usermain/updateApiContact'); ?>", '', 

              function(data,status){ 
                  if (status == 'success'){

                    // $('#loading').html(data);
                    $('#loading').html('<br><span class="alert alert-success">Successfully Reset</span><br>'); 
                    setTimeout(function(){
                      window.location = "<?php echo base_url('usermain/contactDetails'); ?>"; 
                    }, 500 );
                  } else {
                    $('#loading').html(data);
                  }
              });
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

  function editRecord(id, username, email, phone, status){
    $('.update #id').val(id); 
    $('.update #username').val(username); 
    $('.update #email').val(email); 
    $('.update #phone').val(phone);  
  }
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
