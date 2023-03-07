<!-- Edit Modal HTML -->
<div id="editFireHydrantTypeModal" class="modal fade editFireHydrantTypeModal">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Fire Hydrant Type</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>			
				</div>
				<form method="POST" action="{{route('admin.fireHTypeEdit')}}"  enctype="multipart/form-data">
						@csrf
					<div class="modal-body">
							<input type="hidden" name="hydrant_type_id" id="hydrant_type_id" >					
							<div class="form-group">
								<label>Type</label>
								<input type="text" name="name" id="name-edit" class="form-control">
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="img_url" id="hydrantImg"class="form-control">
							</div>	<br>
							<div class="row text-center mb-3">
								<div class="col-12">
									<img class="img-fluid img-thumbnail" height="200" width="150">
								</div>
							</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
		</div>
	</div>
</div> 

