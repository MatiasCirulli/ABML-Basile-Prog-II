window.addEventListener('DOMContentLoaded', function(){

var username = document.getElementById('usuario');
var contra = document.getElementById('contra');
var email = document.getElementById('name');
const formulario = document.getElementById('form');

const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//const passwordRegex = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;;
const oneLetterMin = /^(?=.*[a-z]).{0,}$/;
const oneLetterMayus = /^(?=.*[A-Z]).{0,}$/
const specialChara = /^(?=.*[@$!%*#?&]).{0,}$/;
const number = /^(?=.*\d).{0,}$/;
const eightChara = /^.{8,}$/;


var flag = 0;
function validacionPassword() {
    let password = contra.value.trim();


    if (password.match(oneLetterMin)) {
        flag++;
     } else {
        alert('Su contraseña debe contener minimo una letra minuscula');
    }
     
    if (password.match(oneLetterMayus)) {
        flag++;
    } else {
        alert('Su contraseña debe contener minimo una letra mayuscula');
    }
     
    if (password.match(eightChara)) {
        flag++; 
    } else {
        alert('Su contraseña debe contener minimo 8 caracteres');
    }
    /* 
    if (password.match(specialChara)) {
        flag++;
    } else {
        alert('Su contraseña debe contener minimo un caracter special');
    }
    */
    if (password.match(number)) {
        flag++;
    } else {
        alert('Su contraseña debe contener minimo un numero');
    }
     
}

formulario.addEventListener("submit", function(event) {
    event.preventDefault();
    let password = contra.value.trim();
    let emailisito = email.value.trim();
    
    var flag2 = 0;

    console.log(username);
    console.log(emailisito);
    console.log(password);

    if (emailisito === '' && password === '') {
        formulario.submit();
    } else {
        validacionPassword();
        if (emailisito.match(emailRegex)) {
            flag2++;
        } else {
            event.preventDefault();
            alert('Formato de email invalido');
    
        }     
    

            if (flag == 4 && flag2 == 1) {
                formulario.submit();
            } else {
                event.preventDefault();
            }

        
        
    }


});
})