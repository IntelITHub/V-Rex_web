<?php /* Smarty version Smarty-3.1.11, created on 2014-02-19 20:13:51
         compiled from "application/views/templates/apk/apk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13880227405304ae0f8528e6-43690589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e448e1ceac0ebc39bb9528467b98636525762790' => 
    array (
      0 => 'application/views/templates/apk/apk.tpl',
      1 => 1392815485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13880227405304ae0f8528e6-43690589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5304ae0f93f315_94343833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5304ae0f93f315_94343833')) {function content_5304ae0f93f315_94343833($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
bootstrap-datetimepicker.min.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
apk.js"></script>
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
                <div class="muted pull-left">Apk</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmapk" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
apk/<?php echo $_smarty_tpl->tpl_vars['data']->value['function'];?>
" method="post"  enctype="multipart/form-data">
					<input type="hidden" name="data[iApkId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['iApkId'];?>
" id="iApkId">
					<fieldset>
					<legend><?php if ($_smarty_tpl->tpl_vars['data']->value['function']!='create'){?>Edit <?php }else{ ?>Add <?php }?>Apk</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Title</label>
							<div class="controls">
								<input type="text" class="span3" id="vTitle" name="data[vTitle]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['vTitle'];?>
" 
							</div>
						</div>
						<div class="control-group" style="margin-top:15px;margin-bottom:15px;">
							<label class="control-label" for="typeahead">Apk File</label>
							<div class="controls">
								<input type="file" class="span10" id="vFile" name="vFile" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['vFile'];?>
" onchange="CheckValidFile(this.value,this.name)">
							</div>
							<input type="hidden" id="editfile" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['vFile'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['apk']['vFile']!=''){?>
							<div class="controls"style="margin-top:15px;">
								<!-- <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
apk/download/<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['iApkId'];?>
"><button class="btn btn-inverse">Download</button></a> -->
								<button class="btn btn-danger" data-toggle="modal" data-target="#myModaldelpostvi">
									Delete
								</button>
							</div>
							<?php }?>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Version</label>
							<div class="controls">
								<input type="text" class="span3" id="vVersion" name="data[vVersion]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['vVersion'];?>
">
							</div>
						</div>
						<div class="control-group input-append date" id="datetimepicker">
							<label class="control-label" for="typeahead">Date</label>
							<div class="controls">
								<input type="text" data-format="yyyy/MM/dd " id="dDate" name="data[dCreatedDate]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['dCreatedDate'];?>
">
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
								</span>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" id="btn-save" class="btn btn-primary" >Save changes</button>
							<button type="button" class="btn" onclick="returnme();">Cancel</button>
                        </div>
                    </fieldset>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure to delete this file?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
apk/deleteicon?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['apk']['iApkId'];?>
" class="btn btn-primary">Yes</a>
			</div>
		</div>
	</div>
</div>

<script>
$(":file").filestyle({icon: false});
</script>
<?php }} ?>