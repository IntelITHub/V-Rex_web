<?php /* Smarty version Smarty-3.1.11, created on 2014-02-13 21:55:04
         compiled from "application/views/templates/edit-emailtemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80488789152fcdcc89d0791-99654645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b6ae469e3e1c80937ea2a8df8c7368b74a858f' => 
    array (
      0 => 'application/views/templates/edit-emailtemplate.tpl',
      1 => 1392303300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80488789152fcdcc89d0791-99654645',
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
  'unifunc' => 'content_52fcdcc8ab1274_08240540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fcdcc8ab1274_08240540')) {function content_52fcdcc8ab1274_08240540($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
emailtemplate.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_boostrap'];?>
css/prettify.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_boostrap'];?>
css/bootstrap-wysihtml5.css">
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_boostrap'];?>
js/wysihtml5-0.3.0.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_boostrap'];?>
js/prettify.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_boostrap'];?>
js/bootstrap-wysihtml5.js"></script>

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
                <div class="muted pull-left">Emailtemplate</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmuser" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
emailtemplate/update" method="post">
					<input type="hidden" name="data[iEmailTemplateId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['iEmailTemplateId'];?>
">
					<fieldset>
					<legend>Edit Emailtemplate</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Title</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailTitle" name="data[vEmailTitle]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['vEmailTitle'];?>
">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">From Email</label>
							<div class="controls">
								<input type="text" class="span3" id="vFromEmail" name="data[vFromEmail]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['vFromEmail'];?>
">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Subject</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailSubject" name="data[vEmailSubject]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['vEmailSubject'];?>
">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Email Massage</label>
							<div class="controls">
								<textarea class="textarea" placeholder="Enter text ..." name="data[tEmailMessage]" id="tEmailMessage" class="inputbox" title="Email Message" value="" style="width: 810px; height: 200px"><?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['tEmailMessage'];?>
</textarea>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="typeahead">Email Footer</label>
							<div class="controls">
								<input type="text" class="span3" id="vEmailFooter" name="data[vEmailFooter]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailtemplate']['vEmailFooter'];?>
">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Status</label>
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
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['emailtemplate']['eStatus']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
								<?php endfor; endif; ?>
							    </select>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="submit" id="btn-save" class="btn bottom-buffer" >Save changes</button>
							<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
                        </div>
                    </fieldset>
				</form>
            </div>
        </div>
    </div>
</div>

<script>
	$('.textarea').wysihtml5();
</script>

<?php }} ?>