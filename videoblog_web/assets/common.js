$(document).ready(function(){
	$("#check_all").change(function(){
		$('input:checkbox').prop('checked', this.checked);         
		/*alert();
		var boxes = $('input[name=iTechnologyId[]]:checked');
		alert(boxes);
		$(boxes).each(function(){
			$('input[name=iTechnologyId]').prop('checked', this.checked);   
		});*/

	});
	
	$("#btn-active").click(function() {
		$("#action").val("Active");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	$("#btn-inactive").click(function() {
		$("#action").val("Inactive");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
		$("#btn-private").click(function() {
		$("#action").val("Private");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	$("#btn-public").click(function() {
		$("#action").val("Public");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	$("#btn-delete").click(function() {
		$("#action").val("Delete");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});

});

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


function addme(url)
{
	window.location.href=url;
}


    
