 
<div id="deleteAnnouncementModal" class="modal fade deleteAnnouncementModal">
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
                <i class='bx bxs-trash-alt bx-md head-icon'></i>
                Delete Announcement
              </h4>
          </div>
          
          <div class="row" style="margin-left: 9%;">
            <div class="col-12">
              Delete an existing announcement from the bulletin.
            </div>
          </div>
        </div>

        <div class="modal-body">

          <div class="row">
						<div class="col-12 text-warning-title">
              Are you sure you want to delete this Announcement?
            </div>
					</div>

          <div class="row mb-5">
						<div class="col-12">
              <p class="text-warning">This action cannot be undone.</p>
            </div>
					</div>
      
          <div class="row">
            <div class="col-md-6">
              <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
            </div>

            <div class="col-md-6">
              <form method="POST" action="{{route('admin.deleteAnnouncement')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="bulletin_id" id="bulletin_key_ID">
                <input type="submit" class="btn btn-danger" id="deleteAnnouncementBtn" value="Delete"> 
              </form>
            </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>