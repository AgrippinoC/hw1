function likeit(event){
  event.stopPropagation();
  const orange = event.currentTarget.parentNode.parentNode;
  event.currentTarget.src = "IMG/like.png";
  const formData = new FormData();
  formData.append('title', orange.dataset.nome);
  console.log(formData);
  let data = {title: orange.dataset.nome};
  console.log(data);
  fetch("arancia-pref.php", { 
    method: "POST",
    body: formData
    }).then(Response, Error);
}

function Response(response) {
  console.log(response); 
  return response.json().then(dbResponse);
}

function Error(error) { 
  console.log("Errore");
}

function dbResponse(json) {
  if (!json.ok) {
      Error();
      return null;
  }
}

const like = document.querySelectorAll("#like");
for(let l of like){
    l.addEventListener('click', likeit);
}