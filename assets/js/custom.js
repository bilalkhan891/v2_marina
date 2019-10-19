/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
$(document).ready(function(){
	$('.navbar-brand').hide();
	$(function () { // initalize bootstrap tooltip
	  $('[data-toggle="tooltip"]').tooltip()
    $('.dropdown-toggle').dropdown()
	});
});
function openNav() {
	$('.navbar-brand').hide();
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
	$('.navbar-brand').show();
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

 
$(document).ready(function(){ 
	$('input:radio[name="mBoatLength"]').change(
    function(){
        if (this.checked && this.value == 'feet') {
            $('#lengthunit').html('Feet');
        } else if((this.checked && this.value == 'meter')){
        	$('#lengthunit').html('Meters');
        }
    }); 
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