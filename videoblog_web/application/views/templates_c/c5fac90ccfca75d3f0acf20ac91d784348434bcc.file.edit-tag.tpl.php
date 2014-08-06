<?php /* Smarty version Smarty-3.1.11, created on 2013-12-18 18:43:19
         compiled from "application/views/templates/edit-tag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102848740752a1bd6f46c275-05734559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5fac90ccfca75d3f0acf20ac91d784348434bcc' => 
    array (
      0 => 'application/views/templates/edit-tag.tpl',
      1 => 1387366971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102848740752a1bd6f46c275-05734559',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a1bd6f4bf794_91883228',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1bd6f4bf794_91883228')) {function content_52a1bd6f4bf794_91883228($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
tag.js"></script>
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
                <div class="muted pull-left">Tag</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmtag" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
tag/update" method="post">
					<input type="hidden" name="data[iTagId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tag']['iTagId'];?>
">
					<fieldset>
						<legend>Edit Tag</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Tag</label>
							<div class="controls">
								<input type="text" class="span3" id="vTag" name="data[vTag]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tag']['vTag'];?>
">
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
</div><?php }} ?>