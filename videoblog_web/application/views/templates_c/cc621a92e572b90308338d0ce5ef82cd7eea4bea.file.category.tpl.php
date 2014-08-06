<?php /* Smarty version Smarty-3.1.11, created on 2014-02-25 20:02:23
         compiled from "application/views/templates/category/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37594288252ff764db874b1-68301096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc621a92e572b90308338d0ce5ef82cd7eea4bea' => 
    array (
      0 => 'application/views/templates/category/category.tpl',
      1 => 1392815621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37594288252ff764db874b1-68301096',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff764dcef3c6_84351677',
  'variables' => 
  array (
    'data' => 0,
    'eStatuses' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff764dcef3c6_84351677')) {function content_52ff764dcef3c6_84351677($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
category.js"></script>
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
                <div class="muted pull-left">Categories</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcategory" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
category/<?php echo $_smarty_tpl->tpl_vars['data']->value['function'];?>
" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[iCategoryId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['iCategoryId'];?>
">
					<fieldset>
						<legend><?php if ($_smarty_tpl->tpl_vars['data']->value['function']!='create'){?>Edit <?php }else{ ?>Add <?php }?> Category</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Category</label>
							<div class="controls">
								<input type="text" class="span3" id="vCategory" name="data[vCategory]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['vCategory'];?>
">
							</div>
						</div>
						<div class="control-group" id="image">
							<label class="control-label" for="typeahead">Category Icon</label>
							<div class="controls">
								<input type="file" class="span10" id="vIcon" name="vIcon" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['vIcon'];?>
" onchange="CheckValidFile(this.value,this.name)">
							</div>
							<input type="hidden" id="editimage" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['vIcon'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['category']['vIcon']!=''){?>
							<div class="controls">
								<button class="btn btn-inverse" data-toggle="modal" data-target="#myModalpostvi">
									View
								</button>
								<button class="btn btn-danger" data-toggle="modal" data-target="#myModaldelpostvi">
									Delete
								</button>
							</div>
							<?php }?>
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
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['category']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>
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
</div>
<div class="modal fade" id="myModalpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Icon</h4>
			</div>
			<div class="modal-body">
				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/category_icons/<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['iCategoryId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['vIcon'];?>
" />
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure to delete the Icon?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
category/deleteicon?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['iCategoryId'];?>
" class="btn btn-primary">Yes</a>
			</div>
		</div>
	</div>
</div><?php }} ?>