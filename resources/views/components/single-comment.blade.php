@props(['comment'])
<x-card-wapper>
    <div class="d-flex">
        <div>
            <img src="{{$comment->author->avatar}}" width="50" height="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <h6>{{$comment->author->name}}</h6>
            <p class="text-secondary">{{$comment->created_at->format('l jS \of F Y h:i:s A')}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card-wapper>