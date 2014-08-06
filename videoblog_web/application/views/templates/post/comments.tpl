<form name="frmlist" id="frmlist" action="{$data.base_url}post/action_update_comment" method="post">
	<input type="hidden" name="action" id="action-comment">
<input type="hidden" name="data[iMemberId]" value="{$data.post.iMemberId}">
<div class="block-content collapse in">
		{if $data.message neq ''}
		<div class="span12">
			<div class="alert alert-info">
				{$data.message}
			</div>
		</div>
		{/if}
		<div class="row-fluid">
			<div class="span6">
				<div class="span6">
					<!--{if $data.comment|count gt 0 }
					<p class="text-paging">{$data.paging_message}</p>
					{/if}-->
				</div>
			</div>
            <div class="span6">
                <div class="pull-right">
                    <button type="submit" id="btn-approve-comment" class="btn btn-info bottom-buffer">Make Approve</button>
                    <button type="submit" id="btn-delete-comment" class="btn btn-danger bottom-buffer">Delete</button>
                </div>
            </div>			
		</div>
		<table class="table  table-bordered table-striped " id="postComments">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
					<th>Member</th>
					<th>Comment</th>
					<th>Created date</th>
					<th>Status</th>
				</tr>
			</thead>
			<!--<tbody>
				{if $data.comment|count gt 0 }
				{section name = i loop = $data.comment}
				<tr>
					<td><input type="checkbox" name="iId[]" id="iId" value="{$data.comment[i].iCommentId}"></td>
					<td>{$data.comment[i].vName}</td>
					<td>{$data.comment[i].tDescription}</td>
					<!-- <td>{$data.comment[i].dCreatedDate|date_format:"%e  %B  %Y  %H:%M:%S %p"}</td> 
					<td>{$data.comment[i].dCreatedDate|date_format:"%m/%d/%Y [%H:%M]"}</td>
					<td>{$data.comment[i].eStatus}</td>
				</tr>
				{/section}
				{else}
				<tr>
					<td colspan="5">
						<div class="text-center">
							No Record Found
						</div>
					</td>
				</tr>
				{/if}
			</tbody>-->
		</table>  
		<div class="pagination">
			{$data.create_links}
		</div>
</div>
</form>

{literal}
<script type="text/javascript">
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"post/comment_listing?iPostId={/literal}{$data.post.iPostId}{literal}",
        "domTable": "#postComments",
        "fields": [ {
                "label": "Post Comment ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Member:",
                "name": "vName"
            },
            {
                "label": "Comment:",
                "name": "tDescription"
            },
            {
                "label": "Created date:",
                "name": "dCreatedDate"
            },
            {
                "label": "Status",
                "name": "eStatus"
            }
        ]
    } );
 
    $('#postComments').dataTable( {
        "sAjaxSource": base_url+"post/comment_listing?iPostId={/literal}{$data.post.iPostId}{literal}",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "vName" },
            { "mData": "tDescription" },
            { "mData": "dCreatedDate" },
            { "mData": "eStatus"}
            
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