<div class="modal fade addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementCenter" aria-hidden="true">
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
                <i class='bx bxs-alarm-exclamation bx-md head-icon'></i>
                Add Announcement
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Add a new Annoucement to be posted on Bulletin Page.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('admin.addAnnouncement')}}" enctype="multipart/form-data">
            @csrf
           
            <div class="row">
              <input type="text" style="display: none;" class="form-control" name="user_id" value="{{Auth::user()->user_id}}">

              <div class="col-md-6">
                <label for="Author" class="author">
                Author<span style="color:red;">*</span>
                </label>
                <input type="text"  class="form-control" name="author_name"  
                id="author-input" placeholder="Author" />
              </div>

              <div class="col-md-6">
                <label for="Title">
                Title<span style="color:red;">*</span>
                </label>
                <input type="text"  class="form-control" name="title"  id="title-input" placeholder="Title" />
              </div>

            </div>

            <div class="row">
              
              <div class="col-md-6">
                <label for="Article_url" class="article_url">
                  Article URL<span style="color:red;">*</span>
                </label>
                <input type="text"  class="form-control" name="article_url"  id="articleURL-input" placeholder="Article Link" />
              </div>

              <div class="col-md-6">
                <label for="Image_url" class="image_url">
                  Image URL<span style="color:red;">*</span>
                </label>
                   <input type="text"  class="form-control" name="img_url"  id="imageURL-input" placeholder="Image URL" />
              </div>

            </div>

            <div class="row">
              
              <div class="col-md-10 d-flex justify-content-center">
                <label for="Summary" class="summary">
                  Summary<span style="color:red;">*</span>
                </label>
    
                 <textarea type="text"  class="form-control" name="summary"  id="summary-input" placeholder="Article Summary">
                </textarea>
              </div>

            </div>


            <div class="row">
              <div class="col-md-6">
                <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
              </div>

              <div class="col-md-6">
                <button type="submit" class="btn-add-announcement send-alert">Submit</button>
            </div>
            </div>

          </form>

        </div>

      </div>
      </div>
    </div>
  </div>