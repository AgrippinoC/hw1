function Response(response) {
  if (!response.ok) {
    return null;
  }
  return response.json();
}

function AJSON(json) {
  if (!json.length) {
    no(); 
    return;
  }
  container.textContent = null;
  for (let ara in json) {
    const p = document.createElement("p");
    p.textContent = json[ara].arance + " ";
    container.appendChild(p);
  }
}

function commento(event){
  const form = document.querySelector("form");
  const form_data = {method: 'post', body: new FormData(form)};
  fetch("carica-comm.php", form_data);   
  event.preventDefault();
}

document.querySelector('form').addEventListener('submit', commento);
const container = document.getElementById('results');
container.textContent = "Nessuna";
fetch("cerca-pref.php").then(Response).then(AJSON);