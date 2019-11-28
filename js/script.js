let inputSearch = document.querySelector('form')[0];

inputSearch.addEventListener('input',sendSearch);

function sendSearch() {
	$.ajax({
	    url: 'search.php',
	    type: 'POST',
	    data: $('form').serialize()
	}).done(function(response){
		let results = JSON.parse(response);
		
		
		let section = document.createElement('section');
		
		results.forEach(function(result) {
			let article = document.createElement('article');
			
			let lien = document.createElement('a');
			lien.setAttribute('href','Produit/read/'+result.id);
			lien.innerText = result.nom;

			let description = document.createElement('p');
			description.innerText = result.description;

			article.appendChild(lien);
			article.appendChild(description);

			section.appendChild(article);
		});
		$('#result').html(section);
	});
}




