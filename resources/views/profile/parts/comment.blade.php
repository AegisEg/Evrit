<div class="coment my-4 row text-right">
    <div class="avtor col-6 col-md-3 ">
        <a href="{{route('profile.show',['id'=>$comment->user->id])}}" class="pink">{{$comment->user->name}}</a>
    </div>
    <div class="date col-6 col-md-3">{{$comment->created_at}}</div>
    <div class="content_comment col-12">
        {{$comment->text}}
    </div>
    @if($comment->user->id==Auth::id())
        <i class="fa fa-trash comment_trash" data-id="{{$comment->id}}"></i>
    @endif
</div>