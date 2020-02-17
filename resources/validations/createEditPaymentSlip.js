function validatorReceiver() {
    let receiver = $("#cpf_phone").val();
    if (typeof (receiver) != 'undefined') {
        if (receiver.length === 11)
            return true;
        else {
            $("#errorValidationFront").text("Destinatário inválido").addClass("alert alert-danger");
            return false;
        }
    } else
        return true;
}

function validatorDueDate() {
    let dueDate = $("#dueDate").val();

    let regex = new RegExp("^[1-2][0-9]{3}-(0[1-9]|1[0-2])-[0-9]{2}$");
    if (regex.test(dueDate))
        return true;
    else {
        $("#errorValidationFront").text("Data inválida").addClass("alert alert-danger");
        return false
    }
}

function validatorGrossIncome() {
    let grossIncome = $("#grossIncome").val().length;
    if (grossIncome === 0) {
        $("#errorValidationFront").text("Valor deve ser preenchido").addClass("alert alert-danger");
        return false
    } else
        return true;
}

function validatorDetails() {
    let details = $("#details").val().length;
    if (details === 0) {
        $("#errorValidationFront").text("Detalhes não pode ser nulo").addClass("alert alert-danger");
        return false;
    } else if (details > 160) {
        $("#errorValidationFront").text("Mensagem não pode ter mais de 255 caracteres").addClass("alert alert-danger");
        return false
    }
    else
        return true;
}

function validatorPaymentSlip() {
    if (validatorReceiver() && validatorDueDate() && validatorGrossIncome() && validatorDetails())
        $("#formPaymentSlip").submit();
}