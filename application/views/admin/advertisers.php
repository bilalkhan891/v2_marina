<h1><?php echo $title; ?></h1>


<div class="container">
	<?php echo $msg; ?>
	<div class="float-left">
	    <h2>Advertiser Category</h2>
	    <p>Select a type for advertiser.</p>  
	</div>
	<a class="btn btn-info white-text float-right" href="#!">Add Category</a>

	 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <ul class="list-group" id="myList">


  	<?php 

  	if (empty($data)) {
  		echo '<h3>No records to show</h3>';
  	} else {

	  	foreach ($data as $row) {?>

		    <li class="list-group-item">
		    	<a href="<?php echo base_url('admin/singlead/'.$row['_id']); ?>"><?php echo $row['name']; ?></a>
		    </li> 

	  	<?php } ?>
  	<?php } ?>
  </ul>  
</div>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $("#myList li a").toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
