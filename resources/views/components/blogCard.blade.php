@props(['blog'])
<div class="card">
    <img src='{{asset("storage/$blog->thumbnail")}}' class="card-img-top" alt="..." />
    <div class="card-body">
        <h3 class="card-title">{{$blog->title}}</h3>
        <p class="fs-6 text-secondary">
            Author - <a
                href="/?username={{$blog->author->username}}{{request('search') ? '&search=' . request('search') : ''}}{{request('catagory') ? '&catagory=' . request('catagory') : ''}}">{{$blog->author->name}}</a>
            <br />
            <span>{{$blog->created_at->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
            <a
                href="/?catagory={{$blog->catagory->slug}}{{request('search') ? '&search=' . request('search') : ''}}{{request('username') ? '&username=' . request('username') : ''}}"><span
                    class="badge bg-primary">{{$blog->catagory->name}} </span></a>

        </div>
        <p class="card-text">
            {{$blog->intro}}
        </p>
        <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
</div>