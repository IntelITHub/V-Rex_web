<script src="{$data.base_js}bootstrap-datetimepicker.min.js"></script>
<link href="{$data.base_js}bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="{$data.base_js}member.js"></script>
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
                <div class="muted pull-left">Member</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmmember" action="{$data.base_url}member/create" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Add Member</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Name</label>
							<div class="controls">
								<input type="text" class="span3" id="vName" name="data[vName]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Email</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmail" name="data[vEmail]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Username</label>
							<div class="controls">
								<input type="text" class="span3" id="vUsername" name="data[vUsername]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Password</label>
							<div class="controls">
								<input type="password" class="span3" id="vPassword" name="data[vPassword]" value="" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Phone</label>
							<div class="controls">
								<input type="text" class="span3" id="vPhone" name="data[vPhone]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Url</label>
							<div class="controls">
								<input type="text" class="span3" id="vURL" name="data[vURL]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Description</label>
							<div class="controls">
								<input type="text" class="span3" id="tDescription" name="data[tDescription]" value="">
							</div>
						</div>						
						<div class="control-group input-append date" id="datetimepicker1">
							<div clas s="control-group">
								<label class="control-label" for="typeahead">Date of Birth</label>
								<div class="controls">
									<input type="text" data-format="yyyy/MM/dd " id="dBirthDate" name="data[dBirthDate]" value="">
									<span class="add-on">
										<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country</label>
							<div class="controls">
								<select class="input-large" name="data[iCountryId]" id="iCountryId">
									<option value="">-- Select Country --</option>
									{section name = i loop = $all_countries}
									<option value="{$all_countries[i].iCountryId}">{$all_countries[i].vCountry}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">State</label>
							<div class="controls">
								<select class="input-large" name="data[iStateId]" id="iStateId">
									<option value="">-- Select State --</option>
									{section name = i loop = $all_states}
									<option value="{$all_states[i].iStateId}">{$all_states[i].vState}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Picture</label>
							<div class="controls">
								<input type="file" class="span3" id="vPicture" name="vPicture" value="" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select class="input-large" name="data[eStatus]" id="eStatus">
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
{literal}
<script>
$(":file").filestyle({icon: false});
</script>
{/literal}