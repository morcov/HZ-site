/**
 * Created by morcov on 22.12.14.
 */
$(document).ready(function(){
    //getComments();

        $('#send-comment').click(function(event){
            event.preventDefault();
            $('.error-message').html('');
            $.post('/comment', {'comment': $('[name=comment]').val(), 'product_id': productID}, function(answ){
                if(answ >= 1){
                    $('[name=comment]').val('');
                    getComments();
                } else {
                    if(answ.comment !== undefined) $('.error-message.comment').html(answ.comment.join(', '));
                }
            }, 'json')
        });

    $(document).on('click', '.delete-comment', function(event){
        event.preventDefault();
        $.ajax({
            type: "DELETE",
            url: "/comment",
            data: {'comment_id': $(this).parent().parent().parent().attr('comment-id')},
            success: function(msg){
               getComments();
            }
        });
    });
});

function getComments(){
    $.get('/comment', {'product_id': productID}, function(answ){
        $('.comments').html(answ);
    })
}