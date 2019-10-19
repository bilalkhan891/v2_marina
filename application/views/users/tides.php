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

		<a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#import">Upload Tides</a> 

		<a href="<?php echo base_url('usermain/deleteall/tides/1'); ?>" class="btn btn-danger">Delete All</a>

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

	      <th scope="col"><strong>Action</strong></th>

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



	        <td class="row">

	        	<a class="col-md-10 bg-danger" href="<?php echo base_url('usermain/deletetide/' . $row['id']); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash center text-white"></i></a>

	        </td>



	      </tr>

	    <?php }?>

	  </tbody>

	</table>

</div>



<!-- Modal -->

<div class="modal fade" id="addClosures" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

$attributes = array('class' => 'needs-validation', 'novalidate' => '');

echo form_open('usermain/addtide', $attributes);

?>





      	  <div id="datepicker"></div>

      	  <div class="form-row">

      	    <div class="input-group input-group-sm">



      	      <input type="hidden" name="day" value=""  class="form-control form-control-sm" id="day" required  aria-label="Small" >

      	      <div class="invalid-feedback">

      	        Fill this field.

      	      </div>



      	    </div>

      	  </div>

      	  <div class="form-row">

      	    <div class="input-group">



      	      <input type="hidden" name="date" value=""  class="form-control form-control-sm" id="date" required  aria-label="Small">



      	      <div class="invalid-feedback">

      	        Fill this flabeldate.

      	      </div>



      	    </div>

      	  </div>

      	  <br>

      	  <div class="form-row mb-3">

			<div class="col-md-4">

	      	    <label for="time">Time</label>

	      	    <div class="input-group input-group-sm">

	      	      	<input type="text" name="time" value=""  class="form-control form-control-sm timeformat" id="time" required  aria-label="Small" >

	      	      	<div class="invalid-feedback"> Fill this field.  </div>

	      	    </div>

			</div>



			<div class="col-md-4">

	      	    <label for="height">Height</label>

	      	    <div class="input-group input-group-sm">

	      	      	<input type="text" name="height" value=""  class="form-control form-control-sm" id="height" required  aria-label="Small" >

	      	      	<div class="invalid-feedback"> Fill this field.  </div>

	      	    </div>

			</div>

	      	<div class="col-md-4">

	      	     <label for="state">Tide State</label>

	      	    <select class="custom-select custom-select-sm" name="state" id="state">

	      	      <option value="High Water">High Water</option>

	      	      <option value="Low Water">Low Water</option>

	      	    </select>

	      	</div>

      	  </div>



      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Add</button>

      </div>



      	<?php echo form_close(); ?>



      </div>

    </div>

  </div>

</div>



<!-- Modal -->

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Import Tide</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">



      	<?php

$attributes = array('class' => 'needs-validation', 'id' => 'tides', 'novalidate' => '', 'enctype' => 'multipart/form-data');

echo form_open('', $attributes);

?>



		<div >

		  <input type="file" name="userfile" id="customFile" required>

		  <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->

		</div>





      <div class="modal-footer mb-3">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Import</button>

      </div>



      	<?php echo form_close(); ?>



      </div>

    </div>

  </div>

</div>



<script type="text/javascript">



	$(document).ready(function(){


		$('#dataTable').DataTable( { } );  


	 $('#tides').on('submit', function(event){

	  event.preventDefault();

	  $.ajax({

   	   statusCode: {

	       500: function() {

	         $('#loading').html('Something went wrong');

	       }

	     },

	   url:"<?php echo base_url(); ?>usermain/importtides",

	   method:"POST",

	   data:new FormData(this),

	   contentType:false,

	   cache:false,

	   processData:false,



      fail:function() {

      	$('#loading').html('Something went wrong');

      },

      error:function() {

      	$('#loading').html('Something went wrong');

      },

	   beforeSend:function(){

	   	$('#import').modal('toggle');

	    $('#loading').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Data Importing....</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

	   },

	   success:function(data)

	   {

	    $('#loading').html(data);

	    window.location.replace('<?php echo base_url('usermain/tides'); ?>');

	   }

	  })

	 });



	});



	  	$("#height").on('change paste keyup', function() {



	        if ($('#height').val() > 5.0) {



	        	$("#state option[value='Low Water']").prop({ 'selected': false });

			    $("#state option[value='High Water']").prop({ 'selected': true });



	        } else {



			    $("#state option[value='High Water']").prop({ 'selected': false });

	        	$("#state option[value='Low Water']").prop({ 'selected': true });

	        }

	    });



  /////////////////

  // datepicker  //

  /////////////////



	$( function() {

	    $( "#datepicker" ).datepicker({

	    	dateFormat: 'yy-mm-dd',

	       	onSelect: function (dateText) {



               var objDate = new Date(dateText);

               var day = $.datepicker.formatDate('DD', objDate);

               var date = $.datepicker.formatDate('yy-mm-dd', objDate);

               $('#day').val(day);

               $('#date').val(date);

           	}

	    });

	});



	//////////////////////

	// time auto format //

	//////////////////////

	(function($) {



	  $('.timeformat').attr('autocomplete','off').keydown(function(e){



	    // Input Value var

	    var inputValue = $(this).val();



	    // Make sure keypress value is a Number

	    if( (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8){



	      // Make sure first value is not greater than 2

	      if(inputValue.length == 0){

	        if(e.keyCode > 49){

	          e.preventDefault();

	          $(this).val(2);

	        }

	      }



	      // Make sure second value is not greater than 4

	      else if(inputValue.length == 1 && e.keyCode != 8){

	        e.preventDefault();

	        if( e.keyCode > 50 && inputValue == 2 ){

	          $(this).val(inputValue + '3:');

	        }

	        else{

	          $(this).val(inputValue + String.fromCharCode(e.keyCode) + ':');

	        }

	      }



	      else if(inputValue.length == 2 && e.keyCode != 8){

	        e.preventDefault();

	        if( e.keyCode > 52 ){

	          $(this).val(inputValue + ':5');

	        }

	        else{

	          $(this).val(inputValue + ':' + String.fromCharCode(e.keyCode));

	        }

	      }



	      // Make sure that third value is not greater than 5

	      else if(inputValue.length == 3 && e.keyCode != 8){

	        if( e.keyCode > 52 ){

	          e.preventDefault();

	          $(this).val( inputValue + '5' );

	        }

	      }



	      // Make sure only 5 Characters can be input

	      else if(inputValue.length > 4 && e.keyCode != 8){

	        e.preventDefault();

	        return false;

	      }

	    }



	    // Prevent Alpha and Special Character inputs

	    else{

	      e.preventDefault();

	      return false;

	    }

	  }); // End Timepicker KeyUp function



	  $('.timeformat').blur(function() {

	  	value = $(this).val();

	  	if (value.length < 5) {

	  		if (value.length == 1) {

	  			$(this).val(value + '0:00');

	  		} else if(value.length == 2) {

	  			$(this).val(value + ':00');

	  		} else if(value.length == 3) {

	  			$(this).val(value + '00');

	  		} else if(value.length == 4) {

	  			$(this).val(value + '0');

	  		}

	  	}



	  });



	})(jQuery);
 



  </script>