
document.getElementById('announcement_tab').click();

const newsList = document.querySelector('.news-list');

    newsList.innerHTML = '';

    
    const apiKey = '7cc0f3982bea4527bc3b09f042707579';


    let url = `https://api.worldnewsapi.com/search-news?api-key=${apiKey}&text=cebu%20fire`;
    let vhTotal = 3;

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.news.forEach(news =>{

            let image = news.image;
            if(image == null){
                image = 'images/santonino.png';
            }   

            // image.style.filter = "blur(5px)";            

            // let li = document.createElement('li');
            let divMain = document.createElement('div');
            let divBg = document.createElement('div');
            let divContent = document.createElement('div');
            let h = document.createElement('h5');
            let para = document.createElement('p');
            let read  = document.createElement('a');

            h.style.fontSize="140%";

            para.style.marginTop="20px";
            para.style.marginRight="100px";

            divMain.classList.add('child');
            divBg.classList.add('background-blur');
            divContent.classList.add('content');

            divMain.appendChild(divBg);

            divMain.style.backgroundImage= `url('${image}')`;
            divMain.style.height = "35vh";
            divMain.style.width = "auto";
            divMain.style.backgroundRepeat = "no-repeat";
            divMain.style.backgroundSize = "cover";
            divMain.style.backgroundPosition = "center center";
            
            divContent.style.top = `${vhTotal}vh`;
            divContent.style.marginLeft = "2%";
            vhTotal += 38.5;

            read.setAttribute('target', '_blank');
            h.textContent = news.title;
            h.style.fontWeight = "bold";
            para.textContent = news.text;
            read.textContent = "Read More Here...";
            read.setAttribute('href', `${news.url}`);
            read.style.color = "white";


            divContent.appendChild(h);
            divContent.appendChild(para);
            divContent.appendChild(read);

            // li.style.display = "block";
            // li.style.width = "100%";
            // li.style.height = "200px";
            // li.style.padding = "10px";
            // li.style.border = "1px solid blue";
            // li.style.borderRadius = "15px";
            // li.style.marginTop = "20px";
            // li.style.color = "white";
            // li.style.backgroundRepeat = "no-repeat";
            // li.style.backgroundSize = "100%";

            // h.style.marginLeft ="5%";

            // li.appendChild(h);

            // para.style.marginLeft ="5%";
            // para.style.marginRight ="15%";
            // para.style.marginTop = "3%";
                         
            // li.appendChild(para);



            // read.style.marginLeft ="5%";

            
            newsList.appendChild(divMain);
            newsList.appendChild(divContent);
        })

    })

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

