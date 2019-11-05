<!-- Button trigger modal -->
<div class="float-right"> 
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#boatlenghtModal">Calculate</button>
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">Update Values</button> 
</div>
<!-- Button trigger modal -->
 <?php echo $msg;  ?><br>
<!-- Modal -->
<div class="modal fade" id="boatlenghtModal" tabindex="-1" role="dialog" aria-labelledby="boatlenghtModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="boatLenght">Enter Boat Length</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
         $attributes = array('class' => 'needs-validation', 'novalidate' => '');
         echo form_open('usermain/bristolRates', $attributes);
        ?>  
          <div class="form-row">
            <div class="input-group input-group-sm mb-3"> 
              <div class="input-group-prepend">
                <span class="input-group-text" id="lengthunit">Meters</span>
              </div>
              <input type="text" name="length" value=""  class="form-control form-control-sm" id="boatLength" required  aria-label="Small" aria-describedby="length">
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div class="col-4">Length</div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mBoatLength" id="meter" value="meter" checked>
                <label class="form-check-label" for="meter"> Meters </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mBoatLength" id="feet" value="feet">
                <label class="form-check-label" for="feet"> Feet </label>
              </div>
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div class="col-4">Multi Hull</div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="multihull" id="No" value="No" checked>
                <label class="form-check-label" for="No"> No </label>
              </div>
            </div> 
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="multihull" id="Yes" value="Yes" >
                <label class="form-check-label" for="Yes"> Yes </label>
              </div>
            </div> 
          </div>
          <hr>
          <div class="form-row">
            <div class="col-4">Berthing Type</div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="btype" id="annual" value="Annual">
                <label class="form-check-label" for="annual"> Annual </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="btype" id="visiting" value="Visiting" checked>
                <label class="form-check-label" for="visiting"> Visiting </label>
              </div>
            </div> 
          </div>
          <hr>
          <div style="padding-top: 5px;" class="input-group input-group-sm mb-3" id="daysField"> 
            <div class="input-group-prepend">
              <span class="input-group-text" for="days">Days</span>
            </div>
            <input type="number" name="days" value=""  onkeyup="if(parseInt(this.value)>21){ this.value =21 ; return false; }" class="form-control form-control-sm" placeholder="Max Days 21" max="21" id="days" aria-label="Small" aria-describedby="days">
            <div class="invalid-feedback">
              Fill this field.
            </div>
          </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Show Rates</button>
         </div> 
        <?php echo form_close(); ?>
      </div> 
    </div>
  </div>
</div>

<div id="result">
  <h5>Rates</h5>
  <table class="table table-condensed table-striped table-hover">   
    <thead>
      <?php if (isset($res)) {?>
        <tr>
          <th>Berthing Type</th>
          <th><?php if (isset($res['Class A Berthing'])) {
            echo "Annual";
          } else {
            echo "Visiting";
          } ?></th>
        </tr>
      <?php } else {
        echo "<br><br><br><br><h3 class='center green-text'>Click calculate button to fill the form.</h3><br><br><br><br>";
      } ?>
    </thead>
    <tbody>  
      <?php if (isset($res)) {
         if (isset($res['Rounded Boat Length'])) {
            foreach($res as $key => $value) {
              echo "<tr>";
              echo "<td>" . $key . "</td>";
              echo "<td>" . $value . "</td>";
              echo "</tr>";
            }
          } else {
            foreach($res as $key => $value) {
              echo "<tr>";
              echo "<td>" . $key . "</td>";
              echo "<td>" . $value . "</td>";
              echo "</tr>";
            }
          }
        }
       ?>
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
          echo form_open('usermain/updatebristolrates', $attributes);
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
$(document).ready(function(){  
  $('input:radio[name="btype"]').change(
    function(){
        if (this.checked && this.value == 'Annual') {
            $('#daysField').hide();
        } else if((this.checked && this.value == 'Visiting')){
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







