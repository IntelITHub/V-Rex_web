<form name="frmlist" id="frmlist" action="{$data.base_url}staticpage/action_update" method="post">
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
                <div class="muted pull-left">Static Pages</div>
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
                            {if $data.staticpage|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('{$data.base_url}staticpage/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $data.staticpage|count gt 0 }
                    {section name = i loop = $data.staticpage}
                    <tr>
                        <td><input type="checkbox" name="iId[]" id="iId" value="{$data.staticpage[i].iSPageId}"></td>
                        <td>{$data.staticpage[i].vpagename}</td>
                        <td>{$data.staticpage[i].eStatus}</td>
                        <td><a href="{$data.base_url}staticpage/update/{$data.staticpage[i].iSPageId}">Edit</a></td>
                    </tr>
                    {/section}
                    {else}
                    <tr>
                        <td colspan="5"><div class="text-center">{$data.paging_message}</div></td>
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