$(document).ready(function() {
  let d = new Date(Date.now());

let strDate = `Date Accessed: ${(d.getMonth()+1)}/${d.getDate()}/${d.getFullYear()}`;
  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  
    $('#user_table').DataTable({
      dom: 'Bfrtip',
        buttons: [
            $.extend( true, {}, {
              extend: 'excelHtml5',
              title: 'User Management - FireTrack App',
              filename: 'User Management - FireTrack App',
              messageTop: `List of all the users that can access the FireTrack App.`,
              messageBottom: strDate,
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5 ]
            },
            text: `<i class='bx bxs-file-export'></i> Export as Excel`,
            // format:{
            //     body: function(data, row, column, node){
            //         return row === 0 ? row.html("<b></b>") : data;
            //     }
            // },
              // sheetName: 'Users of FireTrack',
              customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                var stylesheet = xlsx.xl['styles.xml'];
                var tagName = stylesheet.getElementsByTagName('sz');
                // for changing text size
                for (i = 0; i < tagName.length; i++) {
                  tagName[i].setAttribute("val", "12")
                }

            }
          }),
          
            $.extend( true, {}, {
              extend: 'pdfHtml5',
              title: 'User Management - FireTrack App',
              filename: 'User Management - FireTrack App',
              messageTop: 'List of all the users that can access the FireTrack App.',
              messageBottom: strDate,
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5 ]
            },
            text: `<i class='bx bxs-file-pdf' ></i> Export as PDF`,
          }),
          
        ],
      "ajax": {
        "url": "admin/userManagementUser/getUserTable",
      },
      'columns': [
        {'data': 'full_name', "bSortable": false},
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
        
                  <a class="edit editColUser" data-bs-toggle="modal" id="${user['user_id']}" data-bs-target=".userManagementEditModal"><i class='bx bxs-edit-alt' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
			
							    <a class="delete deleteColUser" data-bs-toggle="modal" id="${user['user_id']}" data-bs-target=".userManagementDeleteModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
                  `;
          }
        }
      ],
      "order": [5, 'desc']
    });



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
          $("#user_id_edit").val(user_id);

  
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
