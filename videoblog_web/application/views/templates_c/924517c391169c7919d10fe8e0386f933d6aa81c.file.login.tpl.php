<?php /* Smarty version Smarty-3.1.11, created on 2014-07-29 16:06:02
         compiled from "application/views/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15748969652a06930a1ffb6-37374642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924517c391169c7919d10fe8e0386f933d6aa81c' => 
    array (
      0 => 'application/views/templates/login.tpl',
      1 => 1406616943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15748969652a06930a1ffb6-37374642',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52a06930a63ff4_49674887',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a06930a63ff4_49674887')) {function content_52a06930a63ff4_49674887($_smarty_tpl) {?><!DOCTYPE html>
<html class="no-js">
    <head>
        <title>::: Videblog :::</title>
        <!-- Bootstrap -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_css'];?>
bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
styles.css" rel="stylesheet" media="screen">
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery-1.9.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['bootstrap_js'];?>
bootstrap.min.js"></script>
    </head>
    <body id="login">

        <a class="brand-logo bottom-buffer" href="#"><img class="logomain" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
logo.png" alt=""></a>
        <div class="container">

            <div class="row">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                <div class="span4" style="margin:0px auto;float:none;">
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                    </div>
                </div>
                <?php }?>
            </div>

            <div class="row"  id="showloginid">
                <form class="form-signin" id="frmsignin" action="authentication" method="post">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <input type="text" class="input-block-level" placeholder="Email address" maxlength="255" name="vEmail" id="vEmail">
                    <input type="password" class="input-block-level" placeholder="Password" maxlength="255" name="vPassword" id="vPassword">
                        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                        
                    <button class="btn btn-large btn-primary" type="submit">Sign in</button> <br /><br />
                    <a href="javascript:;" onclick="showforgot();">Forgotten Password?</a>
                </form>
            </div>
            
            <div id="forgotpasswordid" class="row" style="display:none;">
                <form class="form-signin" id="frmsignin" action="forgotpassword" method="post">
                    <h2 class="form-signin-heading">Please enter Email</h2>
                    <input type="text" class="input-block-level" placeholder="Email address" maxlength="255" name="vEmail" id="vEmail">
                        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    <button class="btn btn-large btn-primary" type="submit">Sign in</button> <br /><br />
                    <a href="javascript:;" onclick="showlogin();">Back to Login?</a>
                </form>
            </div>
            
        </div>
    </body>
</html>


<script type="text/javascript">
	/*$(document).ready(function(){
		$('#submit').on('click',function(){
			var _userEmail = $('#user_vEmail').val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if($('#user_vEmail').val() == ""){
				alert('Please enter your E-mail ID.');
				return false;
			}
			if(!regex.test(_userEmail)){
				alert('Please enter valid email address.');
				return false;
			}
			if($('#vPassword').val() == ""){
				alert('Please enter your password.');
				return false;
			}
		});
		
		$('#submit_forgot_password').on('click',function(){
			var _userEmail = $('#vEmail').val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			
			if(_userEmail == ""){
				alert('Please enter your email address.');
				return false;
			}
			if(!regex.test(_userEmail)){
				alert('Please enter valid email address.');
				return false;
			}
		});
	});*/
	/*function CheckLogin()
	{
		if (document.frmlogin.vUserName.value == "")
		{
			alert("Enter your Username");
			document.frmlogin.vUserName.focus();
			return false;
		}
		if (document.frmlogin.vPassword.value == "")
		{
			alert("Enter your password");
			document.frmlogin.vPassword.focus();
			return false;
		}
		document.frmlogin.submit()
	}*/
</script>
<script>
	function showforgot(){
	    jQuery("#showloginid").hide();
	    jQuery("#forgotpasswordid").show();
	}
	function showlogin(){
	    jQuery("#forgotpasswordid").hide();
	    jQuery("#showloginid").show();
	}  
</script>


<?php }} ?>