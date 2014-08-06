var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"loginlogs/loginlog_list",
        "domTable": "#loginlogList",
        "fields": [ {
                "label": "Loginlog ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Name:",
                "name": "loginname"
            },
            {
                "label": "Email:",
                "name": "loginemail"
            },
            {
                "label": "Role:",
                "name": "loginrole"
            },
            {
                "label": "IP:",
                "name": "loginip"
            },
            {
                "label": "Login Date:",
                "name": "logindate"
            },
            {
                "label": "Logout Date:",
                "name": "logoutdate"
            }
        ]
    } );
 
    $('#loginlogList').dataTable( {
        "sAjaxSource": base_url+"loginlogs/loginlog_list",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "loginname" },
            { "mData": "loginemail" },
            { "mData": "loginrole" },
            { "mData": "loginip"},
            { "mData": "logindate"},
            { "mData": "logoutdate"}
            
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