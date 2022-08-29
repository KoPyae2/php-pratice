<!-- navbar -->
<nav class="navbar navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">Blog Test</a>
        <div class="d-flex">

            <a href="/" class="nav-link">Home</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
            @auth
            @can('admin')
            <a href="/admin/blogs" class="nav-link">Dashboard</a>
            @endcan
            <img width="40" height="40" class="rounded-circle" src="{{auth()->user()->avatar}}" alt="">
            <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
            <form action="/logout" method="POST">
                @csrf
                <button class="nav-link btn btn-link" type="submit">Logout</button>
            </form>
            @else
            <a href="/register" class="nav-link">Register</a>
            <a href="/login" class="nav-link">Login</a>
            @endauth
        </div>
    </div>
</nav>
