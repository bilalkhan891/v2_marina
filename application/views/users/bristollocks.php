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

		<a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#import">Upload Lock</a>

		<a href="<?php echo base_url('usermain/deleteAllBristol'); ?>" class="btn btn-danger">Delete All</a>

	</div>

</div>

<div id="loading"></div>



<!-- Modal -->

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title" id="exampleModalLabel">Import Lock Closures</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">



				<?php

				$attributes = array('class' => 'needs-validation', 'id' => 'lockclosures', 'novalidate' => '', 'enctype' => 'multipart/form-data');

				echo form_open('', $attributes);

				?>



				<div >

					<input type="file"  name="userfile" id="customFile" required accept=".csv">

				</div>

				<br>





				<div class="modal-footer mb-3">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="submit" class="btn btn-primary">Import</button>

				</div>



				<?php echo form_close(); ?>



			</div>

		</div>

	</div>

</div>



<div class="row"><?php echo $msg; ?></div>

<div>

	<table id="dataTable" class="table table-striped table-hover" >

		<thead class="thead-light">

			<tr>

				<th scope="col"><strong>#</strong></th>

				<th scope="col"><strong>Day</strong></th>

				<th scope="col"><strong>Date</strong></th>

				<th scope="col"><strong>Locks</strong></th> 

				<th scope="col"><strong>Stop Gates</strong></th>

				<th scope="col"><strong>Action</strong></th>

			</tr>

		</thead>

		<tbody>

			<?php //print_r($data[0]);?>

			<?php $count = 1;foreach ($data as $row) {

				?>

				<tr>

					<td><?php echo $count;

					$count++; ?></td>

					<td><?php echo $row['day']; ?></td>

					<td><?php echo date("d-M-Y", strtotime($row['date'])); ?></td>

					<td>

						<?php echo $row['locks']; ?>

					</td>

					<td>

						<?php echo $row['stopGate']; ?>

					</td> 

					<td class="row">

						<a class="col-md-10 bg-danger" href="<?php echo base_url('usermain/deleteClosures/' . $row['id'] . '/bristol'); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash center text-white"></i></a>

					</td>



				</tr>

			<?php }?>

		</tbody>

	</table>

</div> 

<script type="text/javascript"> 
	$(document).ready(function(){

		$('#dataTable').DataTable( { } );  

		$('#lockclosures').on('submit', function(event){

			event.preventDefault();
		 
			$.ajax({ 
				url:"<?php echo base_url(); ?>usermain/importbristollocks",

				method:"POST",

				data: new FormData(this),

				contentType:false,

				cache:false,

				processData:false,

				beforeSend:function(){ 
					$('#import').modal('toggle'); 
					$('#loading').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Data Importing....</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

				}, 
				success:function(data) 
				{ 
					$('#loading').html(data); 
					window.location.replace('<?php echo base_url('usermain/lockclosures'); ?>');
					console.log('success');

				}, fail:function(data){
					console.log('failed');
				}

			})

		});



	});



	function editRecord(id, username, email, phone, status){

		$('.update #id').val(id);

		$('.update #username').val(username);

		$('.update #email').val(email);

		$('.update #phone').val(phone);

	}

	$(document).ready(function(){

		$("input[name$='lockclosure']").click(function() {

			var value = $(this).val();

			if (value == 'master' || value == 'maintenance') {

				$('#close').attr('readonly', 'readonly');

				$('#close').val('Lock Master Decision');

				$('#reopen').attr('readonly', 'readonly');

				$('#reopen').val('Lock Master Decision');

			} else {

				$('#close').removeAttr('readonly');;

				$('#close').val('');

				$('#reopen').removeAttr('readonly');;

				$('#reopen').val(''); 
			} 
		}); 
	});
 

</script>