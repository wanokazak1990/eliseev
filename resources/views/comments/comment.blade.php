@isset($itemComment)
<div class="col-xs-12 col-4">
    <div class="comment">
        <h4>{{$itemComment->username}} : {{ $itemComment->title }}</h4>
        <div>{{ $itemComment->text }}</div>
        <div>{{$itemComment->create_date}}</div>
    </div>
</div>
@endisset

@isset($comment)
<div class="col-xs-12 col-4">
    <div class="comment">
        <h4>{{$comment->username}} : {{ $comment->title }}</h4>
        <div>{{ $comment->text }}</div>
        <div>{{$comment->create_date}}</div>
    </div>
</div>
@endisset