<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jqueryui/theme.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jqueryui/structure.css'); ?>">

<style type="text/css">

	.ui-datepicker {

	    width: 100% !important;

	}

	a.col-md-10.bg-danger {

	    padding: 4px;

	    margin: 1px;

	}

	@keyframes spinner-border {

      to { transform: rotate(360deg); }

    }

    .spinner-border{

        display: inline-block;

        width: 2rem;

        height: 2rem;

        vertical-align: text-bottom;

        border: .25em solid currentColor;

        border-right-color: transparent;

        border-radius: 50%;

        -webkit-animation: spinner-border .75s linear infinite;

        animation: spinner-border .75s linear infinite;

    }

    .spinner-border-sm{

        height: 1rem;

        border-width: .2em;

    }

    .d-flex.align-items-center {

    	width: 300px;

    	margin: auto;

    }

</style>

<div class="row">

	<h1 class="float-left col-md-6"><?php echo $title; ?></h1>

	<div class="col-md-6 float-right">

		<!-- <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#addClosures">Single Tide</a> -->
  
	</div>

</div>

<div id="loading"></div>

<?php //echo date('d-m-Y'); ?>

<div class="row"><?php echo $msg; ?></div>

<div>

	<table class="table table-striped table-hover" >

	  <thead class="thead-light">

	    <tr>

	      <th scope="col"><strong>#</strong></th>

	      <th scope="col"><strong>Day</strong></th>

	      <th scope="col"><strong>Date</strong></th>

	      <th scope="col"><strong>Time</strong></th>

	      <th scope="col"><strong>Height</strong></th>

	      <th scope="col"><strong>Tide State</strong></th> 

	    </tr>

	  </thead>

	  <tbody>

<?php //print_r($data[0]);?>

	  	<?php $count = 1;foreach ($data as $row) {

	?>

	      <tr>

	        <td>

	        	<?php

echo $count;

	$count++;

	?>

			</td>

	        <td><?php echo $row['day']; ?></td>

	        <td><?php echo date("d-M-Y", strtotime($row['date'])); ?></td>

	        <td><?php echo $row['time']; ?></td>

	        <td><?php echo $row['height']; ?></td>

	        <td><?php echo $row['state']; ?></td>
 



	      </tr>

	    <?php }?>

	  </tbody>

	</table>

</div>
  