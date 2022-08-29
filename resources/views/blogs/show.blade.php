<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="/storage/{{$blog->thumbnail}}" class="card-img-top" alt="..." />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div>
                    <div>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>

                    <div><a href="/catagories/{{$blog->catagory->slug}}"><span
                                class="badge bg-primary">{{$blog->catagory->name}}</span></a></div>
                    <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
                    <div class="text-secondary mt-3">
                        <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                            @csrf
                            @auth
                            @if( auth()->user()->isSubscribed($blog) )
                            <button class="btn btn-danger">UnSubscribe</button>
                            @else
                            <button class="btn btn-warning">Subscribe</button>
                            @endif
                            @endauth
                        </form>
                    </div>
                </div>
                <p class="lh-md mt-3">
                    {{$blog->body}}
                </p>
            </div>
        </div>
    </div>


    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-card-wapper>
                <x-comment-form :blog="$blog" />
            </x-card-wapper>
            @else
            <p class="text-center">Please <a href="/login">login</a> to participate in this discussion.</p>
            @endauth
        </div>
    </section>


    @if($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
    @endif

    <x-blogYouMayLike :randomBlogs="$randomBlogs" />
</x-layout>
