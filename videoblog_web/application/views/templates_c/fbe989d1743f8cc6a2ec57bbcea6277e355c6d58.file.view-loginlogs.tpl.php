<?php /* Smarty version Smarty-3.1.11, created on 2014-03-26 17:51:53
         compiled from "application/views/templates/loginlogs/view-loginlogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53091602352ff702850f7a9-76086048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbe989d1743f8cc6a2ec57bbcea6277e355c6d58' => 
    array (
      0 => 'application/views/templates/loginlogs/view-loginlogs.tpl',
      1 => 1395830970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53091602352ff702850f7a9-76086048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff702867fcb8_92015630',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff702867fcb8_92015630')) {function content_52ff702867fcb8_92015630($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home1/zerninph/public_html/php/videoblog/system/libs/smarty/plugins/modifier.date_format.php';
?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
loginlog.js"></script>    
<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
loginlogs/action_update" method="post">
<input type="hidden" name="action" id="action">
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
                <div class="muted pull-left">Login History</div>
            </div>
            <div class="block-content collapse in">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                <div class="span12">
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                    </div>
                </div>
                <?php }?>
                <div class="row-fluid bottom-buffer">
                    <div class="span6">
                        <div class="span6 ">
                            <?php if (count($_smarty_tpl->tpl_vars['data']->value['loginlogs'])>0){?>
                            <p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
                            <?php }?>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-delete" class="btn btn-danger ">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="loginlogList">
                <thead>
                <tr>
                    <th width="1%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>IP</th>
                    <th width="20%">Login Date</th>
                    <th width="20%">Logout Date</th>
                </tr>
                </thead>
                <!--<tbody>
                <?php if (count($_smarty_tpl->tpl_vars['data']->value['loginlogs'])>0){?>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['loginlogs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <td><input type="checkbox" name="iId[]" id="iId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLoginLogId'];?>
"></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vIP'];?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dLoginDate'],"%e  %B  %Y  %H:%M:%S %p");?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['loginlogs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dLogoutDate'],"%e  %B  %Y  %H:%M:%S %p");?>
</td>
                </tr>
                <?php endfor; endif; ?>
                <?php }else{ ?>
                <tr>
                    <td colspan="7"><div class="text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</div></td>
                </tr>
                <?php }?>
                </tbody> -->
                </table>   
                <!--<div class="pagination">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

                </div>         -->  
            </div>
        </div>
    </div>
</div>            <?php }} ?>