/**
 * Created by morcov on 22.12.14.
 */
$(document).ready(function(){
    $('#send').click(function(event){
        event.preventDefault();
        $('.error-message').html('');
        $.post('/ajaxLoginUser', $('.form').serializeArray(), function(answ){
            if(answ == 1){
                redirectTo('/');
            } else {
                $('.error-message.password').html(answ);
                if(answ.email !== undefined) $('.error-message.email').html(answ.email.join(', '));
                if(answ.password !== undefined) $('.error-message.password').html(answ.password.join(', '));

            }
        }, 'json')
    });
});
