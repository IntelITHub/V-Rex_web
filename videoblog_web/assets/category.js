$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vCategory" ).val() ==''){
            $(".modal-body").html( "<p>Please enter title!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#editimage").val() == ''){
            if($( "#vIcon" ).val() ==''){
                $(".modal-body").html( "<p>Please upload an icon!</p>" );
                $("#myalert").modal('show');
                return false;
            }    
        }
        if($( "#eStatus" ).val() ==''){
            $(".modal-body").html( "<p>Please select any status!</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'category';
}

var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"category/get_category_listing",
        "domTable": "#categorylist",
        "fields": [ {
                "label": "Category ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Title:",
                "name": "categoryname"
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
 
    $('#categorylist').dataTable( {
        "sAjaxSource": base_url+"category/get_category_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "categoryname" },
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

function CheckValidFile(val,name){
    var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();  
    if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png' ||a == 'BMP' ||a == 'bmp' )
    return true;
    $(".modal-body").html( "<p>Extenstion is not valid . Please upload only (gif,jpg,jpeg,bmp) Files!!!</p>" );
    $("#myalert").modal('show');  
    document.getElementById(name).value = "";
    return false; 
}