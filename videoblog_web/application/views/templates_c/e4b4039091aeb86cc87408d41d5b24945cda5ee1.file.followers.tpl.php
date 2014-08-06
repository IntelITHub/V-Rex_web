<?php /* Smarty version Smarty-3.1.11, created on 2014-02-17 14:23:52
         compiled from "application/views/templates/member/followers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154570518552ff7b551b98c4-83960277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4b4039091aeb86cc87408d41d5b24945cda5ee1' => 
    array (
      0 => 'application/views/templates/member/followers.tpl',
      1 => 1392621760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154570518552ff7b551b98c4-83960277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7b55217fa2_23665117',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7b55217fa2_23665117')) {function content_52ff7b55217fa2_23665117($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
member.js"></script>
<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
">
<fieldset>	
	<div class="block-content collapse in">		
		<table class="table  table-bordered table-striped " id="followers">
			<thead>
				<tr>
                    <th>Name</th>
				</tr>
			</thead>
		</table>  
	</div>
</fieldset>

<script type="text/javascript">
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/member_followers?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
",
        "domTable": "#followers",
        "fields": [
            {
                "label": "Name:",
                "name": "vName"
            },
        ]
    } );
 
    $('#followers').dataTable( {
        "sAjaxSource": base_url+"member/member_followers?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
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