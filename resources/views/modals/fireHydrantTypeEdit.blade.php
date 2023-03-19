<!-- Edit Modal HTML -->
<div id="editFireHydrantTypeModal" class="modal fade editFireHydrantTypeModal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div id="modal-head" style="background-image:url('images/rectangles_background.png');">
				<div class="row py-2 px-2">
					<div class="col-12">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
					</div>	
				</div>

				<div class="row" style="margin-left: 3%;">	
						<h4 class="modal-title col-12">
							<i class='bx bxs-edit-alt bx-md head-icon'></i>			
							Edit Hydrant Type
						</h4>
				</div>
				
				<div class="row" style="margin-left: 9%;">
					<div class="col-12">
						Edit an existing type of fire hydrant for the FireTrack App.
					</div>
				</div>
			</div>

				<form method="POST" action="{{route('admin.fireHTypeEdit')}}"  enctype="multipart/form-data">
						@csrf
					<div class="modal-body">
							<input type="hidden" name="hydrant_type_id" id="hydrant_type_id_edit" >		
							
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Name<span style="color:red;">*</span></label>
										<input type="text" name="name" id="name-edit" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Image</label>
										<input type="file" name="img_url" id="hydrantImg"class="form-control">
									</div>
								</div>

							</div>

							<div class="row">

								<div class="col-md-12 text-center">
									<img class="img-fluid img-thumbnail" height="200" width="150">
								</div>

							</div>
							<div class="row mt-5">
								
								<div class="col-md-6">
									<input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
								</div>
								<div class="col-md-6">
									<input type="submit" class="btn-edit-htype" value="Submit" id="hydrantTypeSubmit">

								</div>

							</div>
				
					</div>
				</form>
		</div>
	</div>
</div> 

