<div class="modal fade" id="myModalpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      	<h4 class="modal-title" id="myModalLabel">{$data.post.eFileType}</h4>
      </div>
      <div class="modal-body">
        {if $data.post.eFileType eq 'Image'}
          <img src="{$data.base_url}uploads/post/{$data.post.iPostId}/{$data.post.vFile}" />
          {/if}
          {if $data.post.eFileType eq 'Video'}
          <video width="320" height="240" controls>
            <source src="{$data.base_url}uploads/post/{$data.post.iPostId}/{$data.post.vFile}" type="video/mp4">
            <source src="{$data.base_url}uploads/post/{$data.post.iPostId}/{$data.post.vFile}" type="video/ogg">
            Your browser does not support the video tag.
          </video> 
          {/if}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
          Are you sure, to delete {$data.post.eFileType} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="{$data.base_url}post/deletevideo?id={$data.post.iPostId}" class="btn btn-primary">Yes</a>
      </div>      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>