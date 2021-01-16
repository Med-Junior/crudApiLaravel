@extends('welcome')
@section('body')
Create
@endsection
<!--

<form action="{{ route('posts') }}" method="post">
    @csrf
    <div>
        <label for="body" class="sr-only">Body</label>
        <br>
        <textarea name="body" id="body" cols="30" rows="4"  placeholder="Post something!"></textarea>

        @error('body')
            <div>
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <button type="submit" >Post</button>
    </div>
</form>

-->
