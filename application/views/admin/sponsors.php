<h3><?php echo urldecode($title); ?></h3> 

<!-- <a href="javascript:;" onclick="GoBackWithRefresh()"><i class="fas fa-arrow-left"></i> Bact</a> -->
 


<div id="msg"><br><br></div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php echo $msg; ?>
    </div>
  </div>
   
  <a class="btn btn-info white-text float-right" href="#!" data-toggle="modal" data-target="#addBusiness">Add Sponsor</a>

    
  <br>
  <br>
  <ul class="list-group" id="myUL">
    <input type="text" class="form-control " id="myInput" onkeyup="searchList()" placeholder="Search for names.." title="Type in a name">
    <br>
    <?php 

      if (empty($data)) {
        echo '<h3>No records to show</h3>';
      } else {

        foreach ($data as $row) {?>

          <li class="list-group-item">
            <a href="<?php echo base_url('admin/sponsor/'.$row['id'].'/'.$row['businessname']); ?>" class="search float-left text-black" ><?php echo $row['businessname']; ?></a> 
            <div class="float-right"> 
              <a class="search btn btn-info" style="padding: 3px 30px;" href="<?php echo base_url('admin/sponsor/'.$row['id'].'/'.$row['businessname']); ?>" title="View" data-placement="top" data-toggle="tooltip"><i class="far fa-eye text-white center"></i></a>
              
            </div>
          </li>

      <?php } ?>
    <?php } ?>
  </ul>  
</div> 

 <!-- Modal -->
 <div class="modal fade" id="addBusiness" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="<?php echo base_url('admin/submitSponsor'); ?>" id="ajax-from" method="post" class="needs-validation" enctype="multipart/form-data"> 
          
            <input type="text" value="<?php echo $marinaid; ?>" name="marinaid" class="form-control" id="marinaid" style="display: none;" > 
            <input type="text" value="<?php echo $marinauser; ?>" name="marinauser" class="form-control" id="marinauser" style="display: none;" >

            <div class="form-group">
              <label for="icon">Icon</label>
              <input type="file" class="form-control  form-control-sm" name="icon" id="icon">
            </div> 
            <div class="form-group">
              <label for="businessname">Business Name</label>
              <input type="text" class="form-control  form-control-sm capitalize" id="businessname" name="businessname" >
            </div>
            <div class="form-group">
              <label for="contacttitle">Contact Title</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="contacttitle" id="contacttitle" >
            </div>
            <div class="form-group">
              <label for="fstname">Contact 1st Name</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="fstname" id="fstname" >
            </div>
            <div class="form-group">
              <label for="surname">Contact Surname</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="surname" id="surname" >
            </div>
            <div class="form-group">
              <label for="address1">Address Line 1</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="address1" id="address1" >
            </div>
            <div class="form-group">
              <label for="address2">Address Line 2</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="address2" id="address2">
            </div>
            <div class="form-group">
              <label for="address3">Address Line 3</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="address3" id="address3">
            </div>
            <div class="form-group">
              <label for="postcode">Post Code</label>
              <input type="text" style="text-transform: uppercase;" class="form-control  form-control-sm" name="postcode" id="postcode" >
            </div>
            <div class="form-group">
              <label for="tel">Tel No</label>
              <input class="form-control  form-control-sm" name="tel" id="tel" >
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control  form-control-sm" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="website" id="website" >
            </div>
            <div class="form-group">
              <label for="mon">Monday</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="mon" id="mon" >
            </div>
            <div class="form-group">
              <label for="sat">Saturday</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="sat" id="sat" >
            </div>
            <div class="form-group">
              <label for="sun">Sunday</label>
              <input type="text" class="form-control  form-control-sm capitalize" name="sun" id="sun" >
            </div>
            <div class="form-group">
              <label for="lat">Lat</label>
              <input type="text" class="form-control  form-control-sm" name="lat" id="lat">
            </div>
            <div class="form-group">
              <label for="lng">Long</label>
              <input type="text" class="form-control  form-control-sm" name="lng" id="lng">
            </div>
            <div class="form-group">
              <label for="icon">Icon</label>
              <select class="form-control form-control-sm" name="typeId">
                <option value="">Select Position</option>
                <option value="1">Left</option>
                <option value="2">Right</option>
              </select>
            </div>
            <div class="form-group">
              <label for="msg">Message</label>
              <input type="text" class="form-control  form-control-sm" name="msg" id="msg">
            </div>
       
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" type="button" class="btn btn-primary">Add</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
<style type="text/css">
  .capitalize{
    text-transform : capitalize;
  }
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" id="delbtn" class="btn btn-danger" href="">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $("#myList li a.search").toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('whatever'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);

  modal.find('#delbtn').attr("href", '<?php echo base_url("admin/deletetype/"); ?>'+ recipient); 
});

 function GoBackWithRefresh() {
     if ('referrer' in document) {
         window.location = document.referrer;
         /* OR */
         //location.replace(document.referrer);
     } else {
         window.history.back();
     }
 }

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



function searchList() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

</script>
