<script src="{$data.base_js}post.js"></script>
<div class="row-fluid">
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
				<form class="form-horizontal" id="frmpost" action="{$data.base_url}post/create" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Add Post</legend>
						<div class="control-group">
							<label class="control-label">Member</label>
							<div class="controls">
								<select class="input-large" name="data[iMemberId]">
									<option value="">-- Select Member --</option>
									{section name = i loop = $all_members}
									<option value="{$all_members[i].iMemberId}">{$all_members[i].vName}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Post Title</label>
							<div class="controls">
								<input type="text" class="span3" id="tPost" name="data[tPost]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Category</label>
							<div class="controls">
								<select class="input-large" name="iCategoryId[]" multiple>									
									{section name = i loop = $all_categories}
									<option value="{$all_categories[i].iCategoryId}">{$all_categories[i].vCategory}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Post Description</label>
							<div class="controls">
								<input type="text" class="span3" id="tDescription" name="data[tDescription]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country</label>
							<div class="controls">
								<select class="input-large" name="data[iCountryId]" id="iCountryId">
									<option value="">-- Select Country --</option>
									{section name = i loop = $data.country}
									<option value="{$data.country[i].iCountryId}">{$data.country[i].vCountry}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">State</label>
							<div class="controls">
								<select class="input-large" name="data[iStateId]" id="iStateId">
									<option value="">-- Select State --</option>
									{section name = i loop = $data.all_state}
									<option value="{$data.all_state[i].iStateId}">{$data.all_state[i].vState}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">File Type</label>
							<div class="controls">
								<select class="input-large" name="data[eFileType]" id="eFileType">
									<option value="">-- Select File Type --</option>
									{section name = i loop = $eFileTypes}
									<option value="{$eFileTypes[i]}">{$eFileTypes[i]}</option>
									{/section}
								</select>
							</div>
						</div>
						<!-- <div class="control-group" id="video">
							<label class="control-label" for="typeahead">Upload Video</label>
							<div class="controls">
								<input type="file" class="span3" id="vVideo" name="vVideo" value="" >
							</div>
						</div> -->
						<div class="control-group" id="image">
							<label class="control-label" for="typeahead">Upload File</label>
							<div class="controls">
								<input type="file" class="span10" id="vFile" name="vFile" value="" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">City</label>
							<div class="controls">
								<input type="text" class="span3" id="vCity" name="data[vCity]" value="" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Visible</label>
							<div class="controls">
								<select class="input-large" name="data[eVisiblity]">
									<option value="">-- Select Visiblity --</option>
									{section name=i loop=$visiblities}
									<option value="{$visiblities[i]}">{$visiblities[i]}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select class="input-large" name="data[eStatus]">
									<option value="">-- Select Status --</option>
									{section name=i loop=$eStatuses}
									<option value="{$eStatuses[i]}">{$eStatuses[i]}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" id="btn-save" class="btn  btn-primary" >Save changes</button>
							<button type="button" class="btn" onclick="returnme();">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>