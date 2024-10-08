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
        <input type="text" name="content_text" id="content" value="{{ $post->content }}">
    </div>
    <div>
        <label for="author">Author:</label>
        <!-- <input type="text" name="author" id="author" value="{{ $post->author }}"> -->
        <select name="author" id="">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $post->author ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit">
</form>
@endsection
