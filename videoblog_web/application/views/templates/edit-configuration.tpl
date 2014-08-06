<script src="{$data.base_js}configurations.js"></script>
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
                <div class="muted pull-left">Configurations</div>
            </div>
	    <div class="block-content collapse in">
                {if $data.message neq ''}
                <div class="span12">
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                </div>
                {/if}
	    </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcategory" action="{$data.admin_url}configuration/update" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[iSettingId]" value="{$data.configurations.iSettingId}">
					<fieldset>
						<legend>Edit Configurations</legend>
						
						{section name=i loop=$db_config}
						<div class="inputboxes">

							<label class="control-label" for="typeahead">
							    {if  $db_config[i]->tDescription eq 'Fb Appsec' || $db_config[i]->tDescription eq 'Fb Appid'||$db_config[i]->tDescription eq 'Facebook Link'}{''}{else}{/if}</span> {$db_config[i]->tDescription}
							</label>
							
							{if $db_config[i]->tDescription eq 'Admin Email Id'||$db_config[i]->tDescription eq 'Mail Footer'||$db_config[i]->tDescription eq 'Site Name' ||$db_config[i]->tDescription eq 'Company Name'}
							
							<div class="controls">
							<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span3" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
							</div>
							<br />
							
							{else if $db_config[i]->tDescription eq 'Fb Appsec' || $db_config[i]->tDescription eq 'Fb Appid'|| $db_config[i]->tDescription eq 'Page Limit (Admin Side)' || $db_config[i]->tDescription eq 'No Of Records Per Page (Admin Side)' || $db_config[i]->tDescription eq 'Twitter App Id' || $db_config[i]->tDescription eq 'Twitter Secret Key'|| $db_config[i]->tDescription eq 'Page Limit (Frontend Side)'|| $db_config[i]->tDescription eq 'No Of Records Per Page (Frontend Side)' }
							<div class="controls">
							<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span3" value="{$db_config[i]->vValue}"  title="{$db_config[i]->tDescription}"/>
							</div>
							<br />
							
							{else}
							<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span3" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
							{/if}
						</div>
						{/section}

						<div class="form-actions">						  
							<button type="submit" id="btn-save" class="btn bottom-buffer" >Edit Configuration</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
