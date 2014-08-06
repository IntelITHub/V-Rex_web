$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#tSMStext" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter SMS</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vLogo" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Logo</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#dMessageCreatedDate" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Message Create Date</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#tMessageBroadCastDate" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Message Broadcast Date</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'brandedsms';
}