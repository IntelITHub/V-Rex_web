<?php /* Smarty version Smarty-3.1.11, created on 2014-02-15 21:17:42
         compiled from "application/views/templates/emailtemplate/view-emailtemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56072399652ff7706116ef4-06984550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe6628e1d29139037160c6d4ddce2eb53ac94676' => 
    array (
      0 => 'application/views/templates/emailtemplate/view-emailtemplate.tpl',
      1 => 1392470353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56072399652ff7706116ef4-06984550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff77061b8b14_32654220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff77061b8b14_32654220')) {function content_52ff77061b8b14_32654220($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
emailtemplate.js"></script>
<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
emailtemplate/action_update" method="post">
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
                <div class="muted pull-left">Email Template</div>
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
                            
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
emailtemplate/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped" id="emailtemplatelistId">
                <thead>
                <tr>
                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th>Email Title</th>
                    <th>From Email</th>
                    <th width="10%">Email Code</th>
                    <th width="10%">Status</th>
                    <th width="10%">Edit</th>
                </tr>
                </thead>
                </table>    
            </div>
        </div>
    </div>
</div>           
</form>           <?php }} ?>