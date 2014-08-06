var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"post/post_listing",
        "domTable": "#postList",
        "fields": [ {
                "label": "Post ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Video:",
                "name": "posttype"
            },
            {
                "label": "Member:",
                "name": "member"
            },
            {
                "label": "Title:",
                "name": "posttitle"
            },
            {
                "label": "IP:",
                "name": "vIP"
            },
            {
                "label": "Posted Date:",
                "name": "postdate"
            },
            {
                "label": "Edit:",
                "name": "editlink"
            }
        ]
    } );
 
    $('#postList').dataTable( {
        "sAjaxSource": base_url+"post/post_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "posttype" },
            { "mData": "member" },
            { "mData": "posttitle" },
            { "mData": "vIP"},
            { "mData": "postdate"},
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