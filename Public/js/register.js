function qs(element) {
    return document.querySelector(element);
};

let $inputName1 = qs('#name'),
$inputLastName1 = qs('#lastName'),
$inputEmail1 = qs('#email'),
$inputPassword1 = qs('#password'),
$inputCuit1 = qs('#cuit');
$formRegister = qs('#formRegister'),
$errors1 = qs('#errors1'),
$eye1 = qs('#eye'),
$pass1 = qs('#password'),
regExAlpha = /^[a-zA-Z\sñáéíóúü ]*$/,
regExEmail1 = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
regExPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
    
$inputName1.addEventListener("blur", () => {
    switch (true) {
        case !$inputName1.value.trim():
            $errors1.innerHTML = "Ingrese su nombre";
            $inputName1.classList.add("is-invalid");
            break;
        case $inputName1.value.trim().length < 2:
            $errors1.innerHTML = "Mínimo 2 carácteres";
            $inputName1.classList.add("is-invalid");
            break;
        case !regExAlpha.test($inputName1.value):
            $errors1.innerHTML = "Nombre inválido";
            $inputName1.classList.add("is-invalid");
            break;
        default: 
            $inputName1.classList.remove("is-invalid");
            $errors1.innerHTML = "";
            break;
    };
});

$inputLastName1.addEventListener("blur", () => {
    switch (true) {
        case !$inputLastName1.value.trim():
            $errors1.innerHTML = "Ingrese su apellido";
            $inputLastName1.classList.add("is-invalid");
            break;
        case $inputLastName1.value.trim().length < 2:
            $errors1.innerHTML = "Mínimo 2 carácteres";
            $inputLastName1.classList.add("is-invalid");
            break;
        case !regExAlpha.test($inputLastName1.value):
            $errors1.innerHTML = "Apellido inválido";
            $inputLastName1.classList.add("is-invalid");
            break;
        default: 
            $inputLastName1.classList.remove("is-invalid");
            $errors1.innerHTML = "";
            break;
    };
});

$inputCuit1.addEventListener("blur", (e) => {
    switch (true) {
        case !$inputCuit1.value.trim():
            $errors1.innerHTML = "Se debe un CUIT";
            $inputCuit1.classList.add("is-invalid");
            break;
        default: 
            $inputCuit1.classList.remove("is-invalid");
            $errors1.innerHTML = "";
            break;
    }
});

$inputEmail1.addEventListener("blur", () => {
    switch (true) {
        case !$inputEmail1.value.trim():
            $errors1.innerHTML = "Campo obligatorio complete con<br/>su email";
            $inputEmail1.classList.add("is-invalid");
            break;
        case !regExEmail1.test($inputEmail1.value):
            $errors1.innerHTML = "Email inválido";
            $inputEmail1.classList.add("is-invalid");
            break;
        default: 
            $inputEmail1.classList.remove("is-invalid");
            $errors1.innerHTML = "";
            break;
    };
});

$inputPassword1.addEventListener('blur', function(){
    switch (true) {
        case !$inputPassword1.value.trim():
            $errors1.innerHTML = 'Campo obligatorio complete con<br/>una contraseña';
            $inputPassword1.classList.add('is-invalid');
            $eye1.style.right = "-240px"; 
            break;
        case !regExPass.test($inputPassword1.value):
            $errors1.innerHTML = 'Mínimo 8 carácteres, debe tener<br/>mayúscula, minúscula, número';
            $inputPassword1.classList.add('is-invalid');
            $eye1.style.right = "-240px"; 
            break;    
        default:
            $inputPassword1.classList.remove("is-invalid");
            $errors1.innerHTML = "";
            $eye1.style.right = "-260px";
            break;
    };
});

$eye1.addEventListener("click",() => {
    if($pass1.type == "password"){
        $pass1.type = "text";
        $eye1.style.opacity = 0.2;
    }else{
        $pass1.type = "password";
        $eye1.style.opacity = 1;
    }
});

$formRegister.addEventListener("submit", function(event) {

    event.preventDefault();
    let elementsForm = this.elements;
    let errores = false;

    for (let index = 0; index < elementsForm.length - 1; index++) {
        if(elementsForm[index].value == ""
        || elementsForm[index].classList.contains("is-invalid")){
            elementsForm[index].classList.add("is-invalid");
            errors1.innerHTML = "Hay errores en el formulario"
            errores = true;
        }
    };

    if(!errores){
        $formRegister.submit()
    };

});