<x-admin-layout>
    <h3 class="my-3 text-center">Blog create form</h3>
    <x-card-wapper>
        <form action="/admin/blogs/store" method="POST" enctype='multipart/form-data'>
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="intro" />


            <x-form.textarea name="body" />

            <x-form.input name="thumbnail" type="file" />

            <div>
                <label for="category" class="form-label">Category</label>
                <select name="catagory_id" id="category" class="form-control">
                    @foreach ($catagories as $category)
                    <option {{$category->id==old('category_id') ? 'selected':''}} value="{{$category->id}}">
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
