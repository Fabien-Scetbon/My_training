const API_URL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=016f1aa0e9b0095ec84f1abff8d5deac&page=1';
const IMG_PATH = 'https://image.tmdb.org/t/p/w1280';
const SEARCH_API = 'https://api.themoviedb.org/3/search/movie?api_key=016f1aa0e9b0095ec84f1abff8d5deac&query="';

const form = document.querySelector('#form');
const search = document.querySelector('#search');
const main = document.querySelector('#main');


// GET initial movies
getMovies(API_URL);

async function getMovies(url) {
    const res = await fetch(url);
    const data = await res.json();

    console.log(data.results);

    showMovies(data.results);
    
}

function showMovies(movies) {

    main.innerHTML = '';

    movies.forEach(movie => {

        /*let title = movie.title;
        let average = movie.vote_average;
        let overview = movie.overview;*/

        const { title, poster_path, vote_average, overview } = movie; // par decompo 

        const movieEl = document.createElement('div');
        movieEl.classList.add('movie');
        movieEl.innerHTML = `
        <img src="${IMG_PATH + poster_path}" alt="poster path">
        <div class="movie-info">
          <h3>${title}</h3>
          <span class="${getClassByRate(vote_average)}">${vote_average}</span>
        </div>

        <div class="overview">
          <h3>Overview</h3>
          ${overview}
        </div>
        `;

        main.appendChild(movieEl);
    
    });

}


function getClassByRate(vote) {
    if(vote >= 8) return 'green'
    else if(vote <= 5) return 'red'
    else return 'orange';
}

form.addEventListener('submit' , (e) => {
    
    e.preventDefault();

    const searchTerm = search.value;

    if(searchTerm && searchTerm != '') {  // variable existe et est non nulle

        getMovies(SEARCH_API + searchTerm);

        search.value = '';
    } else {
        window.location.reload(); // recharge la page
    }

})