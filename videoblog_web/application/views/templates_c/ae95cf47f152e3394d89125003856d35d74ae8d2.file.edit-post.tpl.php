<?php /* Smarty version Smarty-3.1.11, created on 2014-02-17 12:21:20
         compiled from "application/views/templates/post/edit-post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45485386452ff6e09a99791-50444117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae95cf47f152e3394d89125003856d35d74ae8d2' => 
    array (
      0 => 'application/views/templates/post/edit-post.tpl',
      1 => 1392614355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45485386452ff6e09a99791-50444117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff6e09b89e46_91210508',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff6e09b89e46_91210508')) {function content_52ff6e09b89e46_91210508($_smarty_tpl) {?><div class="row-fluid">
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
				<div class="muted pull-left">Posts</div>
			</div>
			<div class="block-content collapse in">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Post</a></li>
					<li><a data-toggle="tab" href="#tab2">Comments</a></li>
					<li><a data-toggle="tab" href="#tab3">Likes</a></li>
				</ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                		<?php echo $_smarty_tpl->getSubTemplate ("post/post-information.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab2">
                    	<?php echo $_smarty_tpl->getSubTemplate ("post/comments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <div class="tab-pane" id="tab3">
                    	<?php echo $_smarty_tpl->getSubTemplate ("post/likes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                    </div>
                </div>
				
            </div>
        </div>
    </div>
</div>            
<?php }} ?>