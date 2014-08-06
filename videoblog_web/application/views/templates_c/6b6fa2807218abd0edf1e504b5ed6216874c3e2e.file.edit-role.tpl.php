<?php /* Smarty version Smarty-3.1.11, created on 2014-02-15 21:06:20
         compiled from "application/views/templates/role/edit-role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208143109152ff745cc571c6-60704139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b6fa2807218abd0edf1e504b5ed6216874c3e2e' => 
    array (
      0 => 'application/views/templates/role/edit-role.tpl',
      1 => 1392470349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208143109152ff745cc571c6-60704139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff745cd1bd34_58674810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff745cd1bd34_58674810')) {function content_52ff745cd1bd34_58674810($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
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
role/<?php echo $_smarty_tpl->tpl_vars['data']->value['function'];?>
" method="post">
					<input type="hidden" name="data[iRoleId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['role']['iRoleId'];?>
">
					<fieldset>
					<legend><?php if ($_smarty_tpl->tpl_vars['data']->value['function']!='create'){?>Edit <?php }else{ ?>Add <?php }?> Role</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
								<div class="controls">
									<input type="text" class="span6" id="vTitle" name="data[vTitle]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['role']['vTitle'];?>
">
								</div>
						</div>
						<div class="control-group">
	                        <label class="control-label">Status</label>
	                            <div class="controls">
	                                <select class="input-large" name="data[eStatus]">
	                                    <option value="Active" <?php if ($_smarty_tpl->tpl_vars['data']->value['technology']['eStatus']=='Active'){?> selected <?php }?> >Active</option>
	                                    <option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['data']->value['technology']['eStatus']=='Inactive'){?> selected <?php }?> >Inactive</option>
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
</div><?php }} ?>