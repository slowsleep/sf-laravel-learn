@extends('layouts.app')

@section('content')
<div class="post">
    <div>
        <a href="{{ route('post.edit', $post->id) }}">edit</a>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="delete">
        </form>
        <!-- <a href="{{ route('post.destroy', $post->id) }}">delete</a> -->
    </div>
    <p>Title: {{ $post->title }}</p>
    <p>Content: {{ $post->content }}</p>
    <p>Author: {{ $post->author }}</p>
    <p>created: {{ $post->created_at }}</p>
</div>
@endsection
