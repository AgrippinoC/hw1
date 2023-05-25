function Username(event) {
    const input = event.currentTarget;

    if(!/^[a-zA-Z0-9_]{1,10}$/.test(input.value)) {
        document.querySelector('.allarme span').textContent = "Sono ammessi solo caratteri alfanumerici";
        input.parentNode.classList.add('allarme');
    }
}

const formStatus = {'upload': true};
document.querySelector('.username input').addEventListener('blur', Username);



