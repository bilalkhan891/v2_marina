<!-- Button trigger modal -->
<div class="float-right">
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">Update Values</button>
</div>
<!-- Button trigger modal -->
<?php echo $msg; ?><br>

<div id="result">
    <h5>Update Berthing Rates</h5>
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Values</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($dbValues as $key => $value) { ?>
               <tr>
                   <td>
                    <?php echo str_replace('_', ' ', $key) ?> 
                       
                   </td>
                    <td>
                        <?php echo $value ?>
                        
                    </td>
               </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Values</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
          $attributes = array('class' => 'needs-validation', 'novalidate' => '');
          echo form_open('rates/updatebristolrates/update', $attributes);
         ?>

                <div class="form-row">
                    <?php foreach ($dbValues as $key => $value) { ?>
                    <div class="col-md-12">
                        <label for="<?php echo $key ?>"><?php echo str_replace('_', ' ', $key) ?></label>
                        <input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" class="form-control form-control-sm" id="<?php echo $key ?>" required>
                        <div class="invalid-feedback">
                            Fill this field.
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
                <?php echo form_close(); ?>


            </div>
        </div>
    </div>
</div>





<script>
    $(document).ready(function() {
        $('input:radio[name="btype"]').change(
            function() {
                if (this.checked && this.value == 'Annual') {
                    $('#daysField').hide();
                } else if ((this.checked && this.value == 'Visiting')) {
                    $('#daysField').show();
                }
            });
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (function() {
    //   'use strict';
    //   window.addEventListener('load', function() {
    //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //     var forms = document.getElementsByClassName('needs-validation');
    //     // Loop over them and prevent submission
    //     var validation = Array.prototype.filter.call(forms, function(form) {
    //       form.addEventListener('submit', function(event) {
    //         if (form.checkValidity() === false) {
    //           event.preventDefault();
    //           event.stopPropagation();
    //         }
    //         form.classList.add('was-validated');
    //       }, false);
    //     });
    //   }, false);
    // })();
</script>