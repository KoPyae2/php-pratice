@props(['name','type'=>'text','value'=>''])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <input id="{{$name}}" type="{{$type}}" class="form-control" name="{{$name}}" value="{{old($name,$value)}}">
    @error("{{$name}}")
    <x-error :message="$message" />
    @enderror
</div>
