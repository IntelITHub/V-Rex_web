<script src="{$data.base_js}post.js"></script>
<form class="form-horizontal" id="frmpost" action="{$data.base_url}post/update" method="post" enctype="multipart/form-data">
	<input type="hidden" name="data[iPostId]" value="{$data.post.iPostId}">
	<fieldset>
		<div class="control-group">
			<label class="control-label">Member</label>
			<div class="controls">
				<select class="input-large" name="data[iMemberId]" id="iMemberId">
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
				<select class="input-large" name="iCategoryId[]" id="iCategoryId" multiple>					
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
			<label class="control-label" for="typeahead">Filetype</label>
			<div class="controls">
				<select class="input-large" name="data[eFileType]" id="eFileTypes">
					<option value="">-- Select Filetype --</option>
					{section name = i loop = $eFileTypes}
					<option value="{$eFileTypes[i]}" {if $eFileTypes[i] eq $data.post.eFileType}selected="selected"{/if}>{$eFileTypes[i]}</option>
					{/section}
				</select>
			</div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="typeahead">Upload File</label>
			<div class="controls">
				<input type="file" class="filestyle" id="vFile" name="vFile" data-icon="false">
				<a href="{$data.base_url}uploads/post/{$data.post.iPostId}/{$data.post.vFile}" class="btn btn-primary img_modal">View File</a>
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
{literal}
<script>
$(":file").filestyle({icon: false});
//handler for link
	var _fileType = '{/literal}{$data.post.eFileType}{literal}';
	//alert(_fileType);
	if(_fileType == 'Image'){
		$('.img_modal').on('click', function(e) {
		    e.preventDefault();
		    $("#modal_img_target").attr("src", this);
		    $('#modal').modal('show');
		});
	}else{
		$('.img_modal').on('click', function(e) {
		    e.preventDefault();
		    $("#modal_video_target embed").attr("src", this);
		    $('#modalvideo').modal('show');
		});
	}
</script>
{/literal}

<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">{$data.post.tPost}</h3>
    </div>
    <div class="modal-body">
        <img id="modal_img_target">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<div id="modalvideo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">{$data.post.tPost}</h3>
    </div>
    <div class="modal-body" id="modal_video_target">
    	<embed src="" height="100%" width="100%">        
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
