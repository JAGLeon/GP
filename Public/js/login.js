function qs(element) {
    return document.querySelector(element)
}
    let $inputEmail = qs('#email2'),
    $inputpassword = qs('#password2'),
    $errors = qs('#errors2'),
    $eye = qs('#eye2'),
    $pass = qs('#password2'),
    $formLogin = qs('#formLogin'),
    regExEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    $inputEmail.addEventListener("blur", (e) => {
        switch (true) {
            case !$inputEmail.value.trim():
                $errors.innerHTML = "Se debe ingresar un email";
                $inputEmail.classList.add("is-invalid");
                break;
            case !regExEmail.test($inputEmail.value):
                $errors.innerHTML = "El email no es valido";
                $inputEmail.classList.add("is-invalid");
                break;
            default: 
                $inputEmail.classList.remove("is-invalid");
                $errors.innerHTML = "";
                break;
        }
    });

    $inputpassword.addEventListener("blur", (e) => {
        switch (true) {
            case !$inputpassword.value.trim():
                $errors.innerHTML = "Se debe ingresar una contraseña";
                $inputpassword.classList.add("is-invalid");
                $eye.style.right = "-240px"; 
                break;
            default: 
                $inputpassword.classList.remove("is-invalid");
                $errors.innerHTML = "";
                $eye.style.right = "-260px";
                break;
        }
    });

    $eye.addEventListener("click",() => {
        if($pass.type == "password"){
            $pass.type = "text";
            $eye.style.opacity = 0.2;
        }else{
            $pass.type = "password";
            $eye.style.opacity = 1;
        }
    });

    $formLogin.addEventListener("submit", function(event) {

        event.preventDefault()
        let elementsForm = this.elements;
        let errores = false;

        console.log(elementsForm)

        for (let index = 0; index < elementsForm.length - 2; index++) {
            if(elementsForm[index].value == ""
            || elementsForm[index].classList.contains("is-invalid")){
                elementsForm[index].classList.add("is-invalid");
                $errors.innerHTML = "Contraseña o Email invalidos"
                errores = true;
            }
        }

        if(!errores){
            $formLogin.submit()
        }
    })