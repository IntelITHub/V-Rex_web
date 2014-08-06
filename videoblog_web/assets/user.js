$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vFirstName" ).val() ==''){
            $(".modal-body").html( "<p>Please enter first name.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vLastName" ).val() ==''){
            $(".modal-body").html( "<p>Please enter last name.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iRoleId" ).val() ==''){
            $(".modal-body").html( "<p>Please select role.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vEmail" ).val() ==''){
            $(".modal-body").html( "<p>Please enter email.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsEmail($( "#vEmail" ).val())==false){
            $(".modal-body").html( "<p>Please enter proper email address.</p>" );
        	$("#myalert").modal('show');
            return false;
        }
        if($( "#iUserId" ).val() == ''){
            if($( "#vPassword" ).val() ==''){
                $(".modal-body").html( "<p>Please enter password.</p>" );
                $("#myalert").modal('show');
                return false;
            }    
        }
        
        if($( "#vAddress" ).val() ==''){
            $(".modal-body").html( "<p>Please enter address.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vPhone" ).val() ==''){
            $(".modal-body").html( "<p>Please enter contact No.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vCity" ).val() ==''){
            $(".modal-body").html( "<p>Please enter city.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iCountryId" ).val() ==''){
            $(".modal-body").html( "<p>Please enter country.</p>" );
            $("#myalert").modal('show');
            return false;
        }
         if($( "#vZipCode" ).val() ==''){
            $(".modal-body").html( "<p>Please enter zipCode.</p>" );
            $("#myalert").modal('show');
            return false;
        }

    });
    $( "#iCountryId" ).change(function() {
        iCountryId = $('#iCountryId').val(); 
        url = base_url+"user/get_all_states/"+iCountryId;
          $.post(url,
            function(data) {
                var lang_data = $.parseJSON(data);
                $('#iStateId').html(lang_data);                    
            });
    });
});
function returnme()
{
	window.location.href = base_url+'user';
}
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"user/get_user_listing",
        "domTable": "#UserlistId",
        "fields": [ {
                "label": "User ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Name:",
                "name": "name"
            },
            {
                "label": "Role:",
                "name": "role"
            },
            {
                "label": "Email:",
                "name": "email"
            },
            {
                "label":"Phone:",
                "name":"phone"
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
    $('#UserlistId').dataTable( {
        "sAjaxSource": base_url+"user/get_user_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "name" },
            { "mData": "role" },
            { "mData": "email" },
            { "mData": "phone" },
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
});
