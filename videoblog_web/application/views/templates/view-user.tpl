<form name="frmlist" id="frmlist" action="{$data.base_url}user/action_update" method="post">
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
                <div class="muted pull-left">User</div>
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
                            {if $data.user|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('{$data.base_url}user/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th width="10%">Name</th>
                        <th width="10%">Role</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone</th>
                        <th width="10%">Status</th>
                        <th width="10%">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $data.user|count gt 0 }
                    {section name = i loop = $data.user}
                    <tr>
                        <td><input type="checkbox" name="iId[]" id="iId" value="{$data.user[i].iUserId}"></td>
                        <td>{$data.user[i].vFirstName} {$data.user[i].vLastName}</td>
                        <td>{$data.user[i].vTitle}</td>
                        <td>{$data.user[i].vEmail}</td>
                        <td>{$data.user[i].vPhone}</td>
                        <td>{$data.user[i].eStatus}</td>
                        <td><a href="{$data.base_url}user/update/{$data.user[i].iUserId}">Edit</a></td>
                    </tr>
                    {/section}
                    {else}
                    <tr>
                        <td colspan="7"><div class="text-center">{$data.paging_message}</div></td>
                    </tr>
                    {/if}
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