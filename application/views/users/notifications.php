<h1><?php echo $title; ?></h1>
 

<style type="text/css">.bootstrap-datetimepicker-widget table td.day {height: 45px;line-height: 45px;width: 51px; }</style>
<br>
<div id="msg"></div>
<div class="row"><?php echo $msg; ?></div>
<br>
<div class="row">
    <!-- <input type="text"  class="form-control" name="title" id="title" style="display: none;" />  -->
	<div class="col-md-6"> 
		<form method="post" id="pushNoti" class="row"> 
	        <div class="col-sm-12">
	            <div class="form-group">
	            	<label for="timepicker">Enter Title, Max 60 Characters</label>
	                <div class="input-group date">
	                    <input type="text"  class="form-control" name="title" id="title" maxlength="60"/> 
	                </div>
	                <h6 class="float-right" id="count_title"></h6> 
	            </div>
	        </div>
	        <div class="col-sm-12">
	        	<label for="timepicker">Enter text for notification, Max 200 characters</label>
	            <div class="form-group">
	                <div class="input-group date">
	                    <textarea class="form-control" name="message" id="message" maxlength="200"></textarea>
	                </div>
	                <h6 class="float-right" id="count_message"></h6> 
	            </div>
	        </div>
	        <input type="submit" class="btn btn-info" value="Push Notification">
	    </form>
	    <script type="text/javascript">
	        // $(function () {
	        //     $('#datetimepicker3').datetimepicker({
	        //         format: 'LT'
	        //     });
	        //     $('#datetimepicker4').datetimepicker({
	        //         format: 'L'
	        //     });
	        // });
	    </script> 
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h3 class="float-left">Notification History</h3>
				<a class="btn btn-warning float-right" onclick="updateRecord()" href="javascript:;"> 
					<i class="fas fa-sync"></i>
					<span class="mr-1">Refresh Report</span>
				</a>
			</div>
		</div>
		<div class="row">
			<dir class="col-md-12">
				<div id="msg2"></div>
			</dir>
		</div>
		<div class="card-columns" id="records"> 
		    <?php 
		    	if (empty($data)) {
		    		echo '<span class="alert alert-secondary" role="alert">No records found.</span>';
		    	} else {
			    	foreach ($data as $row) {
			    		echo '<div class="card"><div class="card-body">';

			    		echo '<h5 class="card-title">'.$row['title'].'</h5>';
			    		echo '<p class="card-text">'.$row['message'].'</p>';
			    		echo '<p class="card-text"><small class="text-muted">Sent date: '.$row['date'].'</small></p>';
			    		echo '<footer class="blockquote-footer"><small>Posted by: <cite title="Source Title"></cite></small>'.$row["username"].' </footer></small></p>'; 
			    		echo '</div></div>';
			    	}
			    }

		     ?>
		</div>
	</div> 
</div>

<style type="text/css">
	h6#count_title, h6#count_message {
	    background: #ff00007a;
	    color: white;
	    padding: 5px;
	    margin-right: 11px;
	    margin-top: -31px;
	    font-size: 0.65em;
	    border-radius: 20px;
	    z-index: 999;
	    position: relative;
	}
</style>
<script type="text/javascript">
	
function updateRecord() {

    $('#msg2').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

    $.get( "<?php echo base_url('usermain/getnoti'); ?>", '', 

    	function(data,status){
            if (status == 'success'){

              // $('#records').html(data);
              $('#records').html(data); 
              $('#msg2').html('<br><span class="alert alert-success">Updated</span><br>'); 

            } else {
              $('#msg2').html('<br><span class="alert alert-danger">Oops! Something went wrong.</span><br>'); 
            }
    });
}	

	$(function() {
	    // Get the form.
	    var form = $('#pushNoti');

	    // Get the messages div.
	    var formMessages = $('#msg');

	    $(form).submit(function(event) {
         
		    // Stop the browser from submitting the form.
		    event.preventDefault();
		    var ajaxdata = '';
		    // Serialize the form data.
		    var formData = $(form).serialize();
		    

		    $('#msg').html('<br><div class="d-flex align-items-center"><strong>Please Wait, Processing</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div><br>');

		    $.post( "<?php echo base_url('usermain/sendNoti'); ?>", formData, 

	        	function(data,status){ 
		            if (status == 'success'){

		              $('#msg').html(data);
		              // $('#msg').html('<br><span class="alert alert-success">Successfully Sent</span><br>');
		              // $(':input[type=text]','#pushNoti').val('');
		              // $('#message').val('');
		              // $('#count_title').html('60');
		              // $('#count_message').html('200');
		              // setTimeout(function(){
		              //   location.reload();
		              // }, 500 );
		            } else {
		              // $(':input[type=text]','#pushNoti').val('');
		              // $('#count_title').html('60');
		              // $('#message').val('');
		              // $('#count_message').html('200');
		              $('#msg').html(data+status);
		            }
		    });
	    });
	});

	var message_max = 200;
	$('#count_message').html(message_max);

	$('#message').keyup(function() {
	  var message_length = $("#message").val().length;
	  var message_remaining = message_max - message_length;
	  
	  $('#count_message').html(message_remaining);
	});

	var title_max = 60;
	$('#count_title').html(title_max);

	$('#title').keyup(function() {
	  var title_length = $('#title').val().length; 
	  var title_remaining = title_max - title_length;
	  
	  $('#count_title').html(title_remaining);
	});

</script>