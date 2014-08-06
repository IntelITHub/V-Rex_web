<?php /* Smarty version Smarty-3.1.11, created on 2014-03-26 11:55:11
         compiled from "application/views/templates/member/member-information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178305943752ff7b54d15398-52214772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81ec21614b6330b6b94fbd3faac5bcaea6c3d814' => 
    array (
      0 => 'application/views/templates/member/member-information.tpl',
      1 => 1395809707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178305943752ff7b54d15398-52214772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52ff7b54e96e43_25700313',
  'variables' => 
  array (
    'data' => 0,
    'member_pic_path' => 0,
    'eStatuses' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ff7b54e96e43_25700313')) {function content_52ff7b54e96e43_25700313($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
bootstrap-datetimepicker.min.js"></script>  
<link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
member.js"></script>
<form class="form-horizontal" id="frmmember" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
member/update" method="post" enctype="multipart/form-data">
	<input type="hidden" name="data[iMemberId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="typeahead">Name</label>
			<div class="controls">
				<input type="text" class="span3" id="vName" name="data[vName]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vName'];?>
">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Email</label>
			<div class="controls">
				<input type="text" class="span3" id="vEmail" name="data[vEmail]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vEmail'];?>
">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Username</label>
			<div class="controls">
				<input type="text" class="span3" id="vUsername" name="data[vUsername]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vUsername'];?>
">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Phone</label>
			<div class="controls">
				<input type="text" class="span3" id="vPhone" name="data[vPhone]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vPhone'];?>
">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Url</label>
			<div class="controls">
				<input type="text" class="span3" id="vURL" name="data[vURL]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vURL'];?>
">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Description</label>
			<div class="controls">
				<input type="text" class="span3" id="tDescription" name="data[tDescription]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['tDescription'];?>
">
			</div>
		</div>
		<div class="control-group input-append date" id="datetimepicker1">
			<label class="control-label" for="typeahead">Date of Birth</label>
			<div class="controls">
				<input type="text" data-format="yyyy/MM/dd " id="dBirthDate" name="data[dBirthDate]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['dBirthDate'];?>
">
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Country</label>
			<div class="controls">
				<select class="input-large" name="data[iCountryId]" id="iCountryId">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_country']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_country'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['all_country'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry']==$_smarty_tpl->tpl_vars['data']->value['member']['iCountryId']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['all_country'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">State</label>
			<div class="controls">
				<select class="input-large" name="data[iStateId]" id="iStateId">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_state']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_state'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vState'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['all_state'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vState']==$_smarty_tpl->tpl_vars['data']->value['member']['iStateId']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['all_state'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vState'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="typeahead">Picture</label>
			<div class="controls">
				<input type="file" class="span3" name="vPicture"  value=<?php if ($_smarty_tpl->tpl_vars['data']->value['member']['vPicture']==''){?> lang="*" id="vPicture" <?php }?>>
				<a href="<?php echo $_smarty_tpl->tpl_vars['member_pic_path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['iMemberId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vPicture'];?>
" class="btn btn-primary img_modal">View Picture</a>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<select class="input-large" name="data[eStatus]">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eStatuses']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['member']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" id="btn-save" class="btn btn-primary" >Save changes</button>
			<button type="button" class="btn" onclick="returnme();">Cancel</button>
		</div>
	</fieldset>
</form>

<script>
$(":file").filestyle({icon: false});
//handler for link
$('.img_modal').on('click', function(e) {
    e.preventDefault();
    $("#modal_img_target").attr("src", this);
    $('#modal').modal('show');
});
</script>

<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['data']->value['member']['vName'];?>
</h3>
    </div>
    <div class="modal-body">
        <img id="modal_img_target">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div><?php }} ?>