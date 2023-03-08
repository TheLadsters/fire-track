$(document).ready(function() {
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
    
    ////// GET FIRE HYDRANT TABLE START OF CODE //////
    function checkImg(hydrantType){
      let imgUrl = (hydrantType.img_url) ? assetUrl + '/' + hydrantType['img_url'] : "images/no_img_available.png";
    return imgUrl;
    }
    
    $('#hydrantType_table').DataTable({
    //   'ajax': 'admin/fire-hydrant-type-management/getHydrantTypeTable',
      "ajax": {
                "url": "admin/fire-hydrant-type-management/getHydrantTypeTable",
              },
      'columns': [
        {'data': 'name'},
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(hydrantType, type, full) {
            return `
                    <img src="${checkImg(hydrantType)}" width="120" height="100" />
                  `;
          }
        },
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(hydrantType, type, full) {
            return `
                    <a class="edit editColHType" data-bs-toggle="modal" id="${hydrantType['hydrant_type_id']}" data-bs-target=".editFireHydrantTypeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
                    
                    <a class="delete deleteColHType" data-bs-toggle="modal" id="${hydrantType['hydrant_type_id']}" data-bs-target=".deleteFireHydrantTypeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>

                  `;
          }
        }
      ],
      "order": [2, 'desc']
    });
    
    // $("#firehydrant-manager").click(function(){
    //   $(".fireHydrantManagerModal").modal({backdrop: 'static', keyboard: false});
    //   $(".fireHydrantManagerModal").modal('show');
    // });
    
    // on clicking edit hydrant in fire hydrant type management
    $('#hydrantType_table tbody').on('click', '.editColHType', function(){
        let hydrant_type_id = $(this).attr('id');
        console.log(hydrant_type_id)
        $.ajax({
          type: 'post',
          url: 'admin/fire-hydrant-type-management/getHydrantTypeID/' + hydrant_type_id,
          dataType: 'json',    
          success: function(response){ 
            let name = response['data'].name;
            let hydrantImgUrl = response['data'].img_url;
            let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['data'].img_url : 
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
      let hydrant_type_id = $(this).attr('id');
      $('.deleteHydrantTypeModal #hydrant_type_id_delete').val(hydrant_type_id);
    });
    
    ////// GET FIRE HYDRANT TYPE TABLE END OF CODE //////
    
})