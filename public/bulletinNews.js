const searchFrom = document.querySelector('.search');
const input = document.querySelector('.input-news');
const newsList = document.querySelector('.news-list');

searchFrom.addEventListener('submit', retrieve);

function retrieve(e){

    newsList.innerHTML = '';
    e.preventDefault();

    
    const apiKey = '3bd9123369d54e9794bb2063d731de85';

    let topic = input.value;

    let url = `https://newsapi.org/v2/everything?q=${topic}&apiKey=${apiKey}`;

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.articles.forEach(article =>{
            let li = document.createElement('li');
            let a = document.createElement('p');
            let img = document.createElement("img");

            li.style.display = "block";
            li.style.width = "90%";
            li.style.height = "20%";
            li.style.padding = "10px";
            li.style.border = "1px solid blue";
            li.style.borderRadius = "15px";
            li.style.marginTop = "20px";
            li.style.backgroundImage= "url(article.urlToImage)";
            

            img.src = article.urlToImage;
            // img.style.float = "left";
            img.style.border = "10px solid orange";
            img.style.width = "250px";
            img.style.height = "150px";

            li.appendChild(img);

            a.style.marginLeft = "20%";

            a.setAttribute('href', article.url);
            a.setAttribute('target', '_blank');
            a.textContent = article.title;
            li.appendChild(a);
            
            newsList.appendChild(li);
        })

    })
}