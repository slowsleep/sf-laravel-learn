@extends('layouts.app')

@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="content">Content:</label>
        <input type="text" name="content" id="content">
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author">
    </div>
    <input type="submit">
</form>
@endsection
