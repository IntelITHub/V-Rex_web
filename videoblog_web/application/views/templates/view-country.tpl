<form name="frmlist" id="frmlist" action="{$data.base_url}country/action_update" method="post">
<input type="hidden" name="action" id="action">
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
                <div class="muted pull-left">Country</div>
            </div>
            <div class="block-content collapse in">
                {if $data.message neq ''}
                <div class="span12">
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                </div>
                {/if}
                <div class="row-fluid">
                    <div class="span6">
                        <div class="span6 ">
                            {if $data.country|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped ">
                <thead>
                <tr>
                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th>Country Name</th>
                    <th>Country Code</th>
                    <th width="10%">Country ISD Code</th>
                    <th width="10%">Status</th>
                </tr>
                </thead>
                <tbody>
                {section name = i loop = $data.country}
                <tr>
                    <td><input type="checkbox" name="iId[]" id="iId" value="{$data.country[i].iCountryId}"></td>
                    <td>{$data.country[i].vCountry}</td>
                    <td>{$data.country[i].vCountryCode}</td>
                    <td>{$data.country[i].vISDcode}</td>
                    <td>{$data.country[i].eStatus}</td>
                {/section}
                </tbody>
                </table>    
                <div class="pagination">
                    {$data.create_links}
                </div>           
            </div>
        </div>
    </div>
</div>           
</form>           