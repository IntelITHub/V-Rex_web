<?php /* Smarty version Smarty-3.1.11, created on 2014-02-03 13:01:54
         compiled from "application/views/templates/post-img-video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2767475152e262200f1e50-50823263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b03c29f2ac6c4312fb1df2e1466db3bde6ab3b0' => 
    array (
      0 => 'application/views/templates/post-img-video.tpl',
      1 => 1391064664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2767475152e262200f1e50-50823263',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52e262200f6ba4_56482151',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e262200f6ba4_56482151')) {function content_52e262200f6ba4_56482151($_smarty_tpl) {?><div class="modal fade" id="myModalpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      	<h4 class="modal-title" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['data']->value['post']['eFileType'];?>
</h4>
      </div>
      <div class="modal-body">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['post']['eFileType']=='Image'){?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['vFile'];?>
" />
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['data']->value['post']['eFileType']=='Video'){?>
          <video width="320" height="240" controls>
            <source src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['vFile'];?>
" type="video/mp4">
            <source src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['vFile'];?>
" type="video/ogg">
            Your browser does not support the video tag.
          </video> 
          <?php }?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
          Are you sure, to delete <?php echo $_smarty_tpl->tpl_vars['data']->value['post']['eFileType'];?>
 ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/deletevideo?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
" class="btn btn-primary">Yes</a>
      </div>      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><?php }} ?>