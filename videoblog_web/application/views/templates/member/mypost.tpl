<script src="{$data.base_js}member.js"></script>
<input type="hidden" name="data[iMemberId]" value="{$data.member.iMemberId}">
<fieldset>
	<div class="block-content collapse in">
		<table class="table table-bordered table-striped" id="postlisting">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Name</th>
					<th>Status</th>
				</tr>
			</thead>
		</table>  
	</div>
</fieldset>
{literal}
<script type="text/javascript">
var editor; 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/member_post?iMemberId={/literal}{$data.member.iMemberId}{literal}",
        "domTable": "#postlisting",
        "fields": [ 
            {
                "label": "Title:",
                "name": "tPost"
            },
            {
                "label": "Description:",
                "name": "tDescription"
            },
            {
                "label": "Name:",
                "name": "vName"
            },
            {
                "label": "Status:",
                "name": "eStatus"
            },
        ]
    } );
 
    $('#postlisting').dataTable( {
        "sAjaxSource": base_url+"member/member_post?iMemberId={/literal}{$data.member.iMemberId}{literal}",
        "aoColumns": [
            { "mData": "tPost" },
            { "mData": "tDescription" },
            { "mData": "vName" },
            { "mData": "eStatus" }
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
</script>
{/literal}