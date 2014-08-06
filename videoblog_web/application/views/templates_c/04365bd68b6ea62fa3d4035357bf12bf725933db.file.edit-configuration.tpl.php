<?php /* Smarty version Smarty-3.1.11, created on 2014-02-13 21:49:19
         compiled from "application/views/templates/edit-configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56006007352fcdb6f380208-01712037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04365bd68b6ea62fa3d4035357bf12bf725933db' => 
    array (
      0 => 'application/views/templates/edit-configuration.tpl',
      1 => 1392302360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56006007352fcdb6f380208-01712037',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'db_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52fcdb6f5664c2_22858776',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fcdb6f5664c2_22858776')) {function content_52fcdb6f5664c2_22858776($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
configurations.js"></script>
<div class="row-fluid">
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
                <div class="muted pull-left">Configurations</div>
            </div>
	    <div class="block-content collapse in">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                <div class="span12">
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                    </div>
                </div>
                <?php }?>
	    </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcategory" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
configuration/update" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[iSettingId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['configurations']['iSettingId'];?>
">
					<fieldset>
						<legend>Edit Configurations</legend>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['db_config']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<div class="inputboxes">

							<label class="control-label" for="typeahead">
							    <?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appsec'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appid'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Facebook Link'){?><?php echo '';?>
<?php }else{ ?><?php }?></span> <?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>

							</label>
							
							<?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Admin Email Id'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Mail Footer'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Site Name'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Company Name'){?>
							
							<div class="controls">
							<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span3" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
							</div>
							<br />
							
							<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appsec'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appid'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Page Limit (Admin Side)'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='No Of Records Per Page (Admin Side)'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter App Id'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter Secret Key'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Page Limit (Frontend Side)'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='No Of Records Per Page (Frontend Side)'){?>
							<div class="controls">
							<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span3" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
"  title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
							</div>
							<br />
							
							<?php }else{ ?>
							<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span3" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
							<?php }?>
						</div>
						<?php endfor; endif; ?>

						<div class="form-actions">						  
							<button type="submit" id="btn-save" class="btn bottom-buffer" >Edit Configuration</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php }} ?>