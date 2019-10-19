<h1><?php echo $this->session->userdata('businessname'); ?></h1>

<div class="row">
	 
</div>
<a href="<?php echo base_url('admin/businesses/'.$this->session->userdata('typeId').'/'.$this->session->userdata('typeName').'/'.$this->session->userdata('apitypeId')); ?>"><i class="fas fa-arrow-left"></i> Bact</a>
<!-- <a href="javascript:;" onclick="GoBackWithRefresh()"><i class="fas fa-arrow-left"></i> Bact</a> -->
<div class="row">
	<div class="col-sm-12">
		<div class="float-right"> 
			<a class="btn btn-info white-text ba-btn" href="#!" data-toggle="modal" data-target="#addBusiness" style="padding: 3px 30px;">Edit <i class="fas fa-edit text-white"></i></a>
			<a  class="btn btn-danger ba-btn" href="#!"  data-toggle="modal" data-target="#exampleModal" data-whatever="<?php  echo $this->session->userdata('businessid').'/'.$data['_id']; ?>" style="padding: 3px 30px;">Delete 
			    <i class="fas fa-trash text-white"></i>
			</a>
		</div>	
	</div>
</div>
<?php //echo '<pre>'; print_r($data); ?>
<div id="msg" ><?php echo $msg; ?></div> <br><br>
<div class="row">
	<div class="col-sm-12">
 
		<table class="table table-striped table-hover" >
		  <thead class="thead-light">
		    <!-- <tr>
		      <th scope="col">Names</th>
		      <th scope="col">Values</th>
		       <th scope="col">Contact Name</th> 
		    </tr> -->
		  </thead>
		  <tbody> 
		  	<?php if (!empty($data)) {  $_id = $data['_id']; ?>
		  		
		  	
		      <tr>
		        <th scope="row">apitypeId</th>
		        <td><?php  echo $data['apitypeId']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">_id</th>
		        <td><?php  echo $data['_id']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Name</th>
		        <td><?php  echo $data['name']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Contact Title</th>
		        <td><?php  echo $data['contactTitle']; ?></td> 
		      </tr> 
		      <tr> 
		        <th scope="row">Contact 1st Name</th>
		        <td><?php  echo $data['Contact1stName']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Contact Surname</th>
		        <td><?php  echo $data['ContactSurname']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address Line 1</th>
		        <td><?php  echo $data['AddressLine1']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address Line 2</th>
		        <td><?php  echo $data['AddressLine2']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address Line 3</th>
		        <td><?php  echo $data['AddressLine3']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Post Code</th>
		        <td><?php  echo $data['PostCode']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Tel</th>
		        <td><?php  echo $data['tel']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Email</th>
		        <td><?php  echo $data['email']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Website</th>
		        <td><?php  echo $data['web']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Latituge</th>
		        <td><?php  echo $data['lat']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Longitude</th>
		        <td><?php  echo $data['longitude']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Cost</th>
		        <td><?php  echo $data['cost']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Payment Date</th>
		        <td><?php  echo $data['paymentDate']; ?></td> 
		      </tr> 
		      <!-- <tr>
		        <th scope="row">marinaid</th>
		        <td><?php  echo $data['marinaid']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">apicheck</th>
		        <td><?php  echo $data['apicheck']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">businesstypeid</th>
		        <td><?php  echo $data['businesstypeid']; ?></td> 
		      </tr>  -->


		      <?php } else { echo '<h3> This record is deleted. <a href="javascript:;" onclick="GoBackWithRefresh()"><i class="fas fa-arrow-left"></i>Go Bact</a>';
		      		$_id = 'empty';
		       }?>
		  </tbody>
		</table> 
	</div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="addBusiness" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Add Business</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="<?php echo base_url('admin/updatebusiness'); ?>" id="" method="post" class="needs-validation" accept-charset="utf-8"> 

         	<input type="text" class="form-control  form-control-sm" name="businesstypeid" id="businesstypeid" value="<?php  echo $data['businesstypeid']; ?>"  style="display: none;">
         	<input type="text" class="form-control  form-control-sm" name="apicheck" id="apicheck" value="<?php  echo $data['apicheck']; ?>" style="display: none;" >
            <input type="text" value="<?php  echo $data['apitypeId']; ?>" name="apitypeId" class="form-control" id="apitypeId" style="display: none;"> 
            <input type="text" value="<?php  echo $data['_id']; ?>" name="_id" class="form-control" id="_id" style="display: none;" > 
            <input type="text" class="form-control  form-control-sm" name="marinaid" id="marinaid" value="<?php  echo $data['marinaid']; ?>"  style="display: none;">
            <div class="form-group">
              <label for="businessname">Business Name</label>
              <input type="text" class="form-control  form-control-sm capitalize" id="name" name="name" value="<?php  echo $data['name']; ?>" >
            </div>
             <div class="form-group">
              <label for="contacttitle">Contact Title</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="contactTitle" id="contactTitle" value="<?php echo $data['contactTitle']; ?>" >
            </div>             <div class="form-group">
              <label for="1stname">Contact 1st Name</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="Contact1stName" id="Contact1stName" value="<?php echo $data['Contact1stName']; ?>" >
            </div> 
            <div class="form-group">
              <label for="surname">Contact Surname</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="ContactSurname" id="ContactSurname" value="<?php echo $data['ContactSurname']; ?>" >
            </div>

            <div class="form-group">
              <label for="address1">Address Line 1</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="AddressLine1" id="AddressLine1" value="<?php  echo $data['AddressLine1']; ?>" >
            </div>
            <div class="form-group">
              <label for="address2">Address Line 2</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="AddressLine2" id="AddressLine2" value="<?php echo $data['AddressLine2']; ?>">
            </div>
            <div class="form-group">
              <label for="address3">Address Line 3</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="AddressLine3" id="AddressLine3" value="<?php echo $data['AddressLine3']; ?>">
            </div>
            <div class="form-group">
              <label for="postcode">Post Code</label>
              <input type="text" style="text-transform: uppercase;" class="form-control  form-control-sm" name="PostCode" id="PostCode" value="<?php echo $data['PostCode']; ?>" >
            </div>
            <div class="form-group">
              <label for="tel">Tel No</label>
              <input class="form-control  form-control-sm" name="tel" id="tel" value="<?php  echo $data['tel']; ?>" >
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control  form-control-sm" name="email" id="email" value="<?php  echo $data['email']; ?>" >
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="text" class="form-control  form-control-sm" name="web" id="web" value="<?php  echo $data['web']; ?>">
            </div>
            <div class="form-group">
              <label for="lat">Lat</label>
              <input type="text" class="form-control  form-control-sm" name="lat" id="lat" value="<?php  echo $data['lat']; ?>" >
            </div>
            <div class="form-group">
              <label for="long">Long</label>
              <input type="text" class="form-control  form-control-sm" name="longitude" id="longitude" value="<?php  echo $data['longitude']; ?>" >
            </div>
            <div class="form-group">
              <label for="long">Cost</label>
              <input type="text" class="form-control  form-control-sm" name="cost" id="cost" value="<?php  echo $data['cost']; ?>" >
            </div>
            <div class="form-group">
              <label for="long">Payment Date</label>
              <input type="text" class="form-control  form-control-sm" name="paymentDate" id="paymentDate" value="<?php  echo $data['paymentDate']; ?>" >
            </div> 
       
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" type="button" class="btn btn-primary">Add</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
<style type="text/css">
  .capitalize{
    text-transform : capitalize;
  }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" id="delbtn" class="btn btn-danger" href="<?php echo base_url('adsapi/deletebusiness/'.$data["id"].'/'.$_id); ?>">Delete</a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript"> 
	// $('#delete').on('click', function() {
	// 	$('#msg').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');
	// 	$.ajax({
	// 	     type: 'POST', 
	// 	     url: "<?php //echo base_url('admin/deletebusiness/'.$id.'/'.$_id); ?>", 
	// 	})
	// 	.done(function(data) {
	// 	    var ajaxdata = data;
	// 	    $('#msg').html('<br><div class="d-flex align-items-center"><span class="alert-success">Deleted Successfully</span></div><br>'); 
	// 	});
	// });



	function GoBackWithRefresh() {
	    if ('referrer' in document) {
	        window.location = document.referrer;
	        /* OR */
	        //location.replace(document.referrer);
	    } else {
	        window.history.back();
	    }
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
	
	$(function() {
	    // Get the form.
	    var form = $('#ajax-from');

	    // Get the messages div.
	    var formMessages = $('#form-messages');

	    $(form).submit(function(event) {
	      // Stop the browser from submitting the form.
	      event.preventDefault();
	      var ajaxdata = '';
	      // Serialize the form data.
	      var formData = $(form).serialize();
	        $('#addBusiness').modal('toggle');
	        $('#msg').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

	        $.ajax({
	          type: 'POST', 
	          url: "<?php echo base_url('admin/updatebusiness'); ?>",
	          data: formData,
	        }).done(function(data) {
	          var ajaxdata = data;
	          $('#msg').html('<br><div class="d-flex align-items-center"><span class="alert-success">Successfully Updated</span></div><br>');
	          // $('#msg').html(ajaxdata);
	          GoBackWithRefresh();
	        });
	          
	    });
	});

</script>