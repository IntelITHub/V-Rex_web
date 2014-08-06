<script src="{$data.base_js}emailtemplate.js"></script>
<link rel="stylesheet" href="{$data.admin_boostrap}css/prettify.css">
<link rel="stylesheet" href="{$data.admin_boostrap}css/bootstrap-wysihtml5.css">
<script src="{$data.admin_boostrap}js/wysihtml5-0.3.0.js"></script>
<script src="{$data.admin_boostrap}js/prettify.js"></script>
<script src="{$data.admin_boostrap}js/bootstrap-wysihtml5.js"></script>

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
                <div class="muted pull-left">Emailtemplate</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmuser" action="{$data.base_url}emailtemplate/{$data.function}" method="post">
					<input type="hidden" name="data[iEmailTemplateId]" value="{$data.emailtemplate.iEmailTemplateId}">
					<fieldset>
					<legend>{if $data.function neq 'create'}Edit {else}Add {/if} Emailtemplate</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Code</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailCode" name="data[vEmailCode]" value="{$data.emailtemplate.vEmailCode}" {if $data.function neq 'create'}disabled{/if}>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Email Title</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailTitle" name="data[vEmailTitle]" value="{$data.emailtemplate.vEmailTitle}">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">From Email</label>
							<div class="controls">
								<input type="text" class="span3" id="vFromEmail" name="data[vFromEmail]" value="{$data.emailtemplate.vFromEmail}">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Subject</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailSubject" name="data[vEmailSubject]" value="{$data.emailtemplate.vEmailSubject}">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Email Massage</label>
							<div class="controls">
								<textarea class="textarea" placeholder="Enter text ..." name="data[tEmailMessage]" id="tEmailMessage" class="inputbox" title="Email Message" value="" style="width: 810px; height: 200px">{$data.emailtemplate.tEmailMessage}</textarea>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Footer</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailFooter" name="data[vEmailFooter]" value="{$data.emailtemplate.vEmailFooter}">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
							    <select class="input-large" name="data[eStatus]">
								{section name=i loop =$eStatuses}
								<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.emailtemplate.eStatus} selected {/if} >{$eStatuses[i]}</option>
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
{literal}
<script>
	$('.textarea').wysihtml5();
</script>
{/literal}
