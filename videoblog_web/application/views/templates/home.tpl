<script src="{$data.base_js}chart.js"></script>
<!--<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
           {$data.breadcrumb}
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
						{if $data.member|count gt 0 }
                    	{section name = i loop = $data.member}
						<tr>
							<td>{$data.member[i].vName}</td>
	                        <td>{$data.member[i].vEmail}</td>
	                        <td>{$data.member[i].iCountryId}</td>
	                        <td>{$data.member[i].iStateId}</td>
	                        <td>{$data.member[i].vIP}</td>
	                        <td>{$data.member[i].dLoginDate}</td>
	                        <!-- <td>{$data.member[i].dBirthDate}</td>
	                        <td>{$data.member[i].vPicture}</td> -->
	                        <td>{$data.member[i].eStatus}</td>
						</tr>
						{/section}
	                    {else}
	                    <tr>
	                        <td colspan="7"><div class="text-center">{$data.paging_message}</div></td>
	                    </tr>
	                    {/if}
						
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
			    	Total Categories : <span class="badge">{$data.total_category}</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Post : <span class="badge">{$data.total_post}</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Members : <span class="badge">{$data.total_member}</span>
			    </div>
			    
			    <div class="well well-small">
			    	Total Comments : <span class="badge">{$data.total_post_comment}</span>
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
    
    </script>  