<div class="modal fade" id="accept<?php echo $id;?>" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
			<div class="alert alert-danger">Are you Sure yuo want to accept this User?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-danger" href="<?php echo site_url('c_anggota/accept/'.$id);  ?>"><i class="icon-check"></i>&nbsp;Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>

  </div>
</div>
