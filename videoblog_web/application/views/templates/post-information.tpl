<script src="{$data.base_js}post.js"></script>
<form class="form-horizontal" id="frmpost" action="{$data.base_url}post/update" method="post" enctype="multipart/form-data">
	<input type="hidden" name="data[iPostId]" value="{$data.post.iPostId}">
	<fieldset>
		<div class="control-group">
			<label class="control-label">Member</label>
			<div class="controls">
				<select class="input-large" name="data[iMemberId]">
					<option value="">-- Select Member --</option>
					{section name = i loop = $all_members}
					<option value="{$all_members[i].iMemberId}" {if $all_members[i].iMemberId eq $data.post.iMemberId}selected="selected"{/if}>{$all_members[i].vName}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Post Title</label>
			<div class="controls">
				<input type="text" class="span3" id="tPost" name="data[tPost]" value="{$data.post.tPost}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Category</label>
			<div class="controls">
				{$postcategories.inspect}
				<select class="input-large" name="iCategoryId[]" multiple>					
					{section name = i loop = $all_categories}
					<option value="{$all_categories[i].iCategoryId}"  {if in_array({$all_categories[i].iCategoryId}, $pCat) }selected="selected"{/if}>{$all_categories[i].vCategory}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Post Description</label>
			<div class="controls">
				<input type="text" class="span3" id="tDescription" name="data[tDescription]" value="{$data.post.tDescription}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Country</label>
			<div class="controls">
				<select name="data[iCountryId]" id="iCountryId">
					{section name = i loop = $data.all_country}
					<option value="{$data.all_country[i].iCountryId}" {if $data.all_country[i].iCountryId eq $data.post.iCountryId}selected="selected"{/if}>{$data.all_country[i].vCountry}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">State</label>
			<div class="controls">
				<select name="data[iStateId]" id="iStateId">
					{section name = i loop = $data.all_state}
					<option value="{$data.all_state[i].iStateId}" {if $data.all_state[i].iStateId eq $data.post.iStateId}selected="selected"{/if}>{$data.all_state[i].vState}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">City</label>
			<div class="controls">
				<input type="text" class="span3" id="vCity" name="data[vCity]" value="{$data.post.vCity}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Visible</label>
			<div class="controls">
				<select class="input-large" name="data[eVisiblity]">
					{section name=i loop=$visiblities}
					<option value="{$visiblities[i]}" {if $visiblities[i] eq $data.post.eVisiblity}selected="selected"{/if}>{$visiblities[i]}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">{$data.post.eFileType}</label>
			<div class="controls">
				<input type="file" name="vFile"class="span3"  value={if $data.post.vFile eq ''} lang="*" id="vFile" {/if}>
				<!-- <input type="file" name="vImage"  title="Image" value= {if $data->vImage eq ''} lang="*" id="vImage"  {/if} onchange="CheckValidFile(this.value,this.name)"/> -->
			</div>
			{if {$data.post.vFile} neq ''}
			<div class="controls">
				<button class="btn btn-inverse" data-toggle="modal" data-target="#myModalpostvi">
					View
				</button>
				<button class="btn btn-danger" data-toggle="modal" data-target="#myModaldelpostvi">
					Delete
				</button>
			</div>
			
			<br>
			<div class="controls">
				<div id="displaybox"></div>
			</div>
			{/if}
		</div>
		
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<select class="input-large" name="data[eStatus]">
					{section name=i loop=$eStatuses}
					<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.post.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
					{/section}
				</select>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" id="btn-save" class="btn btn-primary" >Save changes</button>
			<button type="button" class="btn" onclick="returnme();">Cancel</button>
		</div>
	</fieldset>
</form>
{include file="post-img-video.tpl"}

{literal}
<script>
function ImageDelete(id,file1){   
    $('<div  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><div class="error_poptit">Delete Logo</div></div><div class="eor_poptxt"><img src="http://192.168.1.12/Izishirt/public/admin/images/eor-img.png" alt="" title="" /><h3 id="myModalLabel">Are you sure, You wanted to delete this image ?</h3></div><div class="view_del_user"><a  class="btn btn-info"  href="{/literal}{$data.base_url}{literal}post/delete_image?id={/literal}{$data.post.iPostId}{literal}">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  class="btn btn-info" data-dismiss="modal">Cancel</a></div></div>').modal();
}
showallSegment();
</script>
{/literal}