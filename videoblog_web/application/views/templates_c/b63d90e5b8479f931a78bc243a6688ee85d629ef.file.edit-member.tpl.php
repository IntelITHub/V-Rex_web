<?php /* Smarty version Smarty-3.1.11, created on 2014-03-21 19:23:36
         compiled from "application/views/templates/member/edit-member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158277279252ff7b54becd81-75245562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b63d90e5b8479f931a78bc243a6688ee85d629ef' => 
    array (
      0 => 'application/views/templates/member/edit-member.tpl',
      1 => 1395400795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158277279252ff7b54becd81-75245562',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7b54d0dd81_43711867',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7b54d0dd81_43711867')) {function content_52ff7b54d0dd81_43711867($_smarty_tpl) {?><div class="row-fluid">
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
                		<?php echo $_smarty_tpl->getSubTemplate ("member/member-information.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab2">
                    	<?php echo $_smarty_tpl->getSubTemplate ("member/followers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab3">
                    	<?php echo $_smarty_tpl->getSubTemplate ("member/following.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                    </div>
                    <div class="tab-pane" id="tab4">
                    	<?php echo $_smarty_tpl->getSubTemplate ("member/mypost.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                    </div>
                </div>				
			</div>
		</div>
	</div>
</div><?php }} ?>