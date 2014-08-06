$(document).ready(function(){
	$(function() {
		$('#datetimepicker1').datetimepicker({
			language: 'pt-BR'
		});
	});
	
    $("#btn-save").click(function() {
        if($( "#vName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your Name!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vEmail" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your Email!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsEmail($( "#vEmail" ).val() ==false)){
            $(".modal-body").html( "<p>Please Enter Proper Email!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vPassword" ).val() =='')
        {
        	$(".modal-body").html( "<p>Please Enter Password!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#dBirthDate" ).val() =='')
        {
            $(".modal-body").html( "<p>Please Select DOB!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vPicture" ).val() =='')
        {
            $(".modal-body").html( "<p>Please Enter DOB!</p>" );
            $("#myalert").modal('show');
            return false;
        }
         else
        {
            var logo = $( "#vPicture" ).val();
            var ext = logo.substring(logo.lastIndexOf('.') + 1);            
            if(ext != "png" && ext != "PNG" && ext != "JPEG" && ext != "jpeg" && ext != "jpg" && ext != "JPG")
            {
                $(".modal-body").html( "<p>Please Upload png or jpg Image!</p>" );
                $("#myalert").modal('show');
                return false;
            }
        }
    });

 
function returnme()
{
    //alert('fh');
	window.location.href = base_url+'member';
}
