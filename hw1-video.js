function play(event){
	let click = event.currentTarget.src;
	const video = urls[click];
	document.getElementById("player").src = video;
	console.log(video);
}

function onJsonV(json) {
	console.log(json);
	const v = document.querySelector('#preview');
	v.innerHTML = '';
	for(let i=1; i<5; i++) {
		const lib = document.createElement('div');
		const data = json.data[i];
		let nome_vid = data['name'];
		let img_vid = data['pictures'].base_link;
		let url = data['player_embed_url'];
		const a = document.createElement('p');
		const img = document.createElement('img');
		img.src = img_vid;
		a.textContent = nome_vid;
		urls[img.src] = url;   
		lib.appendChild(img);
		lib.appendChild(a);
		img.addEventListener('click', play);
		v.appendChild(lib);
	}
}

function video(event){
    fetch("cerca-vid.php").then(onResponse).then(onJsonV);
    event.preventDefault();
}

function onResponse(response){ 
    return response.json();
}

const urls = {};
document.querySelector("button").addEventListener("click", video);