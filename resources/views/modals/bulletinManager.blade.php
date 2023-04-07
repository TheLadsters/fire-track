<div class="modal fade bulletinManagerModal center" tabindex="-1" role="dialog" aria-labelledby="bulletinManagerModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
      <div class="modal-content">
        <div class="modal-header forgetPasswordHeader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="table-responsive" >
                    <div class="table-wrapper">
                        <div class="table-title" >
                            <div class="row" >
                                <div class="col-sm-6">
                                    <h2>Bulletin Manager</h2>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-success addNewAnnounce" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Announcement</span></a>
                                </div>
                            </div>
                        </div>
                        <table id="bulletinTable" class="table table-striped table-hover alert-table" style="width:100%">
                            <thead>
                                <tr>
                                    <td style="visibility: hidden"><b>Minimum date:</b> <input type="text" id="minAlert" name="minAlert"></td>
                                    <!-- <td><b>Maximum date:</b> <input type="text" id="maxAlert" name="maxAlert"></td> -->
                                </tr>
                                <tr>
                                    <td> 
                                        <input type="hidden" class="my-1 mb-3" id="clearAlertDates" value="Clear Dates">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th id="created_col" >Created At</th>
                                    <th id="updated_col">Updated At</th>
                                    <th id="action_col">Action</th>
                                </tr>
                            </thead>

                            <tbody class="tbl-body-user">
                                                         
                            </tbody>

                        </table>
                    </div>
                </div>    
        </div>
      </div>
    </div>
  </div>