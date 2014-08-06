$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#iCountryId").val() =='')
        {
            $(".modal-body").html( "<p>Please select country !</p>" );
            $("#myalert").modal('show');
            return false;
        }
	if($("#vState").val() =='')
        {
            $(".modal-body").html( "<p>Please enter state name!</p>" );
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
function cancle(){
    window.location.href = base_url+'state';
}

var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"state/get_state_listing",
        "domTable": "#statelistId",
        "fields": [ {
                "label": "State ID:",
                "name": "id",
                "type": "checkbox"
            }, {
                "label": "State Name:",
                "name": "statename"
            },{
                "label": "Country Name:",
                "name": "countryname"
            }, {
                "label": "Status:",
                "name": "status"
            },{
                "label": "Edit:",
                "name": "editlink"
            }
        ]
    } );
 
    $('#statelistId').dataTable( {
        "sAjaxSource": base_url+"state/get_state_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "statename" },
            { "mData": "countryname" },
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