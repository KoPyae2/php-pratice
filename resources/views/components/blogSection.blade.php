@props(['blogs','catagories','curCatagory'])
<!-- blogs section -->
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{isset($curCatagory) ? $curCatagory->name : 'Filter By Catagory'}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($catagories as $catagory)
                <li><a class="dropdown-item" href="/catagories/{{$catagory->slug}}">{{$catagory->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            <input type="text" name="search" autocomplete="false" value="{{request('search')}}" class="form-control" placeholder="Search Blogs..." />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">


        @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blogCard :blog="$blog" />
        </div>
        @empty
        <p>Blog not found...</p>
        @endforelse


    </div>
</section>