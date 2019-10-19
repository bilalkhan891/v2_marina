<h1><?php echo $title; ?></h1>
 

<a href="<?php echo base_url('marinas/addmarina'); ?>" class="btn btn-info float-right">Add Marina</a>
<?php 
if (is_array($msg)) {
  echo "<div class='alert alert-info' style='width: 60%;'>"; 
    echo  ($msg['marina'] == 1) ? 'Marina Deleted Successfully</br>' : '<span class="text-danger">Marina was not found</span></br>' ; 
    echo  ($msg['users'] == 1) ? 'Users Deleted Successfully</br>' : '<span class="text-danger">Users was not found</span></br>' ; 
  echo '</div>' ;
  
} else {
  echo $msg;
}

?>
<br>
<br>

<table class="table table-striped table-hover" >
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th> 
      <th scope="col">Phone</th> 
      <th scope="col">Registation Date</th>  
      <th scope="col">Status</th> 
      <th scope="col">Action</th>
      <th scope="col">Adverts</th>
      <th scope="col">Sponsers</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; foreach ($data as $row) { ?>
      <tr>
        
        <th scope="row"><?php echo $row['id']; ?></th>
        <td><?php echo $row['marinaname']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['date']; ?></td> 
        <td class="<?php if($row['status'] == 'approved') {echo 'approved';} else {echo 'unapproved';} ?>"><?php echo $row['status']; ?></td>
        <td class=" "> 
        	<a class="col-md-12 bg-info" href="<?php echo base_url('marinas/single/'); echo $row['id']; ?>" title="View" data-placement="top" data-toggle="tooltip"><i class="far fa-eye text-white center"></i></a>
        	 
        </td>
        <td class=" "> 
          <a class="col-md-12 bg-success" href="<?php echo base_url('admin/adtypes/'.$row['username'].'/'.$row['id']); ?>"><i class="fas fa-ad text-white center"></i></a>
        </td>
        <td class=" "> 
          <a class="col-md-12 bg-warning" href="<?php echo base_url('admin/sponsors/'.$row['id'].'/'.$row['username']); ?>"><i class="fas fa-bullhorn text-white center"></i></a>
        </td>
      </tr>
    <?php $i++; } ?> 
  </tbody>
</table>


 

<!-- Modal -->
<div class="modal fade" id="advertisers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="" class="btn btn-primary" id="sponsersbtn">Main Sponsors</a>
        <a href="" class="btn btn-info text-white" id="adsbtn">General Advertisers</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  $('#advertisers').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    console.log(recipient);
    modal.find('#sponsersbtn').attr("href", '<?php echo base_url('admin/sponsors/'); ?>'+ recipient); 
    modal.find('#adsbtn').attr("href", '<?php echo base_url('admin/adtype/'); ?>'+ recipient); 
  });

  function editRecord(id, username, email, phone, status){
    $('.update #id').val(id); 
    $('.update #username').val(username); 
    $('.update #email').val(email); 
    $('.update #phone').val(phone);  
  }
</script>
