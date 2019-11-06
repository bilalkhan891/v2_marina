 <div id="mySidenav" class="sidenav" style="width:250px">
 	<?php $class = $this->router->fetch_class(); $method = $this->router->fetch_method(); ?>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo base_url('admin');?>" class="<?php if($class=='admin' && $method=='index'){echo 'active'; }?>">Dashboard</a>
  <a href="<?php echo base_url('admin/userlist');?>" class="<?php if($class=='admin' && $method=='userlist'){echo 'active'; }?>">Admin Users</a>
  <a href="<?php echo base_url('marinas');?>" class="<?php if($class=='marinas' && $method=='index'){echo 'active'; }?>">Marina</a> 
  <a href="<?php echo base_url('Role');?>" class="<?php if($class=='Role' && $method=='index'){echo 'active'; }?>">Role</a> 
</div>


<div id="main" style="margin-left:250px" class="<?php echo $this->router->fetch_method(); ?>">
	<?php if($this->session->userdata('is_logged_in')){ ?>
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
		    	      	<a class="dropdown-item" href="<?php base_url('admin/users'); ?>">Reset password</a>
		    	      	<a class="dropdown-item" href="<?php echo base_url('login/logout')?>"><i class="fas fa-sign-out-alt"></i>Logout</a>
		    	    </div>
		    	</li>
		    	<li class="nav-item dropdown">
		    		<a href="#!"> </a>
		    	</li>
		    </ul>
		  </div>
		</nav>
	<?php } ?>