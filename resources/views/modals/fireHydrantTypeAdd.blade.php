<div class="modal fade addFireHydrantTypeModal" tabindex="-1" role="dialog" aria-labelledby="addFireHydrantTypeModalCenter" aria-hidden="true" id="addFireHydrantTypeModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content px-3">
        <div id="modal-head" style="background-image:url('images/rectangles_background.png');">
			<div class="row py-2 px-2">
				<div class="col-12">
					<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
				</div>	
			</div>

			<div class="row" style="margin-left: 3%;">	
					<h4 class="modal-title col-12">
						<i class='bx bxs-layer-plus bx-md head-icon'></i>				
						Add New Hydrant Type
					</h4>
			</div>
			
			<div class="row" style="margin-left: 9%;">
				<div class="col-12">
					Add a new type of fire hydrant for the FireTrack App.
				</div>
			</div>
		</div>

        <div class="modal-body">
        	<form action="{{ route('admin.fireHTypeAdd')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="row">
					
					<div class="col-md-6">
						<label for="hydrantTypeName" class="form-label">
							Name<span style="color:red;">*</span>
						</label>
						<input type="text" class="form-control" name="name" id="hydrantTypeName" placeholder="Fire Hydrant Type">
					</div>
					<div class="col-md-6">
						<label for="hydrantTypeImg" class="form-label">
							Image
						</label>
						<input class="form-control" name="hydrant_img" type="file" id="hydrantTypeImg">
					</div>

				</div>

				<div class="row mt-5">
					
					<div class="col-md-6">
						<input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn-add-htype">Submit</button>
					</div>

				</div>

			</form>
        </div>

      </div>
    </div>
  </div>