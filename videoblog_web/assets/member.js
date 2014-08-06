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
        if($( "#vUsername" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your Username!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vEmail" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your Email!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        /*if(IsEmail($( "#vEmail" ).val() ==false)){
            $(".modal-body").html( "<p>Please Enter Proper Email!</p>" );
            $("#myalert").modal('show');
            return false;
        }*/
        if($( "#vPassword" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your Password!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#dBirthDate" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Your DOB!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vPicture" ).val() ==''){
            $(".modal-body").html( "<p>Please Upload a Picture!</p>" );
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
});
function returnme()
{
	window.location.href = base_url+'member';
}

// Searching Data, Pagination
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/get_member_listing",
        "domTable": "#memberList",
        "fields": [ {
                "label": "Member ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Name:",
                "name": "membername"
            },
            {
                "label": "Email:",
                "name": "memberemail"
            },
            {
                "label": "Country:",
                "name": "country"
            },
            {
                "label": "State:",
                "name": "state"
            },
            {
                "label": "IP:",
                "name": "vIP"
            },
            {
                "label": "Logindate:",
                "name": "dLoginDate"
            },
            {
                "label": "Logoutdate:",
                "name": "dLogoutDate"
            },
            {
                "label": "Status:",
                "name": "status"
            },
            {
                "label": "Edit:",
                "name": "editlink"
            }
        ]
    } );
 
    $('#memberList').dataTable( {
        "sAjaxSource": base_url+"member/get_member_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "membername" },
            { "mData": "memberemail" },
            { "mData": "country" },
            { "mData": "state"},
            { "mData": "vIP"},
            { "mData": "dLoginDate"},
            { "mData": "dLogoutDate"},
            { "mData": "status"},
            { "mData": "editlink","bSortable": false }
            
        ],
        "oTableTools": {
            "sRowSelect": "multi",
            "aButtons": [
                { "sExtends": "editor_create", "editor": editor },
                { "sExtends": "editor_edit",   "editor": editor },
                { "sExtends": "editor_remove", "editor": editor }
            ]
        }
    } );
} );