<script src="{$data.base_js}member.js"></script>
<input type="hidden" name="data[iMemberId]" value="{$data.member.iMemberId}">
<fieldset>	
	<div class="block-content collapse in">		
		<table class="table  table-bordered table-striped " id="followers">
			<thead>
				<tr>
                    <th>Name</th>
				</tr>
			</thead>
		</table>  
	</div>
</fieldset>
{literal}
<script type="text/javascript">
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/member_followers?iMemberId={/literal}{$data.member.iMemberId}{literal}",
        "domTable": "#followers",
        "fields": [
            {
                "label": "Name:",
                "name": "vName"
            },
        ]
    } );
 
    $('#followers').dataTable( {
        "sAjaxSource": base_url+"member/member_followers?iMemberId={/literal}{$data.member.iMemberId}{literal}",
        "aoColumns": [
            { "mData": "vName" }
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