function validateUser() {
    let user = $("#user").val().length;

    if (user === 0)
        return false;
    else
        return true;
}

function validatePassword() {
    let password = $('#password').val().length;

    if (password === 0)
        return false;
    else
        return true;
}
function validation() {
    if (validateUser() && validatePassword())
        $('#formLogin').submit();
    else
        $('#errorFront').text('Usuário e/ou senha incorreta.').addClass('alert alert-danger');
}