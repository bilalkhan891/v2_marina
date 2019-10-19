 

<div class="col-sm-12">

  <div class="row">

    <div class="col-sm-12">

      <h4><?php echo $title." ".$marinauser; ?></h4> <br>

      <?php echo $msg; ?>



    </div>

  	<div class="col-md-8">

      <div id="msg"></div>

  	    <h2>Advertiser Category</h2>  

  	</div>

    <div class="col-md-4">

    	<a class="btn btn-info white-text col-md-4" href="#!" data-toggle="modal" data-target="#addCat">Add Category</a> 

    </div>

  </div>



 

  <div class="row">

    <ul class="list-group col-sm-9" id="myUL">

    <input type="text" class="form-control " id="myInput" onkeyup="searchList()" placeholder="Search for names.." title="Type in a name">

    <br>

    	<?php 



        if (empty($data)) {

          echo '<h3>No records to show</h3>';

        } else {



          foreach ($data as $row) {?>



            <li class="list-group-item">

              
 

                <a href="<?php echo base_url('admin/businesses/'.$row['id']).'/'.urlencode($row['name']).'/'.$row['typeId']; ?>" class="search float-left text-black" ><?php echo $row['name']; ?></a>
 

 

              <div class="float-right"> 
 

                <a  class="btn btn-danger ba-btn" href="#!"  data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['id']; ?>" >Delete 

                  <i class="fas fa-trash text-white"></i>

                </a>

              </div>

            </li> 



        <?php } ?>

      <?php } ?>

    </ul>  

  </div>

</div> 



 <!-- Modal -->

 <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

   <div class="modal-dialog" role="document">

     <div class="modal-content">

       <div class="modal-header">

         <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">

           <span aria-hidden="true">&times;</span>

         </button>

       </div>

       <div class="modal-body">

         <form action="<?php echo base_url('admin/addtypes'); ?>" method="post" accept-charset="utf-8">

            <label for="name">Entery Category</label>

           <input type="text" name="name" class="form-control" id="name">

           <input type="text" name="marinaid" class="form-control" id="marinaid" value="<?php echo $marinaid; ?>" style="display: none;">

           <input type="text" name="marinauser" class="form-control" id="marinauser" value="<?php echo $marinauser; ?>" style="display: none;">

          <br>

       

           <div class="modal-footer">

             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

             <button type="submit" type="button" class="btn btn-primary">Add</button>

           </div>

         </form>

       </div>

     </div>

   </div>

 </div>



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

       <p class="text-danger">Warning: This will delete all the businesses related to this category.</p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a type="button" id="delbtn" class="btn btn-danger" href="">Delete</a>

      </div>

    </div>

  </div>

</div>



<script>

 



$('#exampleModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget); // Button that triggered the modal

  var recipient = button.data('whatever'); // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this);



  modal.find('#delbtn').attr("href", '<?php echo base_url("admin/deletetype/"); ?>'+ recipient); 

}); 
 

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

