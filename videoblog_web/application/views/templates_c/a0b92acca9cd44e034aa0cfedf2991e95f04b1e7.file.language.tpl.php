<?php /* Smarty version Smarty-3.1.11, created on 2014-02-15 21:29:00
         compiled from "application/views/templates/language/language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157829810352ff79ac4d5af9-58694715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0b92acca9cd44e034aa0cfedf2991e95f04b1e7' => 
    array (
      0 => 'application/views/templates/language/language.tpl',
      1 => 1392470337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157829810352ff79ac4d5af9-58694715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'eStatuses' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff79ac5dd5e1_15198605',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff79ac5dd5e1_15198605')) {function content_52ff79ac5dd5e1_15198605($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
language.js"></script>
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
                <div class="muted pull-left">Languages</div>
            </div>
            <div class="block-content collapse in">
		<form class="form-horizontal" id="frmcategory" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
language/<?php echo $_smarty_tpl->tpl_vars['data']->value['function'];?>
" method="post" enctype="multipart/form-data">
			<input type="hidden" name="data[iLanguageId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['language']['iLanguageId'];?>
">
			<fieldset>
				<legend><?php if ($_smarty_tpl->tpl_vars['data']->value['function']!='create'){?>Edit <?php }else{ ?>Add <?php }?>Language</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Language</label>
					<div class="controls">
						<input type="text" class="span3" id="vLanguage" name="data[vLanguage]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['language']['vLanguage'];?>
">
					</div>
				</div>
				<div class="control-group">
							<label class="control-label" for="typeahead">Language Code</label>
								<div class="controls">
									<input type="text" class="span3" id="vLangCode" name="data[vLangCode]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['language']['vLangCode'];?>
" >
								</div>
						</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Status</label>
					<div class="controls">
						<select class="input-large" name="data[eStatus]">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eStatuses']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['country']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
							<?php endfor; endif; ?>
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