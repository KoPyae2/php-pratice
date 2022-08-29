@props(['blog'])
<form action="/blogs/{{$blog->slug}}/comments" method="POST">
    @csrf
    <div class="mb-3">
        <textarea required name="body" id="" cols="30" rows="10" class="form-control border border-0"
            placeholder="Say soomething..."></textarea>
        @error('body')
        <x-error :message="$message" />
        @enderror
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>