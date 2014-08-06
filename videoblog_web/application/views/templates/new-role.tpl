<script src="{$data.base_js}role.js"></script>
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
                <div class="muted pull-left">Role</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmrole" action="{$data.base_url}role/create" method="post">
					<fieldset>
					<legend>Add Role</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
								<div class="controls">
									<input type="text" class="span6" id="vTitle" name="data[vTitle]" value="" >
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Status</label>
	                            <div class="controls">
	                                <select class="input-large" name="data[eStatus]">
	                                    <option value="Active" >Active</option>
	                                    <option value="Inactive" >Inactive</option>
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