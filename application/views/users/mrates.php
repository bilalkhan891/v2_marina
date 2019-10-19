<!-- Button trigger modal -->
<div class="float-right">
  <span class="rates-not-used rates-note">These items not used in calculations</span>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#boatlenghtModal">Boat Lenght</button>
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">Update Values</button> 
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







<?php $this->load->helper('form'); ?>

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
          echo form_open('usermain/updaterates', $attributes);
        ?> 
        <form action="user/updaterates" class="needs-validation" novalidate>

          <h4>Annual</h4>

              <input type="hidden" name="annualid" value="<?php echo $annual[0]['id'] ?>"  class="form-control form-control-sm" id="annualid"  value="" required>

          <div class="form-row">
            <div class="col-md-12">
              <label for="singlePayment">ANNUAL (SINGLE PAYMENT)</label>
              <input type="text" name="singlePayment" value="<?php echo $annual[0]['singlePayment'] ?>"  class="form-control form-control-sm" id="singlePayment"  value="" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div>
            <div class="col-md-12">
              <label for="installments">ANNUAL (INSTALMENTS)</label>
              <input type="text" name="installments" value="<?php echo $annual[0]['installments'] ?>" class="form-control form-control-sm" id="installments" value="" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div>
            <div class="col-md-12">
              <label for="smallBoatsSingle">ANNUAL SMALL BOATS (SINGLE PAYMENT)</label>
              <div class="input-group"> 
                <input type="text" name="smallBoatsSingle" value="<?php echo $annual[0]['smallBoatsSingle'] ?>" class="form-control form-control-sm" id="smallBoatsSingle"     required>
                <div class="invalid-feedback">
                  Fill this field.
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <label for="smallBoatsInstallments">ANNUAL SMALL BOATS (INSTALMENTS)  </label>
              <input type="text" name="smallBoatsInstallments" value="<?php echo $annual[0]['smallBoatsInstallments'] ?>" class="form-control form-control-sm" id="smallBoatsInstallments" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="airberth">AIRBERTH / TENDER AFLOAT</label>
              <input type="text" name="airberth" value="<?php echo $annual[0]['airberth'] ?>" class="form-control form-control-sm" id="airberth" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 

          <hr>
          <h4>SEASONAL (SUMMER)</h4>
              <input type="hidden" name="summerid" value="<?php echo $summer[0]['id'] ?>" class="form-control form-control-sm" id="summerid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="summer3months">3 MONTHS  </label>
              <input type="text" name="summer3months" value="<?php echo $summer[0]['3months'] ?>" class="form-control form-control-sm" id="summer3months" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="summersb3months">SB 3 MONTHS  </label>
              <input type="text" name="summersb3months" value="<?php echo $summer[0]['sb3months'] ?>" class="form-control form-control-sm" id="summersb3months" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 

          <hr>
          <h4>SEASONAL (WINTER)</h4>

              <input type="hidden" name="winterid" value="<?php echo $winter[0]['id'] ?>" class="form-control form-control-sm" id="winterid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="winter3months">3 MONTHS  </label>
              <input type="text" name="winter3months" value="<?php echo $winter[0]['3months'] ?>" class="form-control form-control-sm" id="winter3months" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="wintersb3months">SB 3 MONTHS  </label>
              <input type="text" name="wintersb3months" value="<?php echo $winter[0]['sb3months'] ?>" class="form-control form-control-sm" id="winter3months" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 

          <hr>
          <h4>VISITOR</h4>

              <input type="hidden" name="visitorid" value="<?php echo $visitor[0]['id'] ?>" class="form-control form-control-sm" id="visitorid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="visitordaily">DAILY</label>
              <input type="text" name="visitordaily" value="<?php echo $visitor[0]['daily'] ?>" class="form-control form-control-sm" id="visitordaily" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="visitorweekly">WEEKLY</label>
              <input type="text" name="visitorweekly" value="<?php echo $visitor[0]['weekly'] ?>" class="form-control form-control-sm" id="visitorweekly" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="visitor4weeks">4 WEEKS</label>
              <input type="text" name="visitor4weeks" value="<?php echo $visitor[0]['4weeks'] ?>" class="form-control form-control-sm" id="visitor4weeks" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="visitor28day">28 DAY BUNDLE</label>
              <input type="text" name="visitor28day" value="<?php echo $visitor[0]['28day'] ?>" class="form-control form-control-sm" id="visitor28day" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 

          <hr>
          <h4>TAWE + HARBOUR DUES</h4>

              <input type="hidden" name="harbourid" value="<?php echo $harbour[0]['id'] ?>" class="form-control form-control-sm" id="harbourid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="harbourannual">TAWE BARRAGE FEE (ANNUAL)</label>
              <input type="text" name="harbourannual" value="<?php echo $harbour[0]['annual'] ?>" class="form-control form-control-sm" id="harbourannual" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="harbourdues">HARBOUR DUES</label>
              <input type="text" name="harbourdues" value="<?php echo $harbour[0]['harbourdues'] ?>" class="form-control form-control-sm" id="harbourdues" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>   

          <hr>
          <h4>STORAGE</h4>

              <input type="hidden" name="storageid" value="<?php echo $storage[0]['id'] ?>" class="form-control form-control-sm" id="storageid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="storageweekly">WEEKLY</label>
              <input type="text" name="storageweekly" value="<?php echo $storage[0]['weekly'] ?>" class="form-control form-control-sm" id="storageweekly" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>    
  

          <hr>
          <h4>HOIST</h4>

              <input type="hidden" name="hoistid" value="<?php echo $hoist[0]['id'] ?>" class="form-control form-control-sm" id="hoistid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="liftout_61_76">LIFT OUT 6.1 - 7.6</label>
              <input type="text" name="liftout_61_76" value="<?php echo $hoist[0]['liftout_61_76'] ?>" class="form-control form-control-sm" id="liftout_61_76" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="liftout_77_25">LIFT OUT 7.7 - 25 TON </label>
              <input type="text" name="liftout_77_25" value="<?php echo $hoist[0]['liftout_77_25'] ?>" class="form-control form-control-sm" id="liftout_77_25" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="launchoff_61_76">LAUNCH OFF 6.1 - 7.6  </label>
              <input type="text" name="launchoff_61_76" value="<?php echo $hoist[0]['launchoff_61_76'] ?>" class="form-control form-control-sm" id="launchoff_61_76" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="launchoff_77_25">LAUNCH OFF 7.7 - 25 TON </label>
              <input type="text" name="launchoff_77_25" value="<?php echo $hoist[0]['launchoff_77_25'] ?>" class="form-control form-control-sm" id="launchoff_77_25" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="2week_61_76">2 WEEK 6.1 - 7.6  </label>
              <input type="text" name="2week_61_76" value="<?php echo $hoist[0]['2week_61_76'] ?>" class="form-control form-control-sm" id="2week_61_76" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="2week_77_25">2 WEEK 7.7 - 25 TON </label>
              <input type="text" name="2week_77_25" value="<?php echo $hoist[0]['2week_77_25'] ?>" class="form-control form-control-sm" id="2week_77_25" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="lhr_1hr">LHR (1HR) </label>
              <input type="text" name="lhr_1hr" value="<?php echo $hoist[0]['lhr_1hr'] ?>" class="form-control form-control-sm" id="lhr_1hr" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="lhr_2hr">LHR (2HR) </label>
              <input type="text" name="lhr_2hr" value="<?php echo $hoist[0]['lhr_2hr'] ?>" class="form-control form-control-sm" id="lhr_2hr" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="tow">TOW</label>
              <input type="text" name="tow" value="<?php echo $hoist[0]['tow'] ?>" class="form-control form-control-sm" id="tow" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="step_mast">STEP MAST </label>
              <input type="text" name="step_mast" value="<?php echo $hoist[0]['step_mast'] ?>" class="form-control form-control-sm" id="step_mast" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="demast">LIFT ENGINE </label>
              <input type="text" name="demast" value="<?php echo $hoist[0]['demast'] ?>" class="form-control form-control-sm" id="demast" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="liftengine">BOAT MOVER  </label>
              <input type="text" name="liftengine" value="<?php echo $hoist[0]['liftengine'] ?>" class="form-control form-control-sm" id="liftengine" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="boatMover">DINGHY LAUNCH </label>
              <input type="text" name="boatMover" value="<?php echo $hoist[0]['boatMover'] ?>" class="form-control form-control-sm" id="boatMover" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="dinghyLaunch">DINGHY LAUNCH </label>
              <input type="text" name="dinghyLaunch" value="<?php echo $hoist[0]['dinghyLaunch'] ?>" class="form-control form-control-sm" id="dinghyLaunch" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>  

          <hr>
          <h4>Electricity</h4>
          
              <input type="hidden" name="electricityid" value="<?php echo $electricity[0]['id'] ?>" class="form-control form-control-sm" id="electricityid" required >
          <div class="form-row">
            <div class="col-md-12">
              <label for="mainsline">MAINSLINE</label>
              <input type="text" name="mainsline" value="<?php echo $electricity[0]['mainsline'] ?>" class="form-control form-control-sm" id="mainsline" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>    
          
          <hr>
          <h4>VAT RATES</h4>

              <input type="hidden" name="vatratesid" value="<?php echo $vatrates[0]['id'] ?>" class="form-control form-control-sm" id="vatratesid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="vatratesnormal">NORMAL</label>
              <input type="text" name="vatratesnormal" value="<?php echo $vatrates[0]['normal'] ?>" class="form-control form-control-sm" id="vatratesnormal" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="heatingFuel">HEATING FUEL</label>
              <input type="text" name="heatingFuel" value="<?php echo $vatrates[0]['heatingFuel'] ?>" class="form-control form-control-sm" id="heatingFuel" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>    
             
          
          <hr>
          <h4>PREMIUMS AND DISCOUTS</h4>

              <input type="hidden" name="premiumsanddiscountsid" value="<?php echo $premiumsanddiscounts[0]['id'] ?>" class="form-control form-control-sm" id="premiumsanddiscountsid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="TUdiscounts">T & U DISCOUNTS</label>
              <input type="text" name="TUdiscounts" value="<?php echo $premiumsanddiscounts[0]['TUdiscounts'] ?>" class="form-control form-control-sm" id="TUdiscounts" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="90daysPremium">90 DAY PREMIUM</label>
              <input type="text" name="90daysPremium" value="<?php echo $premiumsanddiscounts[0]['90daysPremium'] ?>" class="form-control form-control-sm" id="90daysPremium" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="largeBoatLength">LARGE BOAT LENGTH </label>
              <input type="text" name="largeBoatLength" value="<?php echo $premiumsanddiscounts[0]['largeBoatLength'] ?>" class="form-control form-control-sm" id="largeBoatLength" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div> 
          <div class="form-row">
            <div class="col-md-12">
              <label for="largeBoatPremium">LARGE BOAT PREMIUM</label>
              <input type="text" name="largeBoatPremium" value="<?php echo $premiumsanddiscounts[0]['largeBoatPremium'] ?>" class="form-control form-control-sm" id="largeBoatPremium" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
          </div>    
          
          <hr>
          <h4>CREDIT CARD SURCHARGE</h4>

              <input type="hidden" name="creditcardsurchargeid" value="<?php echo $creditcardsurcharge[0]['id'] ?>" class="form-control form-control-sm" id="creditcardsurchargeid" required >
          
          <div class="form-row">
            <div class="col-md-12">
              <label for="ccSurcharge">CC SURCHARGE</label>
              <input type="text" name="ccSurcharge" value="<?php echo $creditcardsurcharge[0]['ccSurcharge'] ?>" class="form-control form-control-sm" id="ccSurcharge" required>
              <div class="invalid-feedback">
                Fill this field.
              </div>
            </div> 
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







