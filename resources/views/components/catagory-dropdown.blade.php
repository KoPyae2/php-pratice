<div>
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{isset($curCatagory) ? $curCatagory->name : 'Filter By Catagory'}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach ($catagories as $catagory)
            <li><a class="dropdown-item" href="/?catagory={{$catagory->slug}}{{request('search') ? '&search=' . request('search') : ''}}{{request('username') ? '&username=' . request('username') : ''}}">{{$catagory->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>