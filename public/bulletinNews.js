
document.getElementById('announcement_tab').click();

const newsList = document.querySelector('.news-list');

    newsList.innerHTML = '';

    
    const apiKey = '3bd9123369d54e9794bb2063d731de85';


    let url = `https://newsapi.org/v2/everything?q=Cebu sunog&apiKey=${apiKey}`;
    let vhTotal = 3;

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.articles.forEach(article =>{

            let image = article.urlToImage;
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

            h.setAttribute('target', '_blank');
            h.textContent = article.title;
            h.style.fontWeight = "bold";
            para.textContent = article.description;
            read.textContent = "Read More Here...";
            read.setAttribute('href', `${article.url}`);
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

      $("#addAnnouncement").click(function(){
        $(".addAnnouncement").modal('show');
      });

      /* Edit Announcement*/ 
      $(".editAnnouncement").click(function(){
        editAnnouncement();
        $(".editAnnouncementmodal").modal('show');
      });


      function editAnnouncement(){

        $.ajax({
          url: 'admin/bulletinManagement/getAnnouncement',
          type: 'get',
          dataType: 'json',
          success: function(response){
            // console.log(response);

              var id = $(".bulletin_ID").val();
              console.log(id);

              id--;

              let bulletin_id = response['announce'][id].bulletin_id;
              let user_id = response['announce'][id].user_id;
              let author_name = response['announce'][id].author_name;
              let title = response['announce'][id].title;
              let summary = response['announce'][id].summary;
              let article_url = response['announce'][id].article_url;
              
              console.log(response);

                $(".editAnnouncement #bulletin_id").val(bulletin_id);
                $(".editAnnouncement #user_id").val(user_id);
                $(".editAnnouncement #author_input").val(author_name);
                $(".editAnnouncement #title_input").val(title);
                $(".editAnnouncement #summary_input").val(summary);
                $(".editAnnouncement #articleURL_input").val(article_url);

  
           
        },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert("Error");
          }
      });

    }
      