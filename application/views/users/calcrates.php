 

<h1 class="alert-info">Rates for boat length: <?php echo $data['boatLength']; ?></h1>

<table class="table table-condensed table-striped table-hover">   
  <thead> 
    <tr> 
      <th>Name</th>
      <th>Rates</th>
     </tr>
  </thead>
  <tbody>     

    <?php if($data['value1'] != "N/A") { ?>
      <tr> 
        <td>Annual 1 Advance Payment</td>
        <td>£<?php echo $data['value1']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value2'] != "N/A") { ?>
      <tr> 
        <td>Annual Monthly Direct Debit</td>
        <td>£<?php echo $data['value2']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value3'] != "N/A") { ?>
      <tr> 
        <td>''T' and 'U' Pontoon - Annual 1 Advance Payment - 20% Discount</td>
        <td>£<?php echo $data['value3']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value4'] != "N/A") { ?>
      <tr> 
        <td>''T' and 'U' Pontoon - Annual Monthly Direct Debit - 20% Discount</td>
        <td>£<?php echo $data['value4']; ?></td>
      </tr> 
    <?php } ?>
    
    </tbody>
</table>





<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value5'] != "N/A") { ?>
      <tr> 
        <td>Small Boat 1 Advance Payment</td>
        <td>£<?php echo $data['value5']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value6'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Monthly Direct Debit</td>
        <td>£<?php echo $data['value6']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value7'] != "N/A") { ?>
      <tr> 
        <td>'T' and 'U' Pontoon / Small Boat Basin - Small Boat 1 Advance Payment - 20% Discount</td>
        <td>£<?php echo $data['value7']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value8'] != "N/A") { ?>
      <tr> 
        <td>'T' and 'U' Pontoon / Small Boat Basin - Small Boat Monthly Direct Debit - 20% Discount</td>
        <td>£<?php echo $data['value8']; ?></td>
      </tr> 
    <?php } ?>
    
    </tbody>
</table>


<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value9'] != "N/A") { ?>
      <tr> 
        <td>Airberth Afloat * / Tender Afloat **</td>
        <td>£<?php echo $data['value9']; ?></td>
      </tr>
    <?php } ?>
    
    </tbody>
</table>


<table class="table table-condensed table-striped table-hover"> 
  <tbody>     






    <?php if($data['value10'] != "N/A") { ?>
      <tr> 
        <td>Summer 3 Months</td>
        <td>£<?php echo $data['value10']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value11'] != "N/A") { ?>
      <tr> 
        <td>Summer 4 Months</td>
        <td>£<?php echo $data['value11']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value12'] != "N/A") { ?>
      <tr> 
        <td>Summer 5 Months</td>
        <td>£<?php echo $data['value12']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value13'] != "N/A") { ?>
      <tr> 
        <td>Summer 6 Months</td>
        <td>£<?php echo $data['value13']; ?></td>
      </tr> 
    <?php } ?>
    
    <?php if($data['value14'] != "N/A") { ?>
      <!-- <tr> 
        <td>90 Days ***</td>
        <td>£<?php //echo $data['value14']; ?></td>
      </tr> --> 
    <?php } ?>
    
    </tbody>
</table>


<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value15'] != "N/A") { ?>
      <tr> 
        <td>Winter 3 Months</td>
        <td>£<?php echo $data['value15']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value16'] != "N/A") { ?>
      <tr> 
        <td>Winter 4 Months</td>
        <td>£<?php echo $data['value16']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value17'] != "N/A") { ?>
      <tr> 
        <td>Winter 5 Months</td>
        <td>£<?php echo $data['value17']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value18'] != "N/A") { ?>
      <tr> 
        <td>Winter 6 Months</td>
        <td>£<?php echo $data['value18']; ?></td>
      </tr>   
    <?php } ?>
    
    </tbody>
</table>


<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value19'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Summer 3 Months</td>
        <td>£<?php echo $data['value19']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value20'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Summer 4 Months</td>
        <td>£<?php echo $data['value20']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value21'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Summer 5 Months</td>
        <td>£<?php echo $data['value21']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value22'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Summer 6 Months</td>
        <td>£<?php echo $data['value22']; ?></td>
      </tr> 
    <?php } ?>
    <?php if($data['value23'] != "N/A") { ?>
      <!-- <tr> 
        <td>Small Boat 90 Days ***</td>
        <td>£<?php //echo $data['value23']; ?></td>
      </tr> -->   
    <?php } ?>
    
    </tbody>
</table>


<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value24'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Winter 3 Months</td>
        <td>£<?php echo $data['value24']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value25'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Winter 4 Months</td>
        <td>£<?php echo $data['value25']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value26'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Winter 5 Months</td>
        <td>£<?php echo $data['value26']; ?></td>
      </tr> 
    <?php } ?>
    <?php if($data['value27'] != "N/A") { ?>
      <tr> 
        <td>Small Boat Winter 6 Months</td>
        <td>£<?php echo $data['value27']; ?></td>
      </tr>   
    <?php } ?>
    
    </tbody>
</table>

<table class="table table-condensed table-striped table-hover"> 
  <tbody>     

    <?php if($data['value28'] != "N/A") { ?>
      <tr> 
        <td>Visitor Daily</td>
        <td>£<?php echo $data['value28']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value29'] != "N/A") { ?>
      <tr> 
        <td>Visitor Weekly</td>
        <td>£<?php echo $data['value29']; ?></td>
      </tr>
    <?php } ?>
    <?php if($data['value30'] != "N/A") { ?>
      <tr> 
        <td>Visitor 4 Weeks</td>
        <td>£<?php echo $data['value30']; ?></td>
      </tr> 
    <?php } ?>
    <?php if($data['value31'] != "N/A") { ?>
      <tr> 
        <td>Visitor 28 Day Bundle</td>
        <td>£<?php echo $data['value31']; ?></td>
      </tr>   
    <?php } ?>
    
    </tbody>
</table>
