/**
 * Created by morcov on 19.12.14.
 */

$(document).ready(function(){
    $('#send-registration').click(function(event){
        event.preventDefault();
        $('.error-message').html('');
        $.post('/ajaxRegistrationUser', $('.registration-form').serializeArray(), function(answ){
            if(answ == true){
                //redirectTo('/');
            } else {
                if(answ.name !== undefined) $('.error-message.name').html(answ.name.join(', '));
                if(answ.email !== undefined) $('.error-message.email').html(answ.email.join(', '));
                if(answ.password !== undefined) $('.error-message.password').html(answ.password.join(', '));
                if(answ.password_confirmation !== undefined) $('.error-message.password_confirmation').html(answ.password_confirmation.join(', '));
            }
        }, 'json')
    });
});