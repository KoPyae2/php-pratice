<x-admin-layout>
    <h3 class="my-3 text-center">Blog Edit form</h3>
    <x-card-wapper>
        <form action="/admin/blogs/{{$blog->id}}/update" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PATCH')
            <x-form.input name="title" value="{{$blog->title}}" />
            <x-form.input name="slug" value="{{$blog->slug}}" />
            <x-form.input name="intro" value="{{$blog->intro}}" />


            <x-form.textarea name="body" value="{{$blog->body}}" />

            <x-form.input name="thumbnail" type="file" />
            <img src="/storage/{{$blog->thumbnail}}" width="100px" height="100px" alt="">

            <div>
                <label for="category" class="form-label">Category</label>
                <select name="catagory_id" id="category" class="form-control">
                    @foreach ($catagories as $category)
                    <option {{$category->id==old('category_id',$blog->catagory->id) ? 'selected':''}}
                        value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                @error('catagory_id')
                <x-error :message="$message" />
                @enderror
            </div>

            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-wapper>
</x-admin-layout>