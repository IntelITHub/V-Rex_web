<?php /* Smarty version Smarty-3.1.11, created on 2014-02-19 20:11:04
         compiled from "application/views/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36140062952a06b525a9854-13379986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd304e7d7913bc61a5ba57117e97d53a86f77f79d' => 
    array (
      0 => 'application/views/templates/header.tpl',
      1 => 1392815451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36140062952a06b525a9854-13379986',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a06b525ff297_63924514',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a06b525ff297_63924514')) {function content_52a06b525ff297_63924514($_smarty_tpl) {?><div class="navbar navbar-fixed-top">
    <div class="navbar-inner topbgchenge">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
" title="MediaLytix"><img class="logomain" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
logo.png" alt="">
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vLastName'];?>
 <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
Profile">Profile</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
changepassword">Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
               
                <ul class="nav tpmenu" style="clear:left;">
                    <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['url_name']=='home'){?>active tpact <?php }else{ ?> btnblue <?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashboard</a>
                    </li>
                    <li class="dropdown btnblue">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
language">Master <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
country">Country</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
state">States</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
category">Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown btnblue">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
user" data-toggle="dropdown" class="dropdown-toggle">Users <b class="caret"></b></a>
                          <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
role">Roles</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
user">Users</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
loginlogs">Login Logs</a>
                                <!--<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
client">Client</a>-->
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
member">Member</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['url_name']=='post'){?>active tpact <?php }else{ ?> btnblue <?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
post">Posts</b></a>
                    </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['url_name']=='apk'){?>active tpact <?php }else{ ?> btnblue <?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
apk">Apk</b></a>
                    </li>
                    <li class="dropdown btnblue">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
                          <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
language">Languages</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
languagelabel">Language Label</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
staticpage">Static Pages</a>
                                 <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
configuration">Configration</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
emailtemplate">Email Template</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<?php }} ?>