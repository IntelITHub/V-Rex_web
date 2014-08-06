<script src="{$data.base_js}languagelabel.js"></script>
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
                <div class="muted pull-left">Language Labels</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmlanguagelabel" action="{$data.base_url}languagelabel/create" method="post">
					<fieldset>
					<legend>Add Language</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Label Name</label>
								<div class="controls">
									<input type="text" class="span3" id="vName" name="data[vName]" value="" >
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Value [English]</label>
	                            <div class="controls">
	                               <textarea id="vValue_en" name="data[vValue_en]"></textarea>
	                            </div>
	                    </div>
	                    <div class="control-group">
	                        <label class="control-label">Value [France]</label>
	                            <div class="controls">
	                               <textarea id="vValue_fr" name="data[vValue_fr]"></textarea>
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



