<?php /* Smarty version Smarty-3.1.11, created on 2014-03-22 13:41:51
         compiled from "application/views/templates/languagelabel/view-languagelabel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82897215552ff77dc7bbba1-82717744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9fb80eac0eb71d1d5aa0148ba857900d452c649' => 
    array (
      0 => 'application/views/templates/languagelabel/view-languagelabel.tpl',
      1 => 1395470451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82897215552ff77dc7bbba1-82717744',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff77dc842bf7_32110853',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff77dc842bf7_32110853')) {function content_52ff77dc842bf7_32110853($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
languagelabel.js"></script>
<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel/action_update" method="post">
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
                <div class="muted pull-left">Language Labels</div>
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
                    <div class="span6" style="width:98.717949%;margin:0;">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();">Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped " id="LanguagelabellistId">
                <thead>
                <tr>
                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th width="20%">Lable Name</th>
                    <th width="20%">USA English</th>
                    <th width="20%">Portuguese</th>
                    <th width="20%">Status</th>
                    <th width="20%">Edit</th>
                </tr>
                </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</form>
<?php }} ?>