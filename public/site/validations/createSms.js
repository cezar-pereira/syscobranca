function validatorReceiver() {
    let receiver = $("#cpf_phone").val().length;
    if (receiver === 11)
        return true;
    else {
        $("#errorValidationFront").text("Destinatário inválido").addClass("alert alert-danger");
        return false;
    }
}

function validatorMessage() {
    let message = $("#message").val().length;
    if (message === 0) {
        $("#errorValidationFront").text("Mensagem não pode ser nula").addClass("alert alert-danger");
        return false;
    } else if (message > 160) {
        $("#errorValidationFront").text("Mensagem não pode ter mais de 160 caracteres inválido").addClass("alert alert-danger");
        return false
    }
    else
        return true;

}

function validatorSms() {
    if (validatorReceiver() && validatorMessage())
        $("#formSms").submit();
}
