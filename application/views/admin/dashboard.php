<?php echo "<h1>Dashboard</h1>"; ?> 
<div class="row">
	<div class="col-sm-12">
		<div id="msg">

			
		</div>
	</div>

</div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dashboard.css');?>">
<div class="mb-3 card">
	<div class="card-header-tab card-header">
		<div class="card-header-title font-size-lg text-capitalize font-weight-normal">

			<i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>

			Subscribers
		</div>
		<div class="btn-actions-pane-right text-capitalize">

			<a class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm" href="javascript:;" onclick="viewAll()"> 

				View All

			</a>
		</div>
	</div>
	<div class="no-gutters row">
		<div class="col-sm-6 col-md-4 col-xl-4">
			<div class="card no-shadow rm-border bg-transparent widget-chart text-left">
				<div class="icon-wrapper rounded-circle">
					<div class="icon-wrapper-bg bg-danger"></div>

					<i class="fas fa-at text-white"></i>
				</div>
				<div class="widget-chart-content">
					<div class="widget-subheading">Registered Subscribers</div>
					<div class="widget-numbers"><?php echo sizeof($greendeal); ?></div>
					<div class="widget-description text-focus">
						<!-- <div class="d-inline text-danger pr-1">

							<i class="fa fa-angle-down"></i>

							<span class="pl-1">54.1%</span>
						</div> -->

						Total Number of Subscribers
					</div>
				</div>
			</div>
			<div class="divider m-0 d-md-none d-sm-block"></div>
		</div>
		<div class="col-sm-6 col-md-4 col-xl-4">
			<div class="card no-shadow rm-border bg-transparent widget-chart text-left">
				<div class="icon-wrapper rounded-circle">
					<div class="icon-wrapper-bg bg-info"></div>

					<i class="fas fa-at text-white"></i>
				</div>
				<div class="widget-chart-content">
					<div class="widget-subheading">Registered Sabre Sails</div>
					<div class="widget-numbers"><span><?php echo sizeof($left); ?></span></div>
					<div class="widget-description text-focus">

						Total Number of Subscribers

						<!-- <span class="text-info pl-1">

							<i class="fa fa-angle-down"></i>

							<span class="pl-1">14.1%</span>

						</span> -->
					</div>
				</div>
			</div>
			<div class="divider m-0 d-md-none d-sm-block"></div>
		</div>
		<div class="col-sm-12 col-md-4 col-xl-4">
			<div class="card no-shadow rm-border bg-transparent widget-chart text-left">
				<div class="icon-wrapper rounded-circle">
					<div class="icon-wrapper-bg bg-info"></div>

					<i class="fas fa-at text-white"></i>
				</div>
				<div class="widget-chart-content">
					<div class="widget-subheading">Registered Force 4</div>
					<div class="widget-numbers text-info"><span><?php echo sizeof($right); ?></span></div>
					<div class="widget-description text-focus">

						Total Number of Subscribers

						<!-- <span class="text-warning pl-1">

							<i class="fa fa-angle-up"></i>

							<span class="pl-1">7.35%</span>

						</span> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="text-center d-block p-3 card-footer">

		<a class="btn btn-primary text-white" href="javascript:;" onclick="updateEmails()"> 

			<i class="fas fa-sync"></i>

			<span class="mr-1">Refresh Report</span>

		</a>
	</div> -->

</div>
<?php //echo json_encode(array_values($allsubs1)); ?>

<div class="row">
	<div class="col-sm-12 col-lg-6"> 
		<table id="viewall" class="display">
			<thead>
				<tr>
					<th>No.</th>
					<th>Email</th>
					<th>Type</th>
				</tr>
			</thead>
		</table>
	</div> 
</div> 
<script type="text/javascript">  
	$(document).ready(function(){
		$('#viewall').DataTable( { 
			data: <?php echo json_encode(array_values($allsubs1)); ?>,
		} ); 
	});
</script>



