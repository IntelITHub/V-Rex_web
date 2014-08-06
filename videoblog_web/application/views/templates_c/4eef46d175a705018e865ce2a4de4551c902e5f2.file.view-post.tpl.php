<?php /* Smarty version Smarty-3.1.11, created on 2014-03-21 14:18:42
         compiled from "application/views/templates/post/view-post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33534860552ff6dd36f2de9-49411905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4eef46d175a705018e865ce2a4de4551c902e5f2' => 
    array (
      0 => 'application/views/templates/post/view-post.tpl',
      1 => 1395386229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33534860552ff6dd36f2de9-49411905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff6dd390c6f2_89228680',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff6dd390c6f2_89228680')) {function content_52ff6dd390c6f2_89228680($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home1/zerninph/public_html/php/videoblog/system/libs/smarty/plugins/modifier.date_format.php';
?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
post_listing.js"></script>
<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/action_update" method="post">
	<input type="hidden" name="action" id="action"><div class="row-fluid">
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
	                            <!--<?php if (count($_smarty_tpl->tpl_vars['data']->value['post'])>0){?>
	                            	<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
	                            <?php }?>-->
	                        </div>
	                    </div>
	                    <div class="span6">
	                        <div class="pull-right">
	                            <button type="submit" id="btn-private" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Private</button>
	                            <button type="submit" id="btn-public" class="btn btn-info bottom-buffer">Make Public</button>
	                            <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
	                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
	                        </div>
	                    </div>
	                </div>
	                <table class="table  table-bordered table-striped " id="postList">
		                <thead>
			                <tr>
			                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
			                    <th width="10%"> Video</th>
			                    <th width="15%">Member</th>
			                    <th width="40%">Title</th>
			                    <th width="7%">IP</th>
			                    <th width="15%">Posted Date</th>
			                    <th width="10%">Edit</th>
			                </tr>
		                </thead>
		                <!--<tbody>
			                <?php if (count($_smarty_tpl->tpl_vars['data']->value['post'])>0){?>
				                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['post']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					                    <td><input type="checkbox" name="iId[]" id="iId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostId'];?>
"></td>
					                    <td>
											<?php if ($_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eFileType']=='Image'){?>
												<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFile'];?>
" height="100px" width="100px"/>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eFileType']=='Video'){?>
												<video width="50" height="50" controls>
												<source src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFile'];?>
">
												<!--<source src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/post/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFile'];?>
" type="video/ogg">
												Your browser does not support the video tag.
												</video> 
											<?php }?>
					                    </td>
					                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</td>
					                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tPost'];?>
</td>
					                    <!-- <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dCreatedDate'],"%e  %B  %Y  %H:%M:%S %p");?>
</td>
					                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dCreatedDate'],"%m/%d/%Y [%H:%M]");?>
</td>
					                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['post'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostId'];?>
">Edit</a></td>
					                </tr>
				                <?php endfor; endif; ?>
			                <?php }else{ ?>
			                    <tr>
			                        <td colspan="9"><div class="text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</div></td>
			                    </tr>
			                <?php }?>
		                </tbody>-->
	                </table>  
	                <!--<div class="pagination">
	                    <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

	                </div>-->           
	            </div>
	        </div>
	    </div>
	</div>     
</form>       <?php }} ?>