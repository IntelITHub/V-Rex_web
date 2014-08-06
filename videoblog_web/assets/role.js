$(document).ready(function(){
	$("#btn-save").click(function() {
        if($( "#vTitle" ).val() ==''){
            $(".modal-body").html( "<p>Please enter title</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme(){
	window.location.href = base_url+'role';
}


var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"role/get_role_listing",
        "domTable": "#Roelid",
        "fields": [ {
                "label": "Role ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Name:",
                "name": "name"
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
 
    $('#Roelid').dataTable( {
        "sAjaxSource": base_url+"role/get_role_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "name" },
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