<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>::: VideoBlog ::: </title>
        <!-- Bootstrap -->
        <link href="{$data.bootstrap_css}bootstrap.css" rel="stylesheet" media="screen">
        <link href="{$data.bootstrap_css}bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="{$data.bootstrap_css}datepicker.css" rel="stylesheet" media="screen">
        <link href="{$data.base_css}styles.css" rel="stylesheet" media="screen">
        <script src="{$data.base_js}jquery-1.9.1.min.js"></script>
		<script src="{$data.bootstrap_js}bootstrap.min.js"></script>
		<script src="{$data.bootstrap_js}bootstrap-datepicker.js"></script>
		 <script type="text/javascript" src="{$data.bootstrap_js}bootstrap-filestyle.min.js"> </script>
		<script src="{$data.base_js}common.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="{$data.bootstrap_js}jquery.dataTables.js"></script>
        <script type="text/javascript" src="{$data.bootstrap_js}TableTools.js"></script>
        <script type="text/javascript" src="{$data.bootstrap_js}dataTables.editor.js"></script>
        <link href="{$data.bootstrap_css}dataTables.bootstrap.css" rel="stylesheet" media="screen">
    
        <script type="text/javascript" src="{$data.bootstrap_js}dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="{$data.bootstrap_js}dataTables.editor.bootstrap.js"></script>  
        <script type="text/javascript">
			var base_image = '{$data.base_image}';		
			var base_url = '{$data.base_url}';
			var base_host = '{$data.base_host}';
		</script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
	<body>
		<div class="navbar navbar-fixed-top">
			{include file="header.tpl" }
		</div>    
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12" id="content">
					{include file=$data.tpl_name }    
				</div>
			</div>
		</div>
	</body>
</html>


<div id="myalert" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Error</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
    </div>
</div>
