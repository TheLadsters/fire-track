var minDateBulletin;
var maxDateBulletin;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var min = minDateBulletin.val();
      var max = maxDateBulletin.val();
      var date = new Date( data[4] );

      if (
          ( min === null && max === null ) ||
          ( min === null && date <= max ) ||
          ( min <= date   && max === null ) ||
          ( min <= date   && date <= max )
      ) {
          return true;
      }
      return false;
  }
);


$(document).ready( function () {
  let date_now = new Date(Date.now());
  let stringDate = `Date Accessed: ${(date_now.getMonth()+1)}/${date_now.getDate()}/${date_now.getFullYear()}`;

// Create date inputs
function newAlertDateInputs(){
  minDateBulletin = new DateTime($('#minAlert'), {
    format: 'YYYY Do MMMM HH:mm:ss'
});
maxDateBulletin = new DateTime($('#maxAlert'), {
    format: 'YYYY Do MMMM HH:mm:ss'
});

}
newAlertDateInputs();

let minMaxAlertDateText = "";

$('#minAlert, #maxAlert').on('change', function () {
  // Gets the current daterange if there are and places it in excel and pdf
let minAlertDateInput = $("#minAlert").val();
let maxAlertDateInput =  $("#maxAlert").val();

if(minAlertDateInput == "" && maxAlertDateInput != ""){
  minMaxAlertDateText = `Time Period: Before "${maxAlertDateInput}"`;
}
else if(minAlertDateInput != "" && maxAlertDateInput ==""){
  minMaxAlertDateText = `Time Period: After "${minAlertDateInput}"`;
}
else if(minAlertDateInput == "" && maxAlertDateInput == ""){
  minMaxAlertDateText = ``;
}
else{
  minMaxAlertDateText = `Time Period From: "${minAlertDateInput}" to "${maxAlertDateInput}"`;
}
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  let aTable= $('#bulletinTable').DataTable({
    'ajax': 'admin/bulletinManagement/getBulletinTable',
    dom: 'Bfrtip',
    buttons: [
      $.extend( true, {}, {
        extend: 'excelHtml5',
        title: 'Bulletin Manager - FireTrack App',
        filename: 'Bulletin Manager - FireTrack App',
        sheetName:'Bulletins in FireTrack',
        messageTop: function(){
          return `List of all the Bulletins that are inputted in the FireTrack App.
          ${minMaxAlertDateText}
          `
        } 
      ,
        messageBottom: `${stringDate}`,
        text: `<i class='bx bxs-file-export'></i> Export as Excel`,
        exportOptions: {
          columns: [ 0, 1, 2, 3]
      }
    }),
        $.extend( true, {}, {
          extend: 'pdfHtml5',
          title: 'Bulletin Manager - FireTrack App',
          filename: 'Bulletin Manager - FireTrack App',
          messageTop: function(){
            return `List of all the Bulletins that are inputted in the FireTrack App.
            ${minMaxAlertDateText}
            `
          },
          messageBottom:`${stringDate}`,
          text: `<i class='bx bxs-file-pdf' ></i> Export as PDF`,
          exportOptions: {
            columns: [ 0, 1, 2, 3]
        }
      }),
    ],
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
                    <a class="edit editColBulletin editAnnouncement" data-bs-toggle="modal" id="${alert['bulletin_id']}" data-bs-target=".editAnnouncementmodal">
                    <i class='bx bxs-edit-alt' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i>                      </i>
                    </a>

                    <a class="delete deleteColBulletin deleteAnnouncement" data-bs-toggle="modal" id="${alert['bulletin_id']}" data-bs-target=".deleteAnnouncementModal">
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


// Refilter the table
$('#minAlert, #maxAlert').on('change', function () {
  aTable.draw();
});

$("#clearAlertDates").click(function(){
  $('#minAlert, #maxAlert').val("");
  newAlertDateInputs();
  aTable.clear().draw();
  aTable.ajax.reload();
  minMaxAlertDateText = "";
});

  // on clicking edit alert in Bulletin management
$('#bulletinTable tbody').on('click', '.editColBulletin', function(){
    let bull_id = $(this).attr('id');
    console.log(bull_id);

    $.ajax({
      url: 'admin/bulletinManagement/getAnnouncement/' + bull_id,
      type: 'post',
      dataType: 'json',
      success: function(response){
        // console.log(response);
          
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

});

// delete alert in Bulletin manager
$('#bulletinTable tbody').on('click', '.deleteColBulletin', function(){
  let bull_id = $(this).attr('id');
  $(".deleteAnnouncementModal #bulletin_key_ID").val(bull_id);
});


});



/*sepppp */
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

/*Management Modal*/

