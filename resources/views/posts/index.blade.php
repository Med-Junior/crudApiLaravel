@extends('welcome')
@section('body')
INDEX
<form action="{{route('posts_api') }}" method="post">
    {{csrf_field() }}
    <input type="hidden" name="user" value="1" >
    <input type="hidden" name="body" value="1" >
    <input type="hidden" name="imgUrl" value="1" >
    <input type="hidden" name="imgName" value="1" >
    <button type="submit" name="submit" class="btn btn-outline-danger">Delete</button>
    </form>
@endsection
