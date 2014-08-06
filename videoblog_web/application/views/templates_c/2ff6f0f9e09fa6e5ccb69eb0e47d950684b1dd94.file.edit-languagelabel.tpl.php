<?php /* Smarty version Smarty-3.1.11, created on 2014-01-24 23:06:12
         compiled from "application/views/templates/edit-languagelabel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51779473352e2648ab1d519-60909865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ff6f0f9e09fa6e5ccb69eb0e47d950684b1dd94' => 
    array (
      0 => 'application/views/templates/edit-languagelabel.tpl',
      1 => 1390573866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51779473352e2648ab1d519-60909865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52e2648ab6f116_83702677',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e2648ab6f116_83702677')) {function content_52e2648ab6f116_83702677($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
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
                <div class="muted pull-left">Edit Language Label</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmlanguage" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel/update" method="post">
					<input type="hidden" id="iLabelId" name="data[iLabelId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['iLabelId'];?>
">
					<fieldset>
					<legend>Edit Language Label</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Label Name</label>
								<div class="controls">
									<input type="text" class="span3" id="vName" name="data[vName]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vName'];?>
">
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Value [English]</label>
	                            <div class="controls">
	                               <textarea id="vValue_en" name="data[vValue_en]"><?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_en'];?>
</textarea>
	                            </div>
	                    </div>
	                    <div class="control-group">
	                        <label class="control-label">Value [France]</label>
	                            <div class="controls">
	                               <textarea id="vValue_fr" name="data[vValue_fr]"><?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_fr'];?>
</textarea>
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