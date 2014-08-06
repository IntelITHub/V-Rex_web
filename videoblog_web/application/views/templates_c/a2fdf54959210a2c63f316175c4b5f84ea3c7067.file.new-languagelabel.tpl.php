<?php /* Smarty version Smarty-3.1.11, created on 2014-01-24 20:06:48
         compiled from "application/views/templates/new-languagelabel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3805522352e2616aacad62-01662742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2fdf54959210a2c63f316175c4b5f84ea3c7067' => 
    array (
      0 => 'application/views/templates/new-languagelabel.tpl',
      1 => 1390568796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3805522352e2616aacad62-01662742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52e2616aafaeb6_54868748',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e2616aafaeb6_54868748')) {function content_52e2616aafaeb6_54868748($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
languagelabel.js"></script>
<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['breadcrumb'];?>

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
				<form class="form-horizontal" id="frmlanguagelabel" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel/create" method="post">
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



<?php }} ?>