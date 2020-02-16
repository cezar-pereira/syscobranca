function validatorName() {
    let name = $("#name").val().length;
    if (name > 1)
        return true;
    else {
        $("#errorValidationFront").text("Nome inválido").addClass("alert alert-danger");
        return false;
    }
}

function validatorCpf() {
    let cpf = $("#cpf").val().length;
    if (cpf === 11)
        return true;
    else {
        $("#errorValidationFront").text("CPF inválido").addClass("alert alert-danger");
        return false;
    }
}

function validatorPhone() {
    let phone = $("#phone").val();
    let regex = new RegExp("^[1-9]{2}[9]{1}[1-9]{8}$");
    if (phone.length === 11 && regex.test(phone))
        return true;
    else {
        $("#errorValidationFront").text("Contato inválido").addClass("alert alert-danger");
        return false;
    }
}

function validateUser() {
    if (validatorName() && validatorCpf() && validatorPhone())
        $("#formUser").submit();
}