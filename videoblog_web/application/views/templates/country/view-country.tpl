<script src="{$data.base_js}country.js"></script>
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
                    <div class="span6" style="width:98.717949%;margin:0;">
                        <div class="pull-right">
                            <button type="submit" id="btn-active" class="btn btn-success bottom-buffer" onclick="check_all();">Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-info bottom-buffer">Make Inactive</button>
                            <button type="button" id="btn-add" onclick="addme('{$data.base_url}country/create');"  class="btn btn-inverse bottom-buffer">Add New</button>
                            <button type="submit" id="btn-delete" class="btn btn-danger bottom-buffer">Delete</button>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered table-striped " id="CountrylistId">
                <thead>
                <tr>
                    <th width="3%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                    <th>Country Name</th>
                    <th>Country Code</th>
                    <th width="30%">Country ISD Code</th>
                    <th width="10%">Status</th>
                    <th width="10%">Edit</th>
                </tr>
                </thead>
                </table>    
            </div>
        </div>
    </div>
</div>           
</form>           