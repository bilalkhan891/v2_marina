 <div id="mySidenav" class="sidenav" style="width:250px">
 	<?php $class = $this->router->fetch_class();
$method = $this->router->fetch_method();
/*
echo $this->session->userdata('ContactDetails');
print_r($this->session);*/
?>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo base_url('usermain'); ?>" class="<?php if ($class == 'usermain' && $method == 'index') {echo 'active';}?>">User Dashboard</a>
  
<?php if ($this->session->userdata('ContactDetails') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/userlist'); ?>" class="<?php if ($class == 'usermain' && $method == 'userlist') {echo 'active';}?>">Manage Users</a>
<?php endif; ?>
  
<?php if ($this->session->userdata('ContactDetails') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/contactdetails'); ?>" class="<?php if ($class == 'usermain' && $method == 'contactdetails') {echo 'active';}?>">Contact Details</a>
<?php endif; ?>
 
<?php if ($this->session->userdata('BerthingRates') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/mrates'); ?>" class="<?php if ($class == 'usermain' && $method == 'mrates') {echo 'active';}?>">Berthing Rates</a>
<?php endif; ?>

<?php if ($this->session->userdata('UpdateBerthingRates') == 'yes'): ?>
  <a href="<?php echo base_url('rates/updatebristolrates'); ?>" class="<?php if ($class == 'rates' && $method == 'updatebristolrates') {echo 'active';}?>" >Update Berthing Rates</a>  
<?php endif; ?>
<?php if ($this->session->userdata('LockClosures') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/lockclosures'); ?>" class="<?php if ($class == 'usermain' && $method == 'lockclosures') {echo 'active';}?>">Lock Closures</a>
<?php endif; ?>
<?php if ($this->session->userdata('TideTimes') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/tides'); ?>" class="<?php if ($class == 'usermain' && $method == 'tides') {echo 'active';}?>">Tide Times</a>
<?php endif; ?>
<?php if ($this->session->userdata('PushNotifications') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/notifications'); ?>" class="<?php if ($class == 'usermain' && $method == 'notifications') {echo 'active';}?>">Push Notifications</a>
<?php endif; ?>
<?php if ($this->session->userdata('TidesLocksGenerator') == 'yes'): ?>
  <a href="<?php echo base_url('usermain/downloadcsv'); ?>" class="<?php if ($class == 'usermain' && $method == 'downloadcsv') {echo 'active';}?>">Tides & Locks Generator</a>
<?php endif; ?>
</div>


<div id="main" style="margin-left:250px"  class=" <?php echo $this->router->fetch_method(); ?>">
	<?php if ($this->session->userdata('is_user_logged_in')) {?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- Use any element to open the sidenav -->
		  <a href="#!" class="navbar-brand" onclick="openNav()"><i class="fas fa-bars"></i></a>

		  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      	<li class="nav-item active">
		        	<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      	</li>
		    </ul>
		    <ul class="navbar-nav ">
		    	<li class="nav-item dropdown">
		    	    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!" role="button" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" src="<?php echo base_url('uploads/img_avatar.png') ?>" width="40px" height="40px"></a>
		    	    <div class="dropdown-menu  dropdown-menu-right">
		    	      	<a class="dropdown-item" href="#!"><?php echo $this->session->userdata('username'); ?></a>
		    	      	<div class="dropdown-divider"></div>
		    	      	<a class="dropdown-item" href="#!" data-toggle="modal" data-target="#resetpwd">Reset password</a>
		    	      	<a class="dropdown-item" href="<?php echo base_url('userlogin/logout') ?>"><i class="fas fa-sign-out-alt"></i>Logout</a>
		    	    </div>
		    	</li>
		    	<li class="nav-item dropdown">
		    		<a href="#!"> </a>
		    	</li>
		    </ul>
		  </div>
		</nav>
	<?php }?>

	<div class="modal fade" id="resetpwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div id="resetmsg"></div>
	        <form id="resetPassword">
	          <div class="form-group">
	            <label for="password1">Password</label>
	            <input type="password" class="form-control" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Password" pattern=".{4,12}" required title="8 to 12 characters">
	             
	          </div>
	          <div class="form-group">
	            <label for="password2">Confirm Password</label>
	            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" pattern=".{4,12}" required title="8 to 12 characters">
	          </div> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	        </form>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$(function() {
		    // Get the form.
		    var form = $('#resetPassword');

		    // Get the messages div.
		    var formMessages = $('#msg');

		    $(form).submit(function(event) {
		        
			    // Stop the browser from submitting the form.
			    event.preventDefault();
			    var ajaxdata = '';
			    // Serialize the form data.
			    var formData = $(form).serialize();
			    $('#addBusiness').modal('toggle');
			    $('#resetmsg').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');
			    $.post( "<?php echo base_url('userlogin/resetpwd'); ?>", formData, 

		        	function(data,status){ 
			            if (status == 'success'){

			              $('#resetmsg').html(data);
			              // $('#resetmsg').html('<br><span class="alert alert-success">Successfully Reset</span><br>');
			              $(':input[type=password]','#resetPassword').val('');
			              setTimeout(function(){
			                window.location = "<?php echo base_url('userlogin/logout'); ?>"; 
			              }, 1000 );
			            } else {
			              $('#resetmsg').html(data);
			            }
			        });
		    });
		});
	</script>