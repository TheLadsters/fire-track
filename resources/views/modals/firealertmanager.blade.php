<div class="modal fade fireAlertManagerModal" tabindex="-1" role="dialog" aria-labelledby="fireAlertManagerModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header forgetPasswordHeader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Fire Alert Manager</h2>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-success addNewAlert" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Alert</span></a>
                                </div>
                            </div>
                        </div>
                        <table id="alertTable" class="table table-striped table-hover alert-table">
                            <thead>
                                <tr>
                                    <td><b>Start date:</b> <input type="text" id="minAlert" name="minAlert"></td>
                                    <td><b>End date:</b> <input type="text" id="maxAlert" name="maxAlert"></td>
                                </tr>
                                <tr>
                                    <td> 
                                        <input type="button" class="my-1 mb-3" id="clearAlertDates" value="Clear Dates">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fire Location</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th id="status_col">Status</th>
                                    <th id="created_col">Created At</th>
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