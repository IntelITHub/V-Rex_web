<?php /* Smarty version Smarty-3.1.11, created on 2014-03-21 20:21:54
         compiled from "application/views/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16904832852a06b526011d8-48141536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '624aee4ddd80f6a0390166f17f94c29ba4eb3119' => 
    array (
      0 => 'application/views/templates/home.tpl',
      1 => 1395408111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16904832852a06b526011d8-48141536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a06b5260b6a6_62032434',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a06b5260b6a6_62032434')) {function content_52a06b5260b6a6_62032434($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
chart.js"></script>
<!--<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
           <?php echo $_smarty_tpl->tpl_vars['data']->value['breadcrumb'];?>

        </div>
    </div>
</div>-->

  
<div class="row-fluid">
	<div class="span12">
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Today's Signups Member</div>
			</div>
			<div class="block-content collapse in">
				<table class="table  table-bordered table-striped ">
					<thead>
						<tr>
							<th>Name</th>
	                        <th>Email</th>
	                        <th>Country</th>
	                        <th>State</th>
	                        <th>VIP</th>
	                        <th>SignUp Date</th>
	                        <!-- <th>Date of Birth</th>
	                        <th>Picture</th> -->
	                        <th width="10%">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($_smarty_tpl->tpl_vars['data']->value['member'])>0){?>
                    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['member']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iStateId'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vIP'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dLoginDate'];?>
</td>
	                        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dBirthDate'];?>
</td>
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPicture'];?>
</td> -->
	                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['member'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
						</tr>
						<?php endfor; endif; ?>
	                    <?php }else{ ?>
	                    <tr>
	                        <td colspan="7"><div class="text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</div></td>
	                    </tr>
	                    <?php }?>
						
					</tbody>
				</table>
			</div>
			
			
			<!--<div class="block-content collapse in">
			<div class='row-fluid'>
			<div class='span3'>Today Visit : 100</div>
			<div class='span3'>Today Leads : 10</div>
			<div class='span3'>Today Sales : 100</div>
			</div>
			<canvas id="canvas" height="450" width="1000"></canvas>-->
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="block">
		
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Statistics</div>
			</div>
			<div class="block-content collapse in">
				<!--<table class="table  table-bordered table-striped ">
					<!--<thead>
						<tr>
							<th width="3%">Total Categories</th>
							<th width="3%">Total Categories</th>
						</tr>
					</thead>
					<tbody>
					
						<tr>
							<td width="10%">Total Categories</td>
							<td width="90%">30</td>
						</tr>
						<tr>
							<td>Total Post</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Total Members</td>
							<td>15</td>
						</tr>
						<tr>
							<td>Total Comments</td>
							<td>25</td>
						</tr>
					
					</tbody>
				</table>-->
			    
				<div class="well well-small">
			    	Total Categories : <span class="badge"><?php echo $_smarty_tpl->tpl_vars['data']->value['total_category'];?>
</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Post : <span class="badge"><?php echo $_smarty_tpl->tpl_vars['data']->value['total_post'];?>
</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Members : <span class="badge"><?php echo $_smarty_tpl->tpl_vars['data']->value['total_member'];?>
</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Comments : <span class="badge"><?php echo $_smarty_tpl->tpl_vars['data']->value['total_post_comment'];?>
</span>
			    </div>
					
			</div>
		</div>
	</div>
</div>
 <script>

        var barChartData = {
            labels : ["January","February","March","April","May","June","July"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    data : [65,59,90,81,56,55,40]
                },
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    data : [28,48,40,19,96,27,100]
                }
            ]
            
        }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
    
    </script>  <?php }} ?>