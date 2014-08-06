<form name="frmlist" id="frmlist" action="{$data.base_url}post/action_update" method="post">
	<input type="hidden" name="action" id="action"><div class="row-fluid">
	    <div class="navbar">
	        <div class="navbar-inner">
	            {$data.breadcrumb}
	        </div>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12">
	        <div class="block">
	            <div class="navbar navbar-inner block-header">
	                <div class="muted pull-left">Posts</div>
	            </div>
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
	                            {if $data.post|count gt 0 }
	                            	<p class="text-paging">{$data.paging_message}</p>
	                            {/if}
	                        </div>
	                    </div>
	                    <div class="span6">
	                        <div class="pull-right">
	                            <button type="submit" id="btn-private" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Private</button>
	                            <button type="submit" id="btn-public" class="btn btn-info bottom-buffer">Make Public</button>
	                            <button type="button" id="btn-add" onclick="addme('{$data.base_url}post/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
	                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
	                        </div>
	                    </div>
	                </div>
	                <table class="table  table-bordered table-striped ">
		                <thead>
			                <tr>
			                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
			                    <th width="10%"> Video</th>
			                    <th width="15%">Member</th>
			                    <th width="47%">Title</th>
			                    <th width="15%">Posted Date</th>
			                    <th width="10%">Edit</th>
			                </tr>
		                </thead>
		                <tbody>
			                {if $data.post|count gt 0 }
				                {section name = i loop = $data.post}
					                <tr>
					                    <td><input type="checkbox" name="iId[]" id="iId" value="{$data.post[i].iPostId}"></td>
					                    <td>
											{if $data.post[i].eFileType eq 'Image'}
												<img src="{$data.base_url}uploads/post/{$data.post[i].iPostId}/{$data.post[i].vFile}" height="100px" width="100px"/>
											{/if}
											{if $data.post[i].eFileType eq 'Video'}
												<video width="50" height="50" controls>
												<!--source src="{$data.base_url}uploads/post/{$data.post[i].iPostId}/{$data.post[i].vFile}" type="video/mp4">
												<source src="{$data.base_url}uploads/post/{$data.post[i].iPostId}/{$data.post[i].vFile}" type="video/ogg"-->
												Your browser does not support the video tag.
												</video> 
											{/if}
					                    </td>
					                    <td>{$data.post[i].vName}</td>
					                    <td>{$data.post[i].tPost}</td>
					                    <!-- <td>{$data.post[i].dCreatedDate|date_format:"%e  %B  %Y  %H:%M:%S %p"}</td> -->
					                    <td>{$data.post[i].dCreatedDate|date_format:"%m/%d/%Y [%H:%M]"}</td>
					                    <td><a href="{$data.base_url}post/update/{$data.post[i].iPostId}">Edit</a></td>
					                </tr>
				                {/section}
			                {else}
			                    <tr>
			                        <td colspan="9"><div class="text-center">{$data.paging_message}</div></td>
			                    </tr>
			                {/if}
		                </tbody>
	                </table>  
	                <div class="pagination">
	                    {$data.create_links}
	                </div>           
	            </div>
	        </div>
	    </div>
	</div>     
</form>       