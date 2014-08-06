<?php /* Smarty version Smarty-3.1.11, created on 2014-01-17 19:17:14
         compiled from "application/views/templates/new-role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20143438552b14a8e0691d8-74806204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '673836749904449741d552cd1551c0e751bfeda3' => 
    array (
      0 => 'application/views/templates/new-role.tpl',
      1 => 1387362775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20143438552b14a8e0691d8-74806204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52b14a8e098dd8_12794723',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b14a8e098dd8_12794723')) {function content_52b14a8e098dd8_12794723($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
role.js"></script>
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
                <div class="muted pull-left">Role</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmrole" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
role/create" method="post">
					<fieldset>
					<legend>Add Role</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
								<div class="controls">
									<input type="text" class="span6" id="vTitle" name="data[vTitle]" value="" >
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Status</label>
	                            <div class="controls">
	                                <select class="input-large" name="data[eStatus]">
	                                    <option value="Active" >Active</option>
	                                    <option value="Inactive" >Inactive</option>
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
</div><?php }} ?>