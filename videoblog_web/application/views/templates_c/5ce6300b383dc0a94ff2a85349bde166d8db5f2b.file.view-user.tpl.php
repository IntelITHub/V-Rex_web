<?php /* Smarty version Smarty-3.1.11, created on 2014-02-03 16:25:19
         compiled from "application/views/templates/view-user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162950622252a08837173d20-72770496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ce6300b383dc0a94ff2a85349bde166d8db5f2b' => 
    array (
      0 => 'application/views/templates/view-user.tpl',
      1 => 1391064681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162950622252a08837173d20-72770496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a088371fe164_67444520',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a088371fe164_67444520')) {function content_52a088371fe164_67444520($_smarty_tpl) {?><form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
user/action_update" method="post">
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
                <div class="muted pull-left">User</div>
            </div>
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
                            <?php if (count($_smarty_tpl->tpl_vars['data']->value['user'])>0){?>
                            <p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
                            <?php }?>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
user/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th width="10%">Name</th>
                        <th width="10%">Role</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone</th>
                        <th width="10%">Status</th>
                        <th width="10%">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($_smarty_tpl->tpl_vars['data']->value['user'])>0){?>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['user']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <td><input type="checkbox" name="iId[]" id="iId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
"></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhone'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
user/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['user'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
">Edit</a></td>
                    </tr>
                    <?php endfor; endif; ?>
                    <?php }else{ ?>
                    <tr>
                        <td colspan="7"><div class="text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</div></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>  
                <div class="pagination">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

                </div>           
            </div>
        </div>
    </div>
</div>           
</form> <?php }} ?>