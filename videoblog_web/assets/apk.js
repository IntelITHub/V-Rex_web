$(document).ready(function(){
    $(function() {
        $('#datetimepicker').datetimepicker({
            language: 'pt-BR'
        });
    });
    $("#btn-save").click(function() {
        if($("#vTitle").val() ==''){
            $(".modal-body").html( "<p>Please enter title!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#editfile").val() == ''){
            if($("#vFile").val() ==''){
                $(".modal-body").html( "<p>Please select apk file!</p>" );
                $("#myalert").modal('show');
                return false;
            }
        }
        if($("#vVersion").val() ==''){
            $(".modal-body").html( "<p>Please enter version!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#dDate").val() ==''){
        	$(".modal-body").html( "<p>Please enter date!</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme(){
	window.location.href = base_url+'apk';
}
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"apk/get_apk_listing",
        "domTable": "#ApkId",
        "fields": [ {
                "label": "Apk ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Title :",
                "name": "vTitle"
            },
            {
                "label": "File :",
                "name": "vFile"
            },
            {
                "label": "Version :",
                "name": "vVersion"
            },
            {
                "label": "Created Date:",
                "name": "dCreatedDate"
            },
            {
                "label": "Action:",
                "name": "editlink"
            }
        ]
    } );
 
    $('#ApkId').dataTable( {
        "sAjaxSource": base_url+"apk/get_apk_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "vTitle" },
            { "mData": "vFile" },
            { "mData": "vVersion" },
            { "mData": "dCreatedDate"},
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

function CheckValidFile(val,name){
    var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();  
    if(a == 'apk')
    return true;
    $(".modal-body").html( "<p>Extenstion is not valid . Please upload only (apk) Files!!!</p>" );
    $("#myalert").modal('show');  
    document.getElementById(name).value = "";
    return false; 
}