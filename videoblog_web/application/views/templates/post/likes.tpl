<form name="frmlist" id="frmlist" action="{$data.base_url}post/action_update_like" method="post">
		<input type="hidden" name="action" id="action-like">
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
				<div class="span6 ">
					{if $data.like|count gt 0 }
					<p class="text-paging">{$data.paging_message}</p>
					{/if}
				</div>
			</div>
			<div class="span6">
                <div class="pull-right">
                    <!--button type="submit" id="btn-public" class="btn btn-info bottom-buffer">Make Approve</button-->
                    <button type="submit" id="btn-delete-like" class="btn btn-danger bottom-buffer">Delete</button>
                </div>
            </div>	
		</div>
		<table class="table  table-bordered table-striped " id="likeList">
			<thead>
				<tr>
					<th width="1%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
					<th>Member</th>
					<!--th>Post</th>
					<th width="60%">Description</th-->
				</tr>
			</thead>
			<!--<tbody>
				{if $data.like|count gt 0 }
				{section name = i loop = $data.like}
				<tr>
					<td><input type="checkbox" name="iId[]" id="iId" value="{$data.like[i].iLikeId}"></td>
					<td>{$data.like[i].vName}</td>
					<!--td>{$data.like[i].tPost}</td>
					<td>{$data.like[i].tDescription}</td>
				</tr>
				{/section}
				{else}
				<tr>
					<td colspan="2">
						<div class="text-center">
							No Record Found
						</div>
					</td>
				</tr>
				{/if}
			</tbody>-->
		</table>
		<!--<div class="pagination">
			{$data.create_links}
		</div>-->
	</div>
</form>

{literal}
<script type="text/javascript">
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"post/likes_listing?iPostId={/literal}{$data.post.iPostId}{literal}",
        "domTable": "#likeList",
        "fields": [ {
                "label": "Post Likes ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Member:",
                "name": "vName"
            }
        ]
    } );
 
    $('#likeList').dataTable( {
        "sAjaxSource": base_url+"post/likes_listing?iPostId={/literal}{$data.post.iPostId}{literal}",
        "aoColumns": [
            { "mData": "id","bSortable": false},
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