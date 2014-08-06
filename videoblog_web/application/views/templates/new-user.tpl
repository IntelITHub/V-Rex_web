<script src="{$data.base_js}user.js"></script>
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
                <div class="muted pull-left">User</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmuser" action="{$data.base_url}user/create" method="post">
					<input type="hidden" id="iUserId">
					<fieldset>
					<legend>Create User</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">First Name</label>
							<div class="controls">
								<input type="text" class="span3" id="vFirstName" name="data[vFirstName]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Last Name</label>
							<div class="controls">
								<input type="text" class="span3" id="vLastName" name="data[vLastName]" >
							</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Role</label>
                            <div class="controls">
                                <select class="input-large" name="data[iRoleId]" id="iRoleId">
                                	<option value="">Select Role</option>
                                	{section name=i loop =$eRoles}
                                    <option value="{$eRoles[i].iRoleId}">{$eRoles[i].vTitle}</option>
                                    {/section}
                                </select>
                            </div>
	                    </div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Email</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmail" name="data[vEmail]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Password</label>
							<div class="controls">
								<input type="password" class="span3" id="vPassword" name="data[vPassword]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Address</label>
							<div class="controls">
								<input type="text" class="span3" id="vAddress" name="data[vAddress]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Contact No</label>
							<div class="controls">
								<input type="text" class="span3" id="vPhone" name="data[vPhone]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">City</label>
							<div class="controls">
								<input type="text" class="span3" id="vCity" name="data[vCity]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country</label>
								<div class="controls">
									<select class="input-large" name="data[iCountryId]" id="iCountryId">
										<option value="">-- Select country --</option>
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
										<option value="">-- Select state --</option>
										{section name = i loop = $data.all_state}
										<option value="{$data.all_state[i].iStateId}">{$data.all_state[i].vState}</option>
										{/section}
									</select>
								</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">ZipCode</label>
							<div class="controls">
								<input type="text" class="span3" id="vZipCode" name="data[vZipCode]">
							</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Status</label>
                            <div class="controls">
                                <select class="input-large" name="data[eStatus]">
                                	{section name=i loop =$eStatuses}
                                    <option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.user.eStatus} selected {/if} >{$eStatuses[i]}</option>
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
            </div>
        </div>
    </div>
</div>