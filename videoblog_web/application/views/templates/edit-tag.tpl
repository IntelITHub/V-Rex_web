<script src="{$data.base_js}tag.js"></script>
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
                <div class="muted pull-left">Tag</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmtag" action="{$data.base_url}tag/update" method="post">
					<input type="hidden" name="data[iTagId]" value="{$data.tag.iTagId}">
					<fieldset>
						<legend>Edit Tag</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Tag</label>
							<div class="controls">
								<input type="text" class="span3" id="vTag" name="data[vTag]" value="{$data.tag.vTag}">
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