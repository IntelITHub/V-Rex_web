<script src="{$data.base_js}changepassword.js"></script>
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
                <div class="muted pull-left">Change Password</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="changepwd" action="{$data.base_url}changepassword" method="post">
					<fieldset>
					<legend>Change Password</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">New Password</label>
							<div class="controls">
								<input type="password" class="span3" id="vPassword" name="vPassword">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Confirm Password</label>
							<div class="controls">
								<input type="password" class="span3" id="confirmpwd">
							</div>
						</div>

						<div class="form-actions">
							<button type="submit" id="btn-save" class="btn btn-primary" >Save changes</button>
							<button type="button" class="btn" onclick="returnme();">Cancel</button>
                        </div>
                    </fieldset>
				</form>
            </div>
        </div>
    </div>
</div>