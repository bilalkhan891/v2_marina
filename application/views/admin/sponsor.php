<h4><?php echo urldecode($title);  ?></h4>
  


<div class="row">

</div>
<a href="<?php echo base_url('admin/sponsors/'.$this->session->userdata('marinaid').'/'.$this->session->userdata('marinauser')); ?>">
	<i class="fas fa-arrow-left"></i> Back
</a>
<!-- <a href="javascript:;" onclick="GoBackWithRefresh()"><i class="fas fa-arrow-left"></i> Back</a> -->
<div class="row">
	<div class="col-sm-12">
		<div class="float-right">
 

			<a  class="btn btn-danger ba-btn" href="#!"  data-toggle="modal" data-target="#exampleModal" data-whatever="<?php  echo $this->session->userdata('$id'); ?>" style="padding: 3px 30px;">Delete 
			   <i class="fas fa-trash text-white"></i>
			</a>
			<a class="btn btn-info white-text ba-btn" href="#!" data-toggle="modal" data-target="#addBusiness" style="padding: 3px 30px;">Edit <i class="fas fa-edit text-white"></i></a>
			 
		</div>	
	</div>
</div> 
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
		  	 
		      <tr>
		        <th scope="row">Type</th>
		        <td><?php if ($data['typeId'] == 1) {
		        	echo "Left";
		        }elseif($data['typeId'] == 2){
		        	echo "Right";
		        }else{
		        	echo 'Not Set';
		        } ?></td> 
		      </tr>
		      <tr>
		        <th scope="row">icon</th>
		        <td>

		        	<?php
		        		$icon = explode('.', $data['icon']);
		        		if (isset($icon[1])) { 
					        echo '<img src="'.base_url().$icon[0].'@1x.'.$icon[1].'">';
					    }
		        	// $scaleArr = array(
		        	//   'scale' => array('@1x', '@2x', '@3x', '@hdpi', '@mdpi', '@unknown', '@xhdpi', '@xxhdpi', '@xxxhdpi'),
		        	//   'height' => array('64', '128', '192', '96', '64', '265', '128', '192', '265')
		        	// );
		        	// for ($i=0; $i < 9; $i++) { 
		        		 
		        	// 	$img = explode('.', $data["icon"]);
		        	// 	echo '<img src="'. base_url() . $img[0] . $scaleArr["scale"][$i] .".".  $img[1] .'">'; 
		        	// }

		        	?>
		        </td> 
		      </tr> 
		      <tr>
		        <th scope="row">Navigation Icon</th>
		        <td><?php  
		        	if ($data['navIcon'] == "" || $data["icon"] == null) {
		        		echo '<a class="btn btn-primary" href="'.base_url().'admin/generateNavIcons/'.$data["id"].'/'.$data['typeId'].' ">Generate Nav Icons</a>';
		        	} else {
		        		$icon = explode('.', $data['navIcon']);
				        echo '<img src="'.base_url().$icon[0].'@1x.'.$icon[1].'">'; 
		        	}
		        ?>	
		        </td> 
		      </tr> 
		      <tr>
		        <th scope="row">Name</th>
		        <td><?php  echo $data['businessname']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Contact Title</th>
		        <td><?php  echo $data['contacttitle']; ?></td> 
		      </tr> 
		      <tr> 
		        <th scope="row">Contact 1st Name</th>
		        <td><?php  echo $data['fstname']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Contact Surname</th>
		        <td><?php  echo $data['surname']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address 1</th>
		        <td><?php  echo $data['address1']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address 2</th>
		        <td><?php  echo $data['address2']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Address 3 </th>
		        <td><?php  echo $data['address3']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Postcode</th>
		        <td><?php  echo $data['postcode']; ?></td> 
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
		        <th scope="row">Latitude</th>
		        <td><?php  echo $data['lat']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Longitude</th>
		        <td><?php  echo $data['lng']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Monday</th>
		        <td><?php  echo $data['mon']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">saturday</th>
		        <td><?php  echo $data['sat']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">sunday</th>
		        <td><?php  echo $data['sun']; ?></td> 
		      </tr> 
		      <tr>
		        <th scope="row">Text</th>
		        <td><?php  echo $data['msg']; ?></td> 
		      </tr>  
 
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
        	<form action="<?php echo base_url('admin/submitSponsor/'); ?>" id="ajax-from" method="post" class="needs-validation" enctype="multipart/form-data"> 
        	    <input type="text" class="form-control  form-control-sm capitalize" id="marinauser" style="display: none;" name="marinauser" value="<?php echo $data['marinauser']; ?>" >
        	    <input type="text" class="form-control  form-control-sm capitalize" id="marinaid" style="display: none;" name="marinaid" value="<?php echo $data['marinaid']; ?>" >
        	    <input type="text" class="form-control  form-control-sm capitalize" id="id" style="display: none;" name="id" value="<?php echo $data['id']; ?>" >
        	    <input type="text" class="form-control  form-control-sm capitalize" id="id" style="display: none;" name="oldIcon" value="<?php echo $data['icon']; ?>" >
        	    <input type="text" class="form-control  form-control-sm capitalize" id="action" style="display: none;" name="action" value="update" >
        	    <div class="form-group">
        	      <label for="icon">Icon</label>
        	      <input type="file" class="form-control  form-control-sm" name="icon" value="<?php echo $data['icon']; ?>" id="icon">
        	    </div>
        	   <div class="form-group">
        	     <label for="businessname">Business Name</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" id="businessname" name="businessname" value="<?php echo $data['businessname']; ?>" >
        	   </div>
        	   <div class="form-group">
        	     <label for="contacttitle">Contact Title</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="contacttitle" value="<?php echo $data['contacttitle']; ?>" id="contacttitle" >
        	   </div>
        	   <div class="form-group">
        	     <label for="fstname">Contact 1st Name</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="fstname" value="<?php echo $data['fstname']; ?>" id="fstname" >
        	   </div>
        	   <div class="form-group">
        	     <label for="surname">Contact Surname</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="surname" value="<?php echo $data['surname']; ?>" id="surname" >
        	   </div>
        	   <div class="form-group">
        	     <label for="address1">Address Line 1</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="address1" value="<?php echo $data['address1']; ?>" id="address1" >
        	   </div>
        	   <div class="form-group">
        	     <label for="address2">Address Line 2</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="address2" value="<?php echo $data['address2']; ?>" id="address2">
        	   </div>
        	   <div class="form-group">
        	     <label for="address3">Address Line 3</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="address3" value="<?php echo $data['address3']; ?>" id="address3">
        	   </div>
        	   <div class="form-group">
        	     <label for="postcode">Post Code</label>
        	     <input type="text" style="text-transform: uppercase;" class="form-control  form-control-sm" name="postcode" value="<?php echo $data['postcode']; ?>" id="postcode" >
        	   </div>
        	   <div class="form-group">
        	     <label for="tel">Tel No</label>
        	     <input class="form-control  form-control-sm" name="tel" value="<?php echo $data['tel']; ?>" id="tel" >
        	   </div>
        	   <div class="form-group">
        	     <label for="email">Email</label>
        	     <input type="email" class="form-control  form-control-sm" name="email" value="<?php echo $data['email']; ?>" id="email">
        	   </div>
        	   <div class="form-group">
        	     <label for="website">Website</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="website" value="<?php echo $data['website']; ?>" id="website" >
        	   </div>
        	   <div class="form-group">
        	     <label for="mon">Monday</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="mon" value="<?php echo $data['mon']; ?>" id="mon" >
        	   </div>
        	   <div class="form-group">
        	     <label for="sat">Saturday</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="sat" value="<?php echo $data['sat']; ?>" id="sat" >
        	   </div>
        	   <div class="form-group">
        	     <label for="sun">Sunday</label>
        	     <input type="text" class="form-control  form-control-sm capitalize" name="sun" value="<?php echo $data['sun']; ?>" id="sun" >
        	   </div>
        	   <div class="form-group">
        	     <label for="lat">Lat</label>
        	     <input type="text" class="form-control  form-control-sm" name="lat" value="<?php echo $data['lat']; ?>" id="lat">
        	   </div>
        	   <div class="form-group">
        	     <label for="lng">Long</label>
        	     <input type="text" class="form-control  form-control-sm" name="lng" value="<?php echo $data['lng']; ?>" id="lng">
        	   </div>
        	   
        	   <div class="form-group">
        	     <label for="icon">Icon</label>
        	     <select class="form-control form-control-sm" name="typeId" required>
        	       <option value="">Select Position</option>
        	       <option value="1" <?php if ($data['typeId'] == 1) { echo 'selected="selected"'; } ?>>Left</option>
        	       <option value="2" <?php if ($data['typeId'] == 2) { echo 'selected="selected"'; } ?>>Right</option>
        	     </select>
        	   </div>
        	   <div class="form-group">
        	     <label for="msg">Message</label>
        	     <input type="text" class="form-control  form-control-sm" name="msg" value="<?php echo $data['msg']; ?>" id="msg">
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
        <a type="button" id="delbtn" class="btn btn-danger" href="<?php echo base_url('admin/deleteSponsor/').$data['id']; ?>">Delete</a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	 
	$('#delete').on('click', function() {
		$('#msg').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');
		$.ajax({
		     type: 'POST', 
		     url: "<?php echo base_url('admin/deletebusiness/'.$_id); ?>", 
		})
		.done(function(data) {
		    var ajaxdata = data;
		    $('#msg').html('<br><div class="d-flex align-items-center"><span class="alert-success">Deleted Successfully</span></div><br>');
		    console.log(ajaxdata); 
		    GoBackWithRefresh();
		});
	});

	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget); // Button that triggered the modal
	  var recipient = button.data('whatever'); // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this);

	  modal.find('#delbtn').attr("href", '<?php echo base_url("admin/deletebusiness/"); ?>'+ recipient); 
	});

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
