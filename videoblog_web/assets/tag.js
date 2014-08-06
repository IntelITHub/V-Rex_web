$(document).ready(function(){
    $("#btn-save").click(function() {
        
        if($( "#vTag" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Tag.</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});

function returnme()
{
	window.location.href = base_url+'tag';
}