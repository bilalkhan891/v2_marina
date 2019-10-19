<h1><?php echo $title; ?></h1>
<div class="row"><div class="col-sm-12"><?php echo $msg; ?></div></div>
<div class="row">
	<div class="col-md-12 col-lg-5">
		 
		<div id="accordion">
		  	<div class="card">
		    	<div class="card-header" id="headingOne">
		      		<h5 class="mb-0">
			        	<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          	Last Lock Date in Data Base 
			        	</button>
			          	<span class="badge badge-primary badge-pill float-right"><?php print_r($locks[0]['date']); ?></span>
		      		</h5>
		    	</div>
		    	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		    	    <div class="card-body">
		    	        <ul class="list-group row">
		    	          <li class="list-group-item col-sm-12">
		    	            Total Records
		    	            <span class="badge badge-primary badge-pill float-right"><?php echo sizeof($locks); ?></span>
		    	          </li>  
		    	          <li class="list-group-item col-sm-12">
		    	            Start Date
		    	            <span class="badge badge-primary badge-pill float-right"><?php echo $locks[sizeof($locks) - 1]['date']; ?></span>
		    	          </li> 
		    	        </ul>
		    	    </div>
		    	</div>
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-5"> 
		<div id="accordion1">
		  	<div class="card">
		    	<div class="card-header" id="headingOne">
		      		<h5 class="mb-0">
			        	<button class="btn btn-link" data-toggle="collapse" data-target="#tides" aria-expanded="true" aria-controls="tides">
			          	Last Tide Time in Data Base 
			        	</button>
			          	<span class="badge badge-primary badge-pill float-right"><?php print_r($tides[0]['date']); ?></span>
		      		</h5>
		    	</div>
		    	<div id="tides" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1">
		    	    <div class="card-body">
		    	        <ul class="list-group row">
		    	          <li class="list-group-item col-sm-12">
		    	            Total Records
		    	            <span class="badge badge-primary badge-pill float-right"><?php echo sizeof($tides); ?></span>
		    	          </li>  
		    	          <li class="list-group-item col-sm-12">
		    	            Start Date
		    	            <span class="badge badge-primary badge-pill float-right"><?php echo $tides[sizeof($tides) - 1]['date']; ?></span>
		    	          </li> 
		    	        </ul>
		    	    </div>
		    	</div>
			</div>
		</div>

	</div>
</div>

<br><br>

<div class="row">
	<div class="col-sm-12">
		<a href="<?php echo base_url('usermain/downloadcsv/download') ?>" class="btn btn-primary">Download CSV file Generator</a>
	</div>
</div>

<style type="text/css">
	.card .card-header h5 {
	    line-height: 1em !important;
	}
	.card .card-header {
	    padding: 3px 10px;
	}
	.card .card-header span {
	    margin-top: 5px;
	}
</style>