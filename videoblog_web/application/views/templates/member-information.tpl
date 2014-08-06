<script src="{$data.base_js}bootstrap-datetimepicker.min.js"></script>  
<link href="{$data.base_js}bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="{$data.base_js}member.js"></script>
<form class="form-horizontal" id="frmmember" action="{$data.base_url}member/update" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[iMemberId]" value="{$data.member.iMemberId}">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="typeahead">Name</label>
							<div class="controls">
								<input type="text" class="span3" id="vName" name="data[vName]" value="{$data.member.vName}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Email</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmail" name="data[vEmail]" value="{$data.member.vEmail}">
							</div>
						</div>
						<!--<div class="control-group">
							<label class="control-label" for="typeahead">Username</label>
							<div class="controls">
								<input type="text" class="span3" id="vUsername" name="data[vUsername]" value="{$data.member.vUsername}">
							</div>
						</div>-->
						<div class="control-group input-append date" id="datetimepicker1">
							<label class="control-label" for="typeahead">Date of Birth</label>
							<div class="controls">
								<input type="text" data-format="yyyy/MM/dd " id="dBirthDate" name="data[dBirthDate]" value="{$data.member.dBirthDate}">
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>	
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country</label>
							<div class="controls">
								<select class="input-large" name="data[iCountryId]" id="iCountryId">
									
									{section name = i loop = $data.all_country}
									<option value="{$data.all_country[i].iCountryId}" {if $data.all_country[i].iCountryId eq $data.member.iCountryId}selected="selected"{/if}>{$data.all_country[i].vCountry}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">State</label>
							<div class="controls">
								<select class="input-large" name="data[iStateId]" id="iStateId">
									{section name = i loop = $data.all_state}
									<option value="{$data.all_state[i].iStateId}" {if $data.all_state[i].iStateId eq $data.member.iStateId}selected="selected"{/if}>{$data.all_state[i].vState}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Picture</label>
							<div class="controls">
								<input type="file" class="span3" name="vPicture"  value={if $data.member.vPicture eq ''} lang="*" id="vPicture" {/if}>
								
								<a href="{$member_pic_path}{$data.member.iMemberId}/{$data.member.vPicture}" class="btn btn-primary img_modal">View Picture</a>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select class="input-large" name="data[eStatus]">
									{section name=i loop=$eStatuses}
									<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.member.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
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

<script>
//handler for link
$('.img_modal').on('click', function(e) {
    e.preventDefault();
    $("#modal_img_target").attr("src", this);
    $('#modal').modal('show');
});
</script>
<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">{$data.member.vName}</h3>
    </div>
    <div class="modal-body">
        <img id="modal_img_target">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>