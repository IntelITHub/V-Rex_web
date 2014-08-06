<?php /* Smarty version Smarty-3.1.11, created on 2014-03-24 14:12:35
         compiled from "application/views/templates/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184128913752a06b52553c31-22232022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80217977f3548366c873f16fe891f40f6c5ea85a' => 
    array (
      0 => 'application/views/templates/template.tpl',
      1 => 1395645137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184128913752a06b52553c31-22232022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a06b525a6db7_59912361',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a06b525a6db7_59912361')) {function content_52a06b525a6db7_59912361($_smarty_tpl) {?><!DOCTYPE html>
<html class="no-js">
    <head>
        <title>::: VideoBlog ::: </title>
        <!-- Bootstrap -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
datepicker.css" rel="stylesheet" media="screen">
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
styles.css" rel="stylesheet" media="screen">
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery-1.9.1.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
bootstrap.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
bootstrap-datepicker.js"></script>
		 <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
bootstrap-filestyle.min.js"> </script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
common.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
TableTools.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
dataTables.editor.js"></script>
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
dataTables.bootstrap.css" rel="stylesheet" media="screen">
    
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
dataTables.editor.bootstrap.js"></script>  
        <script type="text/javascript">
			var base_image = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
';		
			var base_url = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
';
			var base_host = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_host'];?>
';
		</script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
	<body>
		<div class="navbar navbar-fixed-top">
			<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>    
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12" id="content">
					<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['data']->value['tpl_name'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
    
				</div>
			</div>
		</div>
	</body>
</html>


<div id="myalert" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Error</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
    </div>
</div>
<?php }} ?>