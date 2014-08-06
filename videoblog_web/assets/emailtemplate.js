$(document).ready(function(){
    $("#btn-save").click(function() {
    if($("#vEmailCode").val() =='')
    {
        $(".modal-body").html( "<p>Please enter email code!</p>" );
        $("#myalert").modal('show');
        return false;
    }
    if($("#vEmailTitle").val() =='')
    {
        $(".modal-body").html( "<p>Please enter email title!</p>" );
        $("#myalert").modal('show');
        return false;
    }
	if($("#vFromEmail").val() =='')
        {
            $(".modal-body").html( "<p>Please enter from email!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#vEmailSubject").val() =='')
        {
            $(".modal-body").html( "<p>Please enter email subject!</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#vEmailFooter").val() =='')
        {
            $(".modal-body").html( "<p>Please enter email footer!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#eStatus").val() =='')
        {
            $(".modal-body").html( "<p>Please select status!</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});

function returnme()
{
	window.location.href = base_url+'emailtemplate';
}

var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"emailtemplate/get_emailtemplate_listing",
        "domTable": "#emailtemplatelistId",
        "fields": [ {
                "label": "Email ID:",
                "name": "id",
                "type": "checkbox"
            }, {
                "label": "Email Title:",
                "name": "emailtitle"
            },{
                "label": "From Email:",
                "name": "fromemail"
            }, {
                "label": "Email Code:",
                "name": "emailcode"
            },{
                "label": "Status:",
                "name": "status"
            },{
                "label": "Edit:",
                "name": "editlink"
            }
        ]
    } );
 
    $('#emailtemplatelistId').dataTable( {
        "sAjaxSource": base_url+"emailtemplate/get_emailtemplate_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "emailtitle" },
            { "mData": "fromemail" },
            { "mData": "emailcode" },
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