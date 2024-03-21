// Example starter JavaScript for disabling form submissions if there are invalid fields

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
var form = document.getElementById("form")

function checker(value, pattern) {
    return value.match(pattern)
}

var pass = document.getElementById("pass")
var confpass = document.getElementById("confpass")
var passwordPat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
pass.addEventListener("blur", function () {
    // ? works but add more
    var div = document.getElementById("passpatt")
    if (!checker(pass.value, passwordPat)) {

        div.style.display = "block"
        pass.style.borderColor = "red"
        // pass.focus()
        // pass.select()

    }
    else {

        div.style.display = "none"
        pass.style.borderColor = "green"
    }
})
confpass.addEventListener("blur", function () {
    // ? works but add more
    var div = document.getElementById("passcheck")
    if (pass.value != confpass.value) {

        div.style.display = "block"
        pass.style.borderColor = "red"
        confpass.style.borderColor = "red"
        // confpass.focus()
        // confpass.select()

    }
    else {

        div.style.display = "none"
        pass.style.borderColor = "green"
        confpass.style.borderColor = "green"
    }
})
pass.addEventListener("blur", function () {
    // ? works but add more
    var div = document.getElementById("passcheck")
    if (pass.value != confpass.value) {

        div.style.display = "block"
        pass.style.borderColor = "red"
        confpass.style.borderColor = "red"
        // confpass.focus()
        // confpass.select()

    }
    else {

        div.style.display = "none"
        pass.style.borderColor = "green"
        confpass.style.borderColor = "green"
    }
})

// var email = document.getElementById("email")
// var emailPat = /^[a-zA-Z0-9\.]+@[a-zA-Z]+\.[a-z]{3}$/
// email.addEventListener("blur", function () {
//     // ? works but add more
//     var div = document.getElementById("emailcheck")
//     if (!checker(email.value, emailPat)) {
//         div.style.display = "block"
//         email.style.borderColor = "red"
//         email.focus()
//         email.select()

//     }
//     else {

//         div.style.display = "none"
//         email.style.borderColor = "green"


//     }
// })

// var phone = document.getElementById("phone")
// var phonePat = /^(011|012|015|010)[0-9]{8}$/
// phone.addEventListener("blur", function () {
//     // ? works but add more
//     var div = document.getElementById("phonecheck")
//     if (!checker(phone.value, phonePat)) {
//         div.style.display = "block"
//         phone.style.borderColor = "red"
//         phone.focus()
//         phone.select()

//     }
//     else {

//         div.style.display = "none"
//         phone.style.borderColor = "green"


//     }
// })


// form.addEventListener("submit", function (e) {

//     var div = document.getElementById("fillall")
//     if (!(checker(username.value, usernamePat) && checker(password.value, passwordPat) && checker(email.value, emailPat) && checker(phone.value, phonePat) && checkGender())) {
//         e.preventDefault()
//         div.style.display = "block  "
//     }
//     else {
//         div.style.display = "none"
//     }
// }
// )