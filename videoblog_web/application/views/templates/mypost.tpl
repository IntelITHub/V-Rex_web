<input type="hidden" name="data[iMemberId]" value="{$data.member.iMemberId}">
<fieldset>
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
					{if $data.mypost|count gt 0 }
					<p class="text-paging">{$data.paging_message}</p>
					{/if}
				</div>
			</div>
		</div>
		<table class="table table-bordered table-striped ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				{if $data.mypost|count gt 0 }
				{section name = i loop = $data.mypost}
				<tr>
					<td>{$data.mypost[i].tPost}</td>
					<td>{$data.mypost[i].tDescription}</td>
					<td>{$data.mypost[i].vCategory}</td>
					<td>{$data.mypost[i].eStatus}</td>
				</tr>
				{/section}
				{else}
				<tr>
					<td colspan="9">
						<div class="text-center">
							No Record Found
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
</fieldset>