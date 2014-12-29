@foreach($comments as $comment)
    <div comment-id="{{ $comment->id }}">
        <p>
            <span><b>{{ $comment->first_name }}</b></span>
            <span style="float: right"><a href="#" class="delete-comment">x</a></span>
            <span style="float: right; margin-right: 15px">{{ date_format($comment->created_at, 'd-M-Y H:i'); }}</span>
        </p>

        <p><span>{{ $comment->comment }}</span></p>
    </div>
    ---------------
@endforeach