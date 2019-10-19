<div>

  <h1 class=" "><?php echo $title ?></h1>

  <a href="#!" class="btn btn-info float-right"  data-toggle="modal" data-target=".bd-example-modal-lg">Add User</a>

<?php echo $this->session->flashdata('msg'); ?>

</div><br>

<br>



<table id="datatable" class="table table-striped table-hover" >

  <thead class="thead-light">

    <tr>

      <th scope="col">#</th>

      <th scope="col">User Name</th>

      <th scope="col">Email</th> 

      <th scope="col">Phone</th> 

      <th scope="col">Registation Date</th> 

      <th scope="col">Status</th> 

      <th scope="col">Action</th>

    </tr>

  </thead>

  <tbody>

  	<?php foreach ($data as $row) { ?>

      <tr>

        <th scope="row"><?php echo $row['id']; ?></th>

        <td><?php echo $row['username']; ?></td>

        <td><?php echo $row['email']; ?></td>

        <td><?php echo $row['phone']; ?></td>

        <td><?php echo $row['date']; ?></td>

        <td <?php if($row['status'] == 'Approved') {echo 'class="approved"';} else {echo 'class="unapproved"'; echo 'data-toggle="tooltip" data-placement="top" title="This user won\'t be able to login."';} ?>><?php echo $row['status']; ?></td>

        <td class="row">

        	<a class="col-md-5 bg-info" href="#!" onclick="editRecord( '<?php echo $row['id']?>', '<?php echo $row['username']?>', '<?php echo $row['email']?>', '<?php echo $row['phone']?>', '<?php echo $row['status']; ?>' )" title="Edit" data-toggle="modal" data-target=".update"><i class="fas fa-edit center text-white" type="javascript:;"></i></a>

        	<a class="col-md-5 bg-danger" href="<?php echo base_url('admin/deleteuser/'.$row['id']); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash center text-white"></i></a>

        </td>

      </tr>

    <?php } ?> 

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



<div class="modal fade update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">Update</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <?php 

          $attributes = array('class' => 'needs-validation', 'novalidate' => '');

          echo form_open('admin/updateuser', $attributes);

        ?> 

          <div class="">

            <div class="form-row">

              <label for="username">User Name</label>

              <input type="hidden" name="id" class="form-control" id="id" placeholder="" value="" required>

              <input type="text" name="username" class="form-control" id="username" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="email">Email</label>

              <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="phone">Phone Number</label>

              <div class="input-group"> 

                <input type="text" class="form-control" name="phone" id="phone" placeholder="" aria-describedby="inputGroupPrepend" required>

                <div class="invalid-feedback">

                  Please choose a username.

                </div>

              </div>

            </div>

            <div class="form-row">

              <label for="status">Status</label>

              <div class="input-group">

                <select class="custom-select custom-select-sm" name="status" required>

                  <option value="Approved">Approved</option>

                  <option value="Unapproved">Unapproved</option> 

                </select>

                <div class="invalid-feedback">

                  Please choose a username.

                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button class="btn btn-primary" type="submit">Submit form</button>

          </div>

        </form>

      </div> 

    </div>

  </div>

</div>





<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">Add User</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <?php 

          $attributes = array('class' => 'needs-validation', 'novalidate' => '');

          echo form_open('admin/adduser', $attributes);

        ?> 

          <div class="">

            <div class="form-row">

              <label for="username">User Name</label>

              <input type="text" name="username" class="form-control" id="username" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="email">Email</label>

              <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="phone">Phone Number</label>

              <div class="input-group"> 

                <input type="text" class="form-control" name="phone" id="phone" placeholder="" aria-describedby="inputGroupPrepend" required>

                <div class="invalid-feedback">

                  Please choose a username.

                </div>

              </div>

            </div>

            <div class="form-row">

              <label for="password">Create Password</label>

              <div class="input-group"> 

                <input type="text" class="form-control" name="password" id="password" placeholder="" aria-describedby="inputGroupPrepend" required>

                <div class="invalid-feedback">

                  Please choose a username.

                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button class="btn btn-primary" type="submit">Submit form</button>

          </div>

        </form>

      </div> 

    </div>

  </div>

</div>







<script>
  $(document).ready(function(){
    $('#datatable').DataTable( { 
      data: <?php echo json_encode(array_values($allsubs1)); ?>,
    } ); 
  });
  // Example starter JavaScript for disabling form submissions if there are invalid fields

  (function() {

    'use strict';

    window.addEventListener('load', function() {

      // Fetch all the forms we want to apply custom Bootstrap validation styles to

      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission

      var validation = Array.prototype.filter.call(forms, function(form) {

        form.addEventListener('submit', function(event) {

          if (form.checkValidity() === false) {

            event.preventDefault();

            event.stopPropagation();

          }

          form.classList.add('was-validated');

        }, false);

      });

    }, false);

  })();

</script>