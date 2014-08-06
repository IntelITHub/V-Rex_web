$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#vName").val() =='')
        {
        	$(".modal-body").html( "<p>Please enter label name</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vValue_en").val() =='')
        {
        	$(".modal-body").html( "<p>Please enter value in english</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vValue_fr").val() =='')
        {
        	$(".modal-body").html( "<p>Please enter value in france</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'languagelabel';
}
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"languagelabel/get_languagelabel_listing",
        "domTable": "#LanguagelabellistId",
        "fields": [ {
                "label": "Label ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Label Name:",
                "name": "labelname"
            },
            {
                "label": "USA English:",
                "name": "usaenglish"
            },
            {
                "label": "Portuguese:",
                "name": "portuguese"
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
    $('#LanguagelabellistId').dataTable( {
        "sAjaxSource": base_url+"languagelabel/get_languagelabel_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "labelname" },
            { "mData": "usaenglish" },
            { "mData": "portuguese" },
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

