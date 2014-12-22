@foreach($comments as $comment)
    <div>
        <p>
            <span><b>{{ $comment->first_name }}</b></span>
            <span style="float: right">time: {{ date_format($comment->created_at, 'd-M-Y H:i'); }}</span>
        </p>
        <p><span>{{ $comment->comment }}</span></p>
    </div>
    ---------------
@endforeach