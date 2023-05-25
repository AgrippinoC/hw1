
function ricette(event){
	 event.preventDefault();
	 const form_data = new FormData(document.querySelector("form"));
     fetch("cerca-rice.php?q="+encodeURIComponent(form_data.get('search'))).then(onResponse).then(onJsonR);
}

function onJsonR(json) {
     const r = document.querySelector('#recipe');
      r.innerHTML = '';
      if(json.totalResults == 0){ 
      document.querySelector('#erore').classList.remove('hidden');
      } else { document.querySelector('#erore').classList.add('hidden');
      for(let i=0; i<6; i++) {
        const lib = document.createElement('div');
        const data = json.results[i];
        let img_rec = data['image'];
	    let img_tit = data['title'];
        const a = document.createElement('p');
        const img = document.createElement('img');
        img.src = img_rec;
        a.textContent = img_tit;
        lib.appendChild(img);
        lib.appendChild(a);
	    r.appendChild(lib);
      }
     }
}

function onResponse(response){
    return response.json();
}

document.querySelector('#food').addEventListener('submit', ricette);
