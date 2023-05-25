
function redirect(event){
	const out = event.currentTarget.dataset.src;
	switch(out){
			case '1': location.assign("https://www.facebook.com/oranfrutta/"); break;
			case '2': location.assign("https://twitter.com/oranfrizer"); break;
			case '3': location.assign("https://www.instagram.com/oranfrutta/"); break;
			default: break;
	}
}

const p = document.querySelectorAll('#social img');
for(let r of p){ 
	r.addEventListener('click', redirect); 
}

function Response(response) {
    if (!response.ok) {
        return null;
    }
    return response.json();
}

function CJSON(json) {
    if (!json.length) {
        return;
    }

    const h3 = document.createElement('h3');
    h3.textContent = "Ecco cosa hanno detto di noi";
    console.log(container.parentNode);
    console.log(container);
    container.parentNode.appendChild(h3);
    for (let com in json) {
        const div = document.createElement('div');
        div.classList.add("con");
        const st = document.createElement('strong'); 
        st.textContent = json[com].user;
        const p = document.createElement('p'); 
        const text = json[com].commenti;
        p.textContent = text.replaceAll("+", " ");
        const star = document.createElement('div');
        for(let i = 0; i<json[com].stella; i++){
            s[i] = document.createElement('img');
            console.log(s[i]);
            s[i].src = "IMG/stars.png";
            star.appendChild(s[i]);
        }
        div.appendChild(st);
        div.appendChild(p);
        div.appendChild(star);
        container.appendChild(div);
        }
}

let s = {};
const container = document.getElementById('comment');
fetch("cerca-comm.php").then(Response).then(CJSON);