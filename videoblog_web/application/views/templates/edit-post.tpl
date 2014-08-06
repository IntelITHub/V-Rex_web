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
				<div class="muted pull-left">Posts</div>
			</div>
			<div class="block-content collapse in">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Post</a></li>
					<li><a data-toggle="tab" href="#tab2">Comments</a></li>
					<li><a data-toggle="tab" href="#tab3">Likes</a></li>
				</ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                		{include file="post-information.tpl"}
                    </div>
                    <div class="tab-pane" id="tab2">
                    	{include file="comments.tpl"}
                    </div>
                    <div class="tab-pane" id="tab3">
                    	{include file="likes.tpl"} 
                    </div>
                </div>
				
            </div>
        </div>
    </div>
</div>            
