<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>::: Videblog :::</title>
        <!-- Bootstrap -->
        <link href="{$data.bootstrap_css}bootstrap.css" rel="stylesheet" media="screen">
        <link href="{$data.bootstrap_css}bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="{$data.base_css}styles.css" rel="stylesheet" media="screen">
        <script src="{$data.base_js}jquery-1.9.1.min.js"></script>
        <script src="{$data.bootstrap_js}bootstrap.min.js"></script>
    </head>
    <body id="login">

        <a class="brand-logo bottom-buffer" href="#"><img class="logomain" src="{$data.base_image}logo.png" alt=""></a>
        <div class="container">

            <div class="row">
                {if $data.message neq ''}
                <div class="span4" style="margin:0px auto;float:none;">
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                </div>
                {/if}
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

{literal}
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
{/literal}

