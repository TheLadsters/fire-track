<!-- Delete Modal HTML -->
<div id="deleteFireHydrantTypeModal" class="modal fade deleteFireHydrantTypeModal" >
	<div class="modal-dialog " role="document">
		<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Fire Hydrant</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
				<form method="post" action="{{ route('admin.fireHTypeDelete')}}" >
				@csrf
					<input type="hidden" name="hydrant_type_id" id="hydrant_type_id_delete">
					<input type="submit" class="btn btn-danger" id="deleteHydrantTypeBtn" value="Delete">   
				</form> 
				</div>
		</div>
	</div>
</div>