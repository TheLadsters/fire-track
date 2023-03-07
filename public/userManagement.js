$(document).ready(function() {
  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#user_table').DataTable({
      // 'ajax': 'admin/userManagementUser/getUserTable',
    
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "ajax": {
        "url": "admin/userManagementUser/getUserTable",
      },
      'columns': [
        {'data': 'username'},
        {'data': 'fname', "bSortable": false},
        {'data': 'email', "bSortable": false},
        {'data': 'contact_no'},
        {'data': 'address'},
        {'data': 'role'},
        {'data': 'status'},
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(user, type, full) {
            return `
        
                  <a class="edit editColUser" data-bs-toggle="modal" id="${user['user_id']}" data-bs-target=".userManagementEditModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
			
							    <a class="delete deleteColUser" data-bs-toggle="modal" id="${user['user_id']}" data-bs-target=".userManagementDeleteModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
                  `;
          }
        }
      ],
      "order": [5, 'desc']
    });

    // $("#firehydrant-manager").click(function(){
    //   $(".fireHydrantManagerModal").modal({backdrop: 'static', keyboard: false});
    //   $(".fireHydrantManagerModal").modal('show');
    // });


    $('#user_table tbody').on('click', '.editColUser', function(){
      let user_id = $(this).attr('id');
      console.log(user_id);
  
      $.ajax({
        type: 'post',
        url: 'admin/userManagementUser/getUserID/' + user_id,
        dataType: 'json',    
        success: function(response){ 
          let fname = response['data'].fname;
          let lname = response['data'].lname;
          let email = response['data'].email;
          let address = response['data'].address;
          let contact_no = response['data'].contact_no;
          let status = response['data'].status;
          let gender = response['data'].gender;
   
     
  
          $("#edit-fname").val(fname);
          $("#edit-lname").val(lname);
          $("#email-edit").val(email);
          $("#address-edit").val(address);
          $("#contact_no-edit").val(contact_no);
          $("#status-edit").val(status);
          $("#edit-gender").val(gender);
          $("#user_id").val(user_id);

  
        },
        error: function(jqXHR, textStatus, errorThrown) { 
             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
      });

  });
  
  // delete hydrant in fire hydrant manager
  $('#user_table tbody').on('click', '.deleteColUser', function(){
    let user_id = $(this).attr('id');
    $('.userManagementDeleteModal #user_id').val(user_id);
  });


  });
