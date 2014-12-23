/**
 * Created by morcov on 22.12.14.
 */

$(document).ready(function(){
    $('#send').click(function(event){
        event.preventDefault();
        $('.error-message').html('');
        $.post('/product', $('.form').serializeArray(), function(answ){
            if(answ == 1){
                redirectTo('/');
            } else {
                if(answ.name !== undefined) $('.error-message.name').html(answ.name.join(', '));
                if(answ.name_en !== undefined) $('.error-message.name_en').html(answ.name_en.join(', '));
                if(answ.name_ua !== undefined) $('.error-message.name_ua').html(answ.name_ua.join(', '));
                if(answ.year !== undefined) $('.error-message.year').html(answ.year.join(', '));
                if(answ.time !== undefined) $('.error-message.time').html(answ.time.join(', '));
                if(answ.series !== undefined) $('.error-message.series').html(answ.series.join(', '));
                if(answ.description !== undefined) $('.error-message.description').html(answ.description.join(', '));
            }
        }, 'json')
    });
});