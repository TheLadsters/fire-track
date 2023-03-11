<div class="modal fade fireHydrantManagerModal" tabindex="-1" role="dialog" aria-labelledby="fireHydrantManagerModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content px-3">
        <div class="modal-header forgetPasswordHeader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Fire Hydrant Manager</h2>
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                        </div>
                        <table id="hydrant_table" class="table table-striped table-hover hydrant-table">
                            <thead>                               
                                <tr>
                                    <td><b>Minimum date:</b> <input type="text" id="min" name="min"></td>
                                    <td><b>Maximum date:</b> <input type="text" id="max" name="max"></td>
                                </tr>
                                <tr>
                                    <td> 
                                        <input type="button" class="my-2" id="clearDates" value="Clear Dates">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th id="long_header">Longitude</th>
                                    <th id="lat_header">Latitude</th>
                                    <th>Hydrant Type</th>
                                    <th>Status</th>
                                    <th style="display: hidden;">Created At</th>
                                    <th>Image</th>
                                    <th id="action_header">Action</th>
                                </tr>
                            </thead>

                            <tbody class="tbl-hydrant-body">
                               
                                                         
                            </tbody>

                        </table>
                    </div>
                </div>    
        </div>
      </div>
    </div>
  </div>