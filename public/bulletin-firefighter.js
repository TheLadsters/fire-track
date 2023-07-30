document.addEventListener("DOMContentLoaded", function() {

function truncate(str, maxlength) {
  return (str.length > maxlength) ?
    str.slice(0, maxlength - 1) + '…' : str;
}

document.getElementById('announcement_tab').click();

const newsList = document.querySelector('.news-list');
newsList.innerHTML = '';

const apiKey = '272521ae53704265bd97a60c8e74fcee';
let url = `https://api.worldnewsapi.com/search-news?api-key=${apiKey}&text=cebu%20fire`;

fetch(url)
  .then((res) => res.json())
  .then((data) => {

    data.news.slice()
    data.news.reverse()

    data.news.forEach((news) => {
      let image = news.image;
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

      h.textContent = news.title;
      h.style.fontWeight = 'bold';
      para.textContent = truncate(news.text, 230);
      read.textContent = 'Read More Here...';
      read.setAttribute('target', '_blank');
      read.setAttribute('href', `${news.url}`);

      divContent.appendChild(h);
      divContent.appendChild(para);
      divContent.appendChild(read);

      divMain.appendChild(divContent);
      divMain.addEventListener('click', () => {
        window.open(news.url, '_blank');
      });

      newsList.appendChild(divMain);
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



      $("#addAnnouncementFirefighter").click(function(){
        $(".addAnnouncementFirefighter").modal('show');
      });

      /* Edit Announcement*/ 
      $(".editAnnouncement").click(function(){
        var id =  $(this).attr('id');
        editAnnouncement(id);
        $(".editAnnouncementmodal").modal('show');
      });

      $(".deleteAnnouncement").click(function(){
        var id =  $(this).attr('id');
        $(".deleteAnnouncementModal #bulletin_key_ID").val(id);
        $(".deleteAnnouncementModal").modal('show');
      });


      function editAnnouncement(IDnumber){

        $.ajax({
          url: 'admin/bulletinManagement/getAnnouncement/' + IDnumber,
          type: 'post',
          dataType: 'json',
          success: function(response){

              let bulletin_id = response['announce'].bulletin_id;
              let user_id = response['announce'].user_id;
              let author_name = response['announce'].author_name;
              let title = response['announce'].title;
              let summary = response['announce'].summary;
              let article_url = response['announce'].article_url;

                $(".editAnnouncementmodal #bulletin_id").val(bulletin_id);
                $(".editAnnouncementmodal #user_id").val(user_id);
                $(".editAnnouncementmodal #author_input").val(author_name);
                $(".editAnnouncementmodal #title_input").val(title);
                $(".editAnnouncementmodal #summary_input").val(summary);
                $(".editAnnouncementmodal #articleURL_input").val(article_url);
  
        },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert("Error");
          }
      });

    }

  });