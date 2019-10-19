<h1><?php echo $title; ?></h1>
<!--  <pre>
	<?php //print_r($data[0]); ?> 
</pre> -->

<a href="#!" class="btn btn-danger float-right"  data-toggle="modal" data-target="#deletemodal">Delete Marina</a>
<!-- <a href="#!" class="btn btn-info float-right"  data-toggle="modal" data-target="#editmodal">Edit Values</a> -->
 
<!-- Modal -->
<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-danger"><storng>Alert</storng></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <span>Alert: Once you delete this Marina you won't be able to retrive it.</span><br>
        <span class=" text-danger"><strong>Notice: It will delete all data related to this marina.</strong></span>
      </div>
      <div class="modal-footer">
         <!-- <strong class=" text-danger">Delete all the data?</strong> -->
        <a class="btn btn-default float-left" href="<?php echo base_url('marinas/deletemarina/'); echo $data[0]['id']; ?>" style="position: absolute; left: 20px;">Delete</a>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="editmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><storng>Not ready!</storng></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" href="#!"  data-dismiss="modal">Okay</a>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<?php echo $this->session->flashdata('msg'); ?>
 <br>
<br>
<table class="table table-hover"> 
  <tbody> 
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $data[0]['marinaname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $data[0]['address'].', '.$data[0]['address2'].', '.$data[0]['address3'].', '.$data[0]['postcode']; ?></td>
    </tr>
    <tr>
      <th scope="row">Contact Name</th>
      <td><?php echo $data[0]['contactname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone</th>
      <td><a href="tel:<?php echo $data[0]['phone']; ?>"><?php echo $data[0]['phone']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><a href="mailto:<?php echo $data[0]['email']; ?>"><?php echo $data[0]['email']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Web</th>
      <td><a href="<?php echo $data[0]['web']; ?>"><?php echo $data[0]['web']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Facebook</th>
      <td><a href="<?php echo $data[0]['facebook']; ?>"><?php echo $data[0]['facebook']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Flickr</th>
      <td><a href="<?php echo $data[0]['flickr']; ?>"><?php echo $data[0]['flickr']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Twitter</th>
      <td><a href="<?php echo $data[0]['twitter']; ?>"><?php echo $data[0]['twitter']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Out of Hours Security</th>
      <td><a href="tel:<?php echo $data[0]['security']; ?>"><?php echo $data[0]['security']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">VHF Channel</th>
      <td><?php echo $data[0]['channel']; ?></td>
    </tr>
    <tr>
      <th scope="row">Waypoint position</th>
      <td><?php echo $data[0]['position']; ?></td>
    </tr>
    <tr>
      <th scope="row">Opening Hours</th>
      <td>
        <table> 
            <tr><th scope="row">Monday - Friday</th><td><?php echo $data[0]['mon-fri']; ?></td></tr>
            <tr><th scope="row">Saturday</th><td><?php echo $data[0]['sat']; ?></td></tr>
            <tr><th scope="row">Sunday</th><td><?php echo $data[0]['sun']; ?></td></tr>
          
        </table>
      </td>
    </tr>
    <tr>
      <th scope="row">Lat</th>
      <td><?php echo $data[0]['lat']; ?></td>
    </tr>
    <tr>
      <th scope="row">Long</th>
      <td><?php echo $data[0]['lon']; ?></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
  function editRecord(id, username, email, phone, status){
    $('.update #id').val(id); 
    $('.update #username').val(username); 
    $('.update #email').val(email); 
    $('.update #phone').val(phone);  
  }
</script>
