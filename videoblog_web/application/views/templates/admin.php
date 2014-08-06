<script type="text/javascript" src="{$data.basedatatable_js}administrator_listing.js"></script>
<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
 	<div class="container-fluid">
	    <!-- BEGIN PAGE HEADER-->   
	    <div class="row-fluid">
	        <div class="span12">
	            <!-- BEGIN THEME CUSTOMIZER-->
	            <div id="theme-change" class="hidden-phone">
	                <i class="icon-cogs"></i>
	                <span class="settings">
	                    <span class="text">Theme Color:</span>
	                    <span class="colors">
	                        <span class="color-default" data-style="default"></span>
	                        <span class="color-green" data-style="green"></span>
	                        <span class="color-gray" data-style="gray"></span>
	                        <span class="color-purple" data-style="purple"></span>
	                        <span class="color-red" data-style="red"></span>
	                    </span>
	                </span>
	            </div>
	        <!-- END THEME CUSTOMIZER-->
	        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		        <h3 class="page-title">
		            Administrator
		        </h3>
			        <ul class="breadcrumb">
			            <li>
			                <li>
			                    <a href="{$data.base_url}home">Dashboard</a>
			                    <span class="divider">/</span>
			                </li>
			            </li>
			            <li class="active">
			                 Administrator
			            </li>
			            <li class="pull-right search-wrap">
			                <form action="search_result.html" class="hidden-phone">
			                    <div class="input-append search-input-area">
			                        <input class="" id="appendedInputButton" type="text">
			                        <button class="btn" type="button"><i class="icon-search"></i> </button>
			                    </div>
			                </form>
			            </li>
			        </ul>
	        <!-- END PAGE TITLE & BREADCRUMB-->
	       	</div>
	    <!-- END PAGE HEADER-->  	
	    </div>
		 	<!-- BEGIN PAGE CONTENT-->
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <div class="widget purple">
		            <div class="widget-title">
		                <h4><i class="icon-reorder"></i> Administrator</h4>
		                <span class="tools">
		                    <a href="javascript:;" class="icon-chevron-down"></a>
		                    <a href="javascript:;" class="icon-remove"></a>
		                </span>
					</div>
		        <div class="widget-body">
		        	<div class="clearfix">
			            <div class="btn-group">
			            </div>
			            <div class="btn-group pull-right" style="display:none;">
			                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
			                </button>
			                <ul class="dropdown-menu pull-right">
			                    <li><a href="#">Print</a></li>
			                    <li><a href="#">Save as PDF</a></li>
			                    <li><a href="#">Export to Excel</a></li>
			                </ul>
			            </div>
		        	</div>
		        {if $data.message neq ''}
		            <div class="alert alert-info">
		                {$data.message}
		            </div>
		        {/if}            
		        <div class="space15">
		           
		            <div class="pull-right">
		                <a href="{$admin_url}administrator/create" class="btn green">Add New <i class="icon-plus"></i></a>
		            </div>
		        </div>
		        <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="20%">Name</th>
                        <th width="20%">Email</th>
                        <th width="15%">Phone</th>
                        <th width="10%">Role</th>
                        <th width="8%" style="text-align:center;">Status</th>
                        <th width="8%" style="text-align:center;">Edit</th>
                        <th width="10%" style="text-align:center;">Delete</th>
                    </tr>
                </thead>
            </table>         
		        <!-- END EXAMPLE TABLE widget-->
			</div>   
			<!-- END PAGE CONTENT-->         
		</div>
	<!-- END PAGE CONTAINER-->

</div>