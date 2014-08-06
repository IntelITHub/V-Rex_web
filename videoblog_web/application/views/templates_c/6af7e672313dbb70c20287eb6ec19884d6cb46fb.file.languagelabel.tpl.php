<?php /* Smarty version Smarty-3.1.11, created on 2014-03-22 13:39:19
         compiled from "application/views/templates/languagelabel/languagelabel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23487872352ff7f6c3dbcb8-06378416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6af7e672313dbb70c20287eb6ec19884d6cb46fb' => 
    array (
      0 => 'application/views/templates/languagelabel/languagelabel.tpl',
      1 => 1395470355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23487872352ff7f6c3dbcb8-06378416',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7f6c4a9a44_82921029',
  'variables' => 
  array (
    'data' => 0,
    'eStatuses' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7f6c4a9a44_82921029')) {function content_52ff7f6c4a9a44_82921029($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
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
				<form class="form-horizontal" id="frmlanguage" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel/<?php echo $_smarty_tpl->tpl_vars['data']->value['function'];?>
" method="post">
					<input type="hidden" id="iLabelId" name="data[iLabelId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['iLabelId'];?>
">
					<fieldset>
					<legend><?php if ($_smarty_tpl->tpl_vars['data']->value['function']!='create'){?>Edit <?php }else{ ?>Add <?php }?>Label</legend>
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
	                               <textarea id="vValue_en" name="data[vValue_en]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_en'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_en'];?>
</textarea>
	                            </div>
	                    </div>
	                    <!--<div class="control-group">
	                        <label class="control-label">Value [France]</label>
	                            <div class="controls">
	                               <textarea id="vValue_fr" name="data[vValue_fr]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_fr'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_fr'];?>
</textarea>
	                            </div>
	                    </div>-->
	                    <div class="control-group">
	                        <label class="control-label">Value [Portuguese]</label>
	                            <div class="controls">
	                               <textarea id="vValue_ptu" name="data[vValue_pt]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_pt'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['languagelabel']['vValue_pt'];?>
</textarea>
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
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['languagelabel']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
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