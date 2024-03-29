<script src="{$data.base_js}staticpage.js"></script>
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
                <div class="muted pull-left">Edit Static Page</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmstaticpage" action="{$data.base_url}staticpage/update" method="post">
					<input type="hidden" id="iSPageId" name="data[iSPageId]" value="{$data.staticpage.iSPageId}">
					<fieldset>
					<legend>Edit Static Page</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
								<div class="controls">
									<input type="text" class="span3" id="vpagename" name="data[vpagename]" value="{$data.staticpage.vpagename}" >
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Status</label>
	                            <div class="controls">
	                                <select class="input-large" name="data[eStatus]">
	                                	{section name=i loop=$eStatuses}
	                                	<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.staticpage.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
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



