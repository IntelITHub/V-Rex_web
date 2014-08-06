<?php /* Smarty version Smarty-3.1.11, created on 2014-02-17 12:21:21
         compiled from "application/views/templates/post/comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107243728653019c510c2811-15359346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05010e1a8f035da89074c9f085eac73288c06c8b' => 
    array (
      0 => 'application/views/templates/post/comments.tpl',
      1 => 1392614330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107243728653019c510c2811-15359346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53019c513cde14_26000087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53019c513cde14_26000087')) {function content_53019c513cde14_26000087($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home1/zerninph/public_html/php/videoblog/system/libs/smarty/plugins/modifier.date_format.php';
?><form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post/action_update_comment" method="post">
	<input type="hidden" name="action" id="action-comment">
<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iMemberId'];?>
">
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
				<div class="span6">
					<!--<?php if (count($_smarty_tpl->tpl_vars['data']->value['comment'])>0){?>
					<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
					<?php }?>-->
				</div>
			</div>
            <div class="span6">
                <div class="pull-right">
                    <button type="submit" id="btn-approve-comment" class="btn btn-info bottom-buffer">Make Approve</button>
                    <button type="submit" id="btn-delete-comment" class="btn btn-danger bottom-buffer">Delete</button>
                </div>
            </div>			
		</div>
		<table class="table  table-bordered table-striped " id="postComments">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
					<th>Member</th>
					<th>Comment</th>
					<th>Created date</th>
					<th>Status</th>
				</tr>
			</thead>
			<!--<tbody>
				<?php if (count($_smarty_tpl->tpl_vars['data']->value['comment'])>0){?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['comment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><input type="checkbox" name="iId[]" id="iId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCommentId'];?>
"></td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
</td>
					<!-- <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dCreatedDate'],"%e  %B  %Y  %H:%M:%S %p");?>
</td> 
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dCreatedDate'],"%m/%d/%Y [%H:%M]");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['data']->value['comment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
				</tr>
				<?php endfor; endif; ?>
				<?php }else{ ?>
				<tr>
					<td colspan="5">
						<div class="text-center">
							No Record Found
						</div>
					</td>
				</tr>
				<?php }?>
			</tbody>-->
		</table>  
		<div class="pagination">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

		</div>
</div>
</form>


<script type="text/javascript">
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"post/comment_listing?iPostId=<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
",
        "domTable": "#postComments",
        "fields": [ {
                "label": "Post Comment ID:",
                "name": "id",
                "type": "checkbox"
            },
            {
                "label": "Member:",
                "name": "vName"
            },
            {
                "label": "Comment:",
                "name": "tDescription"
            },
            {
                "label": "Created date:",
                "name": "dCreatedDate"
            },
            {
                "label": "Status",
                "name": "eStatus"
            }
        ]
    } );
 
    $('#postComments').dataTable( {
        "sAjaxSource": base_url+"post/comment_listing?iPostId=<?php echo $_smarty_tpl->tpl_vars['data']->value['post']['iPostId'];?>
",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "vName" },
            { "mData": "tDescription" },
            { "mData": "dCreatedDate" },
            { "mData": "eStatus"}
            
        ],
        "oTableTools": {
            "sRowSelect": "multi",
            "aButtons": [
                { "sExtends": "editor_create", "editor": editor },
                { "sExtends": "editor_edit",   "editor": editor },
                { "sExtends": "editor_remove", "editor": editor }
            ]
        }
    } );
} );
</script>
<?php }} ?>