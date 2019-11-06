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

      <th scope="col"> Name</th>

      <th scope="col">Description</th> 

      <th scope="col">Action</th>

    </tr>

  </thead>

  <tbody>

  	<?php foreach ($data as $row) { ?>

      <tr>

        <th scope="row"><?php echo $row['role_id']; ?></th>

        <td><?php echo $row['role_name']; ?></td>

        <td><?php echo $row['role_description']; ?></td>
        <td class="row">

        	<a class="col-md-5 bg-info" href="#!" onclick="editRecord( '<?php echo $row['role_id']?>', '<?php echo $row['role_name']?>', '<?php echo $row['role_description']?>' )" title="Edit" data-toggle="modal" data-target=".update"><i class="fas fa-edit center text-white" type="javascript:;"></i></a>

        	<a class="col-md-5 bg-danger" onclick="return window.confirm('are you sure want to delete this?')" href="<?php echo base_url('Role/delete/'.$row['role_id']); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash center text-white"></i></a>

        </td>

      </tr>

    <?php } ?> 

  </tbody>

</table>



<script type="text/javascript">

  function editRecord(id, name, description){

    $('.update #id').val(id); 

    $('.update #name').val(name); 

    $('.update #description').val(description); 

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

          echo form_open('Role/update', $attributes);

        ?> 

          <div class="">

            <div class="form-row">

              <label for="username"> Name</label>

              <input type="hidden" name="id" class="form-control" id="id" placeholder="" value="" required>

              <input type="text" name="name" class="form-control" id="name" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="email">Description</label>

              <textarea name="description" class="form-control" id="description" placeholder="" value="" required></textarea>

              <div class="valid-feedback">

                Looks good!

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

        <h5 class="modal-title">Add Role</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <?php 

          $attributes = array('class' => 'needs-validation', 'novalidate' => '');

          echo form_open('Role/add', $attributes);

        ?> 

          <div class="">

            <div class="form-row">

              <label for="username"> Name</label>

              <input type="text" name="role_name" class="form-control" id="name" placeholder="" value="" required>

              <div class="valid-feedback">

                Looks good!

              </div>

            </div>

            <div class="form-row">

              <label for="email">Description</label>

              <textarea name="role_description" class="form-control" id="description" placeholder="" value="" required></textarea>

              <div class="valid-feedback">

                Looks good!

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