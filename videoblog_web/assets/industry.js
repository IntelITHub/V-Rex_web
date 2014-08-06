$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vTitle" ).val() ==''){
            $(".modal-body").html( "<p>Please enter title</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'industry';
}