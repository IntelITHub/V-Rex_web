<div class="row-fluid">
	<div class="navbar">
		<div class="navbar-inner">
			{$data.breadcrumb}
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Member</div>
			</div>
			<div class="block-content collapse in">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Member</a></li>
					<li><a data-toggle="tab" href="#tab2">Followers</a></li>
					<li><a data-toggle="tab" href="#tab3">Following</a></li>
					<li><a data-toggle="tab" href="#tab4">My Post</a></li>
				</ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                		{include file="member/member-information.tpl"}
                    </div>
                    <div class="tab-pane" id="tab2">
                    	{include file="member/followers.tpl"}
                    </div>
                    <div class="tab-pane" id="tab3">
                    	{include file="member/following.tpl"} 
                    </div>
                    <div class="tab-pane" id="tab4">
                    	{include file="member/mypost.tpl"} 
                    </div>
                </div>				
			</div>
		</div>
	</div>
</div>