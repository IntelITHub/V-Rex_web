$(document).ready(function(){
    $("#btn-save").click(function() {
    	if($( "#vAppName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Application</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iClientId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select Client</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vEmail" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Email</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vWebsite" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Website</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iCategoryId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select Category</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iIndustryId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select Industry</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iLanguageId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select Language</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'apps';
}