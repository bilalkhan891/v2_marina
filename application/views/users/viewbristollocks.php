  
 
<div class="row">

	<h1 class="float-left col-md-6"><?php echo $title; ?></h1>

	<div class="col-md-6 float-right">  

	</div>

</div>

<div id="loading"></div>


 

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
 


				</tr>

			<?php }?>

		</tbody>

	</table>

</div> 

 