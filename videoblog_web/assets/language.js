$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vLanguage" ).val() =='')
        {
        	$(".modal-body").html( "<p>Please enter language</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vLangCode" ).val() =='')
        {
            $(".modal-body").html( "<p>Please enter language code</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'language';
}
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"language/get_language_listing",
        "domTable": "#LanguagelistId",
        "fields": [ {
                "label": "Language ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Language:",
                "name": "language"
            },
            {
                "label": "Language Code:",
                "name": "languagecode"
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
    $('#LanguagelistId').dataTable( {
        "sAjaxSource": base_url+"language/get_language_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "language" },
            { "mData": "languagecode" },
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
