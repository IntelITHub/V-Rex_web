<?php /* Smarty version Smarty-3.1.11, created on 2014-02-03 17:30:08
         compiled from "application/views/templates/edit-member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189968916152a0835087ec98-15393109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45257c053e93fc5bfc7de2bdf7257dd471bc8eac' => 
    array (
      0 => 'application/views/templates/edit-member.tpl',
      1 => 1391064674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189968916152a0835087ec98-15393109',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a083508c6a79_51138724',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a083508c6a79_51138724')) {function content_52a083508c6a79_51138724($_smarty_tpl) {?><div class="row-fluid">
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
				<div class="muted pull-left">Member</div>
			</div>
			<div class="block-content collapse in">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Member</a></li>
					<li><a data-toggle="tab" href="#tab2">Followers</a></li>
					<li><a data-toggle="tab" href="#tab3">Following</a></li>
					<li><a data-toggle="tab" href="#tab4">My Post</a></li>
				</ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                		<?php echo $_smarty_tpl->getSubTemplate ("member-information.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab2">
                    	<?php echo $_smarty_tpl->getSubTemplate ("followers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab3">
                    	<?php echo $_smarty_tpl->getSubTemplate ("following.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                    </div>
                    <div class="tab-pane" id="tab4">
                    	<?php echo $_smarty_tpl->getSubTemplate ("mypost.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                    </div>
                </div>				
			</div>
		</div>
	</div>
</div><?php }} ?>