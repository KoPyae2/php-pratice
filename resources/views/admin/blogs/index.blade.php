<x-admin-layout>
    <h3 class="text-center mt-3">Blogs</h3>
    <x-card-wapper>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">intro</th>
                    <th scope="col" colspan="2">Operator</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td><a href="/blogs/{{$blog->slug}}" target="_blank">{{$blog->title}}</a></td>
                    <td>{{$blog->intro}}</td>
                    <td>
                        <form action="/admin/blogs/{{$blog->id}}/edit" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/blogs/{{$blog->id}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach




            </tbody>
        </table>
        {{$blogs->links()}}
    </x-card-wapper>

</x-admin-layout>