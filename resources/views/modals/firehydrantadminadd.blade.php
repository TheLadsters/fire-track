<div class="modal fade addFireHydrantTypeModal" tabindex="-1" role="dialog" aria-labelledby="addFireHydrantTypeModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
			<h4>Add Fire Hydrant Type</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        	<form action="{{ url('fire-hydrant-type-management/addHydrantType') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-row align-items-center">
					<div class="col-auto mb-4">
					<label for="hydrantTypeName" class="form-label"><b>Name for New Hydrant Type<b></label>
      					<div class="input-group mb-2">
        					<div class="input-group-prepend">
          					<div class="input-group-text">
							  <i class='bx bxs-comment-detail py-1'></i>
							</div>
        				</div>
        				<input type="text" class="form-control" name="name" id="hydrantTypeName" placeholder="Fire Hydrant Type">
    				</div>
				</div>

				<div class="form-row">
					<div class="col-auto">
						<label for="hydrantTypeImg" class="form-label"><b>Image for New Hydrant Type<b></label>
						<input class="form-control" name="hydrant_img" type="file" id="hydrantTypeImg">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">SUBMIT</button>
			</form>
        </div>

        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>