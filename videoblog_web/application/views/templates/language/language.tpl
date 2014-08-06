<script src="{$data.base_js}language.js"></script>
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
                <div class="muted pull-left">Languages</div>
            </div>
            <div class="block-content collapse in">
		<form class="form-horizontal" id="frmcategory" action="{$data.base_url}language/{$data.function}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="data[iLanguageId]" value="{$data.language.iLanguageId}">
			<fieldset>
				<legend>{if $data.function neq 'create'}Edit {else}Add {/if}Language</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Language</label>
					<div class="controls">
						<input type="text" class="span3" id="vLanguage" name="data[vLanguage]" value="{$data.language.vLanguage}">
					</div>
				</div>
				<div class="control-group">
							<label class="control-label" for="typeahead">Language Code</label>
								<div class="controls">
									<input type="text" class="span3" id="vLangCode" name="data[vLangCode]" value="{$data.language.vLangCode}" >
								</div>
						</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Status</label>
					<div class="controls">
						<select class="input-large" name="data[eStatus]">
							{section name=i loop=$eStatuses}
							<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.country.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
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