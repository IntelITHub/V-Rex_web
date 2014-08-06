$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#vCountry").val() ==''){
            $(".modal-body").html( "<p>Please enter country name!</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#eStatus").val() ==''){
        	$(".modal-body").html( "<p>Please select status!</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme(){
	window.location.href = base_url+'country';
}
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"country/get_country_listing",
        "domTable": "#CountrylistId",
        "fields": [ {
                "label": "Country ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Country Name:",
                "name": "countryname"
            },
            {
                "label": "Country Code:",
                "name": "countrycode"
            },
            {
                "label": "Country ISD Code:",
                "name": "countryisdcode"
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
        "sAjaxSource": base_url+"country/get_country_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "countryname" },
            { "mData": "countrycode" },
            { "mData": "countryisdcode" },
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