<?php /* Smarty version Smarty-3.1.11, created on 2014-02-17 16:32:06
         compiled from "application/views/templates/member/mypost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194015370252ff7b5527ad57-02867147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca9f0722e902416dd6cfa2017e49f0fff597545' => 
    array (
      0 => 'application/views/templates/member/mypost.tpl',
      1 => 1392629500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194015370252ff7b5527ad57-02867147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7b55364da4_14190401',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7b55364da4_14190401')) {function content_52ff7b55364da4_14190401($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
member.js"></script>
<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
">
<fieldset>
	<div class="block-content collapse in">
		<table class="table table-bordered table-striped" id="postlisting">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Name</th>
					<th>Status</th>
				</tr>
			</thead>
		</table>  
	</div>
</fieldset>

<script type="text/javascript">
var editor; 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"member/member_post?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
",
        "domTable": "#postlisting",
        "fields": [ 
            {
                "label": "Title:",
                "name": "tPost"
            },
            {
                "label": "Description:",
                "name": "tDescription"
            },
            {
                "label": "Name:",
                "name": "vName"
            },
            {
                "label": "Status:",
                "name": "eStatus"
            },
        ]
    } );
 
    $('#postlisting').dataTable( {
        "sAjaxSource": base_url+"member/member_post?iMemberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
",
        "aoColumns": [
            { "mData": "tPost" },
            { "mData": "tDescription" },
            { "mData": "vName" },
            { "mData": "eStatus" }
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