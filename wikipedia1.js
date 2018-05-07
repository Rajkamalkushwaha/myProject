
const form = document.querySelector('.searchForm');
form.addEventListener('submit', handleSubmit);

function handleSubmit(event) {
  event.preventDefault();
   const input = document.querySelector('.searchForm-input').value;
   const searchQuery = input.trim();
   fetchResults(searchQuery);
}

function fetchResults(searchQuery) {
	  const endpoint = `https://en.wikipedia.org/w/api.php?action=query&list=search&prop=info&inprop=url&utf8=&format=json&origin=*&srlimit=20&srsearch=${searchQuery}`;
  	fetch(endpoint)
  		.then(response => response.json())
  		.then(data => {
  	  	console.log(data);
		})
    .catch(() => console.log('An error occured'));
}


function displayResults(results) {
 const searchResults = document.querySelector('.searchResults');
 searchResults.innerHTML = '';
 results.forEach(result => {
   const url = encodeURI(`https://en.wikipedia.org/wiki/${result.title}`);

   searchResults.insertAdjacentHTML('beforeend',
      `<div class="resultItem">
        <h3 class="resultItem-title">
          <a href="${url}" target="_blank" rel="noopener">${result.title}</a>
        </h3>
        <span class="resultItem-snippet">${result.snippet}</span><br>
        <a href="${url}" class="resultItem-link" target="_blank" rel="noopener">${url}</a>
      </div>`
    );
  });
}