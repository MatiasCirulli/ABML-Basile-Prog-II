const buttonUsername = document.getElementById('username');
const buttonPassword = document.getElementById('password');
const buttonEmail = document.getElementById('correo');

const submit = document.getElementById('submit');
const cancelar = document.getElementById('cancelar');

const username = document.getElementById('usuario');
const email = document.getElementById('name');
const password = document.getElementById('contra');




buttonUsername.addEventListener('click', function(){
    buttonUsername.classList.add('goodbye');
    buttonPassword.classList.add('goodbye');
    buttonEmail.classList.add('goodbye');

    submit.classList.remove('goodbye');
    cancelar.classList.remove('goodbye');

    username.classList.remove('goodbye');
    username.classList.add('hello');
});

buttonPassword.addEventListener('click', function(){
    buttonUsername.classList.add('goodbye');
    buttonPassword.classList.add('goodbye');
    buttonEmail.classList.add('goodbye');

    submit.classList.remove('goodbye');
    cancelar.classList.remove('goodbye');
    
    password.classList.remove('goodbye');
    password.classList.add('hello');
});

buttonEmail.addEventListener('click', function(){
    buttonUsername.classList.add('goodbye');
    buttonPassword.classList.add('goodbye');
    buttonEmail.classList.add('goodbye');

    submit.classList.remove('goodbye');
    cancelar.classList.remove('goodbye');

    email.classList.remove('goodbye');
    email.classList.add('hello'); 
});


cancelar.addEventListener('click', function(){
    buttonUsername.classList.remove('goodbye');
    buttonPassword.classList.remove('goodbye');
    buttonEmail.classList.remove('goodbye');

    submit.classList.add('goodbye');
    cancelar.classList.add('goodbye');

    if (username.classList.contains('hello')) {
        username.classList.remove('hello');
        username.classList.add('goodbye');
    }
    if (password.classList.contains('hello')) {
        password.classList.remove('hello');
        password.classList.add('goodbye');
    }
    if (email.classList.contains('hello')) {
        email.classList.remove('hello');
        email.classList.add('goodbye');
    }
    
});