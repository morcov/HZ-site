/**
 * Created by morcov on 22.12.14.
 */
$(document).ready(function(){
    getComments()

        $('#send-comment').click(function(event){
            event.preventDefault();
            $('.error-message').html('');
            $.post('/ajaxAddComment', {'comment': $('[name=comment]').val(), 'product_id': productID}, function(answ){
                if(answ == 1){
                    getComments();
                } else {
                    if(answ.comment !== undefined) $('.error-message.comment').html(answ.comment.join(', '));
                }
            }, 'json')
        });
});

function getComments(){
    $.post('/ajaxGetComments', {'product_id': productID}, function(answ){
        $('.comments').html(answ);
    })
}