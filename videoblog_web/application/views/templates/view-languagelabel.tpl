<form name="frmlist" id="frmlist" action="{$data.base_url}languagelabel/action_update" method="post">
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
                <div class="muted pull-left">Language Labels</div>
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
                            {if $data.languagelabel|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <button type="button" id="btn-add" onclick="addme('{$data.base_url}languagelabel/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th>Lable Name</th>
                        <th>USA English</th>
                        <th>France</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $data.languagelabel|count gt 0 }
                    {section name = i loop = $data.languagelabel}
                    <tr>
                        <td><input type="checkbox" name="iId[]" id="iId" value="{$data.languagelabel[i].iLabelId}"></td>
                        <td>{$data.languagelabel[i].vName}</td>
                        <td>{$data.languagelabel[i].vValue_en}</td>
                        <td>{$data.languagelabel[i].vValue_fr}</td>
                        <td><a href="{$data.base_url}languagelabel/update/{$data.languagelabel[i].iLabelId}">Edit</a></td>
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