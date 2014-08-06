$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#vpagename").val() =='')
        {
        	$(".modal-body").html( "<p>Please enter title!</p>" );
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
function returnme(){
	window.location.href = base_url+'staticpage';
}

var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"staticpage/get_staticpage_listing",
        "domTable": "#CountrylistId",
        "fields": [ {
                "label": "Page ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Title:",
                "name": "staticpagename"
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
 
    $('#CountrylistId').dataTable( {
        "sAjaxSource": base_url+"staticpage/get_staticpage_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "staticpagename" },
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
