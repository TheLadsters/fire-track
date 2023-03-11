// const searchFrom = document.querySelector('.search');
// const input = document.querySelector('.input-news');
const newsList = document.querySelector('.news-list');

// searchFrom.addEventListener('submit', retrieve);

// function retrieve(e){

    newsList.innerHTML = '';
    // e.preventDefault();

    
    const apiKey = '3bd9123369d54e9794bb2063d731de85';

    // let topic = input.value;

    let url = `https://newsapi.org/v2/everything?q=cebu&apiKey=${apiKey}`;

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.articles.forEach(article =>{

            let image = article.urlToImage;

            if(image == null){
                image = 'images/santonino.png';
            }   


            let li = document.createElement('li');

            li.style.display = "block";
            li.style.width = "100%";
            li.style.height = "200px";
            li.style.padding = "10px";
            li.style.border = "1px solid blue";
            li.style.borderRadius = "15px";
            li.style.marginTop = "20px";
            li.style.color = "white";
            li.style.backgroundImage= `url('${image}')`;
            li.style.filter = "grayscale(50%)";
            li.style.backgroundRepeat = "no-repeat";
            li.style.backgroundSize = "100%";


            let h = document.createElement('h4');

            h.setAttribute('target', '_blank');
            h.textContent = article.title;
            h.style.fontWeight = "bold";
            h.style.marginLeft ="5%";

            li.appendChild(h);
            
            let para = document.createElement('p');

            para.textContent = article.description;
            para.style.marginLeft ="5%";
            para.style.marginRight ="15%";
            para.style.marginTop = "3%";
                         
            li.appendChild(para);

            let read  = document.createElement('a');

            read.textContent = "Read More...";
            read.setAttribute('href', `${article.url}`);
            read.style.color = "white";
            read.style.marginLeft ="5%";

            li.appendChild(read);
            
            newsList.appendChild(li);
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

// }