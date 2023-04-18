$(document).ready(function() {
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
    
    ////// GET FIRE HYDRANT TABLE START OF CODE //////
    function checkImg(hydrantType){
      let imgUrl = (hydrantType.img_url) ? assetUrl + '/' + hydrantType['img_url'] : "images/no_img_available.png";
      // let imgUrl = (hydrantType.img_url) ? hydrantType['img_url'] : "images/no_img_available.png";
    return imgUrl;
    }

    $('#hydrantType_table').DataTable({
      "ajax": {
                "url": "admin/fire-hydrant-type-management/getHydrantTypeTable",
              },
      'columns': [
        {'data': 'name', "bSortable": false},
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(hydrantType, type, full) {
            return `
                    <img src="${checkImg(hydrantType)}" width="120" height="100" />
                  `;
          },
        },
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(hydrantType, type, full) {
            return `
                    <a class="edit editColHType" data-bs-toggle="modal" id="${hydrantType['hydrant_type_id']}" data-bs-target=".editFireHydrantTypeModal"><i class='bx bxs-edit-alt' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
                    
                    <a class="delete deleteColHType" data-bs-toggle="modal" id="${hydrantType['hydrant_type_id']}" data-bs-target=".deleteFireHydrantTypeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>

                  `;
          }
        },
        {'data' : 'created_at', visible: false, searchable: false},
      ],
      "order": [3, 'desc']
    });
    
    
    // on clicking edit hydrant in fire hydrant type management
    $('#hydrantType_table tbody').on('click', '.editColHType', function(){
        let hydrant_type_id = $(this).attr('id');
 
        $.ajax({
          type: 'post',
          url: 'admin/fire-hydrant-type-management/getHydrantTypeID/' + hydrant_type_id,
          dataType: 'json',    
          success: function(response){ 
            let name = response['data'].name;
            let hydrantImgUrl = response['data'].img_url;
            let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['data'].img_url : 
          //  let hydrantPhoto = (hydrantImgUrl) ? response['data'].img_url : 
            "images/no_img_available.png";
    
            $("#name-edit").val(name);
            $("#hydrant_type_id_edit").val(hydrant_type_id);
            $(".img-thumbnail").attr("src", hydrantPhoto);
    
          },
          error: function(jqXHR, textStatus, errorThrown) { 
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
           }
        });
    });
    
    // delete hydrant in fire hydrant type manager
    $('#hydrantType_table tbody').on('click', '.deleteColHType', function(){
      let htype_id = $(this).attr('id');
      $("#deleteFireHydrantTypeModal input[name='htype_id']").val(htype_id);
    });
    
    ////// GET FIRE HYDRANT TYPE TABLE END OF CODE //////

    
    $('.hydrantTypeSubmit').on('click', function() {
        var fileInput = $('.hydrantImg');
        var file = fileInput[0].files[0];
        var maxSize = 2 * 1024 * 1024; // 2MB
        var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (file && file.size > maxSize) {
            //alert('File size must be less than 2MB');
            Swal.fire({
              icon: 'error',
              title: 'File size must be less than 2MB',
            })
            fileInput.val('');
            return false;
        }

        if (file && !allowedTypes.includes(file.type)) {
            //alert('Invalid file type. Allowed types: JPG, PNG, GIF');
            Swal.fire({
              icon: 'error',
              title: 'Invalid file type. Allowed types: JPG, PNG, GIF',
            })
            fileInput.val('');
            return false;
        }

        $('.hydrantImg').val(file.name);
        $('#addFireHydrantTypeModal').modal('hide');
    });

    $('#hydrantTypeSubmit').on('click', function() {
      var fileInput = $('#hydrantImg');
      var file = fileInput[0].files[0];
      var maxSize = 2 * 1024 * 1024; // 2MB
      var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

      if (file && file.size > maxSize) {
          //alert('File size must be less than 2MB');
          Swal.fire({
            icon: 'error',
            title: 'File size must be less than 2MB',
          })
          fileInput.val('');
          return false;
      }

      if (file && !allowedTypes.includes(file.type)) {
          //alert('Invalid file type. Allowed types: JPG, PNG, GIF');
          Swal.fire({
            icon: 'error',
            title: 'Invalid file type. Allowed types: JPG, PNG, GIF',
          })
          fileInput.val('');
          return false;
      }

      $('#hydrantImg').val(file.name);
      $('#editFireHydrantTypeModal').modal('hide');
  });

    
})