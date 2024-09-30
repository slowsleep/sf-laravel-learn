@extends('layouts.app')

@section('content')
<h1>Edit post</h1>
<form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}">
    </div>
    <div>
        <label for="content">Content:</label>
        <input type="text" name="content" id="content" value="{{ $post->content }}">
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="{{ $post->author }}">
    </div>
    <input type="submit">
</form>
@endsection
