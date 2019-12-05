<!-- Button trigger modal -->
<div class="float-right">
  <span class="rates-not-used rates-note">These items not used in calculations</span>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#boatlenghtModal">Boat Lenght</button>
   
</div>
<!-- Button trigger modal -->


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
         echo form_open('usermain/calcrates', $attributes);
        ?> 

          <div class="form-row">
            <div class="input-group input-group-sm mb-3"> 
              <div class="input-group-prepend">
                <span class="input-group-text" id="lengthunit">Meters</span>
              </div>
              <input type="text" name="boatLength" value=""  class="form-control form-control-sm" id="boatLength" required  aria-label="Small" aria-describedby="lengthunit">
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mBoatLength" id="meter" value="meter" checked>
            <label class="form-check-label" for="exampleRadios1">
              Length in Meters
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mBoatLength" id="feet" value="feet">
            <label class="form-check-label" for="feet">
              Length in Feet
            </label>
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
 

<?php 
$i = 1;
?> 
<table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr> 
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead> 
  <tbody> 
  <?php 
  echo "<h5>Annual</h5>";
  $annual = $data['annual']; //print_r($annual[0]);?> 
      <tr> 
        <td>ANNUAL (SINGLE PAYMENT)</td>
        <td>£<?php echo number_format($annual[0]['singlePayment'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>ANNUAL (INSTALMENTS)</td>
        <td>£<?php echo number_format($annual[0]['installments'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>ANNUAL SMALL BOATS (SINGLE PAYMENT)</td>
        <td>£<?php echo number_format($annual[0]['smallBoatsSingle'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>ANNUAL SMALL BOATS (INSTALMENTS)</td>
        <td>£<?php echo number_format($annual[0]['smallBoatsInstallments'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>AIRBERTH / TENDER AFLOAT</td>
        <td>£<?php echo number_format($annual[0]['airberth'], 2, '.',''); ?></td>
      </tr>   
  </tbody>  
 </table>

<!-- Seasonal (summer) -->
<h5>SEASONAL (SUMMER)</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
  <tbody>  
  <?php 
  $summer = $data['summer']; //print_r($number_format(summer[0]);?> 
       <thead> 
         <tr> 
           <th>Name</th>
           <th>Rates</th>
         </tr>
       </thead>  
      <tr> 
        <td>3 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['3months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>4 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['4months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>5 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['5months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>6 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['6months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>90 DAY</td>
        <td>£<?php echo number_format($summer[0]['90days'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 3 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['sb3months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 4 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['sb4months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 5 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['sb5months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 6 MONTHS</td>
        <td>£<?php echo number_format($summer[0]['sb6months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 90 DAY</td>
        <td>£<?php echo number_format($summer[0]['sb90days'], 2, '.',''); ?></td>
      </tr>   
  </tbody>  
</table>


<!-- Seasonal (visitor) -->
<h5>SEASONAL (WINTER)</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $winter = $data['winter']; //print_r($number_format(winter[0]);?>
       
      <tr> 
        <td>3 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['3months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>4 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['4months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>5 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['5months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>6 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['6months'], 2, '.',''); ?></td>
      </tr> 
      <tr>
      <tr> 
        <td>SB 3 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['sb3months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 4 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['sb4months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 5 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['sb5months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>SB 6 MONTHS</td>
        <td>£<?php echo number_format($winter[0]['sb6months'], 2, '.',''); ?></td>
      </tr>  
  </tbody>  
</table>


<!-- Visitor -->
<h5>Visitor</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $visitor = $data['visitor']; //print_r($number_format(visitor[0]);?>
       
      <tr> 
        <td>DAILY</td>
        <td>£<?php echo number_format($visitor[0]['daily'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>WEEKLY</td>
        <td>£<?php echo number_format($visitor[0]['weekly'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>4 WEEKS</td>
        <td>£<?php echo number_format($visitor[0]['4weeks'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>28 DAY BUNDLE</td>
        <td>£<?php echo number_format($visitor[0]['28day'], 2, '.',''); ?></td>
      </tr>
  </tbody>  
</table>



<!-- TAWE + HARBOUR DUES -->
<h5>TAWE + HARBOUR DUES</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $harbour = $data['harbour'];  //print_r($number_format(harbour[0]);?>
       
      <tr> 
        <td>TAWE BARRAGE FEE (ANNUAL)</td>
        <td>£<?php echo number_format($harbour[0]['annual'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>TAWE BARRAGE FEE (6 MONTHS)</td>
        <td>£<?php echo number_format($harbour[0]['6months'], 2, '.',''); ?></td>
      </tr>
      <tr> 
        <td>TAWE BARRAGE FEE (5 MONTHS)</td>
        <td>£<?php echo number_format($harbour[0]['5months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>TAWE BARRAGE FEE (4 MONTHS)</td>
        <td>£<?php echo number_format($harbour[0]['4months'], 2, '.',''); ?></td>
      </tr> 
      <tr> 
        <td>TAWE BARRAGE FEE (3 MONTHS)</td>
        <td>£<?php echo number_format($harbour[0]['3months'], 2, '.',''); ?></td>
      </tr>
      <tr> 
        <td>HARBOUR DUES</td>
        <td>£<?php echo number_format($harbour[0]['harbourdues'], 2, '.',''); ?></td>
      </tr>
  </tbody>  
</thead>
</table>


<!-- STORAGE -->
<h5>STORAGE</h5>
<table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $storage = $data['storage'];   //print_r($number_format(storage[0]);?>
       
      <tr  class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>WEEKLY</td>
        <td>£<?php echo number_format($storage[0]['weekly'], 2, '.',''); ?></td>
      </tr>  
  </tbody>  
</table>

<!-- HOIST -->
<h5>HOIST</h5>
<table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $hoist = $data['hoist']; //print_r($number_format(hoist[0]);?>
       
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use.">
        <td>LIFT OUT 6.1 - 7.6</td>
        <td>£<?php echo number_format($hoist[0]['liftout_61_76'], 2, '.',''); ?></td>
      </tr>  
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LIFT OUT 7.7 - 25 TON</td>
        <td>£<?php echo number_format($hoist[0]['liftout_77_25'], 2, '.',''); ?></td>
      </tr> 
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LAUNCH OFF 6.1 - 7.6</td>
        <td>£<?php echo number_format($hoist[0]['launchoff_61_76'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LAUNCH OFF 7.7 - 25 TON</td>
        <td>£<?php echo number_format($hoist[0]['launchoff_77_25'], 2, '.',''); ?></td>
      </tr> 
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>2 WEEK 6.1 - 7.6</td>
        <td>£<?php echo number_format($hoist[0]['2week_61_76'], 2, '.',''); ?></td>
      </tr> 
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>2 WEEK 7.7 - 25 TON</td>
        <td>£<?php echo number_format($hoist[0]['2week_77_25'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LHR (1HR)</td>
        <td>£<?php echo number_format($hoist[0]['lhr_1hr'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LHR (2HR)</td>
        <td>£<?php echo number_format($hoist[0]['lhr_2hr'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>TOW</td>
        <td>£<?php echo number_format($hoist[0]['tow'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>STEP MAST</td>
        <td>£<?php echo number_format($hoist[0]['step_mast'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>LIFT ENGINE</td>
        <td>£<?php echo number_format($hoist[0]['liftengine'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>BOAT MOVER</td>
        <td>£<?php echo number_format($hoist[0]['boatMover'], 2, '.',''); ?></td>
      </tr>
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>DINGHY LAUNCH</td>
        <td>£<?php echo number_format($hoist[0]['dinghyLaunch'], 2, '.',''); ?></td>
      </tr>
  </tbody>  
</table>



<!-- Electricity -->
<h5>Electricity</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $electricity = $data['electricity']; //print_r($number_format(electricity[0]);?>
       
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>MAINSLINE</td>
        <td>£<?php echo number_format($electricity[0]['mainsline'], 2, '.',''); ?></td>
      </tr>  
  </tbody>  
</table>




<!-- VAT RATES -->
<h5>VAT RATES</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $vatrates = $data['vatrates']; //print_r($number_format(vatrates[0]);?>
       
      <tr class=""> 
        <td>NORMAL</td>
        <td><?php echo number_format($vatrates[0]['normal'], 2, '.',''); ?>%</td>
      </tr>  
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>HEATING FUEL</td>
        <td><?php echo number_format($vatrates[0]['heatingFuel'], 2, '.',''); ?>%</td>
      </tr>  
  </tbody>  
</table>

<!-- PREMIUMS AND DISCOUTS -->
<h5>PREMIUMS AND DISCOUNTS</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $premiumsanddiscounts = $data['premiumsanddiscounts']; //print_r($number_format(premiumsanddiscounts[0]);?>
       
      <tr class=""> 
        <td>T & U DISCOUNTS</td>
        <td><?php echo number_format($premiumsanddiscounts[0]['TUdiscounts'], 2, '.',''); ?>%</td>
      </tr>  
      <tr class=""> 
        <td>90 DAY PREMIUM</td>
        <td><?php echo number_format($premiumsanddiscounts[0]['90daysPremium'], 2, '.',''); ?>%</td>
      </tr> 
      <tr class=""> 
        <td>LARGE BOAT LENGTH</td>
        <td><?php echo number_format($premiumsanddiscounts[0]['largeBoatLength'], 2, '.',''); ?>M</td>
      </tr>  
      <tr class=""> 
        <td>LARGE BOAT PREMIUM</td>
        <td><?php echo number_format($premiumsanddiscounts[0]['largeBoatPremium'], 2, '.',''); ?>%</td>
      </tr>  
  </tbody>  
</table>


<!-- CREDIT CARD SURCHARGE -->
<h5>CREDIT CARD SURCHARGE</h5>
 <table class="table table-condensed table-striped table-hover">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Rates</th>
    </tr>
  </thead>
  <tbody>  
  <?php 
  $creditcardsurcharge = $data['creditcardsurcharge']; //print_r($number_format(creditcardsurcharge[0]);?>
       
      <tr class="rates-not-used" data-toggle="tooltip" data-placement="top" title="Not in use."> 
        <td>CC SURCHARGE</td>
        <td><?php echo number_format($creditcardsurcharge[0]['ccSurcharge'], 2, '.',''); ?>%</td>
      </tr>     
  </tbody>  
</table>





 



<script>
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







