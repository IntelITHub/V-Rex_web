    <form name="frmlist" id="frmlist" action="{$data.base_url}loginlogs/action_update" method="post">
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
                <div class="muted pull-left">Login History</div>
            </div>
            <div class="block-content collapse in">
                {if $data.message neq ''}
                <div class="span12">
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                </div>
                {/if}
                <div class="row-fluid bottom-buffer">
                    <div class="span6">
                        <div class="span6 ">
                            {if $data.loginlogs|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-delete" class="btn btn-danger ">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="1%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>IP</th>
                    <th width="20%">Login Date</th>
                    <th width="20%">Logout Date</th>
                </tr>
                </thead>
                <tbody>
                {if $data.loginlogs|count gt 0 }
                {section name = i loop = $data.loginlogs}
                <tr>
                    <td><input type="checkbox" name="iId[]" id="iId" value="{$data.loginlogs[i].iLoginLogId}"></td>
                    <td>{$data.loginlogs[i].vFirstName} {$data.loginlogs[i].vLastName}</td>
                    <td>{$data.loginlogs[i].vEmail}</td>
                    <td>{$data.loginlogs[i].vTitle}</td>
                    <td>{$data.loginlogs[i].vIP}</td>
                    <td>{$data.loginlogs[i].dLoginDate|date_format:"%e  %B  %Y  %H:%M:%S %p"}</td>
                    <td>{$data.loginlogs[i].dLogoutDate|date_format:"%e  %B  %Y  %H:%M:%S %p"}</td>
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