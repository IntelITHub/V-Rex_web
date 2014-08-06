<script src="{$data.base_js}category.js"></script>
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
                <div class="muted pull-left">Categories</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcategory" action="{$data.base_url}category/create" method="post" enctype="multipart/form-data">
					<fieldset>
					<legend>Add Category</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
							<div class="controls">
								<input type="text" class="span3" id="vCategory" name="data[vCategory]" value="">
							</div>
						</div>
						<div class="control-group" id="image">
							<label class="control-label" for="typeahead">Category Icon</label>
							<div class="controls">
								<input type="file" class="span10" id="vIcon" name="vIcon" value="">								
							</div>
							<div style="color:#FF0000;font-size:12px;margin-left:175px;">[ Category icon size should be 54 X 46 ]</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Status</label>
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