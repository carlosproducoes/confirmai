function showInvalidFeedback (element, message) {
    element.addClass('is-invalid')
    element.siblings('.invalid-feedback').text(message)
}

function showValidFeedback (element, message = '') {
    element.addClass('is-valid')
    element.siblings('.valid-feedback').text(message)
}

function hideFeedback (element) {
    element.removeClass('is-invalid')
    element.removeClass('is-valid')
}

$('#first_name').focus(function () {
    hideFeedback($(this))
    $(this).attr('data-validated', false)
})

$('#first_name').blur(function () {
    if($(this).val().trim().length < 2){
        showInvalidFeedback($(this), 'Nome inválido')
        return
    }

    $(this).attr('data-validated', true)
})

$('#last_name').focus(function () {
    hideFeedback($(this))
    $(this).attr('data-validated', false)
})

$('#last_name').blur(function () {
    if($(this).val().trim().length < 2){
        showInvalidFeedback($(this), 'Sobrenome inválido')
        return
    }

    $(this).attr('data-validated', true)
})

$('#email').focus(function () {
    hideFeedback($(this))
    $(this).attr('data-validated', false)
})

$('#email').blur(async function () {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

    if(!regex.test($(this).val().trim())){
        showInvalidFeedback($(this), 'E-mail inválido')
        return
    }

    var emailExists = false

    await $.post({
        url: 'check-if-email-exists',
        type: 'POST',
        data: $(this),
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        },
        beforeSend: function () {
            $('.loader-background').removeClass('d-none')
        },
        success: function (response) {
            if (response) {
                emailExists = true
            }
        },
        complete: function () {
            $('.loader-background').addClass('d-none')
        }
    })

    if ( emailExists ) {
        showInvalidFeedback($(this), 'E-mail já está cadastrado')
        return
    }
 
    $(this).attr('data-validated', true)
})

$('#password').focus(function () {
    hideFeedback($(this))
    $(this).attr('data-validated', false)
})

$('#password').blur(function () {
    if($(this).val().trim().length < 8){
        showInvalidFeedback($(this), 'A senha deve ter no mínimo 8 caracteres')
        return
    }

    $(this).attr('data-validated', true)

    hideFeedback($('#password_confirmation'))
    
    if($('#password_confirmation').val().trim() != $(this).val().trim()){
        showInvalidFeedback($('#password_confirmation'), 'A confirmação deve ser igual a senha')
        $('#password_confirmation').attr('data-validated', false)
        return
    }

    $('#password_confirmation').attr('data-validated', true)
})

$('#password_confirmation').focus(function () {
    hideFeedback($(this))
    $(this).attr('data-validated', false)
})

$('#password_confirmation').blur(function () {
    if($('#password').val().trim() != $(this).val().trim()){
        showInvalidFeedback($(this), 'A confirmação deve ser igual a senha')
        return
    }

    $(this).attr('data-validated', true)
})

$('form').submit(function (event) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    var error = false

    if($('#first_name').attr('data-validated') != "true"){
        error = true
        showInvalidFeedback($('#first_name'), 'Nome inválido')
    }

    if($('#last_name').attr('data-validated') != "true"){
        error = true
        showInvalidFeedback($('#last_name'), 'Sobrenome inválido')
    }

    if($('#email').attr('data-validated') != "true"){
        var message = "E-mail já está cadastrado"

        if(!regex.test($('#email').val().trim())){
            message = "E-mail inválido"
        }

        error = true
        showInvalidFeedback($('#email'), message)
    }

    if($('#password').attr('data-validated') != "true"){
        error = true
        showInvalidFeedback($('#password'), 'A senha deve ter no mínimo 8 caracteres')
    }

    if($('#password_confirmation').attr('data-validated') != "true"){
        error = true
        showInvalidFeedback($('#password_confirmation'), 'A confirmação deve ser igual a senha')
    }

    if(error){
        $(".error").removeClass('d-none')
        event.preventDefault()
    }

})