$(document).ready( function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  let bulletinTable = $('#bulletinTable').DataTable({
    'ajax': 'admin/bulletinManagement/getBulletinTable',
    dom: 'Bfrtip',
    'columns': [
        {'data': 'title', "width": "20%"},
        {'data': 'author_name', "width": "20%"},
        {'data' : 'created_at', visible: true, searchable: true},
        {'data': 'updated_at'},
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(alert, type, full) {
            return `
                    <a class="edit editColBulletin editAnnouncement btn-group" data-bs-toggle="modal" id="${alert['bulletin_id']}" data-bs-target=".editAnnouncementmodal">
                    <i class='bx bxs-edit-alt' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i>                      </i>
                    </a>

                    <a class="delete deleteColBulletin deleteAnnouncement btn-group" data-bs-toggle="modal" id="${alert['bulletin_id']}" data-bs-target=".deleteAnnouncementModal">
                    <i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete">
                    </i>
                  </a>
                  `;
          }
        }
    ],

    order : [[4, 'desc']],
  });

  var table = $('#bulletinTable').DataTable();
 
  table.buttons( '.dt-button' ).remove();

  // on clicking edit alert in Bulletin management
$('#bulletinTable tbody').on('click', '.editColBulletin', function(){
    let bull_id = $(this).attr('id');
    console.log(bull_id);

    $.ajax({
      url: 'admin/bulletinManagement/getAnnouncement/' + bull_id,
      type: 'post',
      dataType: 'json',
      success: function(response){
          
          console.log(response);

          let bulletin_id = response['announce'].bulletin_id;
          let user_id = response['announce'].user_id;
          let author_name = response['announce'].author_name;
          let title = response['announce'].title;
          let summary = response['announce'].summary;
          let article_url = response['announce'].article_url;
          let image_url = response['announce'].img_url;

          console.log(image_url);

            $(".editAnnouncementmodal #bulletin_id").val(bulletin_id);
            $(".editAnnouncementmodal #user_id").val(user_id);
            $(".editAnnouncementmodal #author_input").val(author_name);
            $(".editAnnouncementmodal #title_input").val(title);
            $(".editAnnouncementmodal #summary_input").val(summary);
            $(".editAnnouncementmodal #articleURL_input").val(article_url);
            $(".editAnnouncementmodal #imageURL_input").attr("src", image_url);

    },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert("Error");
      }
  });

});

// delete alert in Bulletin manager
$('#bulletinTable tbody').on('click', '.deleteColBulletin', function(){
  let bull_id = $(this).attr('id');
  $(".deleteAnnouncementModal #bulletin_key_ID").val(bull_id);
});


});



/*sepppp */
document.addEventListener("DOMContentLoaded", function() {
function truncate(str, maxlength) {
  return (str.length > maxlength) ?
    str.slice(0, maxlength - 1) + '…' : str;
}

const bulletin = $('.bulletinmngmt');

if(bulletin.hasClass('active')){
  document.getElementById('announcement_tab').click();
}

const newsList = document.querySelector('.news-list');
newsList.innerHTML = '';

const apiKey = '8ad51087c3ab0b49db8cefc210186e95';
let url = `https://gnews.io/api/v4/top-headlines?country=ph&category=general&apikey=${apiKey}`;

fetch(url)
  .then((res) => res.json())
  .then((data) => {

    data.articles.slice()
    data.articles.reverse()

    data.articles.forEach((articles) => {
      let image = articles.image;
      if (image == null) {
        image =
          'https://motionarray.imgix.net/preview-195598-wSPLWjfONB-high_0000.jpg?w=660&q=60&fit=max&auto=format';
      }

      let divMain = document.createElement('div');
      let divContent = document.createElement('div');
      let h = document.createElement('h5');
      let para = document.createElement('p');
      let read = document.createElement('a');

      h.style.fontSize = '140%';
      para.style.marginRight = '80px';

      divMain.classList.add('child');
      divMain.classList.add('container');
      divContent.classList.add('content');

      divMain.style.backgroundImage = `url('${image}')`;
      divMain.style.backgroundSize = 'cover';
      divMain.style.backgroundPosition = 'center';

      h.textContent = articles.title;
      h.style.fontWeight = 'bold';
      para.textContent = truncate(articles.description, 230);
      read.textContent = 'Read More Here...';
      read.setAttribute('target', '_blank');
      read.setAttribute('href', `${articles.url}`);

      divContent.appendChild(h);
      divContent.appendChild(para);
      divContent.appendChild(read);

      divMain.appendChild(divContent);
      divMain.addEventListener('click', () => {
        window.open(articles.url, '_blank');
      });

      newsList.appendChild(divMain);
    });
  });
});

    /*for tabs*/ 

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      $("#OpenManager").click(function(){
        $(".bulletinManagerModal").modal('show');
      });


      $(".addNewAnnounce").click(function(){
        $(".addAnnouncement").modal('show');
      });

      $("#addAnnouncement").click(function(){
        $(".addAnnouncement").modal('show');
      });

      /* Edit Announcement*/ 
      $(".editAnnouncement").click(function(){
        var id =  $(this).attr('id');
        console.log(id);
        editAnnouncement(id);
        $(".editAnnouncementmodal").modal('show');
      });

      $(".deleteAnnouncement").click(function(){
        var id =  $(this).attr('id');
        console.log(id);
        $(".deleteAnnouncementModal #bulletin_key_ID").val(id);
        $(".deleteAnnouncementModal").modal('show');
      });


      function editAnnouncement(IDnumber){

        $.ajax({
          url: 'admin/bulletinManagement/getAnnouncement/' + IDnumber,
          type: 'post',
          dataType: 'json',
          success: function(response){
            // console.log(response);
              console.log(IDnumber);
              
              console.log(response);

              let bulletin_id = response['announce'].bulletin_id;
              let user_id = response['announce'].user_id;
              let author_name = response['announce'].author_name;
              let title = response['announce'].title;
              let summary = response['announce'].summary;
              let article_url = response['announce'].article_url;
              let image_url = response['announce'].img_url;
    
    
                $(".editAnnouncementmodal #bulletin_id").val(bulletin_id);
                $(".editAnnouncementmodal #user_id").val(user_id);
                $(".editAnnouncementmodal #author_input").val(author_name);
                $(".editAnnouncementmodal #title_input").val(title);
                $(".editAnnouncementmodal #summary_input").val(summary);
                $(".editAnnouncementmodal #articleURL_input").val(article_url);
                $(".editAnnouncementmodal #imageURL_input").attr("src", image_url);
  
        },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert("Error");
          }
      });

    }


