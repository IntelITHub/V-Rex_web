<input type="hidden" name="data[iMemberId]" value="{$data.member.iMemberId}">
<fieldset>
	<div class="block-content collapse in">
		<table class="table  table-bordered table-striped ">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				{if $data.following|count gt 0 }
				{section name = i loop = $data.following}
				<tr>
					<td>{$data.following[i].vName}</td>
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