<?php /* Smarty version Smarty-3.1.11, created on 2014-02-03 17:30:08
         compiled from "application/views/templates/mypost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86948035252e236b6f1b9f4-25432708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61540c56250113a167da2acc0b3a2c446ebc4e9e' => 
    array (
      0 => 'application/views/templates/mypost.tpl',
      1 => 1391064687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86948035252e236b6f1b9f4-25432708',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52e236b70212a2_33894357',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e236b70212a2_33894357')) {function content_52e236b70212a2_33894357($_smarty_tpl) {?><input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
">
<fieldset>
	<div class="block-content collapse in">
		<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
		<div class="span12">
			<div class="alert alert-info">
				<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

			</div>
		</div>
		<?php }?>
		<div class="row-fluid">
			<div class="span6">
				<div class="span6">
					<?php if (count($_smarty_tpl->tpl_vars['data']->value['mypost'])>0){?>
					<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
					<?php }?>
				</div>
			</div>
		</div>
		<table class="table table-bordered table-striped ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if (count($_smarty_tpl->tpl_vars['data']->value['mypost'])>0){?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['mypost']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['mypost'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tPost'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['mypost'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['mypost'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['mypost'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
				</tr>
				<?php endfor; endif; ?>
				<?php }else{ ?>
				<tr>
					<td colspan="9">
						<div class="text-center">
							No Record Found
						</div>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>  
		<div class="pagination">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

		</div>
	</div>
</fieldset><?php }} ?>