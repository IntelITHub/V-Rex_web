<?php /* Smarty version Smarty-3.1.11, created on 2014-02-12 21:54:14
         compiled from "application/views/templates/changepassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167811365752fb8b16ed9ff1-84414510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c559cd74e890f602a2108b89eabd96cf35fd03f2' => 
    array (
      0 => 'application/views/templates/changepassword.tpl',
      1 => 1392216804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167811365752fb8b16ed9ff1-84414510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52fb8b17035c90_27255585',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fb8b17035c90_27255585')) {function content_52fb8b17035c90_27255585($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
changepassword.js"></script>
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
                <div class="muted pull-left">Change Password</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="changepwd" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
changepassword" method="post">
					<fieldset>
					<legend>Change Password</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">New Password</label>
							<div class="controls">
								<input type="password" class="span3" id="vPassword" name="vPassword">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Confirm Password</label>
							<div class="controls">
								<input type="password" class="span3" id="confirmpwd">
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