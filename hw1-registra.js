function Name(event) {
    const input = event.currentTarget;
    console.log(input.parentNode);
    if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) {
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.classList.remove('allarme');
    } else {
        input.parentNode.classList.add('allarme');
    }
    } else {
        input.parentNode.classList.add('allarme');
    }
}

function Surname(event) {
    const input = event.currentTarget;
    if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { 
    if (formStatus[input.surname] = input.value.length > 0) {
        input.parentNode.classList.remove('allarme');
    } else {
        input.parentNode.classList.add('allarme');
    }
    } else {
        input.parentNode.classList.add('allarme');
    }
}

function jsonuser(json) {
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('allarme');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('allarme');
    }

}

function jsonemail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('allarme');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('allarme');
    }

}

function fetchResponse(response) {
    if (!response.ok) return null;
    console.log(response);
    return response.json();
}

function Username(event) {
    const input = event.currentTarget;

    if(!/^[a-zA-Z0-9_]{1,10}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammessi solo caratteri alfanumerici, max 10";
        input.parentNode.classList.add('allarme');
        formStatus.username = false;

    } else {
        fetch("check_user.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonuser);
    }    
}

function Email(event) {
    const input = event.currentTarget;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('allarme');
        formStatus.email = false;

    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonemail);
    }
}

function Password(event) {
    const input = event.currentTarget;
    if (formStatus.password = input.value.length >= 8) {
        document.querySelector('.password').classList.remove('allarme');
    } else {
        document.querySelector('.password').classList.add('allarme');
    }

}

function Confirm(event) {
    const input = event.currentTarget;
    if (formStatus.confirmPassord = input.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('allarme');
    } else {
        document.querySelector('.confirm_password').classList.add('allarme');
    }
}


const formStatus = {'upload': true};
document.querySelector('.name input').addEventListener('blur', Name);
document.querySelector('.surname input').addEventListener('blur', Surname);
document.querySelector('.username input').addEventListener('blur', Username);
document.querySelector('.email input').addEventListener('blur', Email);
document.querySelector('.password input').addEventListener('blur', Password);
document.querySelector('.confirm_password input').addEventListener('blur', Confirm);


