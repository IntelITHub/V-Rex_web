$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#FB_APPSEC").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Fb Appsec!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#FB_APPID").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Fb Appid!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#FACEBOOK_LINK").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Facebook Link!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#PINTEREST_LINK").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Pinterest Link!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#TWITTER_LINK").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Twitter Link!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#MAIL_FOOTER").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Mail Footer!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#EMAIL_ADMIN").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Admin Email Id!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	
        if($("#SITE_NAME").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Site Name!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#COMPANY_NAME").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Company Name!</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'configuration';
}
