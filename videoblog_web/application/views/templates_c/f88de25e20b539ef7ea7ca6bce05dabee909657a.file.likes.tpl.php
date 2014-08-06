<?php /* Smarty version Smarty-3.1.11, created on 2014-01-30 13:52:27
         compiled from "application/views/templates/likes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60180841152e2044c94cf85-18678648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f88de25e20b539ef7ea7ca6bce05dabee909657a' => 
    array (
      0 => 'application/views/templates/likes.tpl',
      1 => 1391064696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60180841152e2044c94cf85-18678648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52e2044c94dcd1_18308880',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e2044c94dcd1_18308880')) {function content_52e2044c94dcd1_18308880($_smarty_tpl) {?><form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/action_update_like" method="post">
		<input type="hidden" name="action" id="action-like">
<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iMemberId'];?>
">

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
				<div class="span6 ">
					<?php if (count($_smarty_tpl->tpl_vars['data']->value['like'])>0){?>
					<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
					<?php }?>
				</div>
			</div>
			<div class="span6">
                <div class="pull-right">
                    <!--button type="submit" id="btn-public" class="btn btn-info bottom-buffer">Make Approve</button-->
                    <button type="submit" id="btn-delete-like" class="btn btn-danger bottom-buffer">Delete</button>
                </div>
            </div>	
		</div>
		<table class="table  table-bordered table-striped ">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
					<th>Member</th>
					<!--th>Post</th>
					<th width="60%">Description</th-->
				</tr>
			</thead>
			<tbody>
				<?php if (count($_smarty_tpl->tpl_vars['data']->value['like'])>0){?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['like']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><input type="checkbox" name="iId[]" id="iId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['like'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLikeId'];?>
"></td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['like'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</td>
					<!--td><?php echo $_smarty_tpl->tpl_vars['data']->value['like'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tPost'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['like'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
</td-->
				</tr>
				<?php endfor; endif; ?>
				<?php }else{ ?>
				<tr>
					<td colspan="9"><div class="text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</div></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<div class="pagination">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

		</div>
	</div>
</form><?php }} ?>