<?php /* Smarty version Smarty-3.1.11, created on 2014-02-17 14:23:52
         compiled from "application/views/templates/member/following.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5333123952ff7b55222be7-43836100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '164df6b2c0d8a53248947790b3c75d379b9819e5' => 
    array (
      0 => 'application/views/templates/member/following.tpl',
      1 => 1392621761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5333123952ff7b55222be7-43836100',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7b552707c4_75344292',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7b552707c4_75344292')) {function content_52ff7b552707c4_75344292($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
member.js"></script>
<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
">
<fieldset>
	<div class="block-content collapse in">
		<table class="table  table-bordered table-striped" id="memberfollowers">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
		</table>  
	</div>
</fieldset>

<script type="text/javascript">
var editor; 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/member_following?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
",
        "domTable": "#memberfollowers",
        "fields": [ 
        	{
                "label": "Name:",
                "name": "vName"
            },
        ]
    } );
 
    $('#memberfollowers').dataTable( {
        "sAjaxSource": base_url+"member/member_following?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
",
        "aoColumns": [
            { "mData": "vName" }
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