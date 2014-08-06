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
					{if $data.comment|count gt 0 }
					<p class="text-paging">{$data.paging_message}</p>
					{/if}
				</div>
			</div>
            <div class="span6">
                <div class="pull-right">
                    <button type="submit" id="btn-approve-comment" class="btn btn-info bottom-buffer">Make Approve</button>
                    <button type="submit" id="btn-delete-comment" class="btn btn-danger bottom-buffer">Delete</button>
                </div>
            </div>			
		</div>
		<table class="table  table-bordered table-striped ">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
					<th>Member</th>
					<th>Comment</th>
					<th>Created date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				{if $data.comment|count gt 0 }
				{section name = i loop = $data.comment}
				<tr>
					<td><input type="checkbox" name="iId[]" id="iId" value="{$data.comment[i].iCommentId}"></td>
					<td>{$data.comment[i].vName}</td>
					<td>{$data.comment[i].tDescription}</td>
					<td>{$data.comment[i].dCreatedDate|date_format:"%e  %B  %Y  %H:%M:%S %p"}</td>
					<td>{$data.comment[i].eStatus}</td>
				</tr>
				{/section}
				{else}
				<tr>
					<td colspan="9">
						<div class="text-center">
							{$data.paging_message}
						</div>
					</td>
				</tr>
				{/if}
			</tbody>
		</table>  
		<div class="pagination">
			{$data.create_links}
		</div>
</div>
</form>