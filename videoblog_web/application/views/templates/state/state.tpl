<script src="{$data.base_js}state.js"></script>
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
                <div class="muted pull-left">State</div>
            </div>
            <div class="block-content collapse in">
		<form class="form-horizontal" id="frmcategory" action="{$data.base_url}state/{$data.function}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="data[iStateId]" value="{$data.state.iStateId}">
			<fieldset>
				<legend>{if $data.function neq 'create'}Edit {else}Add {/if}State</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country</label>
					<div class="controls">
						<select name="data[iCountryId]" id="iCountryId">
							{section name = i loop = $data.all_country}
							    <option value="{$data.all_country[i].iCountryId}" {if $data.all_country[i].iCountryId eq $data.state.iCountryId}selected="selected"{/if}>{$data.all_country[i].vCountry}</option>
							{/section}
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">State Name</label>
					<div class="controls">
						<input type="text" class="span3" id="vState" name="data[vState]" value="{$data.state.vState}">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="typeahead">Status</label>
					<div class="controls">
						<select class="input-large" name="data[eStatus]">
							{section name=i loop=$eStatuses}
							<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.state.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
							{/section}
						</select>
					</div>
				</div>
				<div class="form-actions">						  
					<button type="submit" id="btn-save" class="btn btn-primary" >Save changes</button>
					<button type="button" class="btn" onclick="return cancle();">Cancel</button>
				</div>
			</fieldset>
		</form>
	</div>
	</div>
    </div>
</div>