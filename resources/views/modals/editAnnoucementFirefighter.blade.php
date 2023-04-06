<div class="modal fade editAnnouncementFirefighter" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content px-3">
        <div id="modal-head" style="background-image:url('images/rectangles_background.png');">
          <div class="row py-2 px-2">
            <div class="col-12">
              <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
            </div>	
          </div>
  
          <div class="row" style="margin-left: 3%;">	
              <h4 class="modal-title col-12">
                <i class='bx bxs-hot head-icon'></i>
                Edit Announcement
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
                Edit Annoucement to be posted on Bulletin Page.
            </div>
          </div>
        </div>

        <div class="modal-body-Announcement">
          <form method="POST" action="{{route('firefighter.editAnnouncementFirefighter')}}" enctype="multipart/form-data">
            @csrf
            <div>
            <input type="hidden" style="display: none;" class="form-control" name="bulletin_id" id="bulletin_id" >
            <input type="hidden" style="display: none;" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">

            <label for="Author">
            Author<span style="color:red;">*</span>
             <input type="text"  class="form-control" name="author_name"  id="author_input" placeholder="Author" >
              </input>
            </label>
</br>
            <label for="Title">
            Title<span style="color:red;">*</span>
             <input type="text"  class="form-control" name="title"  id="title_input" placeholder="Title" >

              </input>
            </label>
</br>
            <label for="Summary">
            Summary<span style="color:red;">*</span>
             <textarea type="text"  class="form-control" name="summary"  id="summary_input" placeholder="Article Summary" style="resize: none; width:220%;">

              </textarea>
            </label>
</br>
            <label for="Article_url">
            Article URL<span style="color:red;">*</span>
             <input type="text"  class="form-control" name="article_url"  id="articleURL_input" placeholder="Article Link" >
              </input>
            </label>
</br>
            <!-- <label for="Image_url">
            Image URL<span style="color:red;">*</span>
             <input type="text"  class="form-control" name="img_url"  id="imageURL_input" > -->

              </input>
            </label>
</div>

</br>
            <div class="col-md-6">
                <button type="submit" class="btn-add-hydrant send-alert">Submit</button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>