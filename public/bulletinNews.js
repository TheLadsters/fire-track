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
            let a = document.createElement('a');
            a.setAttribute('href', article.url);
            a.setAttribute('target', '_blank');
            a.textContent = article.title;
            li.appendChild(a);
            newsList.appendChild(li);
        })

    })
}