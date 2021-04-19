const form = document.getElementById('form');
const firstname = document.getElementById('first-name');
const lastname = document.getElementById('last-name');
const studentindex = document.getElementById('student-index');
const fieldofstudy = document.getElementById('field-of-study');
const phonenumber = document.getElementById('phone-number');
const email = document.getElementById('email');
const password = document.getElementById('pwd');
const password2 = document.getElementById('pwd2');

function showError(input, message){
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

function showSuccess(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function checkEmail(input){
    const re = /[a-z0-9\.-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}/i;  
    if(input.value.trim()=== ''){
        showError(input, `Podaj wymaganą informację.`);  
    }
    else if(re.test(input.value.trim())){
        showSuccess(input);
    } else {
        showError(input, 'Niepoprawny format adresu email.');
    } 
      
}


function checkPasswordsMath(input1, input2) {
    if (input2.value === ''){
        showError(input2, 'Powtórz swoje hasło.');
    } 
    else if(input1.value !== input2.value){
        showError(input2, 'Hasła nie pasują do siebie.');
    } 
    else {
        showSuccess(input2);
    }

}

function checkLength(input, min, max){
    if(input.value.trim()=== ''){
        showError(input, `Podaj wymaganą informację.`);  
    }
    else if (input.value.length < min || input.value.lenght > max) {
        showError(input, `Pole musi zawierać ${min} - ${max} znaków.`);
    } else {
        showSuccess(input);
    }
}

function checkLengthN(input, n){
    if(input.value.trim()=== ''){
        showError(input, `Podaj wymaganą informację.`);  
    }
    else if (input.value.length != n) {
        showError(input, `Pole musi zawierać ${n} znaków.`);
    } else {
        showSuccess(input);
    }
}

function checkRequired(inputArr){
   
    inputArr.forEach(function(input){
        if(input.value.trim()=== ''){
            showError(input, `Podaj wymaganą informację.`);
        } else {
            showSuccess(input);
        }
    });
}

form.addEventListener('change', function(e){      
    checkEmail(email);   
    checkPasswordsMath(password, password2);    
    checkLength(password, 7, 25);
    checkLength(firstname, 2, 30);
    checkLength(lastname, 2, 30);
    checkLengthN(studentindex, 6);
    checkLengthN(phonenumber, 9); 
    checkRequired([fieldofstudy]);
});

