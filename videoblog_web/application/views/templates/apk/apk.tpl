<script src="{$data.base_js}bootstrap-datetimepicker.min.js"></script>
<link href="{$data.base_js}bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="{$data.base_js}apk.js"></script>
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
                <div class="muted pull-left">Apk</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmapk" action="{$data.base_url}apk/{$data.function}" method="post"  enctype="multipart/form-data">
					<input type="hidden" name="data[iApkId]" value="{$data.apk.iApkId}" id="iApkId">
					<fieldset>
					<legend>{if $data.function neq 'create'}Edit {else}Add {/if}Apk</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
							<div class="controls">
								<input type="text" class="span3" id="vTitle" name="data[vTitle]" value="{$data.apk.vTitle}" 
							</div>
						</div>
						<div class="control-group" style="margin-top:15px;margin-bottom:15px;">
							<label class="control-label" for="typeahead">Apk File</label>
							<div class="controls">
								<input type="file" class="span10" id="vFile" name="vFile" value="{$data.apk.vFile}" onchange="CheckValidFile(this.value,this.name)">
							</div>
							<input type="hidden" id="editfile" value="{$data.apk.vFile}">
							{if $data.apk.vFile neq ''}
							<div class="controls"style="margin-top:15px;">
								<!-- <a href="{$data.base_url}apk/download/{$data.apk.iApkId}"><button class="btn btn-inverse">Download</button></a> -->
								<button class="btn btn-danger" data-toggle="modal" data-target="#myModaldelpostvi">
									Delete
								</button>
							</div>
							{/if}
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Version</label>
							<div class="controls">
								<input type="text" class="span3" id="vVersion" name="data[vVersion]" value="{$data.apk.vVersion}">
							</div>
						</div>
						<div class="control-group input-append date" id="datetimepicker">
							<label class="control-label" for="typeahead">Date</label>
							<div class="controls">
								<input type="text" data-format="yyyy/MM/dd " id="dDate" name="data[dCreatedDate]" value="{$data.apk.dCreatedDate}">
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
								</span>
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
<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure to delete this file?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<a href="{$data.base_url}apk/deleteicon?id={$data.apk.iApkId}" class="btn btn-primary">Yes</a>
			</div>
		</div>
	</div>
</div>
{literal}
<script>
$(":file").filestyle({icon: false});
</script>
{/literal}